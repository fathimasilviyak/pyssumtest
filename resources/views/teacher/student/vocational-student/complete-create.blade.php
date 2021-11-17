@extends('layouts.teacher')

@section('links')
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('assets/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

@section("page-name","Register Vocational Student")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Complete registration</h3>
              </div>
              <!-- /.card-header -->
              @error('user_id')
              <div class="alert" style="background-color:red;color:white;padding:5px;margin:5px">
                        {{ $message }}
              </div>
              @enderror


              <!-- form start -->
              <form method="post" autocomplete="off" action="{{ route('teacher.students.vocational-students.complete-store') }}" enctype="multipart/form-data">
                  @csrf
                 
                <div class="card-body">
                    
                    
                    <div class="row">
                      <div class="col-sm-6">                      
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="dob">DOB</label>
                          <div class="input-group date" id="birthdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#birthdate" name="dob" id="dob" placeholder="DD/MM/YYYY">
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
                            <option value="male">male</option>
                            <option value="female">female</option>
                            <option value="trans">trans</option>                         
                          </select>                        
                        </div>
                      </div>                                    
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_name">Father Name</label>
                          <input type="text" class="form-control" id="father_name" placeholder="Father Name" name="father_name" maxlength="255">
                        </div>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_name">Mother Name</label>
                          <input type="text" class="form-control" id="mother_name" placeholder="Mother Name" name="mother_name" maxlength="255">
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="contact_number">Contact Number</label>
                          <input type="text" class="form-control" name="contact_number" placeholder="Contact Number" id="contact_number" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" placeholder="Address" id="address" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="marital_status">Marital Status</label>
                          <input type="text" class="form-control" id="marital_status" placeholder="Marital Status" name="marital_status" maxlength="255">
                        </div>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="nationality">Nationality</label>
                          <input type="text" class="form-control" id="nationality" placeholder="Nationality" name="nationality" maxlength="255">
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="languages">Languages Known</label>
                          <input type="text" class="form-control" name="languages" placeholder="Languages Known" id="languages" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <br><br>
                    <h5><b>Education/Training Received</b></h5><br>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="main_stream_school">Main Stream School</label>
                          <input type="text" class="form-control" id="main_stream_school" placeholder="Main Stream School" name="main_stream_school" maxlength="255">
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="special_school">Special School</label>
                          <input type="text" class="form-control" name="special_school" placeholder="Special School" id="special_school" maxlength="255">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="vocational_training">Vocational Training(Mention Skill)</label>
                          <input type="text" class="form-control" id="vocational_training" placeholder="Vocational Training" name="vocational_training" maxlength="255">
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="any_other">Any Other</label>
                          <input type="text" class="form-control" name="any_other" placeholder="Any Other" id="any_other" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <br><br>
                    <h5><b>Experience in Employment (If employed)</b></h5><br>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="organization">Name of the Organization</label>
                          <input type="text" class="form-control" id="organization" placeholder="Name of the Organization" name="organization" maxlength="255">
                        </div>
                      </div>  
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="work_type">Type of Work</label>
                          <input type="text" class="form-control" name="work_type" placeholder="Type of Work" id="work_type" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="salary">Salary</label>
                          <input type="text" class="form-control" name="salary" placeholder="salary" id="salary" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <br><br>
                    <h5><b>Associated Conditions (Pls. tick if any)</b></h5><br>
                  
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="epilepsy" name="epilepsy" value="1">
                                <label class="form-check-label" for="epilepsy">Epilepsy</label> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="physically_handicapped" name="physically_handicapped" value="1">
                                <label class="form-check-label" for="physically_handicapped">Physically Handicapped</label> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="visually_handicapped" name="visually_handicapped" value="1">
                                <label class="form-check-label" for="visually_handicapped">Visually Handicapped</label> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="psychological_problems" name="psychological_problems" value="1">
                                <label class="form-check-label" for="psychological_problems">Emotional Problems(Psychological)</label> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="psychiatric_features" name="psychiatric_features" value="1">
                                <label class="form-check-label" for="psychiatric_features">Psychiatric Features</label> 
                            </div>
                        </div>
                    <br><br>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="major_challenges">Major Challenges</label>
                                <textarea class="form-control" name="major_challenges" placeholder="Major Challenges" id="major_challenges" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control" id="city" placeholder="City" name="city" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="academic_session">Academic Session</label>
                          <input type="text" class="form-control" id="academic_session" placeholder="Academic Session" name="academic_session" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="date_register">Date</label>
                          <div class="input-group date" id="registerdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#registerdate" name="date_register" id="date_register" placeholder="DD/MM/YYYY">
                              <div class="input-group-append" data-target="#registerdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div> 
                      </div>  
                    </div>
                        
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="photo" name="photo" accept="image/*" >
                                    <label class="custom-file-label" for="photo">Choose a photo</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="birth_certificate">Birth Certificate</label>
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
                        <label for="cmo_certificate">CMO Certificate</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="cmo_certificate" name="cmo_certificate" >
                          <label class="custom-file-label" for="cmo_certificate">Choose the document</label>
                        </div>
                       </div>
                      </div>  
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label for="address_proof">Address Proof</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="address_proof" name="address_proof" >
                          <label class="custom-file-label" for="address_proof">Choose the document</label>
                        </div>
                       </div>
                      </div>
                    </div>
               

                                     
                    <input type="hidden" name="user_id" value= "{{ $user_id }}"  >
                    <!-- <span class="text-danger">@error('user_id'){{ $message }} @enderror</span> -->
                        

                    
                  
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Register</button>
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
