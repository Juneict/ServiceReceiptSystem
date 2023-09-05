<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TechniciansController;

Route::middleware(['auth'])->group(function (){
    //Dashboard Route
    Route::get('/', [DashboardController::class, 'index']);

    //Task
    Route::prefix('tasks')->group(function (){
        Route::resource('', TaskController::class);
        Route::get('{task}/approve', [TaskController::class, 'approve']);
        Route::get('{task}/cancel', [TaskController::class, 'cancel']);
        Route::get('{task}/complete', [TaskController::class, 'complete']);
        Route::get('{task}/completeNot', [askController::class, 'completeNot']);
        Route::get('{task}/TunSend', [TaskController::class, 'TunSend']);
        Route::get('{task}/TunArrived', [askController::class, 'TunArrived']);
        Route::get('{task}/task_invoice', [TaskController::class, 'invoice']);
    });

    //Customers
    Route::prefix('customers')->group(function (){
        Route::resource('', CustomersController::class);
        Route::get('{customer}/customer_invoice', [CustomersController::class, 'invoice']);
    });

    //Technicians
    Route::resource('technicians', TechniciansController::class);

    //Orders
    Route::prefix('orders')->group(function (){
        Route::resource('', OrdersController::class);
        Route::get('{order}/ordering', [OrdersController::class, 'ordering']);
        Route::get('{order}/arrived', [OrdersController::class, 'arrived']);
        Route::get('{order}/completed', [OrdersController::class, 'completed']);
        Route::get('{order}/cancle', [OrdersController::class, 'cancle']);
        Route::get('{order}/invoice', [OrdersController::class, 'invoice']);
    });

    //Task Reports
    Route::get('/task_reports', [ReportsController::class, 'completed']);
    Route::get('/task_service_reports', [ReportsController::class, 'index']);
});

// Disable user registration
Auth::routes(['register' => false]);

