<?php

namespace App\Http\Controllers\TrainingStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingStudentController extends Controller
{
    public function index(){
        return view('training-student.home');
    }
}
