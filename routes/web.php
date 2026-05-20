<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('principal');
});

Route::get('/terminos-de-uso', function () {
    return view('terminos-de-uso');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::get('/comercializacion', function () {
    return view('comercializacion');
});

# Agregar middleware para que haya que iniciar sesion para ver el catalogo
Route::get('/catalogo', [ProductoController::class, 'index']);

Route::get('/quienes-somos', function() {
    return view('quienes-somos');
});

Route::get('/login-register', function() {
    return view('login-register');
});


Route::get('/consultas', function() {
    return view('consultas');
});

Route::post('/consultas', [ConsultaController::class, 'procesar']);
