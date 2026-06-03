<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo para gestionar las cabeceras de ventas (compras).
 */
class VentaCabecera extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ventas_cabecera';

    protected $fillable = [
        'usuario_id',
        'estado',
        'total'
    ];

    /**
     * Relación: Una venta pertenece a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    /**
     * Relación: Una venta tiene muchos detalles.
     */
    public function detalles()
    {
        return $this->hasMany(VentaDetalle::class);
    }
}
