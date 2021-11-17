<!DOCTYPE html>
<html>
<head>
    <title>Special Student</title>
    <meta charset="utf-8">
    <style>
.dataName{
    font-weight: bold;
}
table {
  width: 100%;
  border:1;
  padding:10;
  border-spacing: 10px;
}
div{
  padding-left: 20px;
}
p{
    padding-left: 20px;
}

    </style>
</head>
<body>
    <h1>Special Student Details</h1>
    <h3><b><u>Identification Data</u></b></h3>
<br>
@php
    $default = "not available";

    $dob = isset($specialStudent->dob) ? \Carbon\Carbon::parse($specialStudent->dob)->format('d/m/Y') : $default;
    $date_register = isset($specialStudent->date_register) ? \Carbon\Carbon::parse($specialStudent->date_register)->format('d/m/Y') : $default;
    
@endphp


<table id="example1" class="table">
    <tr>
        <td><img src="{{ public_path('images/student/special-student/'.$specialStudent->photo) }}" width="100" height="100"></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>             
    <tr>
        <td class="dataName">Username:</td>
        <td>{{ $specialStudent->user->user_name }}</td>
        <td class="dataName">Register Number:</td>
        <td>{{ $specialStudent->register_number ?? $default; }}</td>
    </tr>   
    <tr>
        <td class="dataName">Bill Number:</td>
        <td>{{ $specialStudent->bill_number ?? $default; }}</td>
        <td class="dataName">Register Date:</td>
        <td>{{ $date_register ?? $default; }}</td>
    </tr> 
    <tr>
        <td class="dataName">Name:</td>
        <td>{{ $specialStudent->name ?? $default; }}</td>
        <td class="dataName">Reffered By:</td>
        <td>{{ $specialStudent->reffered_by ?? $default; }}</td>
    </tr> 
    <tr>
        <td class="dataName">Gender:</td>
        <td>{{ $specialStudent->gender ?? $default; }}</td>
        <td class="dataName">DOB:</td>
        <td>{{ $dob }}</td>
    </tr> 
    <tr>
        <td class="dataName">Age:</td>
        <td>{{ $specialStudent->age ?? $default; }}</td>
        <td class="dataName">Language Spoken:</td>
        <td>{{ $specialStudent->language_spoken ?? $default; }}</td>
    </tr> 
    <tr>
        <td class="dataName">Father Name:</td>
        <td>{{ $specialStudent->father_name ?? $default; }}</td>
        <td class="dataName">Address:</td>
        <td>{{ $specialStudent->address ?? $default; }}</td>
    </tr> 
    <tr>
        <td class="dataName">Occupation:</td>
        <td>{{ $specialStudent->occupation ?? $default; }}</td>
        <td class="dataName">Family Status:</td>
        <td>{{ $specialStudent->family_status ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Living Area:</td>
        <td>{{ $specialStudent->living_area ?? $default; }}</td>
        <td class="dataName">Religion:</td>
        <td>{{ $specialStudent->religion ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Caste:</td>
        <td>{{ $specialStudent->caste ?? $default; }}</td>
        <td class="dataName">Informant Name:</td>
        <td>{{ $specialStudent->informant_name ?? $default; }}</td>
    </tr> 
    <tr>
        <td class="dataName">Informant Relationship:</td>
        <td>{{ $specialStudent->informant_relationship ?? $default; }}</td>
        <td class="dataName">Contact Duration:</td>
        <td>{{ $specialStudent->contact_duration ?? $default; }}</td>
    </tr> 
     <tr>
        <td class="dataName">Class:</td>
        <td>{{ $specialStudent->studentClass->name ?? $default; }}</td>
        <td class="dataName">Section:</td>
        <td>@if($specialStudent->classSection){{ $specialStudent->classSection->name }} @else {{ $default }} @endif</td>
    </tr>
    <tr>
        <td class="dataName">City:</td>
        <td>{{ $specialStudent->city ?? $default; }}</td>
        <td class="dataName">Contact Number:</td>
        <td>{{ $specialStudent->contact_number ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">tfeec:</td>
        <td>{{ $specialStudent->tfeec ?? $default; }}</td>
        <td class="dataName">tcno:</td>
        <td>{{ $specialStudent->tcno ?? $default; }}</td>
    </tr>    
    <tr>
        <td class="dataName">Academic Session:</td>
        <td>{{ $specialStudent->academic_session ?? $default; }}</td>
        <td class="dataName">Branch:</td>
        <td>{{ $specialStudent->user->branch->name }} (location: {{ $specialStudent->user->branch->location }})</td>
    </tr>     
</table>
<p class="dataName"><u>Present Complaint</u></p>
<div style="white-space: pre-line;">
{{ $specialStudent->present_complaint ?? $default; }}
</div>
<p class="dataName"><u>Pinv</u></p>
<div style="white-space: pre-line;">
{{ $specialStudent->pinv ?? $default; }}
</div>

@if(isset($selectedData['developmental_history']))
<br>
<h3><b><u>Developmental History</u></b></h3>
<h4><u>Prenatal Record<u></h4>
<table>
    <tr>
        <td class="dataName">Pregnancy:</td>
        <td>{{ $specialStudent->prenatalRecord->pregnancy ?? $default; }}</td>
        <td class="dataName">Abortion:</td>
        <td>{{ $specialStudent->prenatalRecord->abortion ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Father's age at conception:</td>
        <td>{{$specialStudent->prenatalRecord->father_age ?? $default; }}</td>
        <td class="dataName">Mother's age at conception:</td>
        <td>{{$specialStudent->prenatalRecord->mother_age ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Exposure to X-ray/Drug Intake:</td>
        <td>{{ $specialStudent->prenatalRecord->exposure ?? $default; }}</td>
        <td class="dataName">RH--Incompatibility:</td>
        <td>{{ $specialStudent->prenatalRecord->rh_incompatibility ?? $default; }} </td>
    </tr>
    <tr>
        <td class="dataName">Maternal Illness:</td>
        <td>{{$specialStudent->prenatalRecord->maternal_illness ?? $default; }}</td>
        <td class="dataName">Foetal Movement:</td>
        <td>{{ $specialStudent->prenatalRecord->foetal_movement ?? $default;}} </td>
    </tr>

</table>
<br>
<h4><u>Natal Record<u></h4>
<table>
    <tr>
        <td class="dataName">Labour:</td>
        <td>{{ $specialStudent->natalRecord->labour ?? $default; }}</td>
        <td class="dataName">Abnormal:</td>
        <td>{{ $specialStudent->natalRecord->abnormal ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Delivery Term:</td>
        <td>{{ $specialStudent->natalRecord->delivery_term ?? $default; }}</td>
        <td class="dataName">Delivery Place:</td>
        <td>{{ $specialStudent->natalRecord->delivery_place ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Delivery Type:</td>
        <td>{{ $specialStudent->natalRecord->delivery_type ?? $default; }}</td>
        <td class="dataName">Maternal:</td>
        <td>{{ $specialStudent->natalRecord->maternal ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Birth Cry:</td>
        <td>{{ $specialStudent->natalRecord->birth_cry ?? $default; }}</td>
        <td class="dataName">Birth Weight:</td>
        <td>{{ $specialStudent->natalRecord->birth_weight ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Disease:</td>
        <td>{{ $specialStudent->natalRecord->disease ?? $default; }}</td>
    </tr>
</table>
<br>
<h4><u>Neonatal Record<u></h4>
<table>
    <tr>
        <td class="dataName">Baby Color:</td>
        <td>{{ $specialStudent->neonatalRecord->baby_color ?? $default; }}</td>
        <td class="dataName">Respiratory Distress:</td>
        <td>{{ $specialStudent->neonatalRecord->respiratory_distress ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Baby Activiy:</td>
        <td>{{ $specialStudent->neonatalRecord->baby_activity ?? $default; }}</td>
        <td class="dataName">Disease:</td>
        <td>{{ $specialStudent->neonatalRecord->disease ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Feeding BY:</td>
        <td>{{ $specialStudent->neonatalRecord->feeding_by ?? $default; }}</td>
        <td class="dataName">Feeding On:</td>
        <td>{{ $specialStudent->neonatalRecord->feeding_on ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Any Other:</td>
        <td>{{ $specialStudent->neonatalRecord->any_other ?? $default; }}</td>
    </tr>

</table>
<br>
<h4><u>Postnatal Record<u></h4>
<table>
    <tr>
        <td class="dataName">Exanthemata:</td>
        <td>{{ $specialStudent->postnatalRecord->exanthemata ?? $default; }}</td>
        <td class="dataName">Infection:</td>
        <td>{{ $specialStudent->postnatalRecord->infection ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Injury:</td>
        <td>{{ $specialStudent->postnatalRecord->injury ?? $default; }}</td>
        <td class="dataName">Convulsions:</td>
        <td>{{ $specialStudent->postnatalRecord->convulsions ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Jaundice:</td>
        <td>{{ $specialStudent->postnatalRecord->jaundice ?? $default; }}</td>
        <td class="dataName">Nutritional Disorders:</td>
        <td>{{ $specialStudent->postnatalRecord->nutritional_disorders ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Any Other:</td>
        <td>{{ $specialStudent->postnatalRecord->any_other ?? $default; }}</td>
    </tr>
</table>
<br>
<h4><u>Immunization Record<u></h4>
<table>
        <tr>
        <td></td>
        <td class="dataName">Primary</d>
        <td class="dataName">Booster</td>
        </tr>
        <tr>
            <td class="dataName">Polio:</td>
            <td>{{ $specialStudent->immunizationRecord->primary_polio ?? $default; }}</td>
            <td>{{ $specialStudent->immunizationRecord->booster_polio ?? $default; }}</td>
        </tr>
        <tr>
            <td class="dataName">Diptheria:</td>
            <td>{{ $specialStudent->immunizationRecord->primary_diptheria ?? $default; }}</td>
            <td>{{ $specialStudent->immunizationRecord->booster_diptheria ?? $default; }}</td>
        </tr>
        <tr>
            <td class="dataName">Pertusis:</td>
            <td>{{ $specialStudent->immunizationRecord->primary_pertusis ?? $default; }}</td>
            <td>{{ $specialStudent->immunizationRecord->booster_pertusis ?? $default; }}</td>
        </tr>
        <tr>
            <td class="dataName">BCG:</td>
            <td>{{ $specialStudent->immunizationRecord->primary_bcg ?? $default; }}</td>
            <td>{{ $specialStudent->immunizationRecord->booster_bcg ?? $default; }}</td>
        </tr>
        <tr>
            <td class="dataName">Measles:</td>
            <td>{{ $specialStudent->immunizationRecord->primary_measles ?? $default; }}</td>
            <td>{{ $specialStudent->immunizationRecord->booster_measles ?? $default; }}</td>
        </tr>
        <tr>
            <td class="dataName">Typhoid:</td>
            <td>{{ $specialStudent->immunizationRecord->primary_typhoid ?? $default; }}</td>
            <td>{{ $specialStudent->immunizationRecord->booster_typhoid ?? $default; }}</td>
        </tr>
        <tr>
            <td class="dataName">Cholera:</td>
            <td>{{ $specialStudent->immunizationRecord->primary_cholera ?? $default; }}</td>
            <td>{{ $specialStudent->immunizationRecord->booster_cholera ?? $default; }}</td>
        </tr>    
    </tbody>
</table>

<br>
<h4><u>Developmental Milestones<u></h4>
<table>
    <tr>
        <td class="dataName">Smiling(6 weeks):</td>
        <td>{{ $specialStudent->developmentalMilestone->smiling ?? $default; }}</td>
        <td class="dataName">Head Control(4 months):</td>
        <td>{{ $specialStudent->developmentalMilestone->head_control ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Rolling Over(5-7 months):</td>
        <td>{{ $specialStudent->developmentalMilestone->rolling_over ?? $default; }}</td>
        <td class="dataName">Sitting(6-7 months):</td>
        <td>{{ $specialStudent->developmentalMilestone->sitting ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Crawling(8-10 months):</td>
        <td>{{ $specialStudent->developmentalMilestone->crawling ?? $default; }}</td>
        <td class="dataName">Standing(11 months):</td>
        <td>{{ $specialStudent->developmentalMilestone->standing ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Bowel Bladder Control:</td>
        <td>{{ $specialStudent->developmentalMilestone->bowel_bladder_control ?? $default; }}</td>
        <td class="dataName">Walking(12-14 months):</td>
        <td>{{ $specialStudent->developmentalMilestone->walking ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Teething(4 to 6 at 1 year):</td>
        <td>{{ $specialStudent->developmentalMilestone->teething ?? $default; }}</td>
        <td class="dataName">Babbling(8 months):</td>
        <td>{{ $specialStudent->developmentalMilestone->babbling ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">First Meaningful Word(1 year):</td>
        <td>{{ $specialStudent->developmentalMilestone->first_meaningful_word ?? $default; }}</td>
        <td class="dataName">Small Phrases(2 years):</td>
        <td>{{ $specialStudent->developmentalMilestone->small_phrases ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Fluent Speech(3 years):</td>
        <td>{{ $specialStudent->developmentalMilestone->fluent_speech ?? $default; }}</td>
    </tr>

</table>
@endif
@if(isset($selectedData['school_history']))
<br>
<h3><u>School History<u></h3>
<table>
    <tr>
        <td class="dataName">Schoool Attended:</td>
        <td>{{ $specialStudent->schoolHistory->school_attended ?? $default; }}</td>
        <td class="dataName">Nature of School:</td>
        <td>{{ $specialStudent->schoolHistory->school_nature ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Address of School:</td>
        <td>{{ $specialStudent->schoolHistory->school_address ?? $default; }}</td>
        <td class="dataName">Date of Joining:</td>
        <td>{{ isset($specialStudent->schoolHistory->date_joining) ? \Carbon\Carbon::parse($specialStudent->schoolHistory->date_joining)->format('d/m/Y') : $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Attendance:</td>
        <td>{{ $specialStudent->schoolHistory->attendance ?? $default; }}</td>
        <td class="dataName">Reason for Irregularity:</td>
        <td>{{ $specialStudent->schoolHistory->irregularity_reason ?? $default; }}</td>
    </tr>
</table>
<p class="dataName">School Teachers Report:</p>
    <div style="white-space: pre-line;">
    {{ $specialStudent->schoolHistory->teacher_report ?? $default; }}
    </div>
@endif
@if(isset($selectedData['play_behaviour']))
<br>
<h3><u>Play Behaviour<u></h3>
<table>
    <tr>
        <td class="dataName">Nature:</td>
        <td>{{ $specialStudent->playBehaviour->nature ?? $default; }}</td>
        <td class="dataName">Plays With:</td>
        <td>{{ $specialStudent->playBehaviour->plays_with ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Plays Govern By Rules:</td>
        <td>{{ $specialStudent->playBehaviour->plays_govern_rules ?? $default; }}</td>
        <td class="dataName">Prefers to Play:</td>
        <td>{{ $specialStudent->playBehaviour->prefers_play ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Leisure Time Activities:</td>
        <td>{{ $specialStudent->playBehaviour->leisure_time_activities ?? $default; }}</td>
    </tr>
   
</table>
@endif
@if(isset($selectedData['family_details']))
<br>
<h3><u>Family Details<u></h3>
<h4><u>Family Information<u></h4>
<table>
    <tr>
        <td class="dataName">SNo:</td>
        <td class="dataName">Name</td>
        <td class="dataName">Age</td>
        <td class="dataName">Gender</td>
        <td class="dataName">Education</td>
        <td class="dataName">Health</td>
        <td class="dataName">Realtionship With Case</td>
        <td class="dataName">Level of Attachment</td>
    </tr>
            @php
            $s_no = 0;
            $default = "not available";
            @endphp
            @forelse ($specialStudent->familyInformations as $familyInformation) 
            @php ($s_no++)
            <tr>
                <td>{{ $s_no }}</td>
                <td>{{ $familyInformation->name ?? $default; }}</td>
                <td>{{ $familyInformation->age ?? $default; }}</td> 
                <td>{{ $familyInformation->gender ?? $default; }}</td>
                <td>{{ $familyInformation->education ?? $default; }}</td>
                <td>{{ $familyInformation->health ?? $default; }}</td> 
                <td>{{ $familyInformation->relation ?? $default; }}</td>
                <td>{{ $familyInformation->level_attachment ?? $default; }}</td>                   
            </tr>
            @empty
            <tr>
                <td colspan="8">No data Available!!</td>
            </tr>
            @endforelse  
</table>
<br>
<h4><u>Family History<u></h4>
<table>
    <tr>
        <td class="dataName">Mental Retardation:</td>
        <td>{{ $specialStudent->familyHistory->mental_retardation ?? $default; }}</td>
        <td class="dataName">Illness:</td>
        <td>{{ $specialStudent->familyHistory->illness ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Epilepsy:</td>
        <td>{{ $specialStudent->familyHistory->epilepsy ?? $default; }}</td>
        <td class="dataName">Any Other:</td>
        <td>{{ $specialStudent->familyHistory->any_other ?? $default; }}</td>
    </tr>
</table>
@endif
@if(isset($selectedData['social_environment']))
<br>
<h3><u>Social Environment<u></h3>
<table>
    <tr>
        <td class="dataName">Neighbourhood Interaction:</td>
        <td>{{ $specialStudent->socialEnvironment->neighbourhood_interaction ?? $default; }}</td>
        <td class="dataName">Extended Family Support:</td>
        <td>{{ $specialStudent->socialEnvironment->family_support ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Family's Outside Visits:</td>
        <td>{{ $specialStudent->socialEnvironment->outside_visits ?? $default; }}</td>
        <td class="dataName">Socio Religious Acts:</td>
        <td>{{ $specialStudent->socialEnvironment->socio_religious_acts ?? $default; }}</td>
    </tr>
</table>
@endif
@if(isset($selectedData['home_environment']))
<br>
<h3><u>Home Environment<u></h3>
<table>
    <tr>
        <td class="dataName">Physical Space Available:</td>
        <td>{{ $specialStudent->homeEnvironment->physical_space ?? $default; }}</td>
        <td class="dataName">Accomodation Type:</td>
        <td>{{ $specialStudent->homeEnvironment->accomodation_type ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Number of Rooms:</td>
        <td>{{ $specialStudent->homeEnvironment->number_rooms ?? $default; }}</td>
        <td class="dataName">Personal Needs of the Case:</td>
        <td>{{ $specialStudent->homeEnvironment->personal_needs ?? $default; }}</td>
    </tr>
    <tr>
        <td class="dataName">Educational Needs:</td>
        <td>{{ $specialStudent->homeEnvironment->educational_needs ?? $default; }}</td>
        <td class="dataName">Play and Leisure Time Activity:</td>
        <td>{{ $specialStudent->homeEnvironment->activity ?? $default; }}</td>
    </tr>
</table>
@endif
@if(isset($selectedData['social_worker_impression']))
<br>
<h3><u>Social Worker's Impressions<u></h3>
    <div style="white-space: pre-line;">
    {{ $specialStudent->socialWorkerImpression->remarks ?? $default; }}
    </div>
@endif
@if(isset($selectedData['medical_examination']))
<br>
<h3><u>Medical Examination Report(Observed By: {{ $specialStudent->medicalExamination->observed_by ?? ''; }} )<u></h3>
<p class="dataName"><u>Genaral Appearance</u></p>
<div style="white-space: pre-line;">
{{ $specialStudent->medicalExamination->general_appearance ?? $default; }}
</div>
<p class="dataName"><u>Sensory Motor Disabilities</u></p>
<div style=" white-space: pre-line;">
{{ $specialStudent->medicalExamination->sensory_motor_disabilities ?? $default; }}
</div>
<p class="dataName"><u>Clinical Impressions</u></p>
<div style="white-space:pre-line;">
{{ $specialStudent->medicalExamination->clinical_impressions ?? $default; }}
</div>
<p class="dataName"><u>Provisonal Diagnosis</u></p>
<div style="white-space:pre-line;">
{{ $specialStudent->medicalExamination->provisonal_diagnosis ?? $default; }}
</div>
<p class="dataName"><u>Recommendations</u></p>
<div style="white-space:pre-line;">
{{ $specialStudent->medicalExamination->recommendations ?? $default; }}
</div>
@endif
@if(isset($selectedData['psychological_assessment']))
<br>
<h3><u>PSYCHOLOGICAL ASSESSMENT<u></h3>
<p class="dataName"><u>Tests Administered</u></p>
<div style="white-space: pre-line;">
{{ $specialStudent->psychologicalAssessment->tests_administered ?? $default; }}
</div>
<p class="dataName"><u>General Test Behaviour</u></p>
<div style=" white-space: pre-line;">
{{ $specialStudent->psychologicalAssessment->general_test_behaviour ?? $default; }}
</div>
<p class="dataName"><u>Test Findings</u></p>
<div style="white-space:pre-line;">
{{ $specialStudent->psychologicalAssessment->test_findings ?? $default; }}
</div>
<p class="dataName"><u>Recommendations</u></p>
<div style="white-space:pre-line;">
{{ $specialStudent->psychologicalAssessment->recommendations ?? $default; }}
</div>
@endif
@if(isset($selectedData['occupational_assessment']))
<br>
<h3><u>OCCUPATIONAL/PHYSIO THERAPY ASSESSMENT<u></h3>
<p class="dataName"><u>Findings</u></p>
<div style="white-space: pre-line;">
{{ $specialStudent->occupationalAssessment->findings ?? $default; }}
</div>
<p class="dataName"><u>Recommendations</u></p>
<div style=" white-space: pre-line;">
{{ $specialStudent->occupationalAssessment->recommendations ?? $default; }}
</div>
@endif
</body>
</html>