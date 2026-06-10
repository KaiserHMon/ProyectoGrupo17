<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\VentaCabecera;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Consulta;

class AdminController extends Controller
{
    /**
     * Muestra el dashboard del administrador con productos, usuarios y ventas.
     */
    public function dashboard(Request $request)
    {
        $productos = Producto::all();
        $usuarios = Usuario::with('rol')->get();
        $ventas = VentaCabecera::where('estado', '!=', 'pendiente')
            ->with('usuario', 'detalles.producto')
            ->orderBy('created_at', 'desc')
            ->get();
        $activeTab = $request->query('tab', 'metricas');
        $consultas = Consulta::all();

        // Calcular Métricas
        $ingresosTotales = VentaCabecera::where('estado', 'confirmado')->sum('total');
        $ventasRealizadas = VentaCabecera::where('estado', 'confirmado')->count();
        $ticketPromedio = $ventasRealizadas > 0 ? $ingresosTotales / $ventasRealizadas : 0;
        $productosStockCritico = Producto::where('stock', '<=', 10)->count();
        $consultasPendientes = Consulta::where('estado', 'pendiente')->count();

        return view('backend.admin.dashboard', compact(
            'productos',
            'ventas',
            'usuarios',
            'activeTab',
            'consultas',
            'ingresosTotales',
            'ventasRealizadas',
            'ticketPromedio',
            'productosStockCritico',
            'consultasPendientes'
        ));
    }
}
