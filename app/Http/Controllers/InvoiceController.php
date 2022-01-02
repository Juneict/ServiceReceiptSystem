<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\InvoiceController;

class InvoiceController extends Controller
{
    public function invoice($request){
    
        return view('generate_invoice',compact(''));
    }
}
