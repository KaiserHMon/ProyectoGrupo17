<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class VentaController extends Controller
{
    /**
     * Confirma la compra del carrito pendiente y reduce el stock.
     */
    public function confirmar(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para finalizar la compra.');
        }

        $usuarioId = Auth::id();
        $ventaId = null;

        try {
            DB::transaction(function () use ($usuarioId, &$ventaId) {
                // 1. Obtener la VentaCabecera con estado = 'pendiente' del usuario
                $cabecera = VentaCabecera::where('usuario_id', $usuarioId)
                    ->where('estado', 'pendiente')
                    ->with('detalles.producto')
                    ->first();

                if (!$cabecera || $cabecera->detalles->isEmpty()) {
                    throw new \Exception('No hay una compra pendiente para confirmar.');
                }

                // 2. Cambiar su estado a 'confirmado'
                $cabecera->estado = 'confirmado';
                $cabecera->save();

                // 3. Por cada VentaDetalle, restar la cantidad del stock del Producto
                foreach ($cabecera->detalles as $detalle) {
                    $producto = $detalle->producto;
                    if ($producto->stock < $detalle->cantidad) {
                        throw new \Exception("Stock insuficiente para el producto: {$producto->nombre}");
                    }
                    $producto->stock -= $detalle->cantidad;
                    $producto->save();
                }

                $ventaId = $cabecera->id;
            });

            // 5. Redireccionar a una vista de éxito
            $user = Auth::user();
            return view('backend.cliente.checkout-exito', [
                'nombre' => $user->nombre ?? $user->name,
                'email' => $user->email,
                'ventaId' => $ventaId
            ]);

        } catch (\Exception $e) {
            return redirect()->route('carrito.show')->with('error', $e->getMessage());
        }
    }

    /**
     * Descarga el comprobante PDF de una compra confirmada.
     */
    public function descargarComprobante($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para descargar el comprobante.');
        }

        $usuarioId = Auth::id();

        // Obtener la venta confirmada del usuario logueado con sus detalles y productos
        $venta = VentaCabecera::where('id', $id)
            ->where('usuario_id', $usuarioId)
            ->where('estado', 'confirmado')
            ->with(['detalles.producto', 'usuario'])
            ->first();

        if (!$venta) {
            abort(404, 'Comprobante no encontrado.');
        }

        // Generar el PDF
        $pdf = Pdf::loadView('backend.cliente.comprobante-pdf', compact('venta'));

        return $pdf->download("comprobante_compra_{$venta->id}.pdf");
    }

    /**
     * Cancela la compra pendiente del usuario.
     */
    public function cancelar()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar esta acción.');
        }

        $usuarioId = Auth::id();

        try {
            $cabecera = VentaCabecera::where('usuario_id', $usuarioId)
                ->where('estado', 'pendiente')
                ->first();

            if ($cabecera) {
                // Eliminar detalles primero para limpiar de forma explícita
                $cabecera->detalles()->delete();
                // Eliminar cabecera
                $cabecera->delete();
            }

            return redirect()->route('carrito.show')->with('success', 'Compra cancelada y carrito vaciado correctamente.');

        } catch (\Exception $e) {
            return redirect()->route('carrito.show')->with('error', 'Ocurrió un error al intentar cancelar la compra: ' . $e->getMessage());
        }
    }



}
