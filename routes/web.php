<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\VendorsController;



Route::get('store', [StoreController::class, 'index']);
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('store/add-to-cart', [StoreController::class, 'addToCart']);
// Route::get('cart', [CartController::class, 'index']);
Route::get('/pay-with-paypal', [CartController::class, 'payWithPaypal'])->name('payWithPaypal');



Route::get('/books', [BooksController::class, 'index'])->name('books.index');
# Books Panel (Rabbi)
Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
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