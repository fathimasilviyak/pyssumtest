<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeEnvironment extends Model
{
    use HasFactory;

    protected $fillable = [
        'physical_space', 'accomodation_type', 'number_rooms', 'personal_needs', 'educational_needs', 'activity', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
