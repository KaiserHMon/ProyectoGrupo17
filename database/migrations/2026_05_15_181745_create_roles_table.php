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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // Valores posibles: 'admin', 'cliente'
            $table->string('descripcion')->nullable(); // Descripción opcional del rol
            $table->timestamps();
            $table->softDeletes(); // Borrado lógico para no romper relaciones con usuarios
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
