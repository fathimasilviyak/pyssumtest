<?php

use Illuminate\Support\Facades\Route;

//superadmin controllers
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\FacultyController;
use App\Http\Controllers\SuperAdmin\SpecialStudentController as SuperAdminSpecialStudentController;
use App\Http\Controllers\SuperAdmin\InclusiveStudentController as SuperAdminInclusiveStudentController;
use App\Http\Controllers\SuperAdmin\TrainingStudentController as SuperAdminTrainingStudentController;
use App\Http\Controllers\SuperAdmin\VocationalStudentController as SuperAdminVocationalStudentController;

use App\Http\Controllers\SuperAdmin\EarlyInterventionRegistrationController as SuperAdminEarlyInterventionRegistrationController;

use App\Http\Controllers\SuperAdmin\StudentClassController as SuperAdminStudentClassController;
use App\Http\Controllers\SuperAdmin\ClassSectionController as SuperAdminClassSectionController;

use App\Http\Controllers\SuperAdmin\BranchController as SuperAdminBranchController;

use App\Http\Controllers\SuperAdmin\CaseRecordController as SuperAdminCaseRecordController;

//pdf controller
use App\Http\Controllers\SuperAdmin\PDFController as SuperAdminPDFController;

//Activity Master
use App\Http\Controllers\SuperAdmin\SpecialStudentActivityMasterController as SuperAdminSpecialStudentActivityMasterController;

use App\Http\Controllers\SuperAdmin\VocationalStudentActivityMasterController as SuperAdminVocationalStudentActivityMasterController;

//fullcalendar controller
use App\Http\Controllers\FullCalendarController;



//admin controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\SpecialStudentController as AdminSpecialStudentController;
use App\Http\Controllers\Admin\InclusiveStudentController as AdminInclusiveStudentController;
use App\Http\Controllers\Admin\TrainingStudentController as AdminTrainingStudentController;
use App\Http\Controllers\Admin\VocationalStudentController as AdminVocationalStudentController;

use App\Http\Controllers\Admin\EarlyInterventionRegistrationController as AdminEarlyInterventionRegistrationController;

use App\Http\Controllers\Admin\StudentClassController as AdminStudentClassController;
use App\Http\Controllers\Admin\ClassSectionController as AdminClassSectionController;

use App\Http\Controllers\Admin\CaseRecordController as AdminCaseRecordController;

//pdf controller
use App\Http\Controllers\Admin\PDFController as AdminPDFController;

//teacher controllers
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\SpecialStudentController as TeacherSpecialStudentController;
use App\Http\Controllers\Teacher\InclusiveStudentController as TeacherInclusiveStudentController;
use App\Http\Controllers\Teacher\TrainingStudentController as TeacherTrainingStudentController;
use App\Http\Controllers\Teacher\VocationalStudentController as TeacherVocationalStudentController;

use App\Http\Controllers\Teacher\StudentClassController as TeacherStudentClassController;
use App\Http\Controllers\Teacher\ClassSectionController as TeacherClassSectionController;

use App\Http\Controllers\Teacher\CaseRecordController as TeacherCaseRecordController;

//pdf controller
use App\Http\Controllers\Teacher\PDFController as TeacherPDFController;

//special student controllers
use App\Http\Controllers\SpecialStudent\SpecialStudentController;

//inclusive student controllers
use App\Http\Controllers\InclusiveStudent\InclusiveStudentController;

//training student controllers
use App\Http\Controllers\TrainingStudent\TrainingStudentController;

//vocational student controllers
use App\Http\Controllers\VocationalStudent\VocationalStudentController;



use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes([
        'register'=>false,
        'reset'=>false,
        'verify'=>false
    ]);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//super-admin routes
Route::group(['prefix'=>'super-admin', 'as' => 'super-admin.', 'middleware'=>['isSuperAdmin','auth','PreventBackHistory']], function(){
    Route::get('home',[SuperAdminController::class,'index'])->name('home');
    
    // fullcalendar 
    Route::get('fullcalendar', [FullCalendarController::class, 'index']);
    Route::post('fullcalendarAjax', [FullCalendarController::class, 'ajax']);


    //faculty management

    Route::get('faculties/create',[FacultyController::class,'create'])->name('faculties.create');
    Route::post('faculties/store',[FacultyController::class,'store'])->name('faculties.store');
    
      
    Route::get('faculties/complete-create/{userId}',[FacultyController::class,'completeCreate'])->name('faculties.complete-create');
    Route::post('faculties/complete-store',[FacultyController::class,'completeStore'])->name('faculties.complete-store');
    
    Route::get('faculties',[FacultyController::class,'index'])->name('faculties.index');

    Route::get('faculties/{faculty}',[FacultyController::class,'show'])->name('faculties.show');

    Route::get('faculties/{faculty}/generate-pdf',[SuperAdminPDFController::class,'generateFacultyPDF'])->name('faculties.generate-pdf');

    Route::delete('faculties/{user}',[FacultyController::class,'destroy'])->name('faculties.destroy');

    Route::get('faculties/{faculty}/edit',[FacultyController::class,'edit'])->name('faculties.edit');
    Route::put(' faculties/{faculty}',[FacultyController::class,'update'])->name('faculties.update');

    Route::get('faculties/{faculty}/edit-role',[FacultyController::class,'editRole'])->name('faculties.edit-role');
    Route::put('faculties/{faculty}/update-role',[FacultyController::class,'updateRole'])->name('faculties.update-role');

    //student managment
//special students management
    Route::get('students/special-students/create',[SuperAdminSpecialStudentController::class,'create'])->name('students.special-students.create');
    Route::post('students/special-students/store',[SuperAdminSpecialStudentController::class,'store'])->name('students.special-students.store');

    Route::get('students/special-students/complete-create/{userId}',[SuperAdminSpecialStudentController::class,'completeCreate'])->name('students.special-students.complete-create');
    Route::post('students/special-students/complete-store',[SuperAdminSpecialStudentController::class,'completeStore'])->name('students.special-students.complete-store');

    Route::get('students/special-students',[SuperAdminSpecialStudentController::class,'index'])->name('students.special-students.index');

    Route::get('students/special-students/{specialStudent}',[SuperAdminSpecialStudentController::class,'show'])->name('students.special-students.show');

    Route::post('students/special-students/{specialStudent}/generate-pdf',[SuperAdminPDFController::class,'generateSpecialStudentPDF'])->name('students.special-students.generate-pdf');


    Route::get('students/special-students/{specialStudent}/edit',[SuperAdminSpecialStudentController::class,'edit'])->name('students.special-students.edit');
    Route::put('students/special-students/{specialStudent}',[SuperAdminSpecialStudentController::class,'update'])->name('students.special-students.update');

    Route::delete('students/special-students/{user}',[SuperAdminSpecialStudentController::class,'destroy'])->name('students.special-students.destroy');

    //case record management of specialstudent
    Route::put('students/special-students/prenatal-record/{prenatalRecord}',[SuperAdminCaseRecordController::class,'updatePrenatalRecord'])->name('students.special-students.prenatal-record.update');
    Route::put('students/special-students/natal-record/{natalRecord}',[SuperAdminCaseRecordController::class,'updateNatalRecord'])->name('students.special-students.natal-record.update');
    Route::put('students/special-students/neonatal-record/{neonatalRecord}',[SuperAdminCaseRecordController::class,'updateNeonatalRecord'])->name('students.special-students.neonatal-record.update');
    Route::put('students/special-students/postnatal-record/{postnatalRecord}',[SuperAdminCaseRecordController::class,'updatePostnatalRecord'])->name('students.special-students.postnatal-record.update');
    Route::put('students/special-students/immunization-record/{immunizationRecord}',[SuperAdminCaseRecordController::class,'updateImmunizationRecord'])->name('students.special-students.immunization-record.update');
    Route::put('students/special-students/developmental-milestone/{developmentalMilestone}',[SuperAdminCaseRecordController::class,'updateDevelopmentalMilestone'])->name('students.special-students.developmental-milestone.update');
    Route::put('students/special-students/school-history/{schoolHistory}',[SuperAdminCaseRecordController::class,'updateSchoolHistory'])->name('students.special-students.school-history.update');
    Route::put('students/special-students/play-behaviour/{playBehaviour}',[SuperAdminCaseRecordController::class,'updatePlayBehaviour'])->name('students.special-students.play-behaviour.update');
    Route::post('students/special-students/family-information',[SuperAdminCaseRecordController::class,'addFamilyInformation'])->name('students.special-students.family-information.store');
    Route::delete('students/special-students/family-information/{familyInformation}',[SuperAdminCaseRecordController::class,'destroyFamilyInformation'])->name('students.special-students.family-information.destroy');
    Route::put('students/special-students/family-information/{familyInformation}',[SuperAdminCaseRecordController::class,'updateFamilyInformation'])->name('students.special-students.family-information.update');
    Route::put('students/special-students/family-history/{familyHistory}',[SuperAdminCaseRecordController::class,'updateFamilyHistory'])->name('students.special-students.family-history.update');
    Route::put('students/special-students/social-environment/{socialEnvironment}',[SuperAdminCaseRecordController::class,'updateSocialEnvironment'])->name('students.special-students.social-environment.update');
    Route::put('students/special-students/home-environment/{homeEnvironment}',[SuperAdminCaseRecordController::class,'updateHomeEnvironment'])->name('students.special-students.home-environment.update');
    Route::put('students/special-students/social-worker-impression/{socialWorkerImpression}',[SuperAdminCaseRecordController::class,'updateSocialWorkerImpression'])->name('students.special-students.social-worker-impression.update');
    Route::put('students/special-students/medical-examination/{medicalExamination}',[SuperAdminCaseRecordController::class,'updateMedicalExamination'])->name('students.special-students.medical-examination.update');
    Route::put('students/special-students/psychological-assessment/{psychologicalAssessment}',[SuperAdminCaseRecordController::class,'updatePsychologicalAssessment'])->name('students.special-students.psychological-assessment.update');
    Route::put('students/special-students/occupational-assessment/{occupationalAssessment}',[SuperAdminCaseRecordController::class,'updateOccupationalAssessment'])->name('students.special-students.occupational-assessment.update');

//inclusive student management

    Route::get('students/inclusive-students',[SuperAdminInclusiveStudentController::class,'index'])->name('students.inclusive-students.index');

    Route::get('students/inclusive-students/create',[SuperAdminInclusiveStudentController::class,'create'])->name('students.inclusive-students.create');
    Route::post('students/inclusive-students/store',[SuperAdminInclusiveStudentController::class,'store'])->name('students.inclusive-students.store');

    Route::get('students/inclusive-students/complete-create/{userId}',[SuperAdminInclusiveStudentController::class,'completeCreate'])->name('students.inclusive-students.complete-create');
    Route::post('students/inclusive-students/complete-store',[SuperAdminInclusiveStudentController::class,'completeStore'])->name('students.inclusive-students.complete-store');

    Route::get('students/inclusive-students/{inclusiveStudent}',[SuperAdminInclusiveStudentController::class,'show'])->name('students.inclusive-students.show');

    Route::get('students/inclusive-students/{inclusiveStudent}/generate-pdf',[SuperAdminPDFController::class,'generateInclusiveStudentPDF'])->name('students.inclusive-students.generate-pdf');

    Route::get('students/inclusive-students/{inclusiveStudent}/edit',[SuperAdminInclusiveStudentController::class,'edit'])->name('students.inclusive-students.edit');
    Route::put('students/inclusive-students/{inclusiveStudent}',[SuperAdminInclusiveStudentController::class,'update'])->name('students.inclusive-students.update');

    Route::delete('students/inclusive-students/{user}',[SuperAdminInclusiveStudentController::class,'destroy'])->name('students.inclusive-students.destroy');


//training student management

    Route::get('students/training-students',[SuperAdminTrainingStudentController::class,'index'])->name('students.training-students.index');

    Route::get('students/training-students/create',[SuperAdminTrainingStudentController::class,'create'])->name('students.training-students.create');
    Route::post('students/training-students/store',[SuperAdminTrainingStudentController::class,'store'])->name('students.training-students.store');

    Route::get('students/training-students/complete-create/{userId}',[SuperAdminTrainingStudentController::class,'completeCreate'])->name('students.training-students.complete-create');
    Route::post('students/training-students/complete-store',[SuperAdminTrainingStudentController::class,'completeStore'])->name('students.training-students.complete-store');

    Route::get('students/training-students/{trainingStudent}',[SuperAdminTrainingStudentController::class,'show'])->name('students.training-students.show');

    Route::get('students/training-students/{trainingStudent}/generate-pdf',[SuperAdminPDFController::class,'generateTrainingStudentPDF'])->name('students.training-students.generate-pdf');

    Route::get('students/training-students/{trainingStudent}/edit',[SuperAdminTrainingStudentController::class,'edit'])->name('students.training-students.edit');
    Route::put('students/training-students/{trainingStudent}',[SuperAdminTrainingStudentController::class,'update'])->name('students.training-students.update');


    Route::delete('students/training-students/{user}',[SuperAdminTrainingStudentController::class,'destroy'])->name('students.training-students.destroy');



//vocational student management

    Route::get('students/vocational-students',[SuperAdminVocationalStudentController::class,'index'])->name('students.vocational-students.index');

    Route::get('students/vocational-students/create',[SuperAdminVocationalStudentController::class,'create'])->name('students.vocational-students.create');
    Route::post('students/vocational-students/store',[SuperAdminVocationalStudentController::class,'store'])->name('students.vocational-students.store');

    Route::get('students/vocational-students/complete-create/{userId}',[SuperAdminVocationalStudentController::class,'completeCreate'])->name('students.vocational-students.complete-create');
    Route::post('students/vocational-students/complete-store',[SuperAdminVocationalStudentController::class,'completeStore'])->name('students.vocational-students.complete-store');

    Route::get('students/vocational-students/{vocationalStudent}',[SuperAdminVocationalStudentController::class,'show'])->name('students.vocational-students.show');

    Route::get('students/vocational-students/{vocationalStudent}/generate-pdf',[SuperAdminPDFController::class,'generateVocationalStudentPDF'])->name('students.vocational-students.generate-pdf');

    Route::get('students/vocational-students/{vocationalStudent}/edit',[SuperAdminVocationalStudentController::class,'edit'])->name('students.vocational-students.edit');
    Route::put('students/vocational-students/{vocationalStudent}',[SuperAdminVocationalStudentController::class,'update'])->name('students.vocational-students.update');

    Route::delete('students/vocational-students/{user}',[SuperAdminVocationalStudentController::class,'destroy'])->name('students.vocational-students.destroy');


    //EI registration management

    Route::get('early-intervention-registrations',[SuperAdminEarlyInterventionRegistrationController::class,'index'])->name('early-intervention-registrations.index');

    Route::get('early-intervention-registrations/create',[SuperAdminEarlyInterventionRegistrationController::class,'create'])->name('early-intervention-registrations.create');
    Route::post('early-intervention-registrations/store',[SuperAdminEarlyInterventionRegistrationController::class,'store'])->name('early-intervention-registrations.store');

    Route::get('early-intervention-registrations/{eIRegistration}',[SuperAdminEarlyInterventionRegistrationController::class,'show'])->name('early-intervention-registrations.show');

    Route::get('EI-registrations/{eIRegistration}/generate-pdf',[SuperAdminPDFController::class,'generateEIRegistrationPDF'])->name('EI-registrations.generate-pdf');

    Route::get('early-intervention-registrations/{eIRegistration}/edit',[SuperAdminEarlyInterventionRegistrationController::class,'edit'])->name('early-intervention-registrations.edit');
    Route::put('early-intervention-registrations/{eIRegistration}',[SuperAdminEarlyInterventionRegistrationController::class,'update'])->name('early-intervention-registrations.update');

    Route::delete('early-intervention-registrations/{eIRegistration}',[SuperAdminEarlyInterventionRegistrationController::class,'destroy'])->name('early-intervention-registrations.destroy');



//student class management

    Route::get('student-classes',[SuperAdminStudentClassController::class,'index'])->name('student-classes.index');
    Route::post('student-classes/store',[SuperAdminStudentClassController::class,'store'])->name('student-classes.store');
    Route::put('student-classes/{studentClass}',[SuperAdminStudentClassController::class,'update'])->name('student-classes.update');
    Route::delete('student-classes/{studentClass}',[SuperAdminStudentClassController::class,'destroy'])->name('student-classes.destroy');

//class section management

    Route::get('student-classes/{studentClassId}/class-sections',[SuperAdminClassSectionController::class,'index'])->name('student-classes.class-sections.index');
    Route::post('student-classes/class-sections/store',[SuperAdminClassSectionController::class,'store'])->name('student-classes.class-sections.store');
    Route::put('student-classes/class-sections/{classSection}',[SuperAdminClassSectionController::class,'update'])->name('student-classes.class-sections.update');
    Route::delete('student-classes/class-sections/{classSection}',[SuperAdminClassSectionController::class,'destroy'])->name('student-classes.class-sections.destroy');


//get class section based on student class id
    Route::get('get-class-sections',[SuperAdminClassSectionController::class,'getClassSections'])->name('get-class-sections');


//branch management
    Route::resource('branches', SuperAdminBranchController::class);

//select Branch
    Route::post('select-branch',[SuperAdminBranchController::class,'selectbranch'])->name('select-branch');


//special student activity master route
    Route::get('activity-master/special-student-activity-master',[SuperAdminSpecialStudentActivityMasterController::class,'index'])->name('activity-master.special-student-activity-master.index');
    Route::post('activity-master/special-student-activity-master',[SuperAdminSpecialStudentActivityMasterController::class,'store'])->name('activity-master.special-student-activity-master.store');
    Route::put('activity-master/special-student-activity-master/{specialStudentActivityMaster}',[SuperAdminSpecialStudentActivityMasterController::class,'update'])->name('activity-master.special-student-activity-master.update');
    Route::delete('activity-master/special-student-activity-master/{specialStudentActivityMaster}',[SuperAdminSpecialStudentActivityMasterController::class,'destroy'])->name('activity-master.special-student-activity-master.destroy');

//vocational student activity master route
    Route::get('activity-master/vocational-student-activity-master',[SuperAdminVocationalStudentActivityMasterController::class,'index'])->name('activity-master.vocational-student-activity-master.index');
    Route::post('activity-master/vocational-student-activity-master',[SuperAdminVocationalStudentActivityMasterController::class,'store'])->name('activity-master.vocational-student-activity-master.store');
    Route::put('activity-master/vocational-student-activity-master/{vocationalStudentActivityMaster}',[SuperAdminVocationalStudentActivityMasterController::class,'update'])->name('activity-master.vocational-student-activity-master.update');
    Route::delete('activity-master/vocational-student-activity-master/{vocationalStudentActivityMaster}',[SuperAdminVocationalStudentActivityMasterController::class,'destroy'])->name('activity-master.vocational-student-activity-master.destroy');



});







//admin routes
Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    
    Route::get('home',[AdminController::class,'index'])->name('home');

    // fullcalendar 
    Route::get('fullcalendar', [FullCalendarController::class, 'index']);
    Route::post('fullcalendarAjax', [FullCalendarController::class, 'ajax']);

     //faculty management

     Route::get('faculties/create',[AdminFacultyController::class,'create'])->name('faculties.create');
     Route::post('faculties/store',[AdminFacultyController::class,'store'])->name('faculties.store');
        
     Route::get('faculties/complete-create/{userId}',[AdminFacultyController::class,'completeCreate'])->name('faculties.complete-create');
     Route::post('faculties/complete-store',[AdminFacultyController::class,'completeStore'])->name('faculties.complete-store');
     
     Route::get('faculties',[AdminFacultyController::class,'index'])->name('faculties.index');
 
     Route::get('faculties/{faculty}',[AdminFacultyController::class,'show'])->name('faculties.show');
 
     Route::get('faculties/{faculty}/generate-pdf',[AdminPDFController::class,'generateFacultyPDF'])->name('faculties.generate-pdf');


     Route::delete(' faculties/{user}',[AdminFacultyController::class,'destroy'])->name('faculties.destroy');
 
     Route::get('faculties/{faculty}/edit',[AdminFacultyController::class,'edit'])->name('faculties.edit');
     Route::put(' faculties/{faculty}',[AdminFacultyController::class,'update'])->name('faculties.update');
 
     Route::get('faculties/{faculty}/edit-role',[AdminFacultyController::class,'editRole'])->name('faculties.edit-role');
     Route::put('faculties/{faculty}/update-role',[AdminFacultyController::class,'updateRole'])->name('faculties.update-role');
    
    
         //student managment
//special students management
    Route::get('students/special-students/create',[AdminSpecialStudentController::class,'create'])->name('students.special-students.create');
    Route::post('students/special-students/store',[AdminSpecialStudentController::class,'store'])->name('students.special-students.store');

    Route::get('students/special-students/complete-create/{userId}',[AdminSpecialStudentController::class,'completeCreate'])->name('students.special-students.complete-create');
    Route::post('students/special-students/complete-store',[AdminSpecialStudentController::class,'completeStore'])->name('students.special-students.complete-store');

    Route::get('students/special-students',[AdminSpecialStudentController::class,'index'])->name('students.special-students.index');

    Route::get('students/special-students/{specialStudent}',[AdminSpecialStudentController::class,'show'])->name('students.special-students.show');

    Route::post('students/special-students/{specialStudent}/generate-pdf',[AdminPDFController::class,'generateSpecialStudentPDF'])->name('students.special-students.generate-pdf');

    Route::get('students/special-students/{specialStudent}/edit',[AdminSpecialStudentController::class,'edit'])->name('students.special-students.edit');
    Route::put('students/special-students/{specialStudent}',[AdminSpecialStudentController::class,'update'])->name('students.special-students.update');

    Route::delete('students/special-students/{user}',[AdminSpecialStudentController::class,'destroy'])->name('students.special-students.destroy');

        //case record management of specialstudent
        Route::put('students/special-students/prenatal-record/{prenatalRecord}',[AdminCaseRecordController::class,'updatePrenatalRecord'])->name('students.special-students.prenatal-record.update');
        Route::put('students/special-students/natal-record/{natalRecord}',[AdminCaseRecordController::class,'updateNatalRecord'])->name('students.special-students.natal-record.update');
        Route::put('students/special-students/neonatal-record/{neonatalRecord}',[AdminCaseRecordController::class,'updateNeonatalRecord'])->name('students.special-students.neonatal-record.update');
        Route::put('students/special-students/postnatal-record/{postnatalRecord}',[AdminCaseRecordController::class,'updatePostnatalRecord'])->name('students.special-students.postnatal-record.update');
        Route::put('students/special-students/immunization-record/{immunizationRecord}',[AdminCaseRecordController::class,'updateImmunizationRecord'])->name('students.special-students.immunization-record.update');
        Route::put('students/special-students/developmental-milestone/{developmentalMilestone}',[AdminCaseRecordController::class,'updateDevelopmentalMilestone'])->name('students.special-students.developmental-milestone.update');
        Route::put('students/special-students/school-history/{schoolHistory}',[AdminCaseRecordController::class,'updateSchoolHistory'])->name('students.special-students.school-history.update');
        Route::put('students/special-students/play-behaviour/{playBehaviour}',[AdminCaseRecordController::class,'updatePlayBehaviour'])->name('students.special-students.play-behaviour.update');
        Route::post('students/special-students/family-information',[AdminCaseRecordController::class,'addFamilyInformation'])->name('students.special-students.family-information.store');
        Route::delete('students/special-students/family-information/{familyInformation}',[AdminCaseRecordController::class,'destroyFamilyInformation'])->name('students.special-students.family-information.destroy');
        Route::put('students/special-students/family-information/{familyInformation}',[AdminCaseRecordController::class,'updateFamilyInformation'])->name('students.special-students.family-information.update');
        Route::put('students/special-students/family-history/{familyHistory}',[AdminCaseRecordController::class,'updateFamilyHistory'])->name('students.special-students.family-history.update');
        Route::put('students/special-students/social-environment/{socialEnvironment}',[AdminCaseRecordController::class,'updateSocialEnvironment'])->name('students.special-students.social-environment.update');
        Route::put('students/special-students/home-environment/{homeEnvironment}',[AdminCaseRecordController::class,'updateHomeEnvironment'])->name('students.special-students.home-environment.update');
        Route::put('students/special-students/social-worker-impression/{socialWorkerImpression}',[AdminCaseRecordController::class,'updateSocialWorkerImpression'])->name('students.special-students.social-worker-impression.update');
        Route::put('students/special-students/medical-examination/{medicalExamination}',[AdminCaseRecordController::class,'updateMedicalExamination'])->name('students.special-students.medical-examination.update');
        Route::put('students/special-students/psychological-assessment/{psychologicalAssessment}',[AdminCaseRecordController::class,'updatePsychologicalAssessment'])->name('students.special-students.psychological-assessment.update');
        Route::put('students/special-students/occupational-assessment/{occupationalAssessment}',[AdminCaseRecordController::class,'updateOccupationalAssessment'])->name('students.special-students.occupational-assessment.update');
    


//inclusive student management

    Route::get('students/inclusive-students',[AdminInclusiveStudentController::class,'index'])->name('students.inclusive-students.index');

    Route::get('students/inclusive-students/create',[AdminInclusiveStudentController::class,'create'])->name('students.inclusive-students.create');
    Route::post('students/inclusive-students/store',[AdminInclusiveStudentController::class,'store'])->name('students.inclusive-students.store');

    Route::get('students/inclusive-students/complete-create/{userId}',[AdminInclusiveStudentController::class,'completeCreate'])->name('students.inclusive-students.complete-create');
    Route::post('students/inclusive-students/complete-store',[AdminInclusiveStudentController::class,'completeStore'])->name('students.inclusive-students.complete-store');

    Route::get('students/inclusive-students/{inclusiveStudent}',[AdminInclusiveStudentController::class,'show'])->name('students.inclusive-students.show');

    Route::get('students/inclusive-students/{inclusiveStudent}/generate-pdf',[AdminPDFController::class,'generateInclusiveStudentPDF'])->name('students.inclusive-students.generate-pdf');


    Route::get('students/inclusive-students/{inclusiveStudent}/edit',[AdminInclusiveStudentController::class,'edit'])->name('students.inclusive-students.edit');
    Route::put('students/inclusive-students/{inclusiveStudent}',[AdminInclusiveStudentController::class,'update'])->name('students.inclusive-students.update');

    Route::delete('students/inclusive-students/{user}',[AdminInclusiveStudentController::class,'destroy'])->name('students.inclusive-students.destroy');


//training student management

    Route::get('students/training-students',[AdminTrainingStudentController::class,'index'])->name('students.training-students.index');

    Route::get('students/training-students/create',[AdminTrainingStudentController::class,'create'])->name('students.training-students.create');
    Route::post('students/training-students/store',[AdminTrainingStudentController::class,'store'])->name('students.training-students.store');

    Route::get('students/training-students/complete-create/{userId}',[AdminTrainingStudentController::class,'completeCreate'])->name('students.training-students.complete-create');
    Route::post('students/training-students/complete-store',[AdminTrainingStudentController::class,'completeStore'])->name('students.training-students.complete-store');

    Route::get('students/training-students/{trainingStudent}',[AdminTrainingStudentController::class,'show'])->name('students.training-students.show');

    Route::get('students/training-students/{trainingStudent}/generate-pdf',[AdminPDFController::class,'generateTrainingStudentPDF'])->name('students.training-students.generate-pdf');


    Route::get('students/training-students/{trainingStudent}/edit',[AdminTrainingStudentController::class,'edit'])->name('students.training-students.edit');
    Route::put('students/training-students/{trainingStudent}',[AdminTrainingStudentController::class,'update'])->name('students.training-students.update');

    Route::delete('students/training-students/{user}',[AdminTrainingStudentController::class,'destroy'])->name('students.training-students.destroy');


    //vocational student management

    Route::get('students/vocational-students',[AdminVocationalStudentController::class,'index'])->name('students.vocational-students.index');

    Route::get('students/vocational-students/create',[AdminVocationalStudentController::class,'create'])->name('students.vocational-students.create');
    Route::post('students/vocational-students/store',[AdminVocationalStudentController::class,'store'])->name('students.vocational-students.store');

    Route::get('students/vocational-students/complete-create/{userId}',[AdminVocationalStudentController::class,'completeCreate'])->name('students.vocational-students.complete-create');
    Route::post('students/vocational-students/complete-store',[AdminVocationalStudentController::class,'completeStore'])->name('students.vocational-students.complete-store');

    Route::get('students/vocational-students/{vocationalStudent}',[AdminVocationalStudentController::class,'show'])->name('students.vocational-students.show');

    Route::get('students/vocational-students/{vocationalStudent}/generate-pdf',[AdminPDFController::class,'generateVocationalStudentPDF'])->name('students.vocational-students.generate-pdf');


    Route::get('students/vocational-students/{vocationalStudent}/edit',[AdminVocationalStudentController::class,'edit'])->name('students.vocational-students.edit');
    Route::put('students/vocational-students/{vocationalStudent}',[AdminVocationalStudentController::class,'update'])->name('students.vocational-students.update');

    Route::delete('students/vocational-students/{user}',[AdminVocationalStudentController::class,'destroy'])->name('students.vocational-students.destroy');

    //EI registration management

    Route::get('early-intervention-registrations',[AdminEarlyInterventionRegistrationController::class,'index'])->name('early-intervention-registrations.index');

    Route::get('early-intervention-registrations/create',[AdminEarlyInterventionRegistrationController::class,'create'])->name('early-intervention-registrations.create');
    Route::post('early-intervention-registrations/store',[AdminEarlyInterventionRegistrationController::class,'store'])->name('early-intervention-registrations.store');

    Route::get('early-intervention-registrations/{eIRegistration}',[AdminEarlyInterventionRegistrationController::class,'show'])->name('early-intervention-registrations.show');

    Route::get('EI-registrations/{eIRegistration}/generate-pdf',[AdminPDFController::class,'generateEIRegistrationPDF'])->name('EI-registrations.generate-pdf');


    Route::get('early-intervention-registrations/{eIRegistration}/edit',[AdminEarlyInterventionRegistrationController::class,'edit'])->name('early-intervention-registrations.edit');
    Route::put('early-intervention-registrations/{eIRegistration}',[AdminEarlyInterventionRegistrationController::class,'update'])->name('early-intervention-registrations.update');

    Route::delete('early-intervention-registrations/{eIRegistration}',[AdminEarlyInterventionRegistrationController::class,'destroy'])->name('early-intervention-registrations.destroy');


//student class management

    Route::get('student-classes',[AdminStudentClassController::class,'index'])->name('student-classes.index');
    Route::post('student-classes/store',[AdminStudentClassController::class,'store'])->name('student-classes.store');
    Route::put('student-classes/{studentClass}',[AdminStudentClassController::class,'update'])->name('student-classes.update');
    Route::delete('student-classes/{studentClass}',[AdminStudentClassController::class,'destroy'])->name('student-classes.destroy');

//class section management

    Route::get('student-classes/{studentClassId}/class-sections',[AdminClassSectionController::class,'index'])->name('student-classes.class-sections.index');
    Route::post('student-classes/class-sections/store',[AdminClassSectionController::class,'store'])->name('student-classes.class-sections.store');
    Route::put('student-classes/class-sections/{classSection}',[AdminClassSectionController::class,'update'])->name('student-classes.class-sections.update');
    Route::delete('student-classes/class-sections/{classSection}',[AdminClassSectionController::class,'destroy'])->name('student-classes.class-sections.destroy');


//get class section based on student class id
Route::get('get-class-sections',[AdminClassSectionController::class,'getClassSections'])->name('get-class-sections');



});







//teacher routes
Route::group(['prefix'=>'teacher', 'as' => 'teacher.', 'middleware'=>['isTeacher','auth','PreventBackHistory']], function(){
    
    Route::get('home',[TeacherController::class,'index'])->name('home');
     
    // fullcalendar 
    Route::get('fullcalendar', [FullCalendarController::class, 'index']);
    Route::post('fullcalendarAjax', [FullCalendarController::class, 'ajax']);

    
        //student managment
//special students management
    Route::get('students/special-students/create',[TeacherSpecialStudentController::class,'create'])->name('students.special-students.create');
    Route::post('students/special-students/store',[TeacherSpecialStudentController::class,'store'])->name('students.special-students.store');

    Route::get('students/special-students/complete-create/{userId}',[TeacherSpecialStudentController::class,'completeCreate'])->name('students.special-students.complete-create');
    Route::post('students/special-students/complete-store',[TeacherSpecialStudentController::class,'completeStore'])->name('students.special-students.complete-store');

    Route::get('students/special-students',[TeacherSpecialStudentController::class,'index'])->name('students.special-students.index');

    Route::get('students/special-students/{specialStudent}',[TeacherSpecialStudentController::class,'show'])->name('students.special-students.show');

    Route::post('students/special-students/{specialStudent}/generate-pdf',[TeacherPDFController::class,'generateSpecialStudentPDF'])->name('students.special-students.generate-pdf');


    Route::get('students/special-students/{specialStudent}/edit',[TeacherSpecialStudentController::class,'edit'])->name('students.special-students.edit');
    Route::put('students/special-students/{specialStudent}',[TeacherSpecialStudentController::class,'update'])->name('students.special-students.update');

    Route::delete('students/special-students/{user}',[TeacherSpecialStudentController::class,'destroy'])->name('students.special-students.destroy');

    //case record management of specialstudent
    Route::put('students/special-students/prenatal-record/{prenatalRecord}',[TeacherCaseRecordController::class,'updatePrenatalRecord'])->name('students.special-students.prenatal-record.update');
    Route::put('students/special-students/natal-record/{natalRecord}',[TeacherCaseRecordController::class,'updateNatalRecord'])->name('students.special-students.natal-record.update');
    Route::put('students/special-students/neonatal-record/{neonatalRecord}',[TeacherCaseRecordController::class,'updateNeonatalRecord'])->name('students.special-students.neonatal-record.update');
    Route::put('students/special-students/postnatal-record/{postnatalRecord}',[TeacherCaseRecordController::class,'updatePostnatalRecord'])->name('students.special-students.postnatal-record.update');
    Route::put('students/special-students/immunization-record/{immunizationRecord}',[TeacherCaseRecordController::class,'updateImmunizationRecord'])->name('students.special-students.immunization-record.update');
    Route::put('students/special-students/developmental-milestone/{developmentalMilestone}',[TeacherCaseRecordController::class,'updateDevelopmentalMilestone'])->name('students.special-students.developmental-milestone.update');
    Route::put('students/special-students/school-history/{schoolHistory}',[TeacherCaseRecordController::class,'updateSchoolHistory'])->name('students.special-students.school-history.update');
    Route::put('students/special-students/play-behaviour/{playBehaviour}',[TeacherCaseRecordController::class,'updatePlayBehaviour'])->name('students.special-students.play-behaviour.update');
    Route::post('students/special-students/family-information',[TeacherCaseRecordController::class,'addFamilyInformation'])->name('students.special-students.family-information.store');
    Route::delete('students/special-students/family-information/{familyInformation}',[TeacherCaseRecordController::class,'destroyFamilyInformation'])->name('students.special-students.family-information.destroy');
    Route::put('students/special-students/family-information/{familyInformation}',[TeacherCaseRecordController::class,'updateFamilyInformation'])->name('students.special-students.family-information.update');
    Route::put('students/special-students/family-history/{familyHistory}',[TeacherCaseRecordController::class,'updateFamilyHistory'])->name('students.special-students.family-history.update');
    Route::put('students/special-students/social-environment/{socialEnvironment}',[TeacherCaseRecordController::class,'updateSocialEnvironment'])->name('students.special-students.social-environment.update');
    Route::put('students/special-students/home-environment/{homeEnvironment}',[TeacherCaseRecordController::class,'updateHomeEnvironment'])->name('students.special-students.home-environment.update');
    Route::put('students/special-students/social-worker-impression/{socialWorkerImpression}',[TeacherCaseRecordController::class,'updateSocialWorkerImpression'])->name('students.special-students.social-worker-impression.update');
    Route::put('students/special-students/medical-examination/{medicalExamination}',[TeacherCaseRecordController::class,'updateMedicalExamination'])->name('students.special-students.medical-examination.update');
    Route::put('students/special-students/psychological-assessment/{psychologicalAssessment}',[TeacherCaseRecordController::class,'updatePsychologicalAssessment'])->name('students.special-students.psychological-assessment.update');
    Route::put('students/special-students/occupational-assessment/{occupationalAssessment}',[TeacherCaseRecordController::class,'updateOccupationalAssessment'])->name('students.special-students.occupational-assessment.update');


//inclusive student management

    Route::get('students/inclusive-students',[TeacherInclusiveStudentController::class,'index'])->name('students.inclusive-students.index');

    Route::get('students/inclusive-students/create',[TeacherInclusiveStudentController::class,'create'])->name('students.inclusive-students.create');
    Route::post('students/inclusive-students/store',[TeacherInclusiveStudentController::class,'store'])->name('students.inclusive-students.store');

    Route::get('students/inclusive-students/complete-create/{userId}',[TeacherInclusiveStudentController::class,'completeCreate'])->name('students.inclusive-students.complete-create');
    Route::post('students/inclusive-students/complete-store',[TeacherInclusiveStudentController::class,'completeStore'])->name('students.inclusive-students.complete-store');

    Route::get('students/inclusive-students/{inclusiveStudent}',[TeacherInclusiveStudentController::class,'show'])->name('students.inclusive-students.show');

    Route::get('students/inclusive-students/{inclusiveStudent}/generate-pdf',[TeacherPDFController::class,'generateInclusiveStudentPDF'])->name('students.inclusive-students.generate-pdf');


    Route::get('students/inclusive-students/{inclusiveStudent}/edit',[TeacherInclusiveStudentController::class,'edit'])->name('students.inclusive-students.edit');
    Route::put('students/inclusive-students/{inclusiveStudent}',[TeacherInclusiveStudentController::class,'update'])->name('students.inclusive-students.update');

    Route::delete('students/inclusive-students/{user}',[TeacherInclusiveStudentController::class,'destroy'])->name('students.inclusive-students.destroy');


//training student management

    Route::get('students/training-students',[TeacherTrainingStudentController::class,'index'])->name('students.training-students.index');

    Route::get('students/training-students/create',[TeacherTrainingStudentController::class,'create'])->name('students.training-students.create');
    Route::post('students/training-students/store',[TeacherTrainingStudentController::class,'store'])->name('students.training-students.store');

    Route::get('students/training-students/complete-create/{userId}',[TeacherTrainingStudentController::class,'completeCreate'])->name('students.training-students.complete-create');
    Route::post('students/training-students/complete-store',[TeacherTrainingStudentController::class,'completeStore'])->name('students.training-students.complete-store');

    Route::get('students/training-students/{trainingStudent}',[TeacherTrainingStudentController::class,'show'])->name('students.training-students.show');

    Route::get('students/training-students/{trainingStudent}/generate-pdf',[TeacherPDFController::class,'generateTrainingStudentPDF'])->name('students.training-students.generate-pdf');

    Route::get('students/training-students/{trainingStudent}/edit',[TeacherTrainingStudentController::class,'edit'])->name('students.training-students.edit');
    Route::put('students/training-students/{trainingStudent}',[TeacherTrainingStudentController::class,'update'])->name('students.training-students.update');


    Route::delete('students/training-students/{user}',[TeacherTrainingStudentController::class,'destroy'])->name('students.training-students.destroy');

//vocational student management

Route::get('students/vocational-students',[TeacherVocationalStudentController::class,'index'])->name('students.vocational-students.index');

Route::get('students/vocational-students/create',[TeacherVocationalStudentController::class,'create'])->name('students.vocational-students.create');
Route::post('students/vocational-students/store',[TeacherVocationalStudentController::class,'store'])->name('students.vocational-students.store');

Route::get('students/vocational-students/complete-create/{userId}',[TeacherVocationalStudentController::class,'completeCreate'])->name('students.vocational-students.complete-create');
Route::post('students/vocational-students/complete-store',[TeacherVocationalStudentController::class,'completeStore'])->name('students.vocational-students.complete-store');

Route::get('students/vocational-students/{vocationalStudent}',[TeacherVocationalStudentController::class,'show'])->name('students.vocational-students.show');

Route::get('students/vocational-students/{vocationalStudent}/generate-pdf',[TeacherPDFController::class,'generateVocationalStudentPDF'])->name('students.vocational-students.generate-pdf');

Route::get('students/vocational-students/{vocationalStudent}/edit',[TeacherVocationalStudentController::class,'edit'])->name('students.vocational-students.edit');
Route::put('students/vocational-students/{vocationalStudent}',[TeacherVocationalStudentController::class,'update'])->name('students.vocational-students.update');

Route::delete('students/vocational-students/{user}',[TeacherVocationalStudentController::class,'destroy'])->name('students.vocational-students.destroy');





//get class section based on student class id
Route::get('get-class-sections',[TeacherClassSectionController::class,'getClassSections'])->name('get-class-sections');




});


//special student routes
Route::group(['prefix'=>'special-student', 'as' => 'special-student.', 'middleware'=>['isSpecialStudent','auth','PreventBackHistory']], function(){
    
    Route::get('home',[SpecialStudentController::class,'index'])->name('home');

    // fullcalendar 
    Route::get('fullcalendar', [FullCalendarController::class, 'indexStudent']);
    
 


});


//inclusive student routes
Route::group(['prefix'=>'inclusive-student', 'as' => 'inclusive-student.', 'middleware'=>['isInclusiveStudent','auth','PreventBackHistory']], function(){
    
    Route::get('home',[InclusiveStudentController::class,'index'])->name('home');

     // fullcalendar 
     Route::get('fullcalendar', [FullCalendarController::class, 'indexStudent']);
    
 


});

//training student routes
Route::group(['prefix'=>'training-student', 'as' => 'training-student.', 'middleware'=>['isTrainingStudent','auth','PreventBackHistory']], function(){
    
    Route::get('home',[TrainingStudentController::class,'index'])->name('home');
    
    // fullcalendar 
    Route::get('fullcalendar', [FullCalendarController::class, 'indexStudent']);
    
 


});

//vocational student routes
Route::group(['prefix'=>'vocational-student', 'as' => 'vocational-student.', 'middleware'=>['isVocationalStudent','auth','PreventBackHistory']], function(){
    
    Route::get('home',[VocationalStudentController::class,'index'])->name('home');
    
    // fullcalendar 
    Route::get('fullcalendar', [FullCalendarController::class, 'indexStudent']);
    
 


});


