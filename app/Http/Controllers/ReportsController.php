<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
        $raw_status =config('srs.task_status');
        $status =array_flip($raw_status);
       
        $tasks = Task::whereIn('status',[5,6])->get();
        $task_num = count($tasks);
        
        return view('task_service_reports',compact('tasks','status','task_num'));
    }
    public function completed(){
        $raw_status =config('srs.task_status');
        $status =array_flip($raw_status);
       
        $completeds = Task::where('status',4)->get();
        
        
        return view('task_reports',compact('completeds','status',));
    }
}
