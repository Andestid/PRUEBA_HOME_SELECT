<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/crear', [ClienteController::class, 'crear'])->name('crear');
    Route::post('/guardar', [ClienteController::class, 'guardar'])->name('guardar');
    Route::get('/leer', [ClienteController::class, 'leer'])->name('leer');
    Route::put('/{cliente}', [ClienteController::class, 'update'])->name('update');
    Route::delete('/{id}', [ClienteController::class, 'delete'])->name('delete');
});