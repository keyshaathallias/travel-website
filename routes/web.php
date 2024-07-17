<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\LoginController;
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

// Route::get('/changepassword', function () {
//     return view('pages.changePassword');
// });

Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password-act', [LoginController::class, 'forgotPasswordAct'])->name('forgot.password.act');

Route::get('/validation-forgot-password/{token}', [LoginController::class, 'validationForgotPassword'])->name('validation.forgot.password');
Route::post('/validation-forgot-password-act', [LoginController::class, 'validationForgotPasswordAct'])->name('validation.forgot.password.act');

Route::middleware(['auth'])->group(function(){
    
    Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');
    Route::get('/explore/{id}', [ExploreController::class, 'show'])->name('explore.details');
    Route::post('/add-cart', [ExploreController::class, 'addCart'])->name('add.cart');

    Route::get('/cart/{id}', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/{id}/delete', [CartController::class, 'destroy'])->name('cart.delete');
    Route::patch('/cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
    Route::patch('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');

    Route::middleware('checkrole:administrator')->group(function(){
        Route::resource('destination', DestinationController::class);
        Route::resource('account', UserController::class);
        Route::resource('dashboard', DashboardController::class);
    });
    
});
