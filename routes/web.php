<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;


Route::get('/', function () {
    return view('index');
});


Route::get('/authors', [AuthorsController::class, 'index'])->name('authors.index');