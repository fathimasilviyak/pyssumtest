<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrenatalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregnancy', 'abortion', 'father_age', 'mother_age', 'exposure', 'rh_incompatibility', 'maternal_illness', 'foetal_movement', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }


}
