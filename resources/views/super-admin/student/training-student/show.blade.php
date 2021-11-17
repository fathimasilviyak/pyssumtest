@extends('layouts.super-admin')
@section("page-name","Show Training Student")
@section('page-content')


@php
    $default = "not available";

    $dob = isset($trainingStudent->dob) ? \Carbon\Carbon::parse($trainingStudent->dob)->format('d/m/Y') : $default;
    $date_register = isset($trainingStudent->date) ? \Carbon\Carbon::parse($trainingStudent->date)->format('d/m/Y') : $default;
    
@endphp

<div class="container-fluid">
<div class="d-flex justify-content-end mb-4">
      <a class="btn btn-info" href="{{ route('super-admin.students.training-students.generate-pdf',$trainingStudent->id) }}"><i class="fas fa-file-pdf"></i>Export to PDF</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Training Student Details</h3>
              </div>
              @if (session('success'))
                                        <div class="alert" style="background-color:green;color:white;padding:5px;margin:5px">
                                            {{ session('success') }}
                                        </div>
                                    @endif
              <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        
                        <tr>
                            <td>Photo</td>
                            <td><img src="{{ asset('images/student/training-student/'.$trainingStudent->photo) }}" width="150" height="150"></td>
                        </tr> 
                        
                    
                        <tr>
                            <td>Username</td>
                            <td>{{ $trainingStudent->user->user_name }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $trainingStudent->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>{{ $dob }}</td>
                        </tr>
                        <tr>
                            <td>Father Name</td>
                            <td>{{ $trainingStudent->father_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Guardian</td>
                            <td>{{ $trainingStudent->guardian ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Mother Name</td>
                            <td>{{ $trainingStudent->mother_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{{ $trainingStudent->age ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Gender</td>
                            <td>{{ $trainingStudent->gender ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Marital Status</td>
                            <td>{{ $trainingStudent->marital_status ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Aadhar no</td>
                            <td>{{ $trainingStudent->aadhar ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Nationality</td>
                            <td>{{ $trainingStudent->nationality ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Domicile</td>
                            <td>{{ $trainingStudent->domicile ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Category</td>
                            <td>{{ $trainingStudent->category ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Annual Income</td>
                            <td>{{ $trainingStudent->income ?? $default; }}</td>
                        </tr> 

                        <tr>
                            <td>Class</td>
                            <td>{{ $trainingStudent->studentClass->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td>@if($trainingStudent->classSection){{ $trainingStudent->classSection->name }} @else {{ $default }} @endif</td>
                        </tr>
                        <tr>
                            <td>Correspondance Address</td>
                            <td>{{ $trainingStudent->correspondance_address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Permanent Address</td>
                            <td>{{ $trainingStudent->permanent_address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>State</td>
                            <td>{{ $trainingStudent->state ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Pin code</td>
                            <td>{{ $trainingStudent->pincode ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $trainingStudent->email ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Contact No</td>
                            <td>{{ $trainingStudent->contact_number ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Date</td>
                            <td>{{ $date_register ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Extra Curricular Activities</td>
                            <td>{{ $trainingStudent->extra_curricular_activities ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Why do they want to join this course</td>
                            <td>{{ $trainingStudent->course_reason ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $trainingStudent->city ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Academic Session</td>
                            <td>{{ $trainingStudent->academic_session ?? $default; }}</td>
                        </tr>  
                       
                    
                                               
                    </table>
                    <br><br>

<h4>Details of examinations passed:</h4>
<br>
<div class="table-responsive">
<table class="table table-bordered table-active">
<tr>
    <th>Sl.No</th>
    <th>Name of the exam passed</th>
    <th>Name of the Board/University</th>
    <th>Year of passing</th>
    <th>Total Marks</th>
    <th>Marks obtained</th>
    <th>Percentage obtained</th>
    <th>Subject</th>
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
</div>


<br><br>
<br>

<h4>Documents Attached:</h4>
    <br>
    <ul style="list-style-type:disc" id="documentsList" >
    @if($trainingStudent->statement_marks)  
    <li><a href="{{ asset('documents/student/training-student/'.$trainingStudent->user->user_name.'/'.$trainingStudent->statement_marks) }}" target="_blank">Statement of Marks of Intermediate / Higher Secondary or other qualifying Examination</a></li>      
    @else
    <li style="color:red;">Statement of Marks Not Available!</li>
    @endif  
    <br>
    @if($trainingStudent->character_certificate)  
    <li><a href="{{ asset('documents/student/training-student/'.$trainingStudent->user->user_name.'/'.$trainingStudent->character_certificate) }}" target="_blank" >Attested copy of character certificate from last institution passed</a></li>
    @else
    <li style="color:red;">Character Certificate Not Available!</li>
    @endif  
    <br>
    @if($trainingStudent->birth_certificate)  
    <li><a href="{{ asset('documents/student/training-student/'.$trainingStudent->user->user_name.'/'.$trainingStudent->birth_certificate) }}" target="_blank" >Attested copy of Birth Certificate</a></li>       
    @else
    <li style="color:red;">Birth Certificate Not Available!</li>
    @endif  
    <br>
    @if($trainingStudent->experience_certificate)  
    <li><a href="{{ asset('documents/student/training-student/'.$trainingStudent->user->user_name.'/'.$trainingStudent->experience_certificate) }}" target="_blank" >Work experience certificate</a></li>
    @else
    <li style="color:red;">Experience Certificate Not Available!</li>
    @endif  
    <br>      
    @if($trainingStudent->fee_document)  
    <li><a href="{{ asset('documents/student/training-student/'.$trainingStudent->user->user_name.'/'.$trainingStudent->fee_document) }}" target="_blank" >Fee Draft / Cheque / Cash (Non-refundable)</a></li> 
    @else
    <li style="color:red;">Fee Document Not Available!</li>
    @endif  
</ul>






                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
          <!-- /.col -->
    </div>
        <!-- /.row -->
</div>
      <!-- /.container-fluid -->




@endsection

