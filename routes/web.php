<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProductoController;

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentaController;

# Principal
Route::get('/', function () {
    return view('principal');
});

# Terminos de uso
Route::get('/terminos-de-uso', function () {
    return view('terminos-de-uso');
});

# Contacto
Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('/contacto', [ContactoController::class, 'procesar']);

# Comercializacion
Route::get('/comercializacion', function () {
    return view('comercializacion');
});

# Catalogo
Route::get('/catalogo', [ProductoController::class, 'mostrar']);

# Quienes somos
Route::get('/quienes-somos', function() {
    return view('quienes-somos');
});

# Login y registro
Route::get('/login-register', function() {
    return view('login-register');
})->name('login');

# Consultas
Route::get('/consultas', function() {
    return view('consultas');
});

Route::post('/consultas', [ConsultaController::class, 'procesar']);



/*
Seccion de clientes
*/
Route::middleware(['auth', 'rol:cliente'])->group(function() {

    #Carrito de compras
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'add'])->name('carrito.add');
    Route::get('/carrito', [CarritoController::class, 'show'])->name('carrito.show');
    Route::post('/carrito/confirmar', [VentaController::class, 'confirmar'])->name('venta.confirmar');

});

/*
Seccion de admin
*/
Route::middleware(['auth', 'rol:admin'])->group(function() {


    # Seccion de productos
    Route::get('/admin/productos', [ProductoController::class, 'index']);
    Route::post('/admin/productos/create', [ProductoController::class, 'create']);
    Route::get('/admin/productos/{id}/edit', [ProductoController::class, 'edit']);
    Route::get('/admin/prudcotos/{id}/delete', [ProductoController::class, 'destroy']);
});
