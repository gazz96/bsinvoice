<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'checkLogin']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index']);

Route::resource('employee', EmployeeController::class);
Route::resource('invoice', InvoiceController::class);
Route::resource('bill', InvoiceController::class);
Route::resource('customer', CustomerController::class);
Route::resource('product', ProductController::class);

Route::resource('income', IncomeController::class);
Route::resource('expense', ExpenseController::class);
Route::resource('vendor', VendorController::class);
Route::resource('menu', MenuController::class);