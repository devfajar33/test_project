<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransactionController;

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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/add/product', [ProductController::class, 'add'])->name('add.product');
    Route::get('/edit/product/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::get('/delete/product/{id}', [ProductController::class, 'delete'])->name('delete.product');
    Route::post('/input/product', [ProductController::class, 'store'])->name('input.product');
    Route::post('/update/product', [ProductController::class, 'update'])->name('update.product');

    // service
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/add/service', [ServiceController::class, 'add'])->name('add.service');
    Route::get('/edit/service/{id}', [ServiceController::class, 'edit'])->name('edit.service');
    Route::get('/delete/service/{id}', [ServiceController::class, 'delete'])->name('delete.service');
    Route::post('/input/service', [ServiceController::class, 'store'])->name('input.service');
    Route::post('/update/service', [ServiceController::class, 'update'])->name('update.service');

    // transaction
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
    Route::get('/add/transaction', [TransactionController::class, 'add'])->name('add.transaction');
    Route::post('/update/transaction', [TransactionController::class, 'update'])->name('update.transaction');

    // import data
    Route::post('/import', [DashboardController::class, 'import'])->name('import');
});

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!"; 
 });