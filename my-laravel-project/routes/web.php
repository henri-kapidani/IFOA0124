<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homepage'])->name('homepage');
// Route::get('/ciao', ['App\Http\Controllers\HomeController', 'ciao']);
Route::get('/ciao', [HomeController::class, 'ciao'])->name('ciao');
Route::get('/info', [HomeController::class, 'info'])->name('info');

Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/{id}', [BookController::class, 'details'])->name('book.details');


// Route::get('/info', function () {
//     return view('info');
// });




// miosito.com/libri        - Pagina lista delle risorse
// miosito.com/libri/{id}   - Pagina di dettaglio
// miosito.com/libri/edit   - Pagina con il form per la modifica
// miosito.com/libri/add    - Pagina con il form per l'aggiunta
