<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\LocationController;
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

// Route::get('/', function () {
//     return 'Loading...';
// });


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'checkLogin']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index']);

Route::resource('employee', EmployeeController::class);
Route::get('invoice/print/{invoice}', [InvoiceController::class, 'print'])->name('invoice.print');
Route::get('invoice/approve/{invoice}', [InvoiceController::class, 'approve'])->name('invoice.approve');
Route::get('invoice/record-payment/{invoice}', [InvoiceController::class, 'record'])->name('invoice.record-payment');
Route::get('invoice/preview/{invoice}', [InvoiceController::class, 'preview'])->name('invoice.preview');
Route::resource('invoice', InvoiceController::class);
Route::resource('user', UserController::class);
Route::resource('bill', BillController::class);
Route::resource('customer', CustomerController::class);
Route::resource('product', ProductController::class);
Route::get('schedule/main', [ScheduleController::class, 'main'])->name('schedule.main');
Route::get('schedule/daily', [ScheduleController::class, 'daily'])->name('schedule.daily');
Route::get('schedule/{schedule}/manage', [ScheduleController::class, 'manage'])->name('schedule.manage');
Route::post('schedule/{schedule}/manage', [ScheduleController::class, 'manageU'])->name('schedule.manage.save');
Route::resource('schedule', ScheduleController::class);
Route::resource('package', PackageController::class);

Route::get('profile', [SettingController::class, 'profile'])->name('profile');
Route::post('profile', [SettingController::class, 'updateProfile'])->name('profile.update');

Route::resource('income', IncomeController::class);
Route::resource('expense', ExpenseController::class);
Route::resource('vendor', VendorController::class);
Route::resource('menu', MenuController::class);
Route::resource('location', LocationController::class);
Route::resource('hotel', HotelController::class);

Route::get('team/create/{team?}', [TeamController::class, 'create'])->name('team.create');
Route::resource('team', TeamController::class);
Route::prefix('report')->group(function(){
    Route::get('/', [ReportController::class, 'index']);    
    Route::get('/profit-loss', [ReportController::class, 'profitLoss'])->name('report.profit-loss'); 
    Route::get('/balance-sheet', [ReportController::class, 'balanceSheet'])->name('report.balance-sheet');   
});
Route::get('setting', [SettingController::class, 'index']);
Route::post('setting', [SettingController::class, 'save']);