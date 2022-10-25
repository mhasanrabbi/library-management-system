<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;


Route::get('/', function () {
    return view('index');
});

//show all authors
Route::get('/authors', [AuthorsController::class, 'index'])->name('authors.index');
//show add author view
Route::get('admin/authors/create', [AuthorsController::class, 'create'])->name('manage.authors.create');
//store new author
Route::post('/authors', [AuthorsController::class, 'store'])->name('manage.authors.store');