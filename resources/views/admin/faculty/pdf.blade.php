<!DOCTYPE html>
<html>
<head>
    <title>Faculty</title>
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
    <h1>Faculty Details</h1>
<br>
@php
    $default = "not available";
@endphp


<table id="example1" class="table">
    <tr>
        <td><img src="{{ public_path('images/faculty/'.$faculty->photo) }}" width="100" height="100"></td>
        <td></td>
    </tr>  
    <tr>
                            <td class="dataName">Username:</td>
                            <td>{{ $faculty->user->user_name }}</td>
                        </tr>   
                        <tr>
                            <td class="dataName">Name:</td>
                            <td>{{ $faculty->name ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Email:</td>
                            <td>{{ $faculty->email ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">DOB:</td>
                            <td>{{ isset($faculty->dob) ? \Carbon\Carbon::parse($faculty->dob)->format('d/m/Y') : $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Gender:</td>
                            <td>{{ $faculty->gender ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Aadhar:</td>
                            <td>{{ $faculty->aadhar ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Guardian:</td>
                            <td>{{ $faculty->guardian ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Qualification:</td>
                            <td>{{ $faculty->qualification ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Date of Appoinment:</td>
                            <td>{{ isset($faculty->date_appoinment) ? \Carbon\Carbon::parse($faculty->date_appoinment)->format('d/m/Y') : $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Designation:</td>
                            <td>{{ $faculty->designation ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Nature of Appoinment:</td>
                            <td>{{ $faculty->nature_appoinment ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Specialized in:</td>
                            <td>{{ $faculty->specialized_in ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">PAN:</td>
                            <td>{{ $faculty->pan ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Mobile:</td>
                            <td>{{ $faculty->mobile ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Permenent Address:</td>
                            <td>{{ $faculty->permenent_address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Local Address:</td>
                            <td>{{ $faculty->local_address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td class="dataName">Date of Leaving:</td>
                            <td>{{ isset($faculty->date_leaving) ? \Carbon\Carbon::parse($faculty->date_leaving)->format('d/m/Y') : $default; }}</td>
                        </tr>   
                        <tr>
                            <td class="dataName">Branch:</td>
                            <td>{{ $faculty->user->branch->name }} (location: {{ $faculty->user->branch->location }})</td>
                        </tr>  
                    
                        <tr>
                            <td class="dataName">role:</td>
                            <td>{{ $faculty->user->role }}</a></td>
                        </tr> 
                          
     
</table>

</body>
</html>