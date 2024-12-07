<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function crear()
    {
        return view('cliente.crear');
    }
}