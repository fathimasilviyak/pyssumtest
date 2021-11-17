<?php

namespace App\Http\Controllers\SpecialStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecialStudentController extends Controller
{
    public function index(){
        return view('special-student.home');
    }


}
