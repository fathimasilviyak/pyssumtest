<!DOCTYPE html>
<html>
<head>
    <title>Early Intervention Registration</title>
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
    <h1>Early Intervention Registration</h1>
<br>
@php
    $default = "not available";
@endphp


<table id="example1" class="table">
    <tr>
        <td><img src="{{ public_path('images/EI-registration/'.$eIRegistration->photo) }}" width="100" height="100"></td>
        <td></td>
    </tr>   
    <tr>
                            <td class="dataName">Name:</td>
                            <td>{{ $eIRegistration->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">DOB:</td>
                            <td>{{ isset($eIRegistration->dob) ? \Carbon\Carbon::parse($eIRegistration->dob)->format('d/m/Y') : $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Gender:</td>
                            <td>{{ $eIRegistration->gender ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Aadhar:</td>
                            <td>{{ $eIRegistration->aadhar ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Reffered By:</td>
                            <td>{{ $eIRegistration->reffered_by ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Father Name:</td>
                            <td>{{ $eIRegistration->father_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Father Occupation:</td>
                            <td>{{ $eIRegistration->father_occupation ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Father Contact No:</td>
                            <td>{{ $eIRegistration->father_contact ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Mother Name:</td>
                            <td>{{ $eIRegistration->mother_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Mother Occupation:</td>
                            <td>{{ $eIRegistration->mother_occupation ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Mother Contact no:</td>
                            <td>{{ $eIRegistration->mother_contact ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Address:</td>
                            <td>{{ $eIRegistration->address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Present Complaints:</td>
                            <td>{{ $eIRegistration->present_complaints ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Date:</td>
                            <td>{{ isset($eIRegistration->date) ? \Carbon\Carbon::parse($eIRegistration->date)->format('d/m/Y') : $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">City:</td>
                            <td>{{ $eIRegistration->city ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Academic Session:</td>
                            <td>{{ $eIRegistration->academic_session ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Branch:</td>
                            <td>{{ $eIRegistration->branch->name }} (location: {{ $eIRegistration->branch->location }})</td>
                        </tr>  
                        </table>
                        <h3>Developmental Milestones:</h3>
                        <table>
                        <tr>
                            <td class="dataName">Head Control:</td>
                            <td>{{ $eIRegistration->head_control ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Sitting:</td>
                            <td>{{ $eIRegistration->sitting ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Standing:</td>
                            <td>{{ $eIRegistration->standing ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Walking:</td>
                            <td>{{ $eIRegistration->walking ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">First Meaningfull Word:</td>
                            <td>{{ $eIRegistration->first_meaningfull_word ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Bowel and Bladder Control:</td>
                            <td>{{ $eIRegistration->bowel_bladder_control ?? $default; }}</td>
                        </tr>  
     
                    </table>
                    <br>
                    <h3>Ananswered by parents or caregiver</h3>
                            <p>Do you think your child hears well?</p>
                            <p>Ans: {{ $eIRegistration->child_hear ?? $default; }}</p>
            
                            <p>Do you think your child talks like other toddlers his age </p>
                            <p>Ans: {{ $eIRegistration->child_talk ?? $default; }}</p>
                    
                            <p>Can you understand most of what your child says?</p>
                            <p>Ans: {{ $eIRegistration->understand_child ?? $default; }}</p>
                    
                            <p>Do you think your child walks, runs, and climb like other toddlers her age?</p>
                            <p>Ans: {{ $eIRegistration->like_other ?? $default; }}</p>
                     
                            <p>Does either parent have a family history of childhood deafness or hearing impairment?</p>
                            <p>Ans: {{ $eIRegistration->family_history ?? $default; }}</p>
                    
                            <p>Do you have concern about your child’s vision?</p>
                            <p>Ans: {{ $eIRegistration->child_vision ?? $default; }}</p>
                       
                            <p>Has your child had any medical problem in the last several months?</p>
                            <p>Ans: {{ $eIRegistration->medical_problems ?? $default; }}</p>
                    
                            <p>Does anything about your child worry you?</p>
                            <p>Ans: {{ $eIRegistration->worries ?? $default; }}</p>
                      
              

                    <br><h3>Filled By Adminstrator</h3>
                        <p class="dataName"><u>Motor Development</u></p>
                            <div style="white-space: pre-line;">
                            {{ $eIRegistration->motor_development ?? $default; }}
                            </div>
                            <p class="dataName"><u>Language Development</u></p>
                            <div style="white-space: pre-line;">
                            {{ $eIRegistration->language_development ?? $default; }}
                            </div>
                            <p class="dataName"><u>Social Development</u></p>
                            <div style="white-space: pre-line;">
                            {{ $eIRegistration->social_development ?? $default; }}
                            </div>
                            <p class="dataName"><u>Cognitive Development</u></p>
                            <div style="white-space: pre-line;">
                            {{ $eIRegistration->cognitive_development ?? $default; }}
                            </div>
                       
                     

</body>
</html>