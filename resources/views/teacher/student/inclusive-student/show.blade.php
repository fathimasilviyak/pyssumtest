@extends('layouts.teacher')
@section("page-name","show Inclusive Student")
@section('page-content')


@php
    $default = "not available";

    $dob = isset($inclusiveStudent->dob) ? \Carbon\Carbon::parse($inclusiveStudent->dob)->format('d/m/Y') : $default;
    $date_register = isset($inclusiveStudent->date) ? \Carbon\Carbon::parse($inclusiveStudent->date)->format('d/m/Y') : $default;
    
@endphp

<div class="container-fluid">
<div class="d-flex justify-content-end mb-4">
      <a class="btn btn-info" href="{{ route('teacher.students.inclusive-students.generate-pdf',$inclusiveStudent->id) }}"><i class="fas fa-file-pdf"></i>Export to PDF</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Inclusive Student Details</h3>
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
                            <td><img src="{{ asset('images/student/inclusive-student/'.$inclusiveStudent->photo) }}" width="150" height="150"></td>
                        </tr> 
                        
                    
                        <tr>
                            <td>Username</td>
                            <td>{{ $inclusiveStudent->user->user_name }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $inclusiveStudent->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>{{ $dob }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ $inclusiveStudent->gender ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Aadhar no</td>
                            <td>{{ $inclusiveStudent->aadhar ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Father Name</td>
                            <td>{{ $inclusiveStudent->father_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Father Profession</td>
                            <td>{{ $inclusiveStudent->father_profession ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Father Contact no</td>
                            <td>{{ $inclusiveStudent->father_contact ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Father Monthly Income</td>
                            <td>{{ $inclusiveStudent->father_income ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Mother Name</td>
                            <td>{{ $inclusiveStudent->mother_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Mother Profession</td>
                            <td>{{ $inclusiveStudent->mother_profession ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Mother Contact no</td>
                            <td>{{ $inclusiveStudent->mother_contact ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Mother Monthly Income</td>
                            <td>{{ $inclusiveStudent->mother_income ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>{{ $inclusiveStudent->studentClass->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td>@if($inclusiveStudent->classSection){{ $inclusiveStudent->classSection->name }} @else {{ $default }} @endif</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $inclusiveStudent->address ?? $default; }}</td>
                        </tr> 
                        
                        <tr>
                            <td>Date</td>
                            <td>{{ $date_register ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $inclusiveStudent->city ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Academic Session</td>
                            <td>{{ $inclusiveStudent->academic_session ?? $default; }}</td>
                        </tr>     
                   
                       
                    </table>




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