<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisController;
use App\Http\Controllers\User\EtalaseController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Admin\AdminFishController;
use App\Http\Controllers\Admin\AdminOrderController;

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
Route::controller(LoginRegisController::class)->group(function () {
    Route::get('login', 'loginView')->name('login');
    Route::post('login', 'loginProcess')->name('loginProcess');
    Route::get('logout', 'logout')->name('logout');
    Route::get('regis', 'regisView')->name('regis');
    Route::post('regis', 'regisProcess')->name('regisProcess');
});


Route::get('/', [EtalaseController::class, 'index'])->name('home');
Route::post('addCart', [EtalaseController::class, 'addCart'])->name('addCart');
Route::delete('destroyCart/{cart}', [EtalaseController::class, 'destroyCart'])->name('destroyCart');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('order', [CheckoutController::class, 'store'])->name('order');
Route::get('confirmPayment/{order}', [CheckoutController::class, 'confirmPayment'])->name('confirmPay');
Route::get('success', [CheckoutController::class, 'success'])->name('success');

Route::prefix('admin')->group(function (){
    Route::get('', fn()=>view('admin.index', ['title' => 'admin']))->name('admin.index');
    Route::resource('fish', AdminFishController::class)->names('admin.fish');
    Route::resource('order', AdminOrderController::class)->only(['index', 'show', 'destroy'])->names('admin.order');
});