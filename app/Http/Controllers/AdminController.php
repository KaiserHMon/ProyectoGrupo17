<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\VentaCabecera;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $productos = Producto::all();
        $ventas = VentaCabecera::where('estado', '!=', 'pendiente')
            ->with('usuario', 'detalles.producto')
            ->orderBy('created_at', 'desc')
            ->get();
        $activeTab = $request->query('tab', 'productos');

        return view('backend.admin.dashboard', compact('productos', 'ventas', 'activeTab'));
    }
}
