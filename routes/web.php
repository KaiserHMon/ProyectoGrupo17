<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

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

Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::get('/quienes-somos', function() {
    return view('quienes-somos');
});

Route::get('/usuarios/login-register', function() {
    return view('/usuarios/login-register');
});


Route::get('/consultas', function() {
    return view('consultas');
});

Route::get('/backend/dashboard', function () {
    return view('/backend/dashboard');
});

Route::get('/usuarios/carrito', function () {
    return view('/usuarios/carrito');
});
