<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'faculty_id', 'student_class_id'
    ];

    public function faculty(){

        return $this->belongsTo('App\Models\Faculty');
    
    }

    public function studentClass(){

        return $this->belongsTo('App\Models\StudentClass');
    
    }

    public function specialStudents(){
        return $this->hasMany('App\Models\SpecialStudent');
    }

    public function inclusiveStudents(){
        return $this->hasMany('App\Models\InclusiveStudent');
    }
    public function trainingStudents(){
        return $this->hasMany('App\Models\TrainingStudent');
    }


}
