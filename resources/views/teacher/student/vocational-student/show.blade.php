@extends('layouts.teacher')
@section("page-name","show Vocational Student")
@section('page-content')


@php
    $default = "not available";

    $dob = isset($vocationalStudent->dob) ? \Carbon\Carbon::parse($vocationalStudent->dob)->format('d/m/Y') : $default;
    $date_register = isset($vocationalStudent->date) ? \Carbon\Carbon::parse($vocationalStudent->date)->format('d/m/Y') : $default;
    
@endphp

<div class="container-fluid">
<div class="d-flex justify-content-end mb-4">
      <a class="btn btn-info" href="{{ route('teacher.students.vocational-students.generate-pdf',$vocationalStudent->id) }}"><i class="fas fa-file-pdf"></i>Export to PDF</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vocational Student Details</h3>
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
                            <td><img src="{{ asset('images/student/vocational-student/'.$vocationalStudent->photo) }}" width="150" height="150"></td>
                        </tr> 
                        
                    
                        <tr>
                            <td>Username</td>
                            <td>{{ $vocationalStudent->user->user_name }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $vocationalStudent->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>{{ $dob }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ $vocationalStudent->gender ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Father Name</td>
                            <td>{{ $vocationalStudent->father_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Mother Name</td>
                            <td>{{ $vocationalStudent->mother_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td>{{ $vocationalStudent->contact_number ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $vocationalStudent->address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>marital_status</td>
                            <td>{{ $vocationalStudent->marital_status ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Nationality</td>
                            <td>{{ $vocationalStudent->nationality ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Languages</td>
                            <td>{{ $vocationalStudent->languages ?? $default; }}</td>
                        </tr> 
                        
                        <tr>
                            <td>Date</td>
                            <td>{{ $date_register ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>City</td>
                            <td>{{ $vocationalStudent->city ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Academic Session</td>
                            <td>{{ $vocationalStudent->academic_session ?? $default; }}</td>
                        </tr>   
                    </table>
                    <br><br>
                    <h4>Education/Training Received</h4>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Main Stream School</td>
                            <td>{{ $vocationalStudent->main_stream_school ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Special School</td>
                            <td>{{ $vocationalStudent->special_school ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Vocational Training</td>
                            <td>{{ $vocationalStudent->vocational_training ?? $default; }}</td>
                        </tr>
                        <tr>
                          <td>Any Other</td>
                          <td>{{ $vocationalStudent->any_other ?? $default; }}</td>
                        </tr>
                    </table>

  <br><br>
                    <h4>Experience in Employment (If employed)</h4>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Name of the Organization</td>
                            <td>{{ $vocationalStudent->organization ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Tyoe of Work</td>
                            <td>{{ $vocationalStudent->work_type ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>salary</td>
                            <td>{{ $vocationalStudent->salary ?? $default; }}</td>
                        </tr>
                    </table>
                    <br><br>
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
                    <br><br>                
<h4>Major Challenges:</h4>
<p>
    {{ $vocationalStudent->major_challenges ?? $default; }}
</p>

  <br><br>                
<h4>Documents Attached:</h4>
    <br>
    <ul style="list-style-type:disc" id="documentsList" >
    @if($vocationalStudent->birth_certificate)  
    <li><a href="{{ asset('documents/student/vocational-student/'.$vocationalStudent->user->user_name.'/'.$vocationalStudent->birth_certificate) }}" target="_blank">Birth Certificate</a></li>      
    @else
    <li style="color:red;">Birth Certificate Not Available!</li>
    @endif  
    <br>
    @if($vocationalStudent->cmo_certificate)  
    <li><a href="{{ asset('documents/student/vocational-student/'.$vocationalStudent->user->user_name.'/'.$vocationalStudent->cmo_certificate) }}" target="_blank">CMO Certificate</a></li>      
    @else
    <li style="color:red;">CMO Certificate Not Available!</li>
    @endif  
    <br>
    @if($vocationalStudent->address_proof)  
    <li><a href="{{ asset('documents/student/vocational-student/'.$vocationalStudent->user->user_name.'/'.$vocationalStudent->address_proof) }}" target="_blank">Address Proof</a></li>      
    @else
    <li style="color:red;">Address Proof Not Available!</li>
    @endif  
    <br>
 
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