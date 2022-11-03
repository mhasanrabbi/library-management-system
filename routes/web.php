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
Route::post('store/add-to-cart', [StoreController::class, 'addToCart']);
Route::get('cart', [CartController::class, 'index']);