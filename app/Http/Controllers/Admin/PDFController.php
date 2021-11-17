<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use PDF;

use App\Models\SpecialStudent;
use App\Models\InclusiveStudent;
use App\Models\TrainingStudent;
use App\Models\VocationalStudent;
use App\Models\EarlyInterventionRegistration;
use App\Models\Faculty;

class PDFController extends Controller
{
    
    public function generateSpecialStudentPDF(Request $request, SpecialStudent $specialStudent){

        $selectedData = [];
        if($request->developmental_history){
            $selectedData['developmental_history'] = 1;
        }
        if($request->school_history){
            $selectedData['school_history'] = 1;
        }
        if($request->play_behaviour){
            $selectedData['play_behaviour'] = 1;
        }
        if($request->family_details){
            $selectedData['family_details'] = 1;
        }
        if($request->social_environment){
            $selectedData['social_environment'] = 1;
        }
        if($request->home_environment){
            $selectedData['home_environment'] = 1;
        }
        if($request->social_worker_impression){
            $selectedData['social_worker_impression'] = 1;
        }
        if($request->medical_examination){
            $selectedData['medical_examination'] = 1;
        }
        if($request->psychological_assessment){
            $selectedData['psychological_assessment'] = 1;
        }
        if($request->occupational_assessment){
            $selectedData['occupational_assessment'] = 1;
        }
        
     
        $pdf = PDF::loadView('admin.student.special-student.pdf', compact('specialStudent','selectedData'));
    
        return $pdf->download($specialStudent->user->user_name.'.pdf');


    }

    public function generateInclusiveStudentPDF(InclusiveStudent $inclusiveStudent){
    
        $pdf = PDF::loadView('admin.student.inclusive-student.pdf', compact('inclusiveStudent'));
    
        return $pdf->download($inclusiveStudent->user->user_name.'.pdf');

    
    }

    public function generateVocationalStudentPDF(VocationalStudent $vocationalStudent){
    
        $pdf = PDF::loadView('admin.student.vocational-student.pdf', compact('vocationalStudent'));
    
        return $pdf->download($vocationalStudent->user->user_name.'.pdf');

    
    }

    public function generateTrainingStudentPDF(TrainingStudent $trainingStudent){
    
        $pdf = PDF::loadView('admin.student.training-student.pdf', compact('trainingStudent'));
    
        return $pdf->download($trainingStudent->user->user_name.'.pdf');

    
    }

    public function generateEIRegistrationPDF(EarlyInterventionRegistration $eIRegistration){
    
        $pdf = PDF::loadView('admin.early-intervention-registration.pdf', compact('eIRegistration'));
    
        return $pdf->download($eIRegistration->name.'.pdf');

    
    }

    public function generateFacultyPDF(Faculty $faculty){
    
        $pdf = PDF::loadView('admin.faculty.pdf', compact('faculty'));
    
        return $pdf->download($faculty->user->user_name.'.pdf');

    
    }


}
