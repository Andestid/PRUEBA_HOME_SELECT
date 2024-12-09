<?php

use App\Http\Controllers\PropietarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('propietario')->name('propietario.')->group(function () {
    Route::get('/crear', [PropietarioController::class, 'crear'])->name('crear');
    Route::post('/guardar', [PropietarioController::class, 'guardar'])->name('guardar');
    Route::get('/leer', [PropietarioController::class, 'leer'])->name('leer');
    Route::put('/{propietario}', [PropietarioController::class, 'update'])->name('update');
    Route::delete('/{id}', [PropietarioController::class, 'delete'])->name('delete');
});