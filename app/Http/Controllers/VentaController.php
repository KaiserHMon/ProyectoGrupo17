<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function confirmar(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para finalizar la compra.');
        }

        $usuarioId = Auth::id();

        try {
            DB::transaction(function () use ($usuarioId) {
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
            });

            // 5. Redireccionar a una vista de éxito
            $user = Auth::user();
            return view('checkout-exito', [
                'nombre' => $user->name,
                'email' => $user->email
            ]);

        } catch (\Exception $e) {
            return redirect()->route('carrito.show')->with('error', $e->getMessage());
        }
    }
}
