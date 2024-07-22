<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CurrencyRateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/report',[HomeController::class, 'reportIndex'])->name('report.index');
Route::post('/report',[HomeController::class, 'report'])->name('report');
Route::resource('currencies', CurrencyController::class);
Route::resource('currency_rates', CurrencyRateController::class);
Route::resource('products', ProductController::class);
Route::resource('product_prices', ProductPriceController::class);
Route::resource('purchases', PurchaseController::class);
// Route::post('purchase', [PurchaseController::class, 'store'])->name('purchase.store');
Route::get('thank-you', function() {
    return view('thank-you');
})->name('thank-you');