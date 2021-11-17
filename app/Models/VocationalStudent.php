<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VocationalStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'dob', 'gender', 'father_name', 'mother_name','contact_number', 'address', 'marital_status','nationality', 'languages',
        'main_stream_school', 'special_school', 'vocational_training', 'any_other', 'organization', 'work_type', 'salary', 'epilepsy', 
        'physically_handicapped', 'visually_handicapped', 'psychological_problems', 'psychiatric_features', 'major_challenges', 'birth_certificate', 'cmo_certificate',
         'address_proof', 'date', 'photo', 'city', 'academic_session', 'branch_id', 'user_id'  
    ];



    public function user(){

        return $this->belongsTo('App\Models\User');
    
    }

    public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }


}
