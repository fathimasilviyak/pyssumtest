<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\EarlyInterventionRegistration;

use Carbon\carbon;

class EarlyInterventionRegistrationController extends Controller
{
    
    public function index(){
        
        $eIRegistrations = EarlyInterventionRegistration::where('branch_id', session('branch'))
                                                            ->orderByDesc('id')->get();

         return view('super-admin.early-intervention-registration.index',compact('eIRegistrations'));
        

    } 


    
    public function show(EarlyInterventionRegistration $eIRegistration){

        return view('super-admin.early-intervention-registration.show',compact('eIRegistration'));

    }





    public function create(){
       
        return view('super-admin.early-intervention-registration.create');
    }


    public function store(Request $request){
    
    
      //Validate inputs
 

        $photo = $request->photo;
        if($photo){
            $photoName = time().'_'.$photo->getClientOriginalName();
            $destinationPath = public_path('/images/EI-registration');
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

//store Early Intervention Registration
        $eIRegistration = new EarlyInterventionRegistration();

        $eIRegistration->name = $request->name;
        $eIRegistration->dob =  $dob;
        $eIRegistration->gender = $request->gender;
        $eIRegistration->aadhar = $request->aadhar;
        $eIRegistration->reffered_by = $request->reffered_by;
        $eIRegistration->father_name = $request->father_name;
        $eIRegistration->father_occupation = $request->father_occupation;
        $eIRegistration->father_contact = $request->father_contact;
        $eIRegistration->mother_name = $request->mother_name;
        $eIRegistration->mother_occupation = $request->mother_occupation;
        $eIRegistration->mother_contact = $request->mother_contact;
        $eIRegistration->address = $request->address;
        $eIRegistration->present_complaints = $request->present_complaints;
        $eIRegistration->head_control = $request->head_control;
        $eIRegistration->sitting = $request->sitting;
        $eIRegistration->standing = $request->standing;
        $eIRegistration->walking = $request->walking;
        $eIRegistration->first_meaningfull_word = $request->first_meaningfull_word;
        $eIRegistration->bowel_bladder_control = $request->bowel_bladder_control;
        $eIRegistration->child_hear = $request->child_hear;
        $eIRegistration->child_talk = $request->child_talk;
        $eIRegistration->understand_child = $request->understand_child;
        $eIRegistration->like_other = $request->like_other;
        $eIRegistration->family_history = $request->family_history;
        $eIRegistration->child_vision = $request->child_vision;
        $eIRegistration->medical_problems = $request->medical_problems;
        $eIRegistration->worries = $request->worries;
        $eIRegistration->motor_development = $request->motor_development;
        $eIRegistration->language_development = $request->language_development;
        $eIRegistration->social_development = $request->social_development;
        $eIRegistration->cognitive_development = $request->cognitive_development;
        $eIRegistration->date = $dateRegister;
        $eIRegistration->photo = $photoName;
        $eIRegistration->city = $request->city;  
        $eIRegistration->academic_session = $request->academic_session;  
        $eIRegistration->branch_id = session('branch');  
             
        $save = $eIRegistration->save();

        if( $save ){   

            return redirect()->route('super-admin.early-intervention-registrations.index')->with('success','Early Intervention Registration Done Successfully !');             
            }
        else{
            return redirect()->route('super-admin.early-intervention-registrations.index')->with('fail','Something went Wrong, failed to complete register');
        }
    
    
    }



    public function edit(EarlyInterventionRegistration $eIRegistration)
    {
    
        return view("super-admin.early-intervention-registration.edit",compact('eIRegistration'));
              
    }

    public function update(Request $request, EarlyInterventionRegistration $eIRegistration)
    {
        

        $photo = $request->photo;
        
                if($photo){
                    $photoName = time().'_'.$photo->getClientOriginalName();
                    $destinationPath = public_path('/images/EI-Registration');
                    $photo->move($destinationPath, $photoName);
                }
                else
                {
                    $photoName = $eIRegistration->photo;
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

                                     

                //update EI Registration
                  $data = [
                    'name' => $request->name,
                    'dob' => $dob,
                    'gender' => $request->gender,
                    'aadhar' => $request->aadhar,
                    'reffered_by' => $request->reffered_by,
                    'father_name' => $request->father_name,
                    'father_occupation' => $request->father_occupation,
                    'father_contact' => $request->father_contact,
                    'mother_name' => $request->mother_name,
                    'mother_occupation' => $request->mother_occupation,
                    'mother_contact' => $request->mother_contact,
                    'address' => $request->address,
                    'present_complaints' =>$request->present_complaints,
                    'head_control' => $request->head_control,
                    'sitting' => $request->sitting,
                    'standing' => $request->standing,
                    'walking' => $request->walking,
                    'first_meaningfull_word' => $request->first_meaningfull_word,
                    'bowel_bladder_control' => $request->bowel_bladder_control,
                    'child_hear' => $request->child_hear,
                    'child_talk' => $request->child_talk,
                    'understand_child' => $request->understand_child,
                    'like_other' => $request->like_other,
                    'family_history' => $request->family_history,
                    'child_vision' => $request->child_vision,
                    'medical_problems' => $request->medical_problems,
                    'worries' => $request->worries,
                    'motor_development' => $request->motor_development,
                    'language_development' => $request->language_development,
                    'social_development' => $request->social_development,
                    'cognitive_development' => $request->cognitive_development,
                    'date' => $dateRegister, 
                    'photo' => $photoName,
                    'city' => $request->city, 
                    'academic_session' => $request->academic_session
                   
                           
                ];
                
                
                $eIRegistration->update($data);
                
                return redirect()->route('super-admin.early-intervention-registrations.index')->with('success','Early Intervention Registration Updated Successfully !'); 
   
    }
    



    public function destroy(EarlyInterventionRegistration $eIRegistration)
    {
    
            $eIRegistration->delete();
            return back()->with('success','Early Intervention Registration Deleted Successfully !');      
   
    }





}
