<?php

use App\Http\Controllers\tareaController;
use Illuminate\Support\Facades\Route;

Route::prefix('tarea')->name('tarea.')->group(function () {
    Route::get('/crear', [tareaController::class, 'crear'])->name('crear');
    Route::post('/guardar', [tareaController::class, 'guardar'])->name('guardar');
    Route::get('/leer', [tareaController::class, 'leer'])->name('leer');
    Route::put('/{tarea}', [tareaController::class, 'update'])->name('update');
    Route::delete('/{id}', [tareaController::class, 'delete'])->name('delete');
});