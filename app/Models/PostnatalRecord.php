<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostnatalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'exanthemata', 'infection', 'injury', 'convulsions', 'jaundice', 'nutritional_disorders', 'any_other', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
