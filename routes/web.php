<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;

// Ruta principal - muestra la página de inicio
Route::get('/', function () {
    return view('principal');
});

// Muestra la página de términos y condiciones
Route::get('/terminos-de-uso', function () {
    return view('terminos-de-uso');
});

// Muestra el formulario de contacto
Route::get('/contacto', function () {
    return view('contacto');
});

// Procesa el envío del formulario de contacto
Route::post('/contacto', [ContactoController::class, 'procesar']);

// Muestra la página de comercialización
Route::get('/comercializacion', function () {
    return view('comercializacion');
});

// Muestra el catálogo de productos
Route::get('/catalogo', function () {
    return view('catalogo');
});

// Muestra información sobre la empresa
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

// Muestra el formulario de consultas
Route::get('/consultas', function() {
    return view('consultas');
});

// Procesa el envío del formulario de consultas
Route::post('/consultas', [ConsultaController::class, 'procesar']);
