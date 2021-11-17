<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\SpecialStudent;

use App\Models\StudentClass;
use App\Models\ClassSection;

use App\Models\PrenatalRecord;
use App\Models\NatalRecord;
use App\Models\NeonatalRecord;
use App\Models\PostnatalRecord;
use App\Models\ImmunizationRecord;
use App\Models\DevelopmentalMilestone;
use App\Models\SchoolHistory;
use App\Models\PlayBehaviour;
use App\Models\FamilyInformation;
use App\Models\FamilyHistory;
use App\Models\SocialEnvironment;
use App\Models\HomeEnvironment;
use App\Models\SocialWorkerImpression;
use App\Models\MedicalExamination;
use App\Models\PsychologicalAssessment;
use App\Models\OccupationalAssessment;


use Carbon\carbon;

class SpecialStudentController extends Controller
{
    
    
    public function index(){
        
        $users = User::where('role', 'special_student')
                        ->where('branch_id', Auth::user()->branch->id)
                            ->orderByDesc('id')
                            ->get();

         return view('admin.student.special-student.index',compact('users'));
        

    } 



    public function show(SpecialStudent $specialStudent){

        return view('admin.student.special-student.show',compact('specialStudent'));

    }









    public function create(){
        return view('admin.student.special-student.create');
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
            return redirect()->route('admin.students.special-students.complete-create',$userId);        
            
            }
        else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
          
    }


    public function completeCreate($user_id){

        $studentClasses = StudentClass::where('type','special_student')
                                        ->where('branch_id', Auth::user()->branch->id)
                                        ->get();
        return view('admin.student.special-student.complete-create',compact('user_id','studentClasses'));
    }


    public function completeStore(Request $request){
    
      //Validate inputs
      $request->validate([
        'user_id' => ['required', 'unique:special_students'],
          ],['user_id.unique' => 'Already Registered Special Student!! Create another one']);
    
        

        $photo = $request->photo;
        if($photo){
            $photoName = time().'_'.$photo->getClientOriginalName();
            $destinationPath = public_path('/images/student/special-student');
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

//store special_student
        $specialStudent = new SpecialStudent();

        $specialStudent->register_number = $request->register_number;
        $specialStudent->bill_number = $request->bill_number;
        $specialStudent->date_register = $dateRegister;
        $specialStudent->name = $request->name;
        $specialStudent->reffered_by = $request->reffered_by;
        $specialStudent->gender = $request->gender;
        $specialStudent->dob = $dob;
        $specialStudent->age = $request->age;
        $specialStudent->language_spoken = $request->language_spoken;
        $specialStudent->father_name = $request->father_name;
        $specialStudent->address = $request->address;
        $specialStudent->occupation = $request->occupation;
        $specialStudent->family_status = $request->family_status;
        $specialStudent->living_area = $request->living_area;
        $specialStudent->religion = $request->religion;
        $specialStudent->caste = $request->caste;
        $specialStudent->informant_name = $request->informant_name;
        $specialStudent->informant_relationship = $request->informant_relationship;
        $specialStudent->contact_duration = $request->contact_duration;
        $specialStudent->present_complaint = $request->present_complaint;
        $specialStudent->student_class_id = $request->student_class_id;
        $specialStudent->class_section_id = $request->class_section_id;
        $specialStudent->contact_number = $request->contact_number;
        $specialStudent->tfeec = $request->tfeec;
        $specialStudent->tcno = $request->tcno;
        $specialStudent->pinv = $request->pinv;    
        $specialStudent->photo= $photoName;
        $specialStudent->city = $request->city;
        $specialStudent->academic_session = $request->academic_session;
        $specialStudent->user_id = $request->user_id;

        
        $save = $specialStudent->save();

        if( $save ){     
            
            $specialStudent->user()->update(['status' => 1]);
            
            PrenatalRecord::create([
                'special_student_id' => $specialStudent->id
            ]);
            NatalRecord::create([
                'special_student_id' => $specialStudent->id
            ]);
            NeonatalRecord::create([
                'special_student_id' => $specialStudent->id
            ]);
            PostnatalRecord::create([
                'special_student_id' => $specialStudent->id
            ]);
            ImmunizationRecord::create([
                'special_student_id' => $specialStudent->id
            ]);
            DevelopmentalMilestone::create([
                'special_student_id' => $specialStudent->id
            ]);
            SchoolHistory::create([
                'special_student_id' => $specialStudent->id
            ]);
            PlayBehaviour::create([
                'special_student_id' => $specialStudent->id
            ]);
            FamilyHistory::create([
                'special_student_id' => $specialStudent->id
            ]);
            SocialEnvironment::create([
                'special_student_id' => $specialStudent->id
            ]);
            HomeEnvironment::create([
                'special_student_id' => $specialStudent->id
            ]);
            SocialWorkerImpression::create([
                'special_student_id' => $specialStudent->id
            ]);
            MedicalExamination::create([
                'special_student_id' => $specialStudent->id
            ]);
            PsychologicalAssessment::create([
                'special_student_id' => $specialStudent->id
            ]);
            OccupationalAssessment::create([
                'special_student_id' => $specialStudent->id
            ]);

            return redirect()->route('admin.students.special-students.index')->with('success','Special Student Registered Successfully !');             
            }
        else{
            return redirect()->route('admin.students.special-students.index')->with('fail','Something went Wrong, failed to complete register');
        }
    
    
    }



    public function edit(SpecialStudent $specialStudent)
    {
        
        $studentClasses = StudentClass::where('type','special_student')
                                        ->where('branch_id', Auth::user()->branch->id)->get();
        $classSections = ClassSection::where('student_class_id', $specialStudent->student_class_id)->get();
        return view("admin.student.special-student.edit",compact('specialStudent','studentClasses', 'classSections'));
              
    }


    public function update(Request $request, SpecialStudent $specialStudent)
    {
        
        
        $photo = $request->photo;
        
                if($photo){
                    $photoName = time().'_'.$photo->getClientOriginalName();
                    $destinationPath = public_path('/images/student/special-student');
                    $photo->move($destinationPath, $photoName);
                }
                else
                {
                    $photoName = $specialStudent->photo;
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

                                     

                //update special student
                  $data = [
                    'register_number' => $request->register_number,
                    'bill_number' => $request->bill_number,
                    'date_register' => $dateRegister,
                    'name' => $request->name,
                    'reffered_by' => $request->reffered_by,
                    'gender' => $request->gender,
                    'dob' => $dob,
                    'age' => $request->age,
                    'language_spoken' => $request->language_spoken,
                    'father_name' => $request->father_name,
                    'address' => $request->address,
                    'occupation' => $request->occupation,
                    'family_status' => $request->family_status,
                    'living_area' => $request->living_area,
                    'religion' => $request->religion,
                    'caste' => $request->caste,
                    'informant_name' => $request->informant_name,
                    'informant_relationship' => $request->informant_relationship,
                    'contact_duration' => $request->contact_duration,
                    'present_complaint' => $request->present_complaint,
                    'student_class_id' => $request->student_class_id,
                    'class_section_id' => $request->class_section_id,
                    'contact_number' => $request->contact_number,
                    'tfeec' => $request->tfeec,
                    'tcno' => $request->tcno,
                    'pinv' => $request->pinv,    
                    'photo' => $photoName,
                    'city' => $request->city, 
                    'academic_session' => $request->academic_session, 
                   
                           
                ];
                $specialStudent->update($data);

                
                return redirect()->route('admin.students.special-students.index')->with('success','Special Student Updated Successfully !'); 
   
    }







    public function destroy(User $user)
    {
    
            $user->delete();
            return back()->with('success','Special_Student Deleted Successfully !');      
   
    }



}
