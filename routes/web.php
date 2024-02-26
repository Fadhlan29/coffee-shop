<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [SessionController::class, 'logout']);
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('account', AccountController::class);
});

Route::get('/home', function () {
    return redirect('/dashboard');
});
