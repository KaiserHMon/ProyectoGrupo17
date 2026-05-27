<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $productos = Producto::all();
        $usuarios = Usuario::with('rol')->get();
        return view('backend.admin.dashboard', compact('productos', 'usuarios'));
    }
}
