<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'dob', 'gender', 'aadhar', 'guardian', 'qualification', 'date_appoinment', 'designation', 'nature_appoinment', 'specialized_in', 'pan', 'mobile', 'permenent_address', 'local_address', 'date_leaving', 'photo', 'user_id'
    ];

    public function user(){

        return $this->belongsTo('App\Models\User');
    
    }
  

}
