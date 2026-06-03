<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo para gestionar los roles de usuarios.
 */
class Rol extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'nombre', 'descripcion',
    ];

    /**
     * Relación: Un rol tiene muchos usuarios.
     */
    public function usuarios() {
        return $this->hasMany(Usuario::class, 'rol_id');
    }
}
