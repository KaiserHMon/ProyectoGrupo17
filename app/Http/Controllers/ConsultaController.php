<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Procesa el formulario de consultas
     * Recibe nombre, email y mensaje del usuario
     * Redirige a la página de éxito
     */
    public function procesar(Request $request) {
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $mensaje = $request->input('mensaje');

        return view('exito', [
            'nombre' => $nombre,
            'email' => $email
        ]);
    }

}
