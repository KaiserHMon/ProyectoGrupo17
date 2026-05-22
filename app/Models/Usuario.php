<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
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

    public function rol() {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

}
