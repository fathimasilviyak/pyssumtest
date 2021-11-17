<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\TrainingStudent;

use App\Models\StudentClass;
use App\Models\ClassSection;

use Carbon\carbon;

class TrainingStudentController extends Controller
{
    
    public function index(){
        
        $users = User::where('role', 'training_student')
                            ->where('branch_id', Auth::user()->branch->id)
                            ->orderByDesc('id')
                            ->get();

       
         return view('teacher.student.training-student.index',compact('users'));
        
    } 



    public function show(TrainingStudent $trainingStudent){

        return view('teacher.student.training-student.show',compact('trainingStudent'));

    }






    public function create(){
        return view('teacher.student.training-student.create');
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
            return redirect()->route('teacher.students.training-students.complete-create',$userId);        
            
            }
        else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
          
    }


    public function completeCreate($user_id){
       
        $studentClasses = StudentClass::where('type','training_student')->where('branch_id', Auth::user()->branch->id)->get();
        return view('teacher.student.training-student.complete-create',compact('user_id','studentClasses'));
    }


    public function completeStore(Request $request){
    
    
        //Validate inputs
        $request->validate([
          'user_id' => ['required', 'unique:training_students'],
            ],['user_id.unique' => 'Already Registered Training Student!! Create another one']);
      
          
  
          $photo = $request->photo;
          if($photo){
              $photoName = time().'_'.$photo->getClientOriginalName();
              $destinationPath = public_path('/images/student/training-student');
              $photo->move($destinationPath, $photoName);
          }
          else
          {
              $photoName = "default.jpg";
          }

          $userId = $request->user_id;
          $trainingStudentUser = User::find($userId);
          $savedFolder = $trainingStudentUser->user_name;

          $statement_marks = $request->statement_marks;
          if($statement_marks){
              $statementMarksName = time().'_statement_marks_'.$statement_marks->getClientOriginalName();
              $destinationPath = public_path('/documents/student/training-student/'.$savedFolder);
              $statement_marks->move($destinationPath, $statementMarksName);
          }
          else
          {
            $statementMarksName = $request->statement_marks;
          }

          $character_certificate = $request->character_certificate;
          if($character_certificate){
              $characterCertificateName = time().'_character_certificate_'.$character_certificate->getClientOriginalName();
              $destinationPath = public_path('/documents/student/training-student/'.$savedFolder);
              $character_certificate->move($destinationPath, $characterCertificateName);
          }
          else
          {
            $characterCertificateName =$request->character_certificate;
          }

          $birth_certificate = $request->birth_certificate;
          if($birth_certificate){
              $birthCertificateName = time().'_birth_certificate_'.$birth_certificate->getClientOriginalName();
              $destinationPath = public_path('/documents/student/training-student/'.$savedFolder);
              $birth_certificate->move($destinationPath, $birthCertificateName);
          }
          else
          {
            $birthCertificateName = $request->birth_certificate;
          }

          $experience_certificate = $request->experience_certificate;
          if($experience_certificate){
              $experienceCertificateName = time().'_experience_certificate_'.$experience_certificate->getClientOriginalName();
              $destinationPath = public_path('/documents/student/training-student/'.$savedFolder);
              $experience_certificate->move($destinationPath, $experienceCertificateName);
          }
          else
          {
            $experienceCertificateName = $request->experience_certificate;
          }

          $fee_document = $request->fee_document;
          if($fee_document){
              $feeDocumentName = time().'_fee_document_'.$fee_document->getClientOriginalName();
              $destinationPath = public_path('/documents/student/training-student/'.$savedFolder);
              $fee_document->move($destinationPath, $feeDocumentName);
          }
          else
          {
            $feeDocumentName = $request->fee_document;
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
  
  //store training_student
          $trainingStudent = new TrainingStudent();
  
          $trainingStudent->name = $request->name;
          $trainingStudent->father_name = $request->father_name;
          $trainingStudent->guardian = $request->guardian;
          $trainingStudent->mother_name = $request->mother_name;
          $trainingStudent->dob =  $dob;
          $trainingStudent->age = $request->age;
          $trainingStudent->gender = $request->gender;
          $trainingStudent->marital_status = $request->marital_status;
          $trainingStudent->aadhar = $request->aadhar;
          $trainingStudent->nationality = $request->nationality;
          $trainingStudent->domicile = $request->domicile;
          $trainingStudent->category = $request->category;
          $trainingStudent->income = $request->income;
          $trainingStudent->student_class_id = $request->student_class_id;
          $trainingStudent->class_section_id = $request->class_section_id;
          $trainingStudent->correspondance_address = $request->correspondance_address;
          $trainingStudent->permanent_address = $request->permanent_address;
          $trainingStudent->state = $request->state;
          $trainingStudent->pincode = $request->pincode;
          $trainingStudent->contact_number = $request->contact_number;
          $trainingStudent->email = $request->email;
          $trainingStudent->ssc_board = $request->ssc_board;
          $trainingStudent->ssc_year_passing = $request->ssc_year_passing;
          $trainingStudent->ssc_total_marks = $request->ssc_total_marks;
          $trainingStudent->ssc_marks_obtained = $request->ssc_marks_obtained;
          $trainingStudent->ssc_percentage_obtained = $request->ssc_percentage_obtained;
          $trainingStudent->ssc_subject = $request->ssc_subject;
          $trainingStudent->hsc_board = $request->hsc_board;
          $trainingStudent->hsc_year_passing = $request->hsc_year_passing;
          $trainingStudent->hsc_total_marks = $request->hsc_total_marks;
          $trainingStudent->hsc_marks_obtained = $request->hsc_marks_obtained;
          $trainingStudent->hsc_percentage_obtained = $request->hsc_percentage_obtained;
          $trainingStudent->hsc_subject = $request->hsc_subject;
          $trainingStudent->examination_board_university = $request->examination_board_university;
          $trainingStudent->examination_year_passing = $request->examination_year_passing;
          $trainingStudent->examination_total_marks = $request->examination_total_marks;
          $trainingStudent->examination_marks_obtained = $request->examination_marks_obtained;
          $trainingStudent->examination_percentage_obtained = $request->examination_percentage_obtained;
          $trainingStudent->examination_subject = $request->examination_subject;
          $trainingStudent->date = $dateRegister;
          $trainingStudent->extra_curricular_activities = $request->extra_curricular_activities;
          $trainingStudent->course_reason = $request->course_reason;
          $trainingStudent->photo = $photoName;
          $trainingStudent->statement_marks = $statementMarksName;
          $trainingStudent->character_certificate = $characterCertificateName;
          $trainingStudent->birth_certificate = $birthCertificateName;
          $trainingStudent->experience_certificate = $experienceCertificateName;
          $trainingStudent->fee_document = $feeDocumentName; 
          $trainingStudent->city = $request->city;
          $trainingStudent->academic_session = $request->academic_session;          
          $trainingStudent->user_id = $request->user_id;
               
    
          $save = $trainingStudent->save();
  
          if( $save ){     
              
              $trainingStudent->user()->update(['status' => 1]);
  
              return redirect()->route('teacher.students.training-students.index')->with('success','Training Student Registered Successfully !');             
              }
          else{
              return redirect()->route('teacher.students.training-students.index')->with('fail','Something went Wrong, failed to complete register');
          }
      
      
    }
  




    
    public function edit(TrainingStudent $trainingStudent)
    {
    
        $studentClasses = StudentClass::where('type','training_student')->where('branch_id', Auth::user()->branch->id)->get();
        $classSections = ClassSection::where('student_class_id', $trainingStudent->student_class_id)->get();
        return view("teacher.student.training-student.edit",compact('trainingStudent','studentClasses', 'classSections'));
              
    }

    public function update(Request $request, TrainingStudent $trainingStudent)
    {
        

        
        $photo = $request->photo;
        
                if($photo){
                    $photoName = time().'_'.$photo->getClientOriginalName();
                    $destinationPath = public_path('/images/student/training-student');
                    $photo->move($destinationPath, $photoName);
                }
                else
                {
                    $photoName = $trainingStudent->photo;
                }

      
                $statement_marks = $request->statement_marks;
                if($statement_marks){
                    $statementMarksName = time().'_statement_marks_'.$statement_marks->getClientOriginalName();
                    $destinationPath = public_path('/documents/student/training-student/'.$trainingStudent->user->user_name);
                    $statement_marks->move($destinationPath, $statementMarksName);
                }
                else
                {
                  $statementMarksName = $trainingStudent->statement_marks;
                }
      
                $character_certificate = $request->character_certificate;
                if($character_certificate){
                    $characterCertificateName = time().'_character_certificate_'.$character_certificate->getClientOriginalName();
                    $destinationPath = public_path('/documents/student/training-student/'.$trainingStudent->user->user_name);
                    $character_certificate->move($destinationPath, $characterCertificateName);
                }
                else
                {
                  $characterCertificateName =$trainingStudent->character_certificate;
                }
      
                $birth_certificate = $request->birth_certificate;
                if($birth_certificate){
                    $birthCertificateName = time().'_birth_certificate_'.$birth_certificate->getClientOriginalName();
                    $destinationPath = public_path('/documents/student/training-student/'.$trainingStudent->user->user_name);
                    $birth_certificate->move($destinationPath, $birthCertificateName);
                }
                else
                {
                  $birthCertificateName = $trainingStudent->birth_certificate;
                }
      
                $experience_certificate = $request->experience_certificate;
                if($experience_certificate){
                    $experienceCertificateName = time().'_experience_certificate_'.$experience_certificate->getClientOriginalName();
                    $destinationPath = public_path('/documents/student/training-student/'.$trainingStudent->user->user_name);
                    $experience_certificate->move($destinationPath, $experienceCertificateName);
                }
                else
                {
                  $experienceCertificateName = $trainingStudent->experience_certificate;
                }
      
                $fee_document = $request->fee_document;
                if($fee_document){
                    $feeDocumentName = time().'_fee_document_'.$fee_document->getClientOriginalName();
                    $destinationPath = public_path('/documents/student/training-student/'.$trainingStudent->user->user_name);
                    $fee_document->move($destinationPath, $feeDocumentName);
                }
                else
                {
                  $feeDocumentName = $trainingStudent->fee_document;
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
              

                //update training student
                  $data = [
                    'name' => $request->name,
                    'father_name' => $request->father_name,
                    'guardian' => $request->guardian,
                    'mother_name' => $request->mother_name,
                    'dob' => $dob,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'marital_status' => $request->marital_status,
                    'aadhar' => $request->aadhar,
                    'nationality' => $request->nationality,
                    'domicile' => $request->domicile,
                    'category' => $request->category,
                    'income' => $request->income,
                    'student_class_id' => $request->student_class_id,
                    'class_section_id' => $request->class_section_id,
                    'correspondance_address' => $request->correspondance_address,
                    'permanent_address' => $request->permanent_address,
                    'state' => $request->state,
                    'pincode' => $request->pincode,
                    'contact_number' => $request->contact_number,
                    'email' => $request->email,
                    'ssc_board' => $request->ssc_board,
                    'ssc_year_passing' => $request->ssc_year_passing,
                    'ssc_total_marks' => $request->ssc_total_marks,
                    'ssc_marks_obtained' => $request->ssc_marks_obtained,
                    'ssc_percentage_obtained' => $request->ssc_percentage_obtained,
                    'ssc_subject' => $request->ssc_subject,
                    'hsc_board' => $request->hsc_board,
                    'hsc_year_passing' => $request->hsc_year_passing,
                    'hsc_total_marks' => $request->hsc_total_marks,
                    'hsc_marks_obtained' => $request->hsc_marks_obtained,
                    'hsc_percentage_obtained' => $request->hsc_percentage_obtained,
                    'hsc_subject' => $request->hsc_subject,
                    'examination_board_university' => $request->examination_board_university,
                    'examination_year_passing' => $request->examination_year_passing,
                    'examination_total_marks' => $request->examination_total_marks,
                    'examination_marks_obtained' => $request->examination_marks_obtained,
                    'examination_percentage_obtained' => $request->examination_percentage_obtained,
                    'examination_subject' => $request->examination_subject,
                    'date' => $dateRegister,
                    'extra_curricular_activities' => $request->extra_curricular_activities,
                    'course_reason' => $request->course_reason,
                    'photo' => $photoName,
                    'statement_marks' => $statementMarksName,
                    'character_certificate' => $characterCertificateName,
                    'birth_certificate' => $birthCertificateName,
                    'experience_certificate' => $experienceCertificateName,
                    'fee_document' => $feeDocumentName,
                    'city' => $request->city, 
                    'academic_session' => $request->academic_session                
                   
                           
                ];
                $trainingStudent->update($data);

                
                return redirect()->route('teacher.students.training-students.index')->with('success','Training Student Updated Successfully !'); 
   
    }
    


      public function destroy(User $user)
    {
    
            $user->delete();
            return back()->with('success','Training Student Deleted Successfully !');      
   
    }



}
