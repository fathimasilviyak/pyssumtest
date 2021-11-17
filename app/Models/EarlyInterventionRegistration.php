<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarlyInterventionRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'dob', 'gender','aadhar', 'reffered_by', 'father_name', 'father_occupation',
        'father_contact', 'mother_name', 'mother_occupation', 'mother_contact', 'address',
        'present_complaints', 'head_control', 'sitting', 'standing', 'walking', 'first_meaningfull_word',
        'bowel_bladder_control','child_hear', 'child_talk', 'understand_child', 'like_other', 'family_history', 'child_vision', 'medical_problems', 'worries', 'motor_development','language_development', 'social_development',
        'cognitive_development', 'date', 'photo', 'city', 'academic_session', 'branch_id'
    ];

    public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }

}
