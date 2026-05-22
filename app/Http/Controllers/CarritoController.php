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
}
