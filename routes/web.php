<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

# Books Panel (Rabbi)
Route::get('/manage/books', [BooksController::class, 'manage']);
Route::get('/books/create', [BooksController::class, 'create']);
Route::post('/books', [BooksController::class, 'store']);
Route::get('/manage/books/{id}/edit', [BooksController::class, 'edit']);
Route::put('/books/{id}', [BooksController::class, 'update']);
Route::delete('/books/{id}', [BooksController::class, 'destroy']);

# Books Panel Frontend (Rabbi)
Route::get('/books', [BooksController::class, 'index']);
Route::get('/books/{id}', [BooksController::class, 'show']);