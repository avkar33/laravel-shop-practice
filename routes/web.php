<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/basket', [BasketController::class, 'basket'])->name('basket');

Route::get('/basket/order', [BasketController::class, 'basketOrder'])->name('basket-order');
Route::post('/basket/order', [BasketController::class, 'basketConfirm'])->name('basket-confirm');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/{category}', [MainController::class, 'category'])->name('category');

Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');

Route::post('/basket/add/{productId}', [BasketController::class, 'baskerdAdd'])->name('basked-add');

Route::post('/basket/remove/{productId}', [BasketController::class, 'baskedRemove'])->name('basked-remove');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
