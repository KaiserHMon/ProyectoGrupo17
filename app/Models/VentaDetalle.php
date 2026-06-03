<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo para gestionar los detalles de cada venta (items del carrito).
 */
class VentaDetalle extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ventas_detalle';

    protected $fillable = [
        'venta_cabecera_id',
        'producto_id',
        'cantidad',
        'precio_unitario'
    ];

    /**
     * Relación: Un detalle pertenece a una venta cabecera.
     */
    public function venta()
    {
        return $this->belongsTo(VentaCabecera::class, 'venta_cabecera_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class)->withTrashed();
    }
}
