<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('password'); // Se guarda hasheada con bcrypt
            $table->foreignId('rol_id')
                  ->constrained('roles')
                  ->onDelete('restrict'); // No se puede eliminar un rol si tiene usuarios asignados
            $table->rememberToken(); // Token para la opción "recordarme" del login de Laravel
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
