<?php

use App\Http\Controllers\ApartamentoController;
use Illuminate\Support\Facades\Route;

Route::prefix('apartamento')->name('apartamento.')->group(function () {
    Route::get('/crear', [ApartamentoController::class, 'crear'])->name('crear');
    Route::post('/guardar', [ApartamentoController::class, 'guardar'])->name('guardar');
    Route::get('/leer', [ApartamentoController::class, 'leer'])->name('leer');
    Route::put('/{apartamento}', [ApartamentoController::class, 'update'])->name('update');
    Route::delete('/{id}', [ApartamentoController::class, 'delete'])->name('delete');
});