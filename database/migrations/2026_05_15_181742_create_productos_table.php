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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(true); // Nombre único del producto
            $table->text('descripcion')->nullable(); // Descripción opcional que se muestra en el catálogo
            $table->decimal('precio', 8, 2); // Precio con hasta 8 dígitos y 2 decimales
            $table->unsignedInteger('stock')->default(0); // Cantidad disponible en inventario
            $table->string('imagen')->nullable(); // Nombre del archivo guardado en storage/productos
            $table->timestamps();
            $table->softDeletes(); // Borrado lógico: el producto no se elimina físicamente de la BD
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
