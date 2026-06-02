<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class VentaCabecera extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ventas_cabecera';

    protected $fillable = [
        'usuario_id',
        'estado',
        'total'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function detalles()
    {
        return $this->hasMany(VentaDetalle::class);
    }
}
