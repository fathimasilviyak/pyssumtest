<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

class CaseRecordController extends Controller
{
    
    public function updatePrenatalRecord(Request $request, PrenatalRecord $prenatalRecord){

        $data = [
            'pregnancy' => $request->pregnancy,
            'abortion' => $request->abortion,
            'father_age' => $request->father_age,
            'mother_age' => $request->mother_age,
            'exposure' => $request->exposure,
            'rh_incompatibility' => $request->rh_incompatibility,
            'maternal_illness' => $request->maternal_illness,
            'foetal_movement' => $request->foetal_movement
        ];
        
        $prenatalRecord->update($data);
    
        return redirect()->back()->with('success','Prenatal Record Updated Successfully !'); 
    }

    public function updateNatalRecord(Request $request, NatalRecord $natalRecord){
        
        $data = [
            'labour' => $request->labour,
            'abnormal' => $request->abnormal,
            'delivery_term' => $request->delivery_term,
            'delivery_place' => $request->delivery_place,
            'delivery_type' => $request->delivery_type,
            'maternal' => $request->maternal,
            'birth_cry' => $request->birth_cry,
            'birth_weight' => $request->birth_weight,
            'disease' => $request->disease
        ];
        
        $natalRecord->update($data);
    
        return redirect()->back()->with('success','Natal Record Updated Successfully !'); 
    }

    public function updateNeonatalRecord(Request $request, NeonatalRecord $neonatalRecord){

        $data = [
            'baby_color' => $request->baby_color,
            'respiratory_distress' => $request->respiratory_distress,
            'baby_activity' => $request->baby_activity,
            'disease' => $request->disease,
            'feeding_by' => $request->feeding_by,
            'feeding_on' => $request->feeding_on,
            'any_other' => $request->any_other
        ];
        
        $neonatalRecord->update($data);
    
        return redirect()->back()->with('success','Neonatal Record Updated Successfully !'); 
    }

    public function updatePostnatalRecord(Request $request, PostnatalRecord $postnatalRecord){

        $data = [
            'exanthemata' => $request->exanthemata,
            'infection' => $request->infection,
            'injury' => $request->injury,
            'convulsions' => $request->convulsions,
            'jaundice' => $request->jaundice,
            'nutritional_disorders' => $request->nutritional_disorders,
            'any_other' => $request->any_other
        ];

        $postnatalRecord->update($data);
         
    
        return redirect()->back()->with('success','Postnatal Record Updated Successfully !'); 
    }
    

    public function updateImmunizationRecord(Request $request, ImmunizationRecord $immunizationRecord){

        $data = [
            'primary_polio' => $request->primary_polio,
            'primary_diptheria' => $request->primary_diptheria,
            'primary_pertusis' => $request->primary_pertusis,
            'primary_bcg' => $request->primary_bcg,
            'primary_measles' => $request->primary_measles,
            'primary_typhoid' => $request->primary_typhoid,
            'primary_cholera' => $request->primary_cholera,
            'booster_polio' => $request->booster_polio,
            'booster_diptheria' => $request->booster_diptheria,
            'booster_pertusis' => $request->booster_pertusis,
            'booster_bcg' => $request->booster_bcg,
            'booster_measles' => $request->booster_measles,
            'booster_typhoid' => $request->booster_typhoid,
            'booster_cholera' => $request->booster_cholera,
        ];

        $immunizationRecord->update($data);
         
    
        return redirect()->back()->with('success','Immunization Record Updated Successfully !'); 
    }

    public function updateDevelopmentalMilestone(Request $request, DevelopmentalMilestone $developmentalMilestone){

        $data = [
            'smiling' => $request->smiling,
            'head_control' => $request->head_control,
            'rolling_over' => $request->rolling_over,
            'sitting' => $request->sitting,
            'crawling' => $request->crawling,
            'standing' => $request->standing,
            'bowel_bladder_control' => $request->bowel_bladder_control,
            'walking' => $request->walking,
            'teething' => $request->teething,
            'babbling' => $request->babbling,
            'first_meaningful_word' => $request->first_meaningful_word,
            'small_phrases' => $request->small_phrases,
            'fluent_speech' => $request->fluent_speech 
        ];

        $developmentalMilestone->update($data);
         
    
        return redirect()->back()->with('success','Developmental Milestone Updated Successfully !'); 
    }

    public function updateSchoolHistory(Request $request, SchoolHistory $schoolHistory){

        $data = [
            'school_attended' => $request->school_attended,
            'school_nature' => $request->school_nature,
            'school_address' => $request->school_address,
            'date_joining' => $request->date_joining,
            'attendance' => $request->attendance,
            'irregularity_reason' => $request->irregularity_reason,
            'teacher_report' => $request->teacher_report,
        ];

        $schoolHistory->update($data);
         
    
        return redirect()->back()->with('success','School History Updated Successfully !'); 
    }
    public function updatePlayBehaviour(Request $request, PlayBehaviour $playBehaviour){

        $data = [
            'nature' => $request->nature,
            'plays_with' => $request->plays_with,
            'plays_govern_rules' => $request->plays_govern_rules,
            'prefers_play' => $request->prefers_play,
            'leisure_time_activities' => $request->leisure_time_activities
        ];

        $playBehaviour->update($data);
         
    
        return redirect()->back()->with('success','Play Behaviour Updated Successfully !'); 
    }

    public function addFamilyInformation(Request $request){

        FamilyInformation::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'education' => $request->education,
            'health' => $request->health,
            'relation' => $request->relation,
            'level_attachment' => $request->level_attachment,
            'special_student_id' => $request->special_student_id
        ]);
        
        return redirect()->back()->with('success','Family Information Added Successfully !'); 
        
    }
    public function updateFamilyInformation(Request $request, FamilyInformation $familyInformation){

        $familyInformation->update([
            'name' => $request->updt_name,
            'age' => $request->updt_age,
            'gender' => $request->updt_gender,
            'education' => $request->updt_education,
            'health' => $request->updt_health,
            'relation' => $request->updt_relation,
            'level_attachment' => $request->updt_level_attachment
        ]);
        
        return redirect()->back()->with('success','Family Information Updated Successfully !'); 
        
    }

    public function destroyFamilyInformation(FamilyInformation $familyInformation){
        $familyInformation->delete();
        return back()->with('success','Family Information Deleted Successfully !');  
    }

    public function updateFamilyHistory(Request $request, FamilyHistory $familyHistory){

        $familyHistory->update([
            'mental_retardation' => $request->mental_retardation,
            'illness' => $request->illness,
            'epilepsy' => $request->epilepsy,
            'any_other' => $request->any_other
        ]);
        
        return redirect()->back()->with('success','Family History Updated Successfully !'); 
        
    }

    public function updateSocialEnvironment(Request $request, SocialEnvironment $socialEnvironment){

        $socialEnvironment->update([
            'neighbourhood_interaction' => $request->neighbourhood_interaction,
            'family_support' => $request->family_support,
            'outside_visits' => $request->outside_visits,
            'socio_religious_acts' => $request->socio_religious_acts
        ]);
        
        return redirect()->back()->with('success','Social Environment Updated Successfully !'); 
        
    }
    public function updateHomeEnvironment(Request $request, HomeEnvironment $homeEnvironment){

        $homeEnvironment->update([
            'physical_space' => $request->physical_space,
            'accomodation_type' => $request->accomodation_type,
            'number_rooms' => $request->number_rooms,
            'personal_needs' => $request->personal_needs,
            'educational_needs' => $request->educational_needs,
            'activity' => $request->activity,
        ]);
        
        return redirect()->back()->with('success','Home Environment Updated Successfully !'); 
        
    }
    public function updateSocialWorkerImpression(Request $request, SocialWorkerImpression $socialWorkerImpression){

        $socialWorkerImpression->update([
            'remarks' => $request->remarks
        ]);
        
        return redirect()->back()->with('success','Social Workers Impression Updated Successfully !'); 
        
    }

    public function updateMedicalExamination(Request $request, MedicalExamination $medicalExamination){

        $medicalExamination->update([
            'observed_by' => $request->observed_by,
            'general_appearance' => $request->general_appearance,
            'sensory_motor_disabilities' => $request->sensory_motor_disabilities,
            'clinical_impressions' => $request->clinical_impressions,
            'provisonal_diagnosis' => $request->provisonal_diagnosis,
            'recommendations' => $request->recommendations
        ]);
        
        return redirect()->back()->with('success','Medical Examination Updated Successfully !'); 
        
    }

    public function updatePsychologicalAssessment(Request $request, PsychologicalAssessment $psychologicalAssessment){

        $psychologicalAssessment->update([
            'tests_administered' => $request->tests_administered,
            'general_test_behaviour' => $request->general_test_behaviour,
            'test_findings' => $request->test_findings,
            'recommendations' => $request->recommendations,
        ]);
        
        return redirect()->back()->with('success','Psychological Assessment Updated Successfully !'); 
        
    }

    public function updateOccupationalAssessment(Request $request, OccupationalAssessment $occupationalAssessment){

        $occupationalAssessment->update([
            'findings' => $request->findings,
            'recommendations' => $request->recommendations,
        ]);
        
        return redirect()->back()->with('success','Occupational/Physio Therapy Assessment Updated Successfully !'); 
        
    }


}
