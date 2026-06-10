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
        $fechaInicio = $request->query('fecha_inicio');
        $fechaFin = $request->query('fecha_fin');

        // Validar formato YYYY-MM-DD
        if ($fechaInicio && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaInicio)) {
            $fechaInicio = null;
        }
        if ($fechaFin && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaFin)) {
            $fechaFin = null;
        }

        $productos = Producto::all();

        // 1. Filtrar Usuarios por fecha
        $usuariosQuery = Usuario::with('rol');
        if ($fechaInicio) {
            $usuariosQuery->whereDate('created_at', '>=', $fechaInicio);
        }
        if ($fechaFin) {
            $usuariosQuery->whereDate('created_at', '<=', $fechaFin);
        }
        $usuarios = $usuariosQuery->get();

        // 2. Filtrar Ventas por fecha
        $ventasQuery = VentaCabecera::where('estado', '!=', 'pendiente');
        if ($fechaInicio) {
            $ventasQuery->whereDate('created_at', '>=', $fechaInicio);
        }
        if ($fechaFin) {
            $ventasQuery->whereDate('created_at', '<=', $fechaFin);
        }
        $ventas = $ventasQuery->with('usuario', 'detalles.producto')
            ->orderBy('created_at', 'desc')
            ->get();

        $activeTab = $request->query('tab', 'metricas');

        // 3. Filtrar Consultas por fecha
        $consultasQuery = Consulta::query();
        if ($fechaInicio) {
            $consultasQuery->whereDate('created_at', '>=', $fechaInicio);
        }
        if ($fechaFin) {
            $consultasQuery->whereDate('created_at', '<=', $fechaFin);
        }
        $consultas = $consultasQuery->get();

        // 4. Calcular Métricas con filtros de fecha
        $baseMetricasVentas = VentaCabecera::where('estado', 'confirmado');
        $baseConsultas = Consulta::query();

        if ($fechaInicio) {
            $baseMetricasVentas->whereDate('created_at', '>=', $fechaInicio);
            $baseConsultas->whereDate('created_at', '>=', $fechaInicio);
        }
        if ($fechaFin) {
            $baseMetricasVentas->whereDate('created_at', '<=', $fechaFin);
            $baseConsultas->whereDate('created_at', '<=', $fechaFin);
        }

        $ingresosTotales = (clone $baseMetricasVentas)->sum('total');
        $ventasRealizadas = (clone $baseMetricasVentas)->count();
        $ticketPromedio = $ventasRealizadas > 0 ? $ingresosTotales / $ventasRealizadas : 0;
        
        // El stock crítico es una métrica de inventario físico en tiempo real, no depende de la fecha
        $productosStockCritico = Producto::where('stock', '<=', 10)->count();
        
        $consultasPendientes = (clone $baseConsultas)->where('estado', 'pendiente')->count();

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
