<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\ApartamentoController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('index');
});

Route::get('/cliente/crear', [ClienteController::class, 'crear'])->name('cliente.crear');

Route::post('/cliente/guardar', [ClienteController::class, 'guardar'])->name('cliente.guardar');

Route::get('/cliente/leer', [ClienteController::class, 'leer'])->name('cliente.leer');

Route::put('/cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');

Route::delete('/clientes/{id}', [ClienteController::class, 'delete'])->name('cliente.delete');

Route::get('/propietario/crear', [PropietarioController::class, 'crear'])->name('propietario.crear');

Route::post('/propietario/guardar', [PropietarioController::class, 'guardar'])->name('propietario.guardar');

Route::get('/propietario/leer', [PropietarioController::class, 'leer'])->name('propietario.leer');

Route::put('/propietario/{propietario}', [PropietarioController::class, 'update'])->name('propietario.update');

Route::delete('/propietario/{id}', [PropietarioController::class, 'delete'])->name('propietario.delete');

Route::get('/apartamento/crear', [ApartamentoController::class, 'crear'])->name('apartamento.crear');

Route::post('/apartamento/guardar', [ApartamentoController::class, 'guardar'])->name('apartamento.guardar');

Route::get('/apartamento/leer', [ApartamentoController::class, 'leer'])->name('apartamento.leer');

Route::put('/apartamento/{propietario}', [ApartamentoController::class, 'update'])->name('apartamento.update');

Route::delete('/apartamento/{id}', [ApartamentoController::class, 'delete'])->name('apartamento.delete');
//reserva
Route::get('/reserva/crear', [ReservaController::class, 'crear'])->name('reserva.crear');

Route::post('/reserva/guardar', [ReservaController::class, 'guardar'])->name('reserva.guardar');

Route::get('/reserva/leer', [reservaController::class, 'leer'])->name('reserva.leer');

Route::put('/reserva/{reserva}', [reservaController::class, 'update'])->name('reserva.update');

Route::delete('/reserva/{id}', [reservaController::class, 'delete'])->name('reserva.delete');
