<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InclusiveStudent extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'dob', 'gender', 'aadhar', 'father_name', 'father_profession', 'father_contact', 'father_income', 'mother_name', 'mother_profession', 'mother_contact', 'mother_income', 'student_class_id', 'class_section_id', 'address', 'date', 'photo', 'city', 'academic_session', 'branch_id', 'user_id'  
    ];



    public function user(){

        return $this->belongsTo('App\Models\User');
    
    }

    public function studentClass(){
        return $this->belongsTo('App\Models\StudentClass');
    }
    
    public function classSection(){
        return $this->belongsTo('App\Models\ClassSection');
    }
    public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }



}
