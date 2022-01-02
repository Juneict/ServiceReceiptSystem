<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    public function technicians(){
        return $this->belongsTo('App\Models\Technician','technician_id');
    }
    public function customers(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
}
