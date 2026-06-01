<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;

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
        $usuario = app(UsuarioController::class)->store($request);
        Auth::login($usuario);
        $request->session()->regenerate();
        return redirect('/cliente');
    }

    /*
    Recibe los datos ingresados en el formulario HTML, valida que esten ingresados un email y una contraseña, si el nombre del rol del usuario es admin, 
    redirije al panel de administrador, caso contraro, redirije al panel cliente
    */

    public function autenticar(Request $request){
        $credenciales = $request->validate(['email' => 'required|email',
                                        'password'  => 'required']);
        
        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
        if(Auth::user()->rol->nombre === 'admin'){
            return redirect('/admin');
        }
        return redirect('/cliente');
        }
        return back()->withErrors(['email' => 'Email o contraseña incorrectos']);
    }

    /*
    
    */
    
    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/usuarios/login-register');
    }
}