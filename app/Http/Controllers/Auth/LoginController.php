<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo(){
        if( Auth()->user()->role == "super_admin"){
            return route('super-admin.home');
        }
        elseif( Auth()->user()->role == "admin"){
            return route('admin.home');
        }
        elseif( Auth()->user()->role == "teacher"){
            return route('teacher.home');
        }
        elseif( Auth()->user()->role == "inclusive_student"){
            return route('inclusive-student.home');
        }
        elseif( Auth()->user()->role == "special_student"){
            return route('special-student.home');
        }
        elseif( Auth()->user()->role == "training_student"){
            return route('training-student.home');
        }
        elseif( Auth()->user()->role == "vocational_student"){
            return route('vocational-student.home');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function username()
    {
        return 'user_name';
    }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'user_name'=>'required',
            'password'=>'required'
        ]);
 
        if( auth()->attempt(array('user_name'=>$input['user_name'], 'password'=>$input['password'])) ){
 
         if( auth()->user()->role == "super_admin" ){
            Session::put('branch', Auth::user()->branch->id);
             return redirect()->route('super-admin.home');
         }
         elseif( auth()->user()->role == "admin" ){
             return redirect()->route('admin.home');
         }
         elseif( auth()->user()->role == "teacher" ){
            return redirect()->route('teacher.home');
        }
        elseif( auth()->user()->role == "inclusive_student" ){
           return redirect()->route('inclusive-student.home');
       }
       elseif( auth()->user()->role == "special_student" ){
          return redirect()->route('special-student.home');
      }
      elseif( auth()->user()->role == "training_student" ){
         return redirect()->route('training-student.home');
     }
     elseif( auth()->user()->role == "vocational_student" ){
        return redirect()->route('vocational-student.home');
    }
 
        }else{
            return redirect()->route('login')->with('fail','Incorrect credentials');
        }
     }


}
