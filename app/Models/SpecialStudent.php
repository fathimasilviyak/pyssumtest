<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_register', 'register_number', 'bill_number', 'reffered_by', 'name', 'gender', 'dob', 'age', 'language_spoken', 'father_name', 'address', 'occupation', 'family_status', 'living_area', 'religion', 'caste', 'informant_name', 'informant_relationship', 'contact_duration', 'present_complaint', 'student_class_id', 'class_section_id', 'contact_number', 'tfeec', 'tcno', 'pinv', 'photo', 'city', 'academic_session', 'user_id'
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

    public function prenatalRecord(){
        return $this->hasOne('App\Models\PrenatalRecord');
    }

    public function natalRecord(){
        return $this->hasOne('App\Models\NatalRecord');
    }
    public function neonatalRecord(){
        return $this->hasOne('App\Models\NeonatalRecord');
    }
    public function postnatalRecord(){
        return $this->hasOne('App\Models\PostnatalRecord');
    }
    public function immunizationRecord(){
        return $this->hasOne('App\Models\ImmunizationRecord');
    }
    public function developmentalMilestone(){
        return $this->hasOne('App\Models\DevelopmentalMilestone');
    }
    public function schoolHistory(){
        return $this->hasOne('App\Models\SchoolHistory');
    }
    public function playBehaviour(){
        return $this->hasOne('App\Models\PlayBehaviour');
    }
    public function familyInformations(){
        return $this->hasMany('App\Models\FamilyInformation');
    }
    public function familyHistory(){
        return $this->hasOne('App\Models\FamilyHistory');
    }
    public function socialEnvironment(){
        return $this->hasOne('App\Models\SocialEnvironment');
    }
    public function homeEnvironment(){
        return $this->hasOne('App\Models\HomeEnvironment');
    }
    public function socialWorkerImpression(){
        return $this->hasOne('App\Models\SocialWorkerImpression');
    }
    public function medicalExamination(){
        return $this->hasOne('App\Models\MedicalExamination');
    }
    public function psychologicalAssessment(){
        return $this->hasOne('App\Models\PsychologicalAssessment');
    }
    public function occupationalAssessment(){
        return $this->hasOne('App\Models\OccupationalAssessment');
    }
   





}
