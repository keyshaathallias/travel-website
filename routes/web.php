<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MakePaymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.register');

Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password-act', [LoginController::class, 'forgotPasswordAct'])->name('forgot.password.act');

Route::get('/validation-forgot-password/{token}', [LoginController::class, 'validationForgotPassword'])->name('validation.forgot.password');
Route::post('/validation-forgot-password-act', [LoginController::class, 'validationForgotPasswordAct'])->name('validation.forgot.password.act');

Route::middleware(['auth'])->group(function(){
    
    Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');
    Route::get('/explore/{id}', [ExploreController::class, 'show'])->name('explore.details');
    Route::post('/add-cart', [ExploreController::class, 'addCart'])->name('add.cart');

    Route::get('/cart/{id}', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart', [CartController::class, 'cartHistory'])->name('cart.history');
    Route::delete('/cart/{id}/delete', [CartController::class, 'destroy'])->name('cart.delete');
    Route::patch('/cart/{id}/increase', [CartController::class, 'increaseQuantity'])->name('cart.increase');
    Route::patch('/cart/{id}/decrease', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
    Route::put('/cart/{id}/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/cart/{id}/confirmation', [CartController::class, 'confirmation'])->name('cart.confirmation');

    Route::get('/e-voucher', [MakePaymentController::class, 'eVoucher'])->name('e.voucher');
    
    Route::get('/make-payment/{id}', [MakePaymentController::class, 'index'])->name('make.payment');
    Route::put('/submit-payment/{id}', [MakePaymentController::class, 'submitPayment'])->name('submit.payment');

    Route::delete('/delete-history/{id}', [MakePaymentController::class, 'destroyHistory'])->name('history.delete');
    
    Route::middleware('checkrole:administrator')->group(function(){
        Route::resource('destination', DestinationController::class);
        Route::resource('account', UserController::class);
        Route::resource('dashboard', DashboardController::class);
        Route::resource('payment', PaymentController::class);
    });
    
});
