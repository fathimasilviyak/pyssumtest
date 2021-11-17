<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\VocationalStudent;

use Carbon\carbon;

class VocationalStudentController extends Controller
{
    
   
    public function index(){
        
        $users = User::where('role', 'vocational_student')
                        ->where('branch_id', Auth::user()->branch->id)
                            ->orderByDesc('id')
                            ->get();

         return view('teacher.student.vocational-student.index',compact('users'));
        

    } 




    
    public function show(VocationalStudent $vocationalStudent){

        return view('teacher.student.vocational-student.show',compact('vocationalStudent'));

    }




    public function create(){
        return view('teacher.student.vocational-student.create');
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
            return redirect()->route('teacher.students.vocational-students.complete-create',$userId);        
            
            }
        else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
          
    }



    public function completeCreate($user_id){
       
        return view('teacher.student.vocational-student.complete-create',compact('user_id'));
    }


    public function completeStore(Request $request){
    
    
      //Validate inputs
      $request->validate([
        'user_id' => ['required', 'unique:vocational_students'],
          ],['user_id.unique' => 'Already Registered Vocational Student!! Create another one']);
    
        

        $photo = $request->photo;
        if($photo){
            $photoName = time().'_'.$photo->getClientOriginalName();
            $destinationPath = public_path('/images/student/vocational-student');
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
        $userId = $request->user_id;
        $vocationalStudentUser = User::find($userId);
        $savedFolder = $vocationalStudentUser->user_name;

        $birth_certificate = $request->birth_certificate;
        if($birth_certificate){
            $birthCertificateName = time().'_birth_certificate_'.$birth_certificate->getClientOriginalName();
            $destinationPath = public_path('/documents/student/vocational-student/'.$savedFolder);
            $birth_certificate->move($destinationPath, $birthCertificateName);
        }
        else
        {
          $birthCertificateName = $request->birth_certificate;
        }

        $cmo_certificate = $request->cmo_certificate;
        if($cmo_certificate){
            $cmoCertificateName = time().'_cmo_certificate_'.$cmo_certificate->getClientOriginalName();
            $destinationPath = public_path('/documents/student/vocational-student/'.$savedFolder);
            $cmo_certificate->move($destinationPath, $cmoCertificateName);
        }
        else
        {
          $cmoCertificateName = $request->cmo_certificate;
        }

        $address_proof = $request->address_proof;
        if($address_proof){
            $addressProofName = time().'_address_proof_'.$address_proof->getClientOriginalName();
            $destinationPath = public_path('/documents/student/vocational-student/'.$savedFolder);
            $address_proof->move($destinationPath, $addressProofName);
        }
        else
        {
          $addressProofName = $request->address_proof;
        }

        if($request->epilepsy){
            $epilepsy = true;
        }else{
            $epilepsy = false;
        }
        if($request->physically_handicapped){
            $physicallyHandicapped = true;
        }else{
            $physicallyHandicapped = false;
        }
        if($request->visually_handicapped){
            $visuallyHandicapped = true;
        }else{
            $visuallyHandicapped = false;
        }
        if($request->psychological_problems){
            $psychologicalProblems = true;
        }else{
            $psychologicalProblems = false;
        }
        if($request->psychiatric_features){
            $psychiatricFeatures = true;
        }else{
            $psychiatricFeatures = false;
        }
        

        

//store vocational_student
        $vocationalStudent = new VocationalStudent();

        $vocationalStudent->name = $request->name;
        $vocationalStudent->dob =  $dob;
        $vocationalStudent->gender = $request->gender;
        $vocationalStudent->father_name = $request->father_name;
        $vocationalStudent->mother_name = $request->mother_name;
        $vocationalStudent->contact_number = $request->contact_number;
        $vocationalStudent->address = $request->address;
        $vocationalStudent->marital_status = $request->marital_status;
        $vocationalStudent->nationality = $request->nationality;
        $vocationalStudent->languages = $request->languages;
        $vocationalStudent->main_stream_school = $request->main_stream_school;
        $vocationalStudent->special_school = $request->special_school;
        $vocationalStudent->vocational_training = $request->vocational_training;
        $vocationalStudent->any_other = $request->any_other;
        $vocationalStudent->organization = $request->organization;
        $vocationalStudent->work_type = $request->work_type;
        $vocationalStudent->salary = $request->salary;
        $vocationalStudent->epilepsy = $epilepsy;
        $vocationalStudent->physically_handicapped = $physicallyHandicapped;
        $vocationalStudent->visually_handicapped = $visuallyHandicapped;
        $vocationalStudent->psychological_problems = $psychologicalProblems;
        $vocationalStudent->psychiatric_features = $psychiatricFeatures;
        $vocationalStudent->major_challenges = $request->major_challenges;
        $vocationalStudent->birth_certificate = $birthCertificateName;
        $vocationalStudent->cmo_certificate = $cmoCertificateName;
        $vocationalStudent->address_proof = $addressProofName;
        $vocationalStudent->date = $dateRegister;
        $vocationalStudent->photo = $photoName;
        $vocationalStudent->city = $request->city;  
        $vocationalStudent->academic_session = $request->academic_session;    
        $vocationalStudent->user_id = $request->user_id;
             
  
        $save = $vocationalStudent->save();

        if( $save ){     
            
            $vocationalStudent->user()->update(['status' => 1]);

            return redirect()->route('teacher.students.vocational-students.index')->with('success','Vocational Student Registered Successfully !');             
            }
        else{
            return redirect()->route('teacher.students.vocational-students.index')->with('fail','Something went Wrong, failed to complete register');
        }
    
    
    }



    public function edit(VocationalStudent $vocationalStudent)
    {
    
        return view("teacher.student.vocational-student.edit",compact('vocationalStudent'));
              
    }

    public function update(Request $request, VocationalStudent $vocationalStudent)
    {
        
    
        $photo = $request->photo;
        
                if($photo){
                    $photoName = time().'_'.$photo->getClientOriginalName();
                    $destinationPath = public_path('/images/student/vocational-student');
                    $photo->move($destinationPath, $photoName);
                }
                else
                {
                    $photoName = $vocationalStudent->photo;
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

                     
                $birth_certificate = $request->birth_certificate;
                if($birth_certificate){
                    $birthCertificateName = time().'_birth_certificate_'.$birth_certificate->getClientOriginalName();
                    $destinationPath = public_path('/documents/student/vocational-student/'.$vocationalStudent->user->user_name);
                    $birth_certificate->move($destinationPath, $birthCertificateName);
                }
                else
                {
                  $birthCertificateName = $vocationalStudent->birth_certificate;
                }

                $cmo_certificate = $request->cmo_certificate;
                if($cmo_certificate){
                    $cmoCertificateName = time().'_cmo_certificate_'.$cmo_certificate->getClientOriginalName();
                    $destinationPath = public_path('/documents/student/vocational-student/'.$vocationalStudent->user->user_name);
                    $cmo_certificate->move($destinationPath, $cmoCertificateName);
                }
                else
                {
                  $cmoCertificateName = $vocationalStudent->cmo_certificate;
                }
 
                $address_proof = $request->address_proof;
                if($address_proof){
                    $addressProofName = time().'_address_proof_'.$address_proof->getClientOriginalName();
                    $destinationPath = public_path('/documents/student/vocational-student/'.$vocationalStudent->user->user_name);
                    $address_proof->move($destinationPath, $addressProofName);
                }
                else
                {
                  $addressProofName = $vocationalStudent->address_proof;
                }

                
        if($request->epilepsy){
            $epilepsy = true;
        }else{
            $epilepsy = false;
        }
        if($request->physically_handicapped){
            $physicallyHandicapped = true;
        }else{
            $physicallyHandicapped = false;
        }
        if($request->visually_handicapped){
            $visuallyHandicapped = true;
        }else{
            $visuallyHandicapped = false;
        }
        if($request->psychological_problems){
            $psychologicalProblems = true;
        }else{
            $psychologicalProblems = false;
        }
        if($request->psychiatric_features){
            $psychiatricFeatures = true;
        }else{
            $psychiatricFeatures = false;
        }

                //update vocational student
                  $data = [
                    'name' => $request->name,
                    'dob' => $dob,
                    'gender' => $request->gender,
                    'father_name' => $request->father_name,
                    'mother_name' => $request->mother_name,
                    'contact_number' => $request->contact_number,
                    'address' => $request->address,
                    'marital_status' => $request->marital_status,
                    'nationality' => $request->nationality,
                    'languages' => $request->languages,
                    'main_stream_school' => $request->main_stream_school,
                    'special_school' => $request->special_school,
                    'vocational_training' => $request->vocational_training,
                    'any_other' => $request->any_other,
                    'organization' => $request->organization,
                    'work_type' => $request->work_type,
                    'salary' => $request->salary,
                    'epilepsy' => $epilepsy,
                    'physically_handicapped' => $physicallyHandicapped,
                    'visually_handicapped' => $visuallyHandicapped,
                    'psychological_problems' => $psychologicalProblems,
                    'psychiatric_features' => $psychiatricFeatures,
                    'major_challenges' => $request->major_challenges,
                    'birth_certificate' => $birthCertificateName,
                    'cmo_certificate' => $cmoCertificateName,
                    'address_proof' => $addressProofName,
                    'date' => $dateRegister, 
                    'photo' => $photoName,
                    'city' => $request->city, 
                    'academic_session' => $request->academic_session
                   
                           
                ];
                
                $vocationalStudent->update($data);

                
                return redirect()->route('teacher.students.vocational-students.index')->with('success','Vocational Student Updated Successfully !'); 
   
    }
    



    public function destroy(User $user)
    {
    
            $user->delete();
            return back()->with('success','vocational Student Deleted Successfully !');      
   
    }


}
