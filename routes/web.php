<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;


Route::get('/', function () {
    return view('index');
});

# Authors (Kamrul)
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
//author search
Route::post('/authors/search', [AuthorController::class, 'search'])->name('authors.search');

=======
# Books Panel (Rabbi)
Route::get('/manage/books', [BooksController::class, 'manage'])->name('manage.books.index');
Route::get('/books/create', [BooksController::class, 'create'])->name('manage.books.create');
Route::post('/books', [BooksController::class, 'store'])->name('manage.books.store');
Route::get('/manage/books/{id}/edit', [BooksController::class, 'edit'])->name('manage.books.edit');
Route::put('/books/{id}', [BooksController::class, 'update'])->name('manage.books.update');
Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('manage.books.destroy');

# Book Trash
Route::get('/books/trashed', [BooksController::class, 'trashed'])->name('books.trashed');
Route::post('/books/trashed/{id}/restore', [BooksController::class, 'trashedRestore'])->name('books.trashed.restore');
Route::post('/books/trashed/{id}/delete', [BooksController::class, 'trashedDestroy'])->name('books.trashed.destroy');


# Books Panel Frontend (Rabbi)
Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
// Route::get('/books', [BooksController::class, 'search'])->name('books.search');