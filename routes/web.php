<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;


Route::get('/', function () {
    return view('index');
});

//show all authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
//store new author
Route::post('/authors', [AuthorController::class, 'store'])->name('manage.authors.store');