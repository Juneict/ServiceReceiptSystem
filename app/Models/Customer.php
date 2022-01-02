<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    
    public function technicians(){
        return $this->belongsTo('App\Models\Technician','technician_id');
    }
    public function tasks(){
       
        return $this->hasMany('App\Models\Task');
    }

}
