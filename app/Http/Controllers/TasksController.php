<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Customer;
use App\Models\Technician;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
        
        $raw_status =config('srs.task_status');
        $status =array_flip($raw_status);
        $technicians = Technician::all();
        $tasks = Task::with('customers')->get();
        return view('task',compact('technicians','tasks','status'));
    }
    public function create(){
        $customers =Customer::orderBy('id','desc')->get();
        $technicians = Technician::all();
        return view('task_create',compact('customers','technicians'));
    }
    
    public function submit(Request $request){
        $data =array_filter($request->except('_token'));
       
        $task =new Task;
        $task->customer_id =$request->customer_id;
        $task->technician_id =$request->technician_id;
        $task->status =config('srs.task_status.new');
        $task->estimated_amount =$request->estimated_amount;
        $task->total_amount =$request->total_amount;
        $task->save();
        return redirect('tasks')->with('message','Task updated successfully');
    }
    public function edit(Task $task){
        $customers =Customer::all();
        $technicians = Technician::all();
        $raw_status =config('srs.task_status');
        $status =array_flip($raw_status);
        return view('task_edit',compact('task','customers','technicians','status'));
    }
    public function update(Request $request, Task $task){
       
        $task->customer_id =$request->customer_id;
        $task->technician_id =$request->technician_id;
        $task->status =$request->status;
        $task->estimated_amount =$request->estimated_amount;
        $task->total_amount =$request->total_amount;
        $task->save();
        return redirect('tasks')->with('message','Task updated successfully');
    }
   
    public function approve(Task $task){
        $task->status =config('srs.task_status.processing');
        $task->save();
        return redirect('tasks')->with('message','Task is processing');
    }
    public function complete(Task $task){
        $task->status =config('srs.task_status.complete');
        $task->save();
        return redirect('tasks')->with('message','Task is Completed');
    }
    public function completeNot(Task $task){
        $task->status =config('srs.task_status.complete(TakeBack)');
        $task->save();
        return redirect('tasks')->with('message','Task is Completed');
    }
    public function cancel(Task $task){
        
        $task->delete();
        return redirect('tasks')->with('danger','Task is Deleted');
    }
    public function invoice(Task $task){
        $date = Carbon::now()->format('Y-m-d');
        return view('task_invoice',compact('task','date'));
    }
}
