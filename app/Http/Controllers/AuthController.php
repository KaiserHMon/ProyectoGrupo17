<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formularioRegistroInicio(){
        return view('usuarios.login-register');
    }
}

public function registrar(Request $request){
    $request->validate([
        'name'      => 'required|string|max:255'
        'email'     =>  'required|email|max:255|unique:usuarios'])
}