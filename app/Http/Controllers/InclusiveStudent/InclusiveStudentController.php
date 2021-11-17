<?php

namespace App\Http\Controllers\InclusiveStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InclusiveStudentController extends Controller
{
    public function index(){
        return view('inclusive-student.home');
    }
}
