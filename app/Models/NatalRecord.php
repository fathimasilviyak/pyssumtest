<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'labour', 'abnormal', 'delivery_term', 'delivery_place', 'delivery_type', 'maternal', 'birth_cry', 'birth_weight', 'disease', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }


}
