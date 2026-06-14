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
        Schema::create('ventas_detalle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_cabecera_id')
                    ->constrained('ventas_cabecera')
                    ->cascadeOnDelete(); // Si se cancela la venta cabecera, se eliminan todos sus items
            $table->foreignId('producto_id')
                    ->constrained('productos');
            $table->integer('cantidad')->default(1);
            // Se guarda el precio al momento de agregar al carrito, no el precio actual del producto
            $table->decimal('precio_unitario', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_detalle');
    }
};
