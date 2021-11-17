<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'password',
        'role',
        'status',
        'branch_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function branch(){
        return $this->belongsTo('App\Models\Branch');
    }

    public function faculty(){

        return $this->hasOne('App\Models\Faculty');
    
    }

    public function specialStudent(){

        return $this->hasOne('App\Models\SpecialStudent');
    
    }


    public function inclusiveStudent(){

        return $this->hasOne('App\Models\InclusiveStudent');
    
    }


    public function trainingStudent(){

        return $this->hasOne('App\Models\TrainingStudent');
    
    }

    public function vocationalStudent(){

        return $this->hasOne('App\Models\VocationalStudent');
    
    }


}
