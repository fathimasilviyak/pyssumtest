<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialStudentActivityMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'group', 'activity_number', 'max_mark', 'name', 'student_class_id', 'class_section_id', 'branch_id'  
    ];


    
    public function studentClass(){
        return $this->belongsTo('App\Models\StudentClass');
    }
    
    public function classSection(){
        return $this->belongsTo('App\Models\ClassSection');
    }

}
