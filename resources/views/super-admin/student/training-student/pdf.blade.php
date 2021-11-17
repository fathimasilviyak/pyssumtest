<!DOCTYPE html>
<html>
<head>
    <title>Training Student</title>
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
    <h1>Training Student Details</h1>
<br>
@php
    $default = "not available";
@endphp


<table id="example1" class="table">
    <tr>
        <td><img src="{{ public_path('images/student/training-student/'.$trainingStudent->photo) }}" width="100" height="100"></td>
        <td></td>
    </tr>    
    <tr>
                            <td class="dataName">Username:</td>
                            <td>{{ $trainingStudent->user->user_name }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Name:</td>
                            <td>{{ $trainingStudent->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">DOB:</td>
                            <td>{{ isset($trainingStudent->dob) ? \Carbon\Carbon::parse($trainingStudent->dob)->format('d/m/Y') : $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Father Name:</td>
                            <td>{{ $trainingStudent->father_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Guardian:</td>
                            <td>{{ $trainingStudent->guardian ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Mother Name:</td>
                            <td>{{ $trainingStudent->mother_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Age:</td>
                            <td>{{ $trainingStudent->age ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Gender:</td>
                            <td>{{ $trainingStudent->gender ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Marital Status:</td>
                            <td>{{ $trainingStudent->marital_status ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Aadhar no:</td>
                            <td>{{ $trainingStudent->aadhar ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Nationality:</td>
                            <td>{{ $trainingStudent->nationality ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Domicile:</td>
                            <td>{{ $trainingStudent->domicile ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Category:</td>
                            <td>{{ $trainingStudent->category ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Annual Income:</td>
                            <td>{{ $trainingStudent->income ?? $default; }}</td>
                        </tr> 

                        <tr>
                            <td class="dataName">Class:</td>
                            <td>{{ $trainingStudent->studentClass->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Section:</td>
                            <td>@if($trainingStudent->classSection){{ $trainingStudent->classSection->name }} @else {{ $default }} @endif</td>
                        </tr>
                        <tr>
                            <td class="dataName">Correspondance Address:</td>
                            <td>{{ $trainingStudent->correspondance_address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Permanent Address:</td>
                            <td>{{ $trainingStudent->permanent_address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">State:</td>
                            <td>{{ $trainingStudent->state ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Pin code:</td>
                            <td>{{ $trainingStudent->pincode ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Email:</td>
                            <td>{{ $trainingStudent->email ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Contact No:</td>
                            <td>{{ $trainingStudent->contact_number ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Date:</td>
                            <td>{{ isset($trainingStudent->date) ? \Carbon\Carbon::parse($trainingStudent->date)->format('d/m/Y') : $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Extra Curricular Activities:</td>
                            <td>{{ $trainingStudent->extra_curricular_activities ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Why do they want to join this course:</td>
                            <td>{{ $trainingStudent->course_reason ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">City:</td>
                            <td>{{ $trainingStudent->city ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Academic Session:</td>
                            <td>{{ $trainingStudent->academic_session ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Branch:</td>
                            <td>{{ $trainingStudent->user->branch->name }} (location: {{ $trainingStudent->user->branch->location }})</td>
                        </tr>  
                    
                                               
                    </table>
                    <br>

<h3>Details of examinations passed:</h3>
<table class="table table-bordered">
<tr>
    <td class="dataName">Sl.No</td>
    <td class="dataName">Name of the exam passed</td>
    <td class="dataName">Name of the Board/University</td>
    <td class="dataName">Year of passing</td>
    <td class="dataName">Total Marks</td>
    <td class="dataName">Marks obtained</td>
    <td class="dataName">Percentage obtained</td>
    <td class="dataName">Subject</td>
</tr>
<tr>
    <th>1</th>
    <th>SSC/X Std</th>
    <td>{{ $trainingStudent->ssc_board ?? $default; }}</td>
    <td>{{ $trainingStudent->ssc_year_passing ?? $default; }}</td>
    <td>{{ $trainingStudent->ssc_total_marks ?? $default; }}</td>
    <td>{{ $trainingStudent->ssc_marks_obtained ?? $default; }}</td>
    <td>{{ $trainingStudent->ssc_percentage_obtained ?? $default; }}</td>
    <td>{{ $trainingStudent->ssc_subject ?? $default; }}</td>
</tr>
<tr>
    <th>2</th>
    <th>HSC/XII Std</th>
    <td>{{ $trainingStudent->hsc_board ?? $default; }}</td>
    <td>{{ $trainingStudent->hsc_year_passing ?? $default; }}</td>
    <td>{{ $trainingStudent->hsc_total_marks ?? $default; }}</td>
    <td>{{ $trainingStudent->hsc_marks_obtained ?? $default; }}</td>
    <td>{{ $trainingStudent->hsc_percentage_obtained ?? $default; }}</td>
    <td>{{ $trainingStudent->hsc_subject ?? $default; }}</td>
</tr>
<tr>
    <th>3</th>
    <th>Any other</th>
    <td>{{ $trainingStudent->examination_board_university ?? $default; }}</td>
    <td>{{ $trainingStudent->examination_year_passing ?? $default; }}</td>
    <td>{{ $trainingStudent->examination_total_marks ?? $default; }}</td>
    <td>{{ $trainingStudent->examination_marks_obtained ?? $default; }}</td>
    <td>{{ $trainingStudent->examination_percentage_obtained ?? $default; }}</td>
    <td>{{ $trainingStudent->examination_subject ?? $default; }}</td>
</tr>
</table>

<br>

<h3>Documents Attached:</h3>
    <ul style="list-style-type:disc" id="documentsList" >
    @if($trainingStudent->statement_marks)  
    <li>Statement of Marks of Intermediate / Higher Secondary or other qualifying Examination</li>      
    @else
    <li style="color:red;">Statement of Marks Not Available!</li>
    @endif  
    <br>
    @if($trainingStudent->character_certificate)  
    <li>Attested copy of character certificate from last institution passed</li>
    @else
    <li style="color:red;">Character Certificate Not Available!</li>
    @endif  
    <br>
    @if($trainingStudent->birth_certificate)  
    <li>Attested copy of Birth Certificate</li>       
    @else
    <li style="color:red;">Birth Certificate Not Available!</li>
    @endif  
    <br>
    @if($trainingStudent->experience_certificate)  
    <li>Work experience certificate</li>
    @else
    <li style="color:red;">Experience Certificate Not Available!</li>
    @endif  
    <br>      
    @if($trainingStudent->fee_document)  
    <li>Fee Draft / Cheque / Cash (Non-refundable)</li> 
    @else
    <li style="color:red;">Fee Document Not Available!</li>
    @endif  
</ul>



</body>
</html>