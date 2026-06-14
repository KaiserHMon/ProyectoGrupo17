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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del visitante que envía la consulta
            $table->string('email'); // Email de contacto para responder
            $table->string('mensaje'); // Contenido de la consulta
            // El admin cambia el estado a 'resuelto' desde el panel una vez que responde
            $table->enum('estado', ['pendiente', 'resuelto'])
                    ->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
