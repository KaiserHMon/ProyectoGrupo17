<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    /**
     * Recibe nombre y email del usuario
     * Redirige a la view de éxito
     */
    public function procesar(Request $request) {
        $nombre = $request->input('nombre');
        $email = $request->input('email');

        return view('exito', [
            'nombre' => $nombre,
            'email' => $email
        ]);
    }

    /**
     * Recibe la peticion con los datos de consulta
     * Los valida y los guarda en la base de datos
     */
    public function guardar(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'mensaje' => 'required|string|max:300'
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio para poder contactarnos.',
            'mensaje.required' => 'El mensaje de consulta es obligatorio.'
        ]);

        $data = $request->only(['nombre', 'email', 'mensaje']);

        Consulta::create($data);

        return redirect()->back()->with('success', 'Consulta creada correctamente.');
    }


    /**
     * Alterna el estado de una consulta entre pendiente y resuelto.
     */
    public function toggleStatus($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->estado = $consulta->estado === 'pendiente' ? 'resuelto' : 'pendiente';
        $consulta->save();

        return redirect()->to('/admin?tab=consultas')->with('success_consultas', 'El estado de la consulta ha sido actualizado correctamente.');
    }

}
