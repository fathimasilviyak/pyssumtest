@extends('layouts.super-admin')
@section("page-name","show Early Intervention Registration")
@section('page-content')


@php
    $default = "not available";

    $dob = isset($eIRegistration->dob) ? \Carbon\Carbon::parse($eIRegistration->dob)->format('d/m/Y') : $default;
    $date_register = isset($eIRegistration->date) ? \Carbon\Carbon::parse($eIRegistration->date)->format('d/m/Y') : $default;
    
@endphp

<div class="container-fluid">
    <div class="d-flex justify-content-end mb-4">
      <a class="btn btn-info" href="{{ route('super-admin.EI-registrations.generate-pdf',$eIRegistration->id) }}"><i class="fas fa-file-pdf"></i>Export to PDF</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Early Intervention Registration Details</h3>
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
                            <td><img src="{{ asset('images/EI-registration/'.$eIRegistration->photo) }}" width="150" height="150"></td>
                        </tr> 
                
                        <tr>
                            <td>Name</td>
                            <td>{{ $eIRegistration->name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>{{ $dob }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ $eIRegistration->gender ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Aadhar</td>
                            <td>{{ $eIRegistration->aadhar ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Reffered By</td>
                            <td>{{ $eIRegistration->reffered_by ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Father Name</td>
                            <td>{{ $eIRegistration->father_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Father Occupation</td>
                            <td>{{ $eIRegistration->father_occupation ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Father Contact No</td>
                            <td>{{ $eIRegistration->father_contact ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Mother Name</td>
                            <td>{{ $eIRegistration->mother_name ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Mother Occupation</td>
                            <td>{{ $eIRegistration->mother_occupation ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Mother Contact no</td>
                            <td>{{ $eIRegistration->mother_contact ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $eIRegistration->address ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Present Complaints</td>
                            <td>{{ $eIRegistration->present_complaints ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Date</td>
                            <td>{{ $date_register ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>City</td>
                            <td>{{ $eIRegistration->city ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Academic Session</td>
                            <td>{{ $eIRegistration->academic_session ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td colspan="2"><h5>Developmental Milestones:</h5></td>
                        </tr>
                        <tr>
                            <td>Head Control</td>
                            <td>{{ $eIRegistration->head_control ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Sitting</td>
                            <td>{{ $eIRegistration->sitting ?? $default; }}</td>
                        </tr>
                        <tr>
                            <td>Standing</td>
                            <td>{{ $eIRegistration->standing ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Walking</td>
                            <td>{{ $eIRegistration->walking ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>First Meaningfull Word</td>
                            <td>{{ $eIRegistration->first_meaningfull_word ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Bowel and Bladder Control</td>
                            <td>{{ $eIRegistration->bowel_bladder_control ?? $default; }}</td>
                        </tr> 
                    </table>
                    <br><h4>Ananswered by parents or caregiver</h4><br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td></td>
                            <td>Answers</td>
                        </tr>
                        <tr>
                            <td>Do you think your child hears well?</td>
                            <td>{{ $eIRegistration->child_hear ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Do you think your child talks like other toddlers his age </td>
                            <td>{{ $eIRegistration->child_talk ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Can you understand most of what your child says?</td>
                            <td>{{ $eIRegistration->understand_child ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Do you think your child walks, runs, and climb like other toddlers her age?</td>
                            <td>{{ $eIRegistration->like_other ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Does either parent have a family history of childhood deafness or hearing impairment?</td>
                            <td>{{ $eIRegistration->family_history ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Do you have concern about your child’s vision?</td>
                            <td>{{ $eIRegistration->child_vision ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Has your child had any medical problem in the last several months?</td>
                            <td>{{ $eIRegistration->medical_problems ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Does anything about your child worry you?</td>
                            <td>{{ $eIRegistration->worries ?? $default; }}</td>
                        </tr> 
                    </table>
                    <br><h4>Filled By Adminstrator</h4><br>
                <table class="table table-bordered table-striped">
                       
                        <tr>
                            <td>Motor Development</td>
                            <td>{{ $eIRegistration->motor_development ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Language Development</td>
                            <td>{{ $eIRegistration->language_development ?? $default; }}</td>
                        </tr> 
                        <tr>
                            <td>Social Development</td>
                            <td>{{ $eIRegistration->social_development ?? $default; }}</td>
                        </tr>  
                        <tr>
                            <td>Cognitive Development</td>
                            <td>{{ $eIRegistration->cognitive_development ?? $default; }}</td>
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