<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Customer;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw_status =config('srs.task_status');
        $status =array_flip($raw_status);
        $technicians = Technician::all();
        $tasks = Task::with('customers')->whereIn('status',[1,2,3,5,6])->get();
        
        return view('task',compact('technicians','tasks','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers =Customer::orderBy('id','desc')->get();
        $technicians = Technician::all();
        return view('task_create',compact('customers','technicians'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $customers =Customer::all();
        $technicians = Technician::all();
        $raw_status =config('srs.task_status');
        $status =array_flip($raw_status);
        return view('task_edit',compact('task','customers','technicians','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->customer_id =$request->customer_id;
        $task->technician_id =$request->technician_id;
        $task->status =$request->status;
        $task->estimated_amount =$request->estimated_amount;
        $task->total_amount =$request->total_amount;
        $task->save();
        return redirect('tasks')->with('message','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        return redirect('task_reports')->with('message','Task is Completed');
    }
    public function TunSend(Task $task){
        $task->status =config('srs.task_status.TunSend');
        $task->save();
        return redirect('tasks')->with('message','Task is sent to TUN Service');
    }
    public function TunArrived(Task $task){
        $task->status =config('srs.task_status.TunArrived');
        $task->save();
        return redirect('tasks')->with('message','Task is Arrived from TUN Service');
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

