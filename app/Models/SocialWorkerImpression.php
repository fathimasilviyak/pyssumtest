<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialWorkerImpression extends Model
{
    use HasFactory;

    protected $fillable = [
        'remarks', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
