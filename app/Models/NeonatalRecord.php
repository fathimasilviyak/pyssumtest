<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeonatalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'baby_color', 'respiratory_distress', 'baby_activity', 'disease', 'feeding_by', 'feeding_on', 'any_other', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
