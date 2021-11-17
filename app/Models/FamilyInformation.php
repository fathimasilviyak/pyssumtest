<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'gender', 'education', 'health', 'relation', 'level_attachment', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
