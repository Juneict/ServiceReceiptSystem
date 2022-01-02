<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Technician;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerCreateRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

    }
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'DESC')->get();
        
        return view('customer',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technicians = Technician::all();
        return view('customer_create',compact('technicians'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerCreateRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->ph   = $request->ph;
        $customer->brand = $request->brand;
        $customer->error =$request->error;
        $customer->adaptor = $request->adaptor;
        $customer->bag   = $request->bag;
        $customer->note = $request->note;
        $customer->technician_id =$request->technician_id;
        $customer->save();
        return redirect('customers')->with('message','Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        
        return view('customer_detail',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $technicians = Technician::all();
        return view('customer_edit',compact('customer','technicians'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->ph   = $request->ph;
        $customer->brand = $request->brand;
        $customer->error =$request->error;
        $customer->adaptor = $request->adaptor;
        $customer->bag   = $request->bag;
        $customer->note = $request->note;
        $customer->technician_id =$request->technician_id;
        $customer->save();
        return redirect('customers')->with('message','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers')->with('delete','Customer delete successfully');
    }
    public function invoice(Customer $customer)
    {
        
        return view('customer_invoice',compact('customer'));
    }
}
