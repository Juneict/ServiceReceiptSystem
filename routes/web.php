<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomersController;
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

Route::get('/', function () {
    return view('customer');
});

Auth::routes();
Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index']);
Route::get('/tasks/create', [App\Http\Controllers\TasksController::class, 'create']);
Route::post('/tasks/submit', [App\Http\Controllers\TasksController::class, 'submit']);
Route::post('/tasks/update', [App\Http\Controllers\TasksController::class, 'update']);
Route::get('/tasks/{task}/edit', [App\Http\Controllers\TasksController::class, 'edit']);
Route::post('/tasks/update', [App\Http\Controllers\TasksController::class, 'update']);
Route::get('/tasks/{task}/approve', [App\Http\Controllers\TasksController::class, 'approve']);
Route::get('/tasks/{task}/cancel', [App\Http\Controllers\TasksController::class, 'cancel']);
Route::get('/tasks/{task}/complete', [App\Http\Controllers\TasksController::class, 'complete']);
Route::get('/tasks/{task}/completeNot', [App\Http\Controllers\TasksController::class, 'completeNot']);
Route::get('/tasks/{task}/task_invoice', [App\Http\Controllers\TasksController::class, 'invoice']);
Route::get('/home', [App\Http\Controllers\CustomersController::class, 'index'])->name('home');
Route::resource('customers',App\Http\Controllers\CustomersController::class);
Route::get('/customers/{customer}/customer_invoice', [App\Http\Controllers\CustomersController::class, 'invoice']);
Route::resource('technicians',App\Http\Controllers\TechniciansController::class);

Auth::routes(['register' => false]);