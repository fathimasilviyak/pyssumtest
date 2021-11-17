@extends('layouts.admin')
@section("page-name","show faculty")
@section('page-content')


@php
    $default = "not available";

    $dob = isset($faculty->dob) ? \Carbon\Carbon::parse($faculty->dob)->format('d/m/Y') : $default;
    $date_appoinment = isset($faculty->date_appoinment) ? \Carbon\Carbon::parse($faculty->date_appoinment)->format('d/m/Y') : $default;
    $date_leaving = isset($faculty->date_leaving) ? \Carbon\Carbon::parse($faculty->date_leaving)->format('d/m/Y') : $default;
@endphp

<div class="container-fluid">
    <div class="d-flex justify-content-end mb-4">
      <a class="btn btn-info" href="{{ route('admin.faculties.generate-pdf',$faculty->id) }}"><i class="fas fa-file-pdf"></i>Export to PDF</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Faculty Details</h3>
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
                            <td><img src="{{ asset('images/faculty/'.$faculty->photo) }}" width="150" height="150"></td>
                        </tr> 
                        
                    
                        <tr>
                            <td>Username</td>
                            <td>{{ $faculty->user->user_name }}</td>
                        </tr>   
                        <tr>
                            <td>Name</td>
                            <td>{{ $faculty->name ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Email</td>
                            <td>{{ $faculty->email ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>DOB</td>
                            <td>{{ $dob }}</td>
                        </tr> 
                        <tr>
                            <td>Gender</td>
                            <td>{{ $faculty->gender ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Aadhar</td>
                            <td>{{ $faculty->aadhar ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Guardian</td>
                            <td>{{ $faculty->guardian ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Qualification</td>
                            <td>{{ $faculty->qualification ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Date of Appoinment</td>
                            <td>{{ $date_appoinment }}</td>
                        </tr> 
                        <tr>
                            <td>Designation</td>
                            <td>{{ $faculty->designation ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Nature of Appoinment</td>
                            <td>{{ $faculty->nature_appoinment ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Specialized in</td>
                            <td>{{ $faculty->specialized_in ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>PAN</td>
                            <td>{{ $faculty->pan ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Mobile</td>
                            <td>{{ $faculty->mobile ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Permenent Address</td>
                            <td>{{ $faculty->permenent_address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Local Address</td>
                            <td>{{ $faculty->local_address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Date of Leaving</td>
                            <td>{{ $date_leaving }}</td>
                        </tr> 
                      
                        <tr>
                            <td>role</td>
                            <td>{{ $faculty->user->role }}<a href="{{ route('admin.faculties.edit-role', $faculty->id) }}"  class="btn btn-info"  style="display: inline-block; float: right">Change role?</a></td>
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