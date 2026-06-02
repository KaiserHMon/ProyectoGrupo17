<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function add(Request $request, $productoId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para añadir productos al carrito.');
        }

        $usuarioId = Auth::id();
        $producto = Producto::findOrFail($productoId);

        // 1. Buscar/Crear VentaCabecera pendiente
        $cabecera = VentaCabecera::firstOrCreate(
            ['usuario_id' => $usuarioId, 'estado' => 'pendiente'],
            ['total' => 0]
        );

        // 2. Buscar/Crear VentaDetalle para este producto
        $detalle = VentaDetalle::firstOrNew(
            ['venta_cabecera_id' => $cabecera->id, 'producto_id' => $productoId]
        );

        // Validar stock disponible
        $nuevaCantidad = $detalle->exists ? $detalle->cantidad + 1 : 1;
        if ($nuevaCantidad > $producto->stock) {
            return redirect()->back()->with('error', 'No hay suficiente stock disponible de "' . $producto->nombre . '" para añadir al carrito.');
        }

        // 3. Actualizar cantidad
        if ($detalle->exists) {
            $detalle->cantidad += 1;
        } else {
            $detalle->cantidad = 1;
            $detalle->precio_unitario = $producto->precio;
        }
        $detalle->save();

        // 4. Actualizar total en VentaCabecera
        $cabecera->total = VentaDetalle::where('venta_cabecera_id', $cabecera->id)
            ->get()
            ->sum(function ($d) {
                return $d->cantidad * $d->precio_unitario;
            });
        $cabecera->save();

        return redirect()->back()->with('success', 'Producto añadido al carrito correctamente.');
    }

    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu carrito.');
        }

        $usuarioId = Auth::id();
        $cabecera = VentaCabecera::where('usuario_id', $usuarioId)
            ->where('estado', 'pendiente')
            ->with('detalles.producto')
            ->first();

        return view('carrito', compact('cabecera'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar esta acción.');
        }

        $usuarioId = Auth::id();
        $detalle = VentaDetalle::findOrFail($id);

        // Validar que el detalle pertenezca a una cabecera del usuario actual y esté pendiente
        if ($detalle->venta->usuario_id !== $usuarioId || $detalle->venta->estado !== 'pendiente') {
            abort(403, 'Acción no autorizada.');
        }

        $action = $request->input('action');
        $producto = $detalle->producto;

        if ($action === 'increase') {
            if ($detalle->cantidad < $producto->stock) {
                $detalle->cantidad += 1;
            } else {
                return redirect()->back()->with('error', 'No hay suficiente stock disponible para este producto.');
            }
        } elseif ($action === 'decrease') {
            if ($detalle->cantidad > 1) {
                $detalle->cantidad -= 1;
            } else {
                return redirect()->back()->with('error', 'La cantidad mínima es 1.');
            }
        } else {
            return redirect()->back()->with('error', 'Acción no válida.');
        }

        $detalle->save();

        // Recalcular total de la cabecera
        $cabecera = $detalle->venta;
        $cabecera->total = VentaDetalle::where('venta_cabecera_id', $cabecera->id)
            ->get()
            ->sum(function ($d) {
                return $d->cantidad * $d->precio_unitario;
            });
        $cabecera->save();

        return redirect()->back()->with('success', 'Cantidad actualizada correctamente.');
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar esta acción.');
        }

        $usuarioId = Auth::id();
        $detalle = VentaDetalle::findOrFail($id);

        // Validar que el detalle pertenezca a una cabecera del usuario actual y esté pendiente
        if ($detalle->venta->usuario_id !== $usuarioId || $detalle->venta->estado !== 'pendiente') {
            abort(403, 'Acción no autorizada.');
        }

        $cabecera = $detalle->venta;
        $detalle->delete();

        // Recalcular total de la cabecera
        $cabecera->total = VentaDetalle::where('venta_cabecera_id', $cabecera->id)
            ->get()
            ->sum(function ($d) {
                return $d->cantidad * $d->precio_unitario;
            });
        $cabecera->save();

        // Si la cabecera se quedó sin detalles, la eliminamos
        if ($cabecera->detalles()->count() === 0) {
            $cabecera->delete();
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito correctamente.');
    }
}
