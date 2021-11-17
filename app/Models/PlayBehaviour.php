<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayBehaviour extends Model
{
    use HasFactory;

    protected $fillable = [
        'nature', 'plays_with', 'plays_govern_rules', 'prefers_play', 'leisure_time_activities', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
