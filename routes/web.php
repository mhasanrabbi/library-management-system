<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorsController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::get('/', [UserController::class, 'index']);


    // ... this is POST method
    Route::post('/register', [UserController::class, 'validate_registration'])->name('register');
    Route::post('/login', [UserController::class, 'validate_login'])->name('login');
});

// Route::get( '/dashboard', [UserController::class, 'dashboard'] )->name( 'dashboard' );
// Route::get( '/home', [UserController::class, 'dashboard'] )->name( 'home' );


Route::middleware(['auth', 'is_verify_email'])->group(function () {
    Route::get('/home', [UserController::class, 'dashboard'])->name('home');

    // user can access only the page
});
Route::get('account/verify/{token}', [UserController::class, 'verifyAccount'])->name('user.verify');

Route::middleware(['auth', 'is_verify_email', 'isadmin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

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


    // Book Rack
    Route::get('rack', [RackController::class, 'showRack']);
    Route::get('add/rack', [RackController::class, 'addRack'])->name('add.rack');
    Route::get('save/rack', [RackController::class, 'saveRack'])->name('save.rack');
    Route::get('edit/rack/{id}', [RackController::class, 'editRack'])->name('edit.rack');
    Route::put('update/rack', [RackController::class, 'updateRack'])->name('update.rack');
    Route::delete('delete/rack/{id}', [RackController::class, 'deleteRack'])->name('delete.book.rack');

    # Vendors (Azhar)
    Route::get('vendors', [VendorsController::class, 'index'])->name('vendors.index');
    Route::get('vendors/create', [VendorsController::class, 'create'])->name('vendors.create');
    Route::post('/vendors', [VendorsController::class, 'store'])->name('vendors.store');
    Route::get('vendors/{id}/edit', [VendorsController::class, 'edit'])->name('vendors.edit');
    Route::put('/vendors/{id}', [VendorsController::class, 'update'])->name('vendors.update');
    Route::delete('/vendors/{id}', [VendorsController::class, 'destroy'])->name('vendors.destroy');

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

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
});


// Route::get('dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);