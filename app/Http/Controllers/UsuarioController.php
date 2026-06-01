<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $request->validate([
            'nombre'        => 'required|string|max:100',
            'email'         => 'required|email|unique:usuarios',
            'password'      => 'required|min:8|confirmed',
        ]);

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
