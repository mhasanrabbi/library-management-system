<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;


Route::get('/', function () {
    return view('index');
});

//show all authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
//store new author
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
//show all authors for manage
Route::get('/manage/authors', [AuthorController::class, 'manage'])->name('manage.authors.index');
//update author
Route::put('/manage/authors/{id}', [AuthorController::class, 'update'])->name('manage.authors.update');
//delete author
Route::delete('/manage/authors/{id}', [AuthorController::class, 'destroy'])->name('manage.authors.destroy');

