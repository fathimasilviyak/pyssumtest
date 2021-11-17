<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\StudentClass;

use Validator;

class StudentClassController extends Controller
{

    public function index(){
        
        $studentClasses = StudentClass::where('branch_id', Auth::user()->branch->id)->get();

        return view('admin.student-class.index',compact('studentClasses'));
        

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
        $studentClass->branch_id = Auth::user()->branch->id;
       
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
