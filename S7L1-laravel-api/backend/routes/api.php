<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.v1.') // prefissa il nome della rotta è come se scriviamo: ....->name('api.v1.faculties.index')
    ->prefix('v1')     // prefissa l'url è come se scriviamo: Route::get('/api/v1/faculties', [.....])...
    // il prefix /api lo da di default il fatto che queste rotte sono scritte nel file api.php
    // ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties.index');
        Route::get('/faculties/{faculty}', [FacultyController::class, 'show'])->name('faculties.show');
        // Route::resource('/courses', CourseController::class);
        Route::get('/transcript', [StudentController::class, 'transcript'])->name('student.transcript');
    });


// Route::name('api.v2.')
//     ->prefix('v2')
//     ->group(function () {
//         Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties.index');
//         Route::resource('/courses', CourseController::class);
//     });
