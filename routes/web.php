<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



// Route::get('/', function () {
//     return view('index');
// });



Route::get( '/', [AuthController::class, 'index'] )->name( 'login' );
Route::post( 'custom-login', [AuthController::class, 'customLogin'] )->name( 'login.custom' );

Route::middleware(['auth'])->group(function () {
    Route::get( 'dashboard', [AuthController::class, 'dashboard'] );
    Route::get( 'registration', [AuthController::class, 'registration'] )->name( 'register-user' );
    Route::post( 'custom-registration', [AuthController::class, 'customRegistration'] )->name( 'register.custom' );
    Route::get( 'signout', [AuthController::class, 'signOut'] )->name( 'signout' );

});
Route::middleware(['auth','isadmin'])->group(function () {
    Route::get( 'dashboard', [AuthController::class, 'dashboardadmin'] );
    Route::get( 'registration', [AuthController::class, 'registration'] )->name( 'register-user' );
    Route::post( 'custom-registration', [AuthController::class, 'customRegistration'] )->name( 'register.custom' );
    Route::get( 'signout', [AuthController::class, 'signOut'] )->name( 'signout' );

});

