<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('path della rotta con eventuali parametri', ['nome completo di namespace della classe controller', 'metodo che gestisce la rotta'])->name('nome della rotta');

// rotte pagine generali
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// rotte per la risorsa del sito
Route::get('/books',            [BookController::class, 'index'])->name('books.index');
Route::get('/books/create',     [BookController::class, 'create'])->name('books.create');
Route::get('/books/{id}',       [BookController::class, 'show'])->name('books.show');
Route::get('/books/{id}/edit',  [BookController::class, 'edit'])->name('books.edit');
