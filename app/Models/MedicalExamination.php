<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'observed_by', 'general_appearance', 'sensory_motor_disabilities', 'clinical_impressions', 'provisonal_diagnosis', 'recommendations', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
