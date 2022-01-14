<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $raw_status =config('srs.order_status');
        $status =array_flip($raw_status);
        $orders = Order::where('status',1)->get();
        $latestorders = Order::where('status',1)->take(2)->get();
        $orderNumber =count($orders);

        $customers = Customer::all();
        $customerNumber = count($customers);
        $recentCustomers = Customer::orderBy('created_at','desc')->take(3)->get();

        $tasks = Task::where('status',1)->get();
        $taskNumber =count($tasks);

        $Completedtasks = Task::where('status',4)->get();
        $completedNumber = count($Completedtasks);
        $recentTasks = Task::where('status',1)->take(3)->get();
        return view('dashboard',compact('orderNumber','customerNumber','taskNumber','completedNumber','orders','status','customers','recentCustomers','latestorders','recentTasks'));
    }
}
