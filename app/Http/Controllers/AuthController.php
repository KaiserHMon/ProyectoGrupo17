<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;

class AuthController extends Controller
{
    /**
     * Retorna la vista para iniciar sesión o registrarse.
     */
    public function formularioRegistroInicio(){
        return view('usuarios.login-register');
    }

    /**
     * Registra un nuevo usuario validando datos del formulario.
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
        return redirect('/catalogo');
        }
        return back()->withErrors(['email' => 'Email o contraseña incorrectos'], 'login');
    }

    /**
     * Cierra la sesión del usuario actual.
     */
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/usuarios/login-register');
    }
}
