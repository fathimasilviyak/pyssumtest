<!DOCTYPE html>
<html>
<head>
    <title>Vocational Student</title>
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
    <h1>Vocational Student Details</h1>
<br>
@php
    $default = "not available";
@endphp


<table id="example1" class="table">
    <tr>
        <td><img src="{{ public_path('images/student/vocational-student/'.$vocationalStudent->photo) }}" width="100" height="100"></td>
        <td></td>
    </tr>   
    <tr>
                            <td class="dataName">Username:</td>
                            <td>{{ $vocationalStudent->user->user_name }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Name:</td>
                            <td>{{ $vocationalStudent->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td  class="dataName">DOB:</td>
                            <td>{{ isset($vocationalStudent->dob) ? \Carbon\Carbon::parse($vocationalStudent->dob)->format('d/m/Y') : $default; }}</td>
                        </tr>
                        <tr>
                            <td  class="dataName">Gender:</td>
                            <td>{{ $vocationalStudent->gender ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td  class="dataName">Father Name:</td>
                            <td>{{ $vocationalStudent->father_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td  class="dataName">Mother Name:</td>
                            <td>{{ $vocationalStudent->mother_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td  class="dataName">Contact Number:</td>
                            <td>{{ $vocationalStudent->contact_number ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td  class="dataName">Address:</td>
                            <td>{{ $vocationalStudent->address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td  class="dataName">marital_status:</td>
                            <td>{{ $vocationalStudent->marital_status ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td  class="dataName">Nationality:</td>
                            <td>{{ $vocationalStudent->nationality ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td  class="dataName">Languages:</td>
                            <td>{{ $vocationalStudent->languages ?? $default; }}</td>
                        </tr> 
                        
                        <tr>
                            <td  class="dataName">Date:</td>
                            <td>{{ isset($vocationalStudent->date) ? \Carbon\Carbon::parse($vocationalStudent->date)->format('d/m/Y') : $default; }}</td>
                        </tr> 
                        <tr>
                            <td  class="dataName">City:</td>
                            <td>{{ $vocationalStudent->city ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td  class="dataName">Academic Session:</td>
                            <td>{{ $vocationalStudent->academic_session ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td  class="dataName">Branch:</td>
                            <td>{{ $vocationalStudent->user->branch->name }} (location: {{ $vocationalStudent->user->branch->location }})</td>
                        </tr>  
                    </table>
                    <br>
                    <h4>Education/Training Received</h4>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td  class="dataName">Main Stream School:</td>
                            <td>{{ $vocationalStudent->main_stream_school ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td  class="dataName">Special School:</td>
                            <td>{{ $vocationalStudent->special_school ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Vocational Training:</td>
                            <td>{{ $vocationalStudent->vocational_training ?? $default; }}</td>
                        </tr>
                        <tr>
                          <td class="dataName">Any Other:</td>
                          <td>{{ $vocationalStudent->any_other ?? $default; }}</td>
                        </tr>
                    </table>

  <br>
                    <h4>Experience in Employment (If employed)</h4>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td class="dataName">Name of the Organization:</td>
                            <td>{{ $vocationalStudent->organization ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Type of Work:</td>
                            <td>{{ $vocationalStudent->work_type ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">salary:</td>
                            <td>{{ $vocationalStudent->salary ?? $default; }}</td>
                        </tr> 
     
</table>
<br>
                    <h4>Associated Conditions</h4>
                    <ul style="list-style-type:disc">
                    @if($vocationalStudent->epilepsy)
                        <li>Epilepsy</li>
                    @endif
                    @if($vocationalStudent->physically_handicapped)
                        <li>Physically Handicapped</li>
                    @endif
                    @if($vocationalStudent->visually_handicapped)
                        <li>Visually Handicapped</li>
                    @endif
                    @if($vocationalStudent->psychological_problems)
                        <li>Emotional Problems(psychological)</li>
                    @endif
                    @if($vocationalStudent->psychiatric_features)
                        <li>Psychiatric Features</li>
                    @endif
                    @if(!$vocationalStudent->epilepsy && !$vocationalStudent->physically_handicapped &&!$vocationalStudent->visually_handicapped && !$vocationalStudent->psychological_problems && !$vocationalStudent->psychiatric_features)
                    <li>No Associated Conditions</li>
                    @endif
                    </ul>
                    <br>            
<h4>Major Challenges:</h4>
<p>
    {{ $vocationalStudent->major_challenges ?? $default; }}
</p>
<br>                
<h4>Documents Attached:</h4>
    <ul style="list-style-type:disc" id="documentsList" >
    @if($vocationalStudent->birth_certificate)  
    <li>Birth Certificate</li>      
    @else
    <li style="color:red;">Birth Certificate Not Available!</li>
    @endif  
    <br>
    @if($vocationalStudent->cmo_certificate)  
    <li>CMO Certificate</li>      
    @else
    <li style="color:red;">CMO Certificate Not Available!</li>
    @endif  
    <br>
    @if($vocationalStudent->address_proof)  
    <li>Address Proof</li>      
    @else
    <li style="color:red;">Address Proof Not Available!</li>
    @endif  
    <br>
 
</ul>


</body>
</html>