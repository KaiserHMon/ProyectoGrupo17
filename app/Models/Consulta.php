<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo para las consultas enviadas desde el formulario público de contacto.
class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    // estado: 'pendiente' hasta que el admin la revise/responda desde el panel.
    protected $fillable = [
        'nombre',
        'email',
        'mensaje',
        'estado'
    ];


}
