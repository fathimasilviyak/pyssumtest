<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'mental_retardation', 'illness', 'epilepsy', 'any_other', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
