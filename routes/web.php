<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorsController;

//user home for guest
Route::get('/', [GuestController::class, 'index'])->name('user.home');

#=========================================================================================
// show registration view
Route::get('/user/register', [AuthController::class, 'register'])->name('user.register')->middleware('guest');
//show login view
Route::get('/user/login', [AuthController::class, 'login'])->name('user.login')->middleware('guest');

// register a new user
Route::post('/user/create', [AuthController::class, 'store'])->name('user.create');
//login
Route::post('/user/dashboard', [AuthController::class, 'authLogin'])->name('user.dashboard');
//logout
Route::post('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

// password reset =========================================================================
//show forget pass form
Route::get('/forget/password', [AuthController::class, 'forget'])->name('user.forget.password');
// reset password
Route::post('/reset/password', [AuthController::class, 'reset'])->name('reset.password');


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    // # Books Panel Frontend (Rabbi)
    Route::get('/dashboard', [BooksController::class, 'index'])->name('dashboard');
    // Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');

    # Books Panel (Rabbi)
    Route::get('/manage/books', [BooksController::class, 'manage'])->name('manage.books.index');
    Route::get('/manage/books/create', [BooksController::class, 'create'])->name('manage.books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('manage.books.store');
    Route::get('/manage/books/{id}/edit', [BooksController::class, 'edit'])->name('manage.books.edit');
    Route::put('/books/{id}', [BooksController::class, 'update'])->name('manage.books.update');
    Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('manage.books.destroy');

    # Book Trash
    Route::get('/manage/books/trashed', [BooksController::class, 'trashed'])->name('books.trashed');
    Route::post('/manage/books/trashed/{id}/restore', [BooksController::class, 'trashedRestore'])->name('books.trashed.restore');
    Route::post('/books/trashed/{id}/delete', [BooksController::class, 'trashedDestroy'])->name('books.trashed.destroy');

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

    // Roles and Permissions
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permissions}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});


# Cart
Route::get('add/cart/{id}', [CartController::class, 'addCart'])->name('add.cart');
Route::get('show/carts', [CartController::class, 'showCart'])->name('show.carts');

Route::post('checkout/books', [CartController::class, 'checkoutBook'])->name('checkout.books');
Route::get('carts/item/{id}', [CartController::class, 'destroy'])->name('carts.destroy');
Route::get('show/my-books', [CartController::class, 'myBooks'])->name('my.books');

Route::get('/bookDetails/{id}', [BooksController::class, 'bookDetails'])->name('book.details');
