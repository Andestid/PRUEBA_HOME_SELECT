<?php

use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Route;

Route::prefix('incidencia')->name('incidencia.')->group(function () {
    Route::get('/crear', [IncidenciaController::class, 'crear'])->name('crear');
    Route::post('/guardar', [IncidenciaController::class, 'guardar'])->name('guardar');
    Route::get('/leer', [IncidenciaController::class, 'leer'])->name('leer');
    Route::put('/{incidencia}', [IncidenciaController::class, 'update'])->name('update');
    Route::delete('/{id}', [IncidenciaController::class, 'delete'])->name('delete');
});