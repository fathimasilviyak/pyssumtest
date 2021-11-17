<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'address'
    ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }


    public function inclusiveStudents(){
        return $this->hasMany('App\Models\InclusiveStudent');
    }
    public function trainingStudents(){
        return $this->hasMany('App\Models\TrainingStudent');
    }
    public function vocationalStudents(){
        return $this->hasMany('App\Models\VocationalStudent');
    }
    public function eIRegistrations(){
        return $this->hasMany('App\Models\EarlyInterventionRegistration');
    }
    public function studentClasses(){
        return $this->hasMany('App\Models\StudentClass');
    }
}
