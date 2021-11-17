<!DOCTYPE html>
<html>
<head>
    <title>Inclusive Student</title>
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


    </style>
</head>
<body>
    <h1>Inclusive Student Details</h1>
<br>
@php
    $default = "not available";
@endphp


<table id="example1" class="table">
    <tr>
        <td><img src="{{ public_path('images/student/inclusive-student/'.$inclusiveStudent->photo) }}" width="100" height="100"></td>
        <td></td>
    </tr>   
                        <tr>
                            <td class="dataName">Username:</td>
                            <td>{{ $inclusiveStudent->user->user_name }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Name:</td>
                            <td>{{ $inclusiveStudent->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">DOB:</td>
                            <td>{{ isset($inclusiveStudent->dob) ? \Carbon\Carbon::parse($inclusiveStudent->dob)->format('d/m/Y') : $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Gender:</td>
                            <td>{{ $inclusiveStudent->gender ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Aadhar no:</td>
                            <td>{{ $inclusiveStudent->aadhar ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Father Name:</td>
                            <td>{{ $inclusiveStudent->father_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Father Profession:</td>
                            <td>{{ $inclusiveStudent->father_profession ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Father Contact no:</td>
                            <td>{{ $inclusiveStudent->father_contact ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Father Monthly Income:</td>
                            <td>{{ $inclusiveStudent->father_income ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Mother Name:</td>
                            <td>{{ $inclusiveStudent->mother_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Mother Profession:</td>
                            <td>{{ $inclusiveStudent->mother_profession ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Mother Contact no:</td>
                            <td>{{ $inclusiveStudent->mother_contact ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Mother Monthly Income:</td>
                            <td>{{ $inclusiveStudent->mother_income ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Class:</td>
                            <td>{{ $inclusiveStudent->studentClass->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td class="dataName">Section:</td>
                            <td>@if($inclusiveStudent->classSection){{ $inclusiveStudent->classSection->name }} @else {{ $default }} @endif</td>
                        </tr>
                        <tr>
                            <td class="dataName">Address:</td>
                            <td>{{ $inclusiveStudent->address ?? $default; }}</td>
                        </tr> 
                        
                        <tr>
                            <td class="dataName">Date:</td>
                            <td>{{  isset($inclusiveStudent->date) ? \Carbon\Carbon::parse($inclusiveStudent->date)->format('d/m/Y') : $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">City:</td>
                            <td>{{ $inclusiveStudent->city ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Academic Session:</td>
                            <td>{{ $inclusiveStudent->academic_session ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td class="dataName">Branch:</td>
                            <td>{{ $inclusiveStudent->user->branch->name }} (location: {{ $inclusiveStudent->user->branch->location }})</td>
                        </tr>            
     
</table>

</body>
</html>