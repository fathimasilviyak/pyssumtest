<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'branch_id'
    ];

    
    public function classSections(){

        return $this->hasMany('App\Models\ClassSection');
    
    }

    public function branch(){

        return $this->belongsTo('App\Models\Branch');
    
    }

}
