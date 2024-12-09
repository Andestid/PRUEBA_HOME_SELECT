<?php

use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/', function () {
    return view('index');
});

// Incluir rutas por recursos
require base_path('routes/cliente.php');
require base_path('routes/propietario.php');
require base_path('routes/apartamento.php');
require base_path('routes/reserva.php');
require base_path('routes/incidencia.php');
require base_path('routes/tarea.php');
require base_path('routes/pago.php');