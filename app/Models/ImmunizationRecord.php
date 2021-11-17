<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmunizationRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'primary_polio', 'primary_diptheria', 'primary_pertusis', 'primary_bcg', 'primary_measles', 'primary_typhoid', 'primary_cholera',
        'booster_polio', 'booster_diptheria', 'booster_pertusis', 'booster_bcg', 'booster_measles', 'booster_typhoid', 'booster_cholera',
        'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
