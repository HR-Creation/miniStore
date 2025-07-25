<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}/details', [HomeController::class, 'details'])->name('product-details');
Route::post('/product/order/now', [OrderController::class, 'create'])->name('order');

Route::get('/customer/singup', [CustomerController::class, 'customerSingUp'])->name('customer.singup');
Route::post('/customer/singup', [CustomerController::class, 'saveCustomer'])->name('customer.singup');
Route::get('/customer/login', [CustomerController::class, 'customerLogin'])->name('customer.login');
Route::get('/customer/{id}/update', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('/customer/{id}/orderlist', [OrderController::class, 'view'])->name('customer.orderlist');
Route::post('/customer/login', [CustomerController::class, 'customerLoginCheck'])->name('customer.login');
Route::get('/customer/logout', [CustomerController::class, 'logout'])->name('customer.logout');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard', [DashboarController::class, 'index'])->name('dashboard');

    Route::resources(['categories' => CategoryController::class]);
    Route::resources(['products' => BlogController::class]);
    Route::resources(['orders' => OrderController::class]);
    Route::resources(['customers' => CustomerController::class]);

});
