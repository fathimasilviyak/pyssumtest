<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Faculty;

use App\Models\SuperAdminActivityLog;


use Carbon\carbon;


class FacultyController extends Controller
{


    public function index(){
        
        $users = User::whereIn('role', ['super_admin', 'admin', 'teacher'])
                        ->where('branch_id', session('branch'))
                        ->orderByDesc('id')
                        ->get();

                     
                   

         return view('super-admin.faculty.index',compact('users'));
        

    }   


    public function show(Faculty $faculty){

        return view('super-admin.faculty.show',compact('faculty'));

    }





    public function create(){
        return view('super-admin.faculty.create');
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
            $user->branch_id = session('branch');
           
            $save = $user->save();
  
            if( $save ){

                if($user->role == "super_admin"){
                    $super_admin_activity_log = new SuperAdminActivityLog();
                    $super_admin_activity_log->caused_by = Auth::user()->user_name;;
                    $super_admin_activity_log->action = "create";
                    $super_admin_activity_log->performed_on = $user->user_name;
                    $super_admin_activity_log->save();
                    }
                
                $userId = $user->id;  
                return redirect()->route('super-admin.faculties.complete-create',$userId);        
                
                }
            else{
                return redirect()->back()->with('fail','Something went Wrong, failed to register');
            }
              
    }
  
 
    public function completeCreate($user_id){
       
            return view('super-admin.faculty.complete-create',compact('user_id'));
    }


    public function completeStore(Request $request){

       
       //Validate inputs
       $request->validate([
                'user_id' => ['required', 'unique:faculties'],
                  ],['user_id.unique' => 'Already Registered Faculty!! Create another one']);
            
                

                $photo = $request->photo;
                if($photo){
                    $photoName = time().'_'.$photo->getClientOriginalName();
                    $destinationPath = public_path('/images/faculty');
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

                $dateAppoinment = $request->date_appoinment;
                if($dateAppoinment){
                    $dateAppoinmentConverted = Carbon::createFromFormat('d/m/Y', $dateAppoinment);
                    $dateAppoinment = $dateAppoinmentConverted->toDateString(); 
                }

                $dateLeaving = $request->date_leaving;
                if($dateLeaving){
                    $dateLeavingConverted = Carbon::createFromFormat('d/m/Y', $dateLeaving);
                    $dateLeaving = $dateLeavingConverted->toDateString(); 
                }

      //store faculty
                $faculty = new Faculty();
                $faculty->name = $request->name;
                $faculty->email = $request->email;
                $faculty->dob = $dob;
                $faculty->gender = $request->gender;
                $faculty->aadhar = $request->aadhar;
                $faculty->guardian = $request->guardian;
                $faculty->qualification = $request->qualification;
                $faculty->date_appoinment = $dateAppoinment;
                $faculty->designation = $request->designation;
                $faculty->nature_appoinment = $request->nature_appoinment;
                $faculty->specialized_in = $request->specialized_in;
                $faculty->pan = $request->pan;
                $faculty->mobile = $request->mobile;
                $faculty->permenent_address = $request->permenent_address;
                $faculty->local_address = $request->local_address;
                $faculty->date_leaving = $dateLeaving;
                $faculty->photo= $photoName;
                $faculty->user_id = $request->user_id;

                $save = $faculty->save();
      
                if( $save ){     
                    
                    $faculty->user()->update(['status' => 1]);

                    return redirect()->route('super-admin.faculties.index')->with('success','Faculty Registered Successfully !');             
                    }
                else{
                    return redirect()->route('super-admin.faculties.index')->with('fail','Something went Wrong, failed to complete register');
                }

    }


    public function edit(Faculty $faculty)
    {
       
        return view("super-admin.faculty.edit",compact('faculty'));
              
   
    }



    
    public function update(Request $request, Faculty $faculty)
    {
        
        $photo = $request->photo;
        
                if($photo){
                    $photoName = time().'_'.$photo->getClientOriginalName();
                    $destinationPath = public_path('/images/faculty');
                    $photo->move($destinationPath, $photoName);
                }
                else
                {
                    $photoName = $faculty->photo;
                }
                
                $dob = $request->dob;
                if($dob){
                    $dobConverted = Carbon::createFromFormat('d/m/Y', $dob);
                    $dob = $dobConverted->toDateString(); 
                }

                $dateAppoinment = $request->date_appoinment;
                if($dateAppoinment){
                    $dateAppoinmentConverted = Carbon::createFromFormat('d/m/Y', $dateAppoinment);
                    $dateAppoinment = $dateAppoinmentConverted->toDateString(); 
                }

                $dateLeaving = $request->date_leaving;
                if($dateLeaving){
                    $dateLeavingConverted = Carbon::createFromFormat('d/m/Y', $dateLeaving);
                    $dateLeaving = $dateLeavingConverted->toDateString(); 
                }
                     

                //update faculty
                  $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'dob' => $dob,
                    'gender' => $request->gender,
                    'aadhar' => $request->aadhar,
                    'guardian' => $request->guardian,
                    'qualification' => $request->qualification,
                    'date_appoinment' => $dateAppoinment,
                    'designation' => $request->designation,
                    'nature_appoinment' => $request->nature_appoinment,
                    'specialized_in' => $request->specialized_in,
                    'pan' => $request->pan,
                    'mobile' => $request->mobile,
                    'permenent_address' => $request->permenent_address,
                    'local_address' => $request->local_address,
                    'date_leaving' => $dateLeaving,
                    'photo' => $photoName
                   
                           
                ];
                $faculty->update($data);

                if($faculty->user->role == "super_admin"){
                    $super_admin_activity_log = new SuperAdminActivityLog();
                    $super_admin_activity_log->caused_by = Auth::user()->user_name;;
                    $super_admin_activity_log->action = "update";
                    $super_admin_activity_log->performed_on = $faculty->user->user_name;
                    $super_admin_activity_log->save();
                    }


                return redirect()->route('super-admin.faculties.index')->with('success','Faculty Updated Successfully !'); 
   
    }




    public function editRole(Faculty $faculty){

     
        return view('super-admin.faculty.edit-role',compact('faculty'));

    }

    public function updateRole(Request $request, Faculty $faculty){

     
                            //Validate input
       $request->validate([

        'role' => ['required', 'string', 'max:255'],
       
                  ]);

                  if($faculty->user->role == "super_admin" || $request->role == "super_admin"){
                    $super_admin_activity_log = new SuperAdminActivityLog();
                    $super_admin_activity_log->caused_by = Auth::user()->user_name;;
                    $super_admin_activity_log->action = "update role from ".$faculty->user->role." to ".$request->role;
                    $super_admin_activity_log->performed_on = $faculty->user->user_name;
                    $super_admin_activity_log->save();
                    }

        $faculty->user()->update(['role' => $request->role]);

       

        return redirect()->route('super-admin.faculties.show',$faculty->id)->with('success','Role Changed Successfully !'); 


    }




    public function destroy(User $user)
    {
    
            $user->delete();
            
            if($user->role == "super_admin"){
            $super_admin_activity_log = new SuperAdminActivityLog();
            $super_admin_activity_log->caused_by = Auth::user()->user_name;;
            $super_admin_activity_log->action = "delete";
            $super_admin_activity_log->performed_on = $user->user_name;
            $super_admin_activity_log->save();
            }
         
            return back()->with('success','Faculty Deleted Successfully !');      
   
    }








}
