<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GuestController;

//user home for guest               
Route::get('/', [GuestController::class, 'index'])->name('user.home');

#=========================================================================================
Route::middleware(['guest'])->group(function () {
    // show registration view 
    Route::get('/user/register', [AuthController::class, 'register'])->name('user.register')->middleware('guest');
    //show login view
    Route::get('/user/login', [AuthController::class, 'login'])->name('user.login')->middleware('guest');
});

// register a new user 
Route::post('/user/create', [AuthController::class, 'store'])->name('user.create');
//login 
Route::post('/user/dashboard', [AuthController::class, 'authLogin'])->name('user.dashboard');
//logout
Route::post('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

#==========================================================================================

// Book Rack
Route::get('rack', [RackController::class, 'showRack'])->name('rack');
Route::get('add/rack', [RackController::class, 'addRack'])->name('add.rack');
Route::get('save/rack', [RackController::class, 'saveRack'])->name('save.rack');
Route::get('edit/rack/{id}', [RackController::class, 'editRack'])->name('edit.rack');
Route::put('update/rack', [RackController::class, 'updateRack'])->name('update.rack');
Route::delete('delete/rack/{id}', [RackController::class, 'deleteRack'])->name('delete.book.rack');
Route::get('search/rack', [RackController::class, 'searchRack'])->name('search.rack');

# Vendors (Azhar)
Route::get('vendors', [VendorsController::class, 'index'])->name('vendors.index');
Route::get('vendors/create', [VendorsController::class, 'create'])->name('vendors.create');
Route::post('/vendors', [VendorsController::class, 'store'])->name('vendors.store');
Route::get('vendors/{id}/edit', [VendorsController::class, 'edit'])->name('vendors.edit');
Route::put('/vendors/{id}', [VendorsController::class, 'update'])->name('vendors.update');
Route::delete('/vendors/{id}', [VendorsController::class, 'destroy'])->name('vendors.destroy');

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
Route::get('/authors/search')->name('authors.search');

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
