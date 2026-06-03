<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * Modelo de usuario autenticable para la aplicación.
 */
class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table    = 'usuarios';
    protected $fillable = ['nombre', 'email', 'password', 'rol_id'];
    protected $hidden   = ['password', 'remember_token'];

    protected function casts(): array {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Relación: Un usuario pertenece a un rol.
     */
    public function rol() {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
