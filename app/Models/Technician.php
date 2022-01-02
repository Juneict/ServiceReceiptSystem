<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;
    public function customers(){
       
        return $this->hasmany('App\Models\Customer');
    }
    public function tasks(){
       
        return $this->hasMany('App\Models\Task');
    }
}
