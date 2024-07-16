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

Route::get('/changepassword', function () {
    return view('pages.changePassword');
});

Route::middleware(['auth'])->group(function(){
    
    Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');
    Route::get('/explore/{id}', [ExploreController::class, 'show'])->name('explore.details');
    Route::post('/add-cart', [ExploreController::class, 'addCart'])->name('add.cart');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/cart/{id}', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/{id}/delete', [CartController::class, 'destroy'])->name('cart.delete');
    Route::patch('/cart/{id}/update', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

    Route::middleware('checkrole:administrator')->group(function(){
        Route::resource('destination', DestinationController::class);
        Route::resource('account', UserController::class);
        Route::resource('dashboard', DashboardController::class);
    });
    
});
