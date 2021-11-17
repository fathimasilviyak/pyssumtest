<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_attended', 'school_nature', 'school_address', 'date_joining', 'attendance', 'irregularity_reason', 'teacher_report', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
