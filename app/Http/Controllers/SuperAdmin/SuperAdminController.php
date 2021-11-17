<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



class SuperAdminController extends Controller
{
    public function index(){
       
        return view('super-admin.home');
    }

}
