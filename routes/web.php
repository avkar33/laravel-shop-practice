<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Person\PersonOrderController;
use App\Http\Controllers\ResetController;

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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,

]);


Route::get('/', [MainController::class, 'index'])->name('index');

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'person',
        'as' => 'person.',
    ], function () {
        Route::get('/orders', [PersonOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [PersonOrderController::class, 'show'])->name('orders.show');
        Route::get('/subscribes', [MainController::class, 'subscribes'])->name('subscribes');
    });
    Route::group(['middleware' => 'is_admin', 'prefix' => 'admin'], function () {
        Route::resource('orders', OrderController::class)->only('index', 'show');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::get('reset', [ResetController::class, 'reset'])->name('admin.reset');
    });

    Route::post('subscription/{productId}', [MainController::class, 'subscribe'])->name('subscription');
    Route::post('unsubscribe/{productId}', [MainController::class, 'unsubscribe'])->name('unsubscribe');
});


Route::group(
    ['prefix' => 'basket'],
    function () {
        Route::post('/add/{productId}', [BasketController::class, 'basketAdd'])->name('basket-add');
        Route::post('/remove/{productId}', [BasketController::class, 'basketRemove'])->name('basket-remove');
        Route::post('/order', [BasketController::class, 'basketConfirm'])->name('basket-confirm');
        Route::group(
            ['middleware' => 'is_empty_basket',],
            function () {
                Route::get('/', [BasketController::class, 'basket'])->name('basket');
                Route::get('/order', [BasketController::class, 'basketOrder'])->name('basket-order');
            }
        );
    }
);



Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');
