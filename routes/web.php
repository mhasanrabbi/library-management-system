<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\VendorsController;



// Route::get('store', [StoreController::class, 'index']);
// Route::get('/cart', [CartController::class, 'index'])->name('cart');
// Route::post('store/add-to-cart', [StoreController::class, 'addToCart']);
// // Route::get('cart', [CartController::class, 'index']);
// Route::get('/pay-with-paypal', [CartController::class, 'payWithPaypal'])->name('payWithPaypal');



// Route::get('/books', [BooksController::class, 'index'])->name('books.index');
// # Books Panel (Rabbi)
// Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
// Route::get('/manage/books', [BooksController::class, 'manage'])->name('manage.books.index');
// Route::get('/books/create', [BooksController::class, 'create'])->name('manage.books.create');
// Route::post('/books', [BooksController::class, 'store'])->name('manage.books.store');
// Route::get('/manage/books/{id}/edit', [BooksController::class, 'edit'])->name('manage.books.edit');
// Route::put('/books/{id}', [BooksController::class, 'update'])->name('manage.books.update');
// Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('manage.books.destroy');

// # Book Trash
// Route::get('/books/trashed', [BooksController::class, 'trashed'])->name('books.trashed');
// Route::post('/books/trashed/{id}/restore', [BooksController::class, 'trashedRestore'])->name('books.trashed.restore');
// Route::post('/books/trashed/{id}/delete', [BooksController::class, 'trashedDestroy'])->name('books.trashed.destroy');


Route::get('/booksall', [BooksController::class, 'booksall']);


Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/account/verify/{token}', [UserController::class, 'verifyAccount'])->name('user.verify');

Route::middleware(['guest'])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    // ... this is POST method
    Route::post('/register', [UserController::class, 'validate_registration'])->name('register');
    Route::post('/login', [UserController::class, 'validate_login'])->name('login');
});

Route::middleware(['auth', 'is_verify_email'])->group(function () {

    Route::get('/home', [UserController::class, 'dashboard'])->name('home');

    Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');

    Route::get('cart', [BooksController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [BooksController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [BooksController::class, 'updateCart'])->name('update.cart');
    Route::delete('remove-from-cart', [BooksController::class, 'remove'])->name('remove.from.cart');
});

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
    //author search
    Route::get('/authors/search')->name('authors.search');

        // Book Rack
    ;
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

    # Books Panel Frontend (Rabbi)
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');

    # Books Panel (Rabbi)
    Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
    Route::get('/create', [BooksController::class, 'create'])->name('manage.books.create');
    Route::get('/manage/books', [BooksController::class, 'manage'])->name('manage.books.index');
    Route::get('/manage/books/{id}/edit', [BooksController::class, 'edit'])->name('manage.books.edit');
    Route::post('/books', [BooksController::class, 'store'])->name('manage.books.store');
    Route::put('/books/{id}', [BooksController::class, 'update'])->name('manage.books.update');
    Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('manage.books.destroy');

    # Book Trash
    Route::get('/books/trashed', [BooksController::class, 'trashed'])->name('books.trashed');
    Route::post('/books/trashed/{id}/restore', [BooksController::class, 'trashedRestore'])->name('books.trashed.restore');
    Route::post('/books/trashed/{id}/delete', [BooksController::class, 'trashedDestroy'])->name('books.trashed.destroy');

    # Vendors (Azhar)
    Route::get('vendors', [VendorsController::class, 'index'])->name('vendors.index');
    Route::get('vendors/create', [VendorsController::class, 'create'])->name('vendors.create');
    Route::post('/vendors', [VendorsController::class, 'store'])->name('vendors.store');
    Route::get('vendors/{id}/edit', [VendorsController::class, 'edit'])->name('vendors.edit');
    Route::put('/vendors/{id}', [VendorsController::class, 'update'])->name('vendors.update');
    Route::delete('/vendors/{id}', [VendorsController::class, 'destroy'])->name('vendors.destroy');

    # cart oparetion
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('store/add-to-cart', [CartController::class, 'addToCart']);
    // Route::get('cart', [CartController::class, 'index']);
    Route::get('/pay-with-paypal', [CartController::class, 'payWithPaypal'])->name('payWithPaypal');
});

// Route::get('dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);