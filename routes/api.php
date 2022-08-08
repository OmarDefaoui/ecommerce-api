<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GlobalCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/latest', [ProductController::class, 'latest']);
Route::get('/products/categories/{category}', [ProductController::class, 'category']);
Route::get('/products/global-categories/{globalCategory}', [ProductController::class, 'globalCategory']);
Route::get('/products/search/{title}', [ProductController::class, 'search']);

Route::get('/global-categories', [GlobalCategoryController::class, 'index']);
Route::get('/categories', [ProductCategoryController::class, 'index']);

Route::middleware('auth:api')->group(function () {
    Route::get('/home', [HomeController::class, 'home']);
    Route::resource('cart', CartController::class);
    Route::resource('favorite', FavoriteController::class);

    Route::post('/logout', [UserController::class, 'logout']);
});
