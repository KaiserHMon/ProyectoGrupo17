<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $productos = Producto::all();
        return view('backend.admin.dashboard', compact('productos'));
    }
}
