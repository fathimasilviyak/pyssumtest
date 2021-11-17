<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentClass;

use Validator;

class StudentClassController extends Controller
{
    
    public function index(){
        
        $studentClasses = StudentClass::where('branch_id', session('branch'))->get();

        return view('super-admin.student-class.index',compact('studentClasses'));
        
    } 




    public function store(Request $request){

       
        //Validate inputs
        $validator = Validator::make($request->all(), [
            'name' =>  'required|string|max:255',
            // 'type' =>'required|string|max:255'
        ]);
       

        if ($validator->fails()){             
            return back()->withInput()->withErrors($validator, 'addClassErrors');
        }

        $studentClass = new StudentClass();
        $studentClass->name = $request->name;
        $studentClass->type = $request->type;
        $studentClass->branch_id = session('branch');
       
        $save = $studentClass->save();

        return back()->with('success','Class Added Successfully !');
          
    }



    public function update(Request $request, StudentClass $studentClass)
    {

      //Validate inputs
        $validator = Validator::make($request->all(), [
        'updt_name' =>  'required|string|max:255',
        // 'updt_type' =>'required|string|max:255'
    ]);
    if ($validator->fails()){  
        $urlValue = url()->current();           
        return back()->withInput()->withErrors($validator, 'updateClassErrors')->with('urlValue',$urlValue);
    }
    //update student class
        $data = [
            'name' => $request->updt_name,
            'type' => $request->updt_type
        ];
        $studentClass->update($data);

        return back()->with('success','Class Updated Successfully !');
    
    
    
    }




    public function destroy(StudentClass $studentClass)
    {
    
            $studentClass->delete();
            return back()->with('success','Class Deleted Successfully !');      
   
    }



}
