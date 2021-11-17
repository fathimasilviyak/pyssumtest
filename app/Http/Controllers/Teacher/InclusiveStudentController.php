<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\InclusiveStudent;

use App\Models\StudentClass;
use App\Models\ClassSection;


use Carbon\carbon;

class InclusiveStudentController extends Controller
{
    
    public function index(){
        
        $users = User::where('role', 'inclusive_student')
                            ->where('branch_id', Auth::user()->branch->id)
                            ->orderByDesc('id')
                            ->get();

         return view('teacher.student.inclusive-student.index',compact('users'));
        

    } 




    
    public function show(InclusiveStudent $inclusiveStudent){

        return view('teacher.student.inclusive-student.show',compact('inclusiveStudent'));

    }




    public function create(){
        return view('teacher.student.inclusive-student.create');
    }

    public function store(Request $request){

       
        //Validate inputs
        $request->validate([

            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'cpassword' => ['required', 'string', 'min:8', 'same:password'],
            'role' => ['required', 'string'],
                      ]);

        $user = new User();
        $user->user_name = $request->user_name;
        $user->password = \Hash::make($request->password);
        $user->role = $request->role;
        $user->branch_id = Auth::user()->branch->id;
       
        $save = $user->save();

        if( $save ){

                        
            $userId = $user->id;  
            return redirect()->route('teacher.students.inclusive-students.complete-create',$userId);        
            
            }
        else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
          
    }



    public function completeCreate($user_id){
       
        $studentClasses = StudentClass::where('type','inclusive_student')
                                        ->where('branch_id', Auth::user()->branch->id)->get();
        return view('teacher.student.inclusive-student.complete-create',compact('user_id','studentClasses'));
    }


    public function completeStore(Request $request){
    
    
      //Validate inputs
      $request->validate([
        'user_id' => ['required', 'unique:inclusive_students'],
          ],['user_id.unique' => 'Already Registered Inclusive Student!! Create another one']);
    
        

        $photo = $request->photo;
        if($photo){
            $photoName = time().'_'.$photo->getClientOriginalName();
            $destinationPath = public_path('/images/student/inclusive-student');
            $photo->move($destinationPath, $photoName);
        }
        else
        {
            $photoName = "default.jpg";
        }
        
        $dob = $request->dob;
        if($dob){
            $dobConverted = Carbon::createFromFormat('d/m/Y', $dob);
            $dob = $dobConverted->toDateString(); 
        }

        $dateRegister = $request->date_register;
        if($dateRegister){
            $dateRegisterConverted = Carbon::createFromFormat('d/m/Y', $dateRegister);
            $dateRegister = $dateRegisterConverted->toDateString(); 
        }

//store inclusive_student
        $inclusiveStudent = new InclusiveStudent();

        $inclusiveStudent->name = $request->name;
        $inclusiveStudent->dob =  $dob;
        $inclusiveStudent->gender = $request->gender;
        $inclusiveStudent->aadhar = $request->aadhar;
        $inclusiveStudent->father_name = $request->father_name;
        $inclusiveStudent->father_profession = $request->father_profession;
        $inclusiveStudent->father_contact = $request->father_contact;
        $inclusiveStudent->father_income = $request->father_income;
        $inclusiveStudent->mother_name = $request->mother_name;
        $inclusiveStudent->mother_profession = $request->mother_profession;
        $inclusiveStudent->mother_contact = $request->mother_contact;
        $inclusiveStudent->mother_income = $request->mother_income;
        $inclusiveStudent->student_class_id = $request->student_class_id;
        $inclusiveStudent->class_section_id = $request->class_section_id;
        $inclusiveStudent->address = $request->address;
        $inclusiveStudent->date = $dateRegister;
        $inclusiveStudent->photo = $photoName;
        $inclusiveStudent->city = $request->city;  
        $inclusiveStudent->academic_session = $request->academic_session; 
        $inclusiveStudent->user_id = $request->user_id;
             
  
        $save = $inclusiveStudent->save();

        if( $save ){     
            
            $inclusiveStudent->user()->update(['status' => 1]);

            return redirect()->route('teacher.students.inclusive-students.index')->with('success','Inclusive Student Registered Successfully !');             
            }
        else{
            return redirect()->route('teacher.students.inclusive-students.index')->with('fail','Something went Wrong, failed to complete register');
        }
    
    
    }



    public function edit(InclusiveStudent $inclusiveStudent)
    {
    
        $studentClasses = StudentClass::where('type','inclusive_student') ->where('branch_id', Auth::user()->branch->id)->get();
        $classSections = ClassSection::where('student_class_id', $inclusiveStudent->student_class_id)->get();   
        return view("teacher.student.inclusive-student.edit",compact('inclusiveStudent','studentClasses', 'classSections'));
              
    }

    public function update(Request $request, InclusiveStudent $inclusiveStudent)
    {
        
    
        
        $photo = $request->photo;
        
                if($photo){
                    $photoName = time().'_'.$photo->getClientOriginalName();
                    $destinationPath = public_path('/images/student/inclusive-student');
                    $photo->move($destinationPath, $photoName);
                }
                else
                {
                    $photoName = $inclusiveStudent->photo;
                }
                
                $dob = $request->dob;
                if($dob){
                    $dobConverted = Carbon::createFromFormat('d/m/Y', $dob);
                    $dob = $dobConverted->toDateString(); 
                }

                $dateRegister = $request->date_register;
                if($dateRegister){
                    $dateRegisterConverted = Carbon::createFromFormat('d/m/Y', $dateRegister);
                    $dateRegister = $dateRegisterConverted->toDateString(); 
                }

                                     

                //update inclusive student
                  $data = [
                    'name' => $request->name,
                    'dob' => $dob,
                    'gender' => $request->gender,
                    'aadhar' => $request->aadhar,
                    'father_name' => $request->father_name,
                    'father_profession' => $request->father_profession,
                    'father_contact' => $request->father_contact,
                    'father_income' => $request->father_income,
                    'mother_name' => $request->mother_name,
                    'mother_profession' => $request->mother_profession,
                    'mother_contact' => $request->mother_contact,
                    'mother_income' => $request->mother_income,
                    'student_class_id' => $request->student_class_id,
                    'class_section_id' => $request->class_section_id,
                    'address' => $request->address,
                    'date' => $dateRegister, 
                    'photo' => $photoName,
                    'city' => $request->city, 
                    'academic_session' => $request->academic_session 
                   
                           
                ];
                $inclusiveStudent->update($data);

                
                return redirect()->route('teacher.students.inclusive-students.index')->with('success','Inclusive Student Updated Successfully !'); 
   
    }
    



    public function destroy(User $user)
    {
    
            $user->delete();
            return back()->with('success','Inclusive Student Deleted Successfully !');      
   
    }


}
