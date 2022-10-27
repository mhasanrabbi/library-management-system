<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
});



// Route::middleware(['guest'])->group(function () {

//     Route::get('/', [AuthController::class, 'index']);
//     Route::get('/login', [AuthController::class, 'index'])->name('login');
//     Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
//     Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
//     Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
// });


Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [AuthController::class, 'home'])->name('home');
});
Route::middleware(['auth', 'isadmin'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);


    //show all authors
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    //show add author view
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    //store new author
    Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');