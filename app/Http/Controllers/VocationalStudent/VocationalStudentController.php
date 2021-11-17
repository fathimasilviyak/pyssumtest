<?php

namespace App\Http\Controllers\VocationalStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VocationalStudentController extends Controller
{
    public function index(){
        return view('vocational-student.home');
    }
}
