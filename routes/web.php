<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TechniciansController;

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


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Auth::routes();
Route::resource('/tasks',App\Http\Controllers\TaskController::class);
Route::get('/tasks/{task}/approve', [App\Http\Controllers\TaskController::class, 'approve']);
Route::get('/tasks/{task}/cancel', [App\Http\Controllers\TaskController::class, 'cancel']);
Route::get('/tasks/{task}/complete', [App\Http\Controllers\TaskController::class, 'complete']);
Route::get('/tasks/{task}/completeNot', [App\Http\Controllers\TaskController::class, 'completeNot']);
Route::get('/tasks/{task}/TunSend', [App\Http\Controllers\TaskController::class, 'TunSend']);
Route::get('/tasks/{task}/TunArrived', [App\Http\Controllers\TaskController::class, 'TunArrived']);
Route::get('/tasks/{task}/task_invoice', [App\Http\Controllers\TaskController::class, 'invoice']);


Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Route::resource('customers',App\Http\Controllers\CustomersController::class);
Route::get('/customers/{customer}/customer_invoice', [App\Http\Controllers\CustomersController::class, 'invoice']);

Route::resource('technicians',App\Http\Controllers\TechniciansController::class);

Route::resource('orders',App\Http\Controllers\OrdersController::class);
Route::get('/orders/{order}/ordering', [App\Http\Controllers\OrdersController::class, 'ordering']);
Route::get('/orders/{order}/arrived', [App\Http\Controllers\OrdersController::class, 'arrived']);
Route::get('/orders/{order}/completed', [App\Http\Controllers\OrdersController::class, 'completed']);
Route::get('/orders/{order}/cancle', [App\Http\Controllers\OrdersController::class, 'cancle']);
Route::get('/orders/{order}/invoice', [App\Http\Controllers\OrdersController::class, 'invoice']);
Auth::routes(['register' => false]);

Route::get('/task_reports', [App\Http\Controllers\ReportsController::class, 'completed']);
Route::get('/task_service_reports', [App\Http\Controllers\ReportsController::class, 'index']);