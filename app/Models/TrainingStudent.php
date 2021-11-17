<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingStudent extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'father_name', 'guardian', 'mother_name', 'dob', 'age', 'gender', 'marital_status', 'aadhar', 'nationality', 'domicile', 'category',
        'income', 'student_class_id', 'class_section_id', 'correspondance_address', 'permanent_address', 'state', 'pincode', 'contact_number', 'email', 'ssc_board', 'ssc_year_passing', 'ssc_total_marks',
        'ssc_marks_obtained', 'ssc_percentage_obtained', 'ssc_subject', 'hsc_board', 'hsc_year_passing', 'hsc_total_marks', 'hsc_marks_obtained',
        'hsc_percentage_obtained', 'hsc_subject', 'examination_board_university', 'examination_year_passing', 'examination_total_marks',
        'examination_marks_obtained', 'examination_percentage_obtained', 'examination_subject', 'date', 'extra_curricular_activities', 'course_reason',
        'photo', 'statement_marks', 'character_certificate', 'birth_certificate', 'experience_certificate', 'fee_document', 'city', 'academic_session', 'branch_id', 'user_id'
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
