<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nombre'    => 'required|string|max:100',
            'email'     => 'required|email|unique:usuarios',
            'password'  => 'required|min:8|confirmed',
            'terminos'  => 'accepted',
        ], [
            'nombre.required'    => 'El nombre es obligatorio.',
            'email.required'     => 'El correo es obligatorio.',
            'email.email'        => 'El correo no tiene un formato válido.',
            'email.unique'       => 'El correo ingresado ya está registrado.',
            'password.required'  => 'La contraseña es obligatoria.',
            'password.min'       => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'terminos.accepted'  => 'Debes aceptar los términos de servicio para registrarte.',
        ])->validateWithBag('register');

        return Usuario::create([
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'password' => $request->password,
            'rol_id'   => 2,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    public function updateRol(Usuario $usuario)
    {
        if ($usuario->id === Auth::id()) {
            return back()->with('error_usuarios', 'No podés cambiar tu propio rol.');
        }

        $nuevoNombre = $usuario->rol->nombre === 'admin' ? 'cliente' : 'admin';
        $nuevoRol = Rol::where('nombre', $nuevoNombre)->firstOrFail();
        $usuario->update(['rol_id' => $nuevoRol->id]);

        return back()->with('success_usuarios', "Rol de {$usuario->nombre} cambiado a {$nuevoNombre}.");
    }

    public function destroy(Usuario $usuario)
    {
        if ($usuario->id === Auth::id()) {
            return back()->with('error_usuarios', 'No podés eliminarte a vos mismo.');
        }

        $nombre = $usuario->nombre;
        $usuario->delete();

        return back()->with('success_usuarios', "Usuario {$nombre} eliminado correctamente.");
    }
}
