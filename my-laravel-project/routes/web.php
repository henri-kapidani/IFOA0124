<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homepage'])->name('homepage');
// Route::get('/ciao', ['App\Http\Controllers\HomeController', 'ciao']);
Route::get('/ciao', [HomeController::class, 'ciao'])->name('ciao');
Route::get('/info', [HomeController::class, 'info'])->name('info');

// Route::get('/info', function () {
//     return view('info');
// });
