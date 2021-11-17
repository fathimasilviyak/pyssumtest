<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdminActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'caused_by','action','performed_on'
    ];


}
