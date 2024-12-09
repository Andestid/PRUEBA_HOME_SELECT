<?php

use App\Http\Controllers\pagoController;
use Illuminate\Support\Facades\Route;

Route::prefix('pago')->name('pago.')->group(function () {
    Route::get('/leer', [pagoController::class, 'leer'])->name('leer');
});