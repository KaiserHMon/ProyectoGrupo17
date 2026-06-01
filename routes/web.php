<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\UsuarioController;

# Principal
Route::get('/', function () {
    return view('principal');
});

# Terminos de uso -- modifico para commit
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

// Rutas de autenticación — sin protección
Route::get('/usuarios/login-register', [AuthController::class, 'formularioRegistroInicio']);
Route::post('/usuarios/registrar',     [AuthController::class, 'registrar'])->name('usuarios.registrar');
Route::post('/usuarios/autenticar',    [AuthController::class, 'autenticar'])->name('usuarios.autenticar');
Route::post('/usuarios/logout',        [AuthController::class, 'logout'])->name('usuarios.logout');

// Rutas protegidas — solo admin logueado
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
});

// Rutas protegidas — solo cliente logueado
Route::middleware(['auth', 'rol:cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'dashboard']);
});

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
    Route::patch('/carrito/detalle/{id}', [CarritoController::class, 'update'])->name('carrito.update');
    Route::delete('/carrito/detalle/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');
    Route::delete('/carrito/cancelar', [VentaController::class, 'cancelar'])->name('venta.cancelar');

});

/*
Seccion de admin
*/
Route::middleware(['auth', 'rol:admin'])->group(function() {

    # Seccion de productos
    Route::get('/admin/productos', [ProductoController::class, 'index'])->name('admin.productos.index');
    Route::post('/admin/productos', [ProductoController::class, 'store'])->name('admin.productos.store');
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update'])->name('admin.productos.update');
    Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy'])->name('admin.productos.destroy');

    # Gestión de usuarios
    Route::patch('/admin/usuarios/{usuario}/rol', [UsuarioController::class, 'updateRol'])->name('admin.usuarios.updateRol');
    Route::delete('/admin/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy');

});
