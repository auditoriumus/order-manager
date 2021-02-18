<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Orders\OrderControler;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Tables\TableController;
use \App\Http\Controllers\Stock\StockControler;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/profile', function () {
    return view('dashboard');
})->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';

Route::resource('order', OrderControler::class);

Route::resource('menu', MenuController::class);

Route::resource('category', CategoryController::class);

Route::resource('table', TableController::class);

Route::resource('stock', StockControler::class);

Route::put('/order/{orderId}/pay-type/{typeId}', [OrderControler::class, 'payTypeEdit']);
Route::put('/order/{orderId}/payment-status/{status}', [OrderControler::class, 'changePaymentStatus']);

Route::get('/order/check-payment-status/{id}', [OrderControler::class, 'checkPaymentStatus']);

Route::put('/order/{orderId}/update-menu', [OrderControler::class, 'updateMenu']);

