<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ClassSection;

class ClassSectionController extends Controller
{
    
    public function getClassSections(Request $request){

        $classSections = [];

        if (! empty($request['student_class_id'])) {
            $classSections = ClassSection::where('student_class_id', $request['student_class_id'])->get();          
        } 

        return $classSections;
    }

}
