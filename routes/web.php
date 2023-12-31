<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FoodController::class, 'listFood'])->name('food.listFood');

Route::resource('category', CategoryController::class)->middleware('auth');

Route::resource('food', FoodController::class)->middleware('auth');

Route::get('/foods/{id}', [FoodController::class, 'detailFood'])->name('food.detailFood');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
