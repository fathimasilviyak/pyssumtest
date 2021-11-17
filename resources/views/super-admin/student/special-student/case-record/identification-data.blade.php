<h4><b>Identification Data</b></h4>
<br>

<table id="example1" class="table table-bordered table-striped">
                        
                        <tr>
                            <td>Photo</td>
                            <td><img src="{{ asset('images/student/special-student/'.$specialStudent->photo) }}" width="150" height="150"></td>
                        </tr> 
                        
                    
                        <tr>
                            <td>Username</td>
                            <td>{{ $specialStudent->user->user_name }}</td>
                        </tr>   
                        <tr>
                            <td>Register Number</td>
                            <td>{{ $specialStudent->register_number ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Bill Number</td>
                            <td>{{ $specialStudent->bill_number ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Register Date</td>
                            <td>{{ $date_register ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Name</td>
                            <td>{{ $specialStudent->name ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Reffered By</td>
                            <td>{{ $specialStudent->reffered_by ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Gender</td>
                            <td>{{ $specialStudent->gender ?? $default; }}</td>
                        </tr> 
                        
                        <tr>
                            <td>DOB</td>
                            <td>{{ $dob }}</td>
                        </tr> 
                        <tr>
                            <td>Age</td>
                            <td>{{ $specialStudent->age ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Language Spoken</td>
                            <td>{{ $specialStudent->language_spoken ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Father Name</td>
                            <td>{{ $specialStudent->father_name ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Address</td>
                            <td>{{ $specialStudent->address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Occupation</td>
                            <td>{{ $specialStudent->occupation ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Family Status</td>
                            <td>{{ $specialStudent->family_status ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Living Area</td>
                            <td>{{ $specialStudent->living_area ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Religion</td>
                            <td>{{ $specialStudent->religion ?? $default; }}</td>
                        </tr>    
                        <tr>
                            <td>Caste</td>
                            <td>{{ $specialStudent->caste ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Informant Name</td>
                            <td>{{ $specialStudent->informant_name ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Informant Relationship</td>
                            <td>{{ $specialStudent->informant_relationship ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Contact Duration</td>
                            <td>{{ $specialStudent->contact_duration ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Present Complaint</td>
                            <td>{{ $specialStudent->present_complaint ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>{{ $specialStudent->studentClass->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td>@if($specialStudent->classSection){{ $specialStudent->classSection->name }} @else {{ $default }} @endif</td>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td>{{ $specialStudent->contact_number ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>tfeec</td>
                            <td>{{ $specialStudent->tfeec ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>tcno</td>
                            <td>{{ $specialStudent->tcno ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>pinv</td>
                            <td>{{ $specialStudent->pinv ?? $default; }}</td>
                        </tr>     
                        <tr>
                            <td>City</td>
                            <td>{{ $specialStudent->city ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Academic Session</td>
                            <td>{{ $specialStudent->academic_session ?? $default; }}</td>
                        </tr>  
                                
                       
                    </table>