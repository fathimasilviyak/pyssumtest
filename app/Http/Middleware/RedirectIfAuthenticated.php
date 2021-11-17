<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }

            if( Auth::guard($guard)->check() && Auth::user()->role == "super_admin"){
                return redirect()->route('super-admin.home');
            }
            elseif( Auth::guard($guard)->check() && Auth::user()->role == "admin"){
                return redirect()->route('admin.home');
            } 
            elseif( Auth::guard($guard)->check() && Auth::user()->role == "teacher"){
                return redirect()->route('teacher.home');
            }
            elseif( Auth::guard($guard)->check() && Auth::user()->role == "inclusive_student"){
                return redirect()->route('inclusive-student.home');
            }
            elseif( Auth::guard($guard)->check() && Auth::user()->role == "special_student"){
                return redirect()->route('special-student.home');
            }
            elseif( Auth::guard($guard)->check() && Auth::user()->role == "training_student"){
                return redirect()->route('training-student.home');
            }
            elseif( Auth::guard($guard)->check() && Auth::user()->role == "vocational_student"){
                return redirect()->route('vocational-student.home');
            }


        }

        return $next($request);
    }
}
