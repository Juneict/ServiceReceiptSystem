<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\TechnicianCreateRequest;

class TechniciansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $technicians = Technician::all();
         return view('technician',compact('technicians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technician_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnicianCreateRequest $request)
    {   
        $technician = new Technician();
        $technician->name =$request->name;
        $technician->save();
        return redirect('technicians')->with('message','Technician created successfully');
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
    public function edit(Technician $technician)
    {
        return view('technician_edit',compact('technician'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Technician $technician)
    {
        $technician->name =$request->name;
        $technician->save();
        return redirect('technicians')->with('message','Technician update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technician $technician)
    {
        $technician->delete();
        return redirect('technicians')->with('delete','Technician deleted successfully');
    }
}
