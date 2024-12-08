<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('index');
});

Route::get('/cliente/crear', [ClienteController::class, 'crear'])->name('cliente.crear');

Route::post('/cliente/guardar', [ClienteController::class, 'guardar'])->name('cliente.guardar');

Route::get('/cliente/leer', [ClienteController::class, 'leer'])->name('cliente.leer');

Route::put('/cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');

Route::delete('/clientes/{id}', [ClienteController::class, 'delete'])->name('cliente.delete');