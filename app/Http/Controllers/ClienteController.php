<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
        public function dashboard(){
        return view('backend.cliente.dashboard_cliente');
    }
}
