<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsychologicalAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tests_administered', 'general_test_behaviour', 'test_findings', 'recommendations', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
