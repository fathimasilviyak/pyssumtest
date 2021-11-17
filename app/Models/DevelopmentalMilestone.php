<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevelopmentalMilestone extends Model
{
    use HasFactory;

    protected $fillable = [
        'smiling', 'head_control', 'rolling_over', 'sitting', 'crawling', 'standing', 'bowel_bladder_control',
        'walking', 'teething', 'first_meaningful_word', 'small_phrases', 'fluent_speech', 'babbling', 'special_student_id'
    ];

    public function specialStudent(){

        return $this->belongsTo('App\Models\SpecialStudent');
    
    }

}
