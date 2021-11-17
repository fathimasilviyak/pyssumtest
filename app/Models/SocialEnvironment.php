<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialEnvironment extends Model
{
    use HasFactory;

    protected $fillable = [
        'neighbourhood_interaction', 'family_support', 'outside_visits', 'socio_religious_acts', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
