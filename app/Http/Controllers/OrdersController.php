<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw_status =config('srs.order_status');
        $status =array_flip($raw_status);
        $orders = Order::orderBy('id', 'DESC')->get();;
        return view('orders',compact('orders','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order = new Order();
        $order->name = $request->name;
        $order->ph = $request->ph;
        $order->brand = $request->brand;
        $order->part = $request->part;
        $order->prepaid = $request->prepaid;
        $order->price = $request->price;
        $order->status =config('srs.task_status.new');
        $order->save();
        return redirect('orders')->with('message','Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders_edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        
        $order->name = $request->name;
        $order->ph = $request->ph;
        $order->brand = $request->brand;
        $order->part = $request->part;
        $order->prepaid = $request->prepaid;
        $order->price = $request->price;
        $order->status =$request->status;
        $order->save();
        return redirect('orders')->with('message','Customer created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
    }
    public function ordering(Order $order){
       
        $order->status =config('srs.order_status.ordering');
        $order->save();
        return redirect('orders')->with('message','Order is processing');
    }
    public function arrived(Order $order){
       
        $order->status =config('srs.order_status.arrived');
        $order->save();
        return redirect('orders')->with('message','Order is arrived');
    }
    public function completed(Order $order){
       
        $order->status =config('srs.order_status.completed');
        $order->save();
        return redirect('orders')->with('message','Order is completed');
    }
    public function cancle(Order $order){
       
        
        $order->delete();
        return redirect('orders')->with('delete','Order is cancle');
    }
    public function invoice(Order $order){
        $date = Carbon::now()->format('Y-m-d');
        return view('order_invoice',compact('order','date'));
    }
}
