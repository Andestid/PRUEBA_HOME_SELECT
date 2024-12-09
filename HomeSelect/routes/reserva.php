<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::prefix('reserva')->name('reserva.')->group(function () {
    Route::get('/crear', [ReservaController::class, 'crear'])->name('crear');
    Route::post('/guardar', [ReservaController::class, 'guardar'])->name('guardar');
    Route::get('/leer', [ReservaController::class, 'leer'])->name('leer');
    Route::put('/{reserva}', [ReservaController::class, 'update'])->name('update');
    Route::delete('/{id}', [ReservaController::class, 'delete'])->name('delete');
});