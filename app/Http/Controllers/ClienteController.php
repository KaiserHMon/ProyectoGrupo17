<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Muestra el dashboard del cliente.
     */
    public function dashboard(){
        return view('backend.dashboard_cliente');
    }
}
