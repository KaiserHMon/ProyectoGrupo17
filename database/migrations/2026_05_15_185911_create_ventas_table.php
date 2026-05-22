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
        Schema::create('ventas_cabecera', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')
                    ->constrained('usuarios')
                    ->cascadeOnDelete();
            $table->enum('estado', ['pendiente', 'confirmado'])
                    ->default('pendiente');
            $table->decimal('total', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_cabecera');
    }
};
