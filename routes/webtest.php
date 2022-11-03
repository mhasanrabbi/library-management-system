<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['guest'])->group(function () {

//     Route::get('/', [AuthController::class, 'index']);
//     Route::get('/login', [AuthController::class, 'index'])->name('login');
//     Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
//     Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
//     Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
// });

Route::get( 'signout', [AuthController::class, 'signOut'] )->name( 'signout' );

// Route::middleware( ['auth'] )->group( function () {
//     Route::get( '/home', [AuthController::class, 'home'] )->name( 'home' );
// } );
// Route::middleware( ['auth', 'isadmin'] )->group( function () {
//     Route::get( '/dashboard', [AuthController::class, 'dashboard'] );
//     //show all authors
//     Route::get( '/authors', [AuthorController::class, 'index'] )->name( 'authors.index' );
//     //show add author view
//     Route::get( '/authors/create', [AuthorController::class, 'create'] )->name( 'authors.create' );
//     //store new author
//     Route::post( '/authors', [AuthorController::class, 'store'] )->name( 'authors.store' );
// } );

Route::get( '/', function () {
    return view( 'welcome' );
} );

// Route::get( '/login', [UserController::class, 'index'] )->name( 'login' );

// Route::get( '/registration', [UserController::class, 'registration'] )->name( 'registration' );

Route::get( '/logout', [UserController::class, 'logout'] )->name( 'logout' );

Route::post( '/register', [UserController::class, 'validate_registration'] )->name( 'register' );

Route::post( '/login', [UserController::class, 'validate_login'] )->name( 'login' );

Route::get( '/dashboard', [UserController::class, 'dashboard'] )->name( 'dashboard' );

Route::get( '/home', [UserController::class, 'dashboard'] )->name( 'home' );
// Auth::routes();
// Auth::routes( ['verify' => true] );

// Route::middleware(['auth', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');





<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorsController;
use Illuminate\Support\Facades\Route;

Route::get( '/logout', [UserController::class, 'logout'] )->name( 'logout' );

Route::middleware( ['guest'] )->group( function () {
    Route::get( '/', [UserController::class, 'index'] );
    Route::post( '/register', [UserController::class, 'validate_registration'] )->name( 'register' );
    Route::post( '/login', [UserController::class, 'validate_login'] )->name( 'login' );
} );

Route::get( '/dashboard', [UserController::class, 'dashboard'] )->name( 'dashboard' );
Route::get( '/home', [UserController::class, 'dashboard'] )->name( 'home' );

Route::middleware( ['auth'] )->group( function () {
    Route::get( '/home', [UserController::class, 'dashboard'] )->name( 'home' );

} );

Route::middleware( ['auth', 'isadmin'] )->group( function () {
    Route::get( '/dashboard', [UserController::class, 'dashboard'] )->name( 'dashboard' );

    # Authors (Kamrul)
//show all authors
    Route::get( '/authors', [AuthorController::class, 'index'] )->name( 'authors.index' );
//store new author
    Route::post( '/authors', [AuthorController::class, 'store'] )->name( 'authors.store' );
//show all authors for manage
    Route::get( '/manage/authors', [AuthorController::class, 'manage'] )->name( 'manage.authors.index' );
//update author
    Route::put( '/manage/authors/{id}', [AuthorController::class, 'update'] )->name( 'manage.authors.update' );
//delete author
    Route::delete( '/manage/authors/{id}', [AuthorController::class, 'destroy'] )->name( 'manage.authors.destroy' );
//author search
    Route::get( '/authors/search' )->name( 'authors.search' );

//    //show all authors
//     Route::get( '/authors', [AuthorController::class, 'index'] )->name( 'authors.index' );
//     //show add author view
//     Route::get( '/authors/create', [AuthorController::class, 'create'] )->name( 'authors.create' );
//     //store new author
//     Route::post( '/authors', [AuthorController::class, 'store'] )->name( 'authors.store' );
} );

// Route::get( '/login', [UserController::class, 'index'] )->name( 'login' );

// Route::get( '/registration', [UserController::class, 'registration'] )->name( 'registration' );

// Route::get( '/logout', [UserController::class, 'logout'] )->name( 'logout' );

// Route::post( '/register', [UserController::class, 'validate_registration'] )->name( 'register' );

// Route::post( '/login', [UserController::class, 'validate_login'] )->name( 'login' );

// Route::get( '/dashboard', [UserController::class, 'dashboard'] )->name( 'dashboard' );

// Route::get( '/home', [UserController::class, 'dashboard'] )->name( 'home' );

// Auth::routes();
// Auth::routes( ['verify' => true] );

// Route::middleware(['auth', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Book Rack
Route::get( 'rack', [RackController::class, 'showRack'] );
Route::get( 'add/rack', [RackController::class, 'addRack'] )->name( 'add.rack' );
Route::get( 'save/rack', [RackController::class, 'saveRack'] )->name( 'save.rack' );
Route::get( 'edit/rack/{id}', [RackController::class, 'editRack'] )->name( 'edit.rack' );
Route::put( 'update/rack', [RackController::class, 'updateRack'] )->name( 'update.rack' );
Route::delete( 'delete/rack/{id}', [RackController::class, 'deleteRack'] )->name( 'delete.book.rack' );

# Vendors (Azhar)
Route::get( 'vendors', [VendorsController::class, 'index'] )->name( 'vendors.index' );
Route::get( 'vendors/create', [VendorsController::class, 'create'] )->name( 'vendors.create' );
Route::post( '/vendors', [VendorsController::class, 'store'] )->name( 'vendors.store' );
Route::get( 'vendors/{id}/edit', [VendorsController::class, 'edit'] )->name( 'vendors.edit' );
Route::put( '/vendors/{id}', [VendorsController::class, 'update'] )->name( 'vendors.update' );
Route::delete( '/vendors/{id}', [VendorsController::class, 'destroy'] )->name( 'vendors.destroy' );

# Books Panel (Rabbi)
Route::get( '/manage/books', [BooksController::class, 'manage'] )->name( 'manage.books.index' );
Route::get( '/books/create', [BooksController::class, 'create'] )->name( 'manage.books.create' );
Route::post( '/books', [BooksController::class, 'store'] )->name( 'manage.books.store' );
Route::get( '/manage/books/{id}/edit', [BooksController::class, 'edit'] )->name( 'manage.books.edit' );
Route::put( '/books/{id}', [BooksController::class, 'update'] )->name( 'manage.books.update' );
Route::delete( '/books/{id}', [BooksController::class, 'destroy'] )->name( 'manage.books.destroy' );

# Book Trash
Route::get( '/books/trashed', [BooksController::class, 'trashed'] )->name( 'books.trashed' );
Route::post( '/books/trashed/{id}/restore', [BooksController::class, 'trashedRestore'] )->name( 'books.trashed.restore' );
Route::post( '/books/trashed/{id}/delete', [BooksController::class, 'trashedDestroy'] )->name( 'books.trashed.destroy' );

# Books Panel Frontend (Rabbi)
Route::get( '/books', [BooksController::class, 'index'] )->name( 'books.index' );
Route::get( '/books/{id}', [BooksController::class, 'show'] )->name( 'books.show' );