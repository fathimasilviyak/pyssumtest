<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ClassSection;
use App\Models\User;

class ClassSectionController extends Controller
{
    
    public function index($studentClassId){
        
        $classSections = ClassSection::where('student_class_id', $studentClassId)->get();
        $users = User::where('role', 'teacher')->where('branch_id', session('branch'))->get();
        return view('super-admin.student-class.class-section.index',compact('classSections','users','studentClassId'));
        
    }
    
    public function store(Request $request){

        $classSection = new ClassSection();
        $classSection->name = $request->name;
        $classSection->description = $request->description;
        $classSection->faculty_id = $request->faculty_id;
        $classSection->student_class_id = $request->student_class_id;
        $save = $classSection->save();

        return back()->with('success','Section Added Successfully !');
          
    }
    
    public function update(Request $request, ClassSection $classSection)
    {

  
        $data = [
            'name' => $request->updt_name,
            'description' => $request->updt_description,
            'faculty_id' => $request->updt_faculty_id,
            'student_class_id' =>$request->updt_student_class_id
        ];
        $classSection->update($data);

        return back()->with('success','Section Updated Successfully !');
    
    
    
    }


    public function destroy(ClassSection $classSection)
    {
    
            $classSection->delete();
            return back()->with('success','Section Deleted Successfully !');      
   
    }

    public function getClassSections(Request $request){

        $classSections = [];

        if (! empty($request['student_class_id'])) {
            $classSections = ClassSection::where('student_class_id', $request['student_class_id'])->get();          
        } 

        return $classSections;
    }



}
