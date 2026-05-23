<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //retorna view de la pagina para iniciar sesión o registrarse
    public function formularioRegistroInicio(){
        return view('usuarios.login-register');
    }

    /*
    Recibira el parametro request, que contendra los datos ingresados en el formulario HTML de la pagina de inicio de sesion, validara que
    los datos ingresados cumplan diversos requisitos para ser aceptados
    */

    public function registrar(Request $request){
    $request->validate([
        'nombre'      =>    'required|string|max:255',
        'email'       =>    'required|email|max:255|unique:usuarios',
        'password'    =>    'required|min:8|confirmed', 
        ]);
    }

    public function iniciarSesion(Request $request){
    $request->validate([
        'email'         =>  'required|email',
        'password'      =>  'required',
        ]);
    }

    /*

    */

    public function autenticar(Request $request){
        $credenciales = $request->validate(['email' => 'required|email',
                                        'password'  => 'required']);
        
        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
        if(Auth::user()->rol->nombre === 'admin'){
            return redirect('/admin'); //aca iria la view del panel de admin
        }
        return redirect('/cliente'); //aca iria la view del panel de cliente
        }
        return back()->withErrors(['email' => 'Email o contraseña incorrectos']);
    }

    /*

    */
    
    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/usuario/login-register');
    }
}