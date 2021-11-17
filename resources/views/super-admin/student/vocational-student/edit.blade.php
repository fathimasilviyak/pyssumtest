@extends('layouts.super-admin')

@section('links')
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('assets/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

@section("page-name","Edit Vocational Student")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Vocational Student</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="post" autocomplete="off" action="{{ route('super-admin.students.vocational-students.update', $vocationalStudent->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                 
                <div class="card-body">
                    
                    <div class="form-group">
                      <label for="viewImage"></label>
                      <img src="{{ asset('images/student/vocational-student/'.$vocationalStudent->photo) }}" alt="" id="viewImage" height="150" width="150" >
                    </div>
                    <div class="row">
                      <div class="col-sm-6">                      
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" maxlength="255" value="{{ $vocationalStudent->name }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="dob">DOB</label>
                          <div class="input-group date" id="birthdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#birthdate" name="dob" id="dob" placeholder="DD/MM/YYYY" value="{{  isset($vocationalStudent->dob) ? \Carbon\Carbon::parse($vocationalStudent->dob)->format('d/m/Y') : ''; }}" >
                              <div class="input-group-append" data-target="#birthdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div>                           
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="gender">Gender</label>
                          <select class="form-control" name="gender" id="gender">
                            <option value="">Choose Gender</option>
                            <option value="male"  {{ $vocationalStudent->gender  == 'male' ? 'selected' : '' }} >male</option>
                            <option value="female" {{ $vocationalStudent->gender  == 'female' ? 'selected' : '' }} >female</option>
                            <option value="trans" {{ $vocationalStudent->gender  == 'trans' ? 'selected' : '' }} >trans</option>                         
                          </select>                        
                        </div>
                      </div>                                    
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_name">Father Name</label>
                          <input type="text" class="form-control" id="father_name" placeholder="Father Name" name="father_name" maxlength="255" value="{{ $vocationalStudent->father_name }}" >
                        </div>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_name">Mother Name</label>
                          <input type="text" class="form-control" id="mother_name" placeholder="Mother Name" name="mother_name" maxlength="255" value="{{ $vocationalStudent->mother_name }}" >
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="contact_number">Contact Number</label>
                          <input type="text" class="form-control" name="contact_number" placeholder="Contact Number" id="contact_number" maxlength="255" value="{{ $vocationalStudent->contact_number }}" >
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" placeholder="Address" id="address" rows="3">{{ $vocationalStudent->address }}</textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="marital_status">Marital Status</label>
                          <input type="text" class="form-control" id="marital_status" placeholder="Marital Status" name="marital_status" maxlength="255" value="{{ $vocationalStudent->marital_status }}" >
                        </div>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="nationality">Nationality</label>
                          <input type="text" class="form-control" id="nationality" placeholder="Nationality" name="nationality" maxlength="255" value="{{ $vocationalStudent->nationality }}" >
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="languages">Languages Known</label>
                          <input type="text" class="form-control" name="languages" placeholder="Languages Known" id="languages" maxlength="255" value="{{ $vocationalStudent->languages }}" >
                        </div>
                      </div>
                    </div>

                    <br><br>
                    <h5><b>Education/Training Received</b></h5><br>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="main_stream_school">Main Stream School</label>
                          <input type="text" class="form-control" id="main_stream_school" placeholder="Main Stream School" name="main_stream_school" maxlength="255" value="{{ $vocationalStudent->main_stream_school }}" >
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="special_school">Special School</label>
                          <input type="text" class="form-control" name="special_school" placeholder="Special School" id="special_school" maxlength="255" value="{{ $vocationalStudent->special_school }}" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="vocational_training">Vocational Training(Mention Skill)</label>
                          <input type="text" class="form-control" id="vocational_training" placeholder="Vocational Training" name="vocational_training" maxlength="255" value="{{ $vocationalStudent->vocational_training }}" >
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="any_other">Any Other</label>
                          <input type="text" class="form-control" name="any_other" placeholder="Any Other" id="any_other" maxlength="255" value="{{ $vocationalStudent->any_other }}" >
                        </div>
                      </div>
                    </div>

                    <br><br>
                    <h5><b>Experience in Employment (If employed)</b></h5><br>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="organization">Name of the Organization</label>
                          <input type="text" class="form-control" id="organization" placeholder="Name of the Organization" name="organization" maxlength="255" value="{{ $vocationalStudent->organization }}" >
                        </div>
                      </div>  
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="work_type">Type of Work</label>
                          <input type="text" class="form-control" name="work_type" placeholder="Type of Work" id="work_type" maxlength="255" value="{{ $vocationalStudent->work_type }}" >
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="salary">Salary</label>
                          <input type="text" class="form-control" name="salary" placeholder="salary" id="salary" maxlength="255" value="{{ $vocationalStudent->salary }}" >
                        </div>
                      </div>
                    </div>

                    <br><br>
                    <h5><b>Associated Conditions (Pls. tick if any)</b></h5><br>
                  
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="epilepsy" name="epilepsy" value="1" {{ $vocationalStudent->epilepsy ? 'checked' : '' }} >
                                <label class="form-check-label" for="epilepsy">Epilepsy</label> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="physically_handicapped" name="physically_handicapped" value="1" {{ $vocationalStudent->physically_handicapped ? 'checked' : '' }}>
                                <label class="form-check-label" for="physically_handicapped">Physically Handicapped</label> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="visually_handicapped" name="visually_handicapped" value="1" {{ $vocationalStudent->visually_handicapped ? 'checked' : '' }} >
                                <label class="form-check-label" for="visually_handicapped">Visually Handicapped</label> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="psychological_problems" name="psychological_problems" value="1" {{ $vocationalStudent->psychological_problems ? 'checked' : '' }} >
                                <label class="form-check-label" for="psychological_problems">Emotional Problems(Psychological)</label> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="psychiatric_features" name="psychiatric_features" value="1" {{ $vocationalStudent->psychiatric_features ? 'checked' : '' }} >
                                <label class="form-check-label" for="psychiatric_features">Psychiatric Features</label> 
                            </div>
                        </div>
                    <br><br>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="major_challenges">Major Challenges</label>
                                <textarea class="form-control" name="major_challenges" placeholder="Major Challenges" id="major_challenges" rows="5">{{ $vocationalStudent->major_challenges }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control" id="city" placeholder="City" name="city" maxlength="255" value="{{ $vocationalStudent->city }}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="academic_session">Academic Session</label>
                          <input type="text" class="form-control" id="academic_session" placeholder="Academic Session" name="academic_session" maxlength="255" value="{{ $vocationalStudent->academic_session }}" >
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="date_register">Date</label>
                          <div class="input-group date" id="registerdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#registerdate" name="date_register" id="date_register" placeholder="DD/MM/YYYY" value="{{  isset($vocationalStudent->date) ? \Carbon\Carbon::parse($vocationalStudent->date)->format('d/m/Y') : ''; }}" >
                              <div class="input-group-append" data-target="#registerdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div> 
                      </div> 
                    </div>

              

                    
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
                        
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="photo">Change Photo?</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="photo" name="photo" accept="image/*" >
                                    <label class="custom-file-label" for="photo">Choose a photo</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="birth_certificate">Change Birth Certificate?</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="birth_certificate" name="birth_certificate" >
                                    <label class="custom-file-label" for="birth_certificate">Choose the document</label>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label for="cmo_certificate">Change CMO Certificate?</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="cmo_certificate" name="cmo_certificate" >
                          <label class="custom-file-label" for="cmo_certificate">Choose the document</label>
                        </div>
                       </div>
                      </div>  
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label for="address_proof">Change Address Proof?</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="address_proof" name="address_proof" >
                          <label class="custom-file-label" for="address_proof">Choose the document</label>
                        </div>
                       </div>
                      </div>
                    </div>  
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
             
              </form>
            </div>
            <!-- /.card -->
            
            </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->



@endsection

@push('scripts')

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/user/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- bs-custom-file-input -->
<script src="{{ asset('assets/user/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script type="text/javascript">

 //Date picker

$('#registerdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
$('#birthdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });


//Page specific script 

$(function () {
  bsCustomFileInput.init();
});


</script>
@endpush
