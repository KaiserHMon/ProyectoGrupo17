<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\VentaCabecera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Muestra el dashboard del cliente con los datos que uso para loguearse y sus compras realizadas anteriormente.
     */
    public function dashboard(Request $request){
        $usuario = Auth::user();
        $ventas = VentaCabecera::where('usuario_id', Auth::id())
            ->where('estado', '!=', 'pendiente')
            ->with('detalles.producto')
            ->orderBy('created_at', 'desc')
            ->get();
        $activeTab = $request->query('tab', 'productos');

        return view('backend.cliente.dashboard_cliente', compact('usuario', 'ventas', 'activeTab'));
    }
}
