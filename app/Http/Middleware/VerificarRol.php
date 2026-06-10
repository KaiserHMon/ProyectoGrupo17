<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

// Middleware que restringe el acceso a rutas según el rol del usuario autenticado.
// Se registra con el alias 'rol' en bootstrap/app.php y se usa en rutas así:
//   ->middleware(['auth', 'rol:admin'])
//   ->middleware(['auth', 'rol:cliente'])
// Siempre debe aplicarse después del middleware 'auth', que garantiza que
// Auth::user() no sea null.
class VerificarRol
{
    // $rol: nombre del rol requerido para acceder a la ruta (ej. 'admin', 'cliente').
    // Viene del parámetro que se le pasa al middleware en la definición de la ruta.
    public function handle(Request $request, Closure $next, string $rol): Response
    {
        // Compara el rol del usuario autenticado con el rol requerido por la ruta.
        // Si no coinciden, redirige al inicio en lugar de mostrar un error 403.
        if(Auth::user()->rol->nombre !== $rol){
            return redirect('/');
        }

        // El rol coincide: deja pasar la request al siguiente middleware o controller.
        return $next($request);
    }
}