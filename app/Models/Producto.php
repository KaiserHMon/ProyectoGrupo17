<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo para gestionar los productos de la tienda.
 */
class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen'
    ];

    /**
     * Relación: Un producto tiene muchos detalles de venta.
     */
    public function ventasDetalle()
    {
        return $this->hasMany(VentaDetalle::class);
    }
}
