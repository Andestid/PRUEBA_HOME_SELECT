<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente/crear', [ClienteController::class, 'crear'])->name('cliente.crear');