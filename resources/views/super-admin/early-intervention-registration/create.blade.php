@extends('layouts.super-admin')

@section('links')
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('assets/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

@section("page-name","Early Intervention Registration")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Early Intervention Registration</h3>
              </div>
              <!-- /.card-header -->
              @error('user_id')
              <div class="alert" style="background-color:red;color:white;padding:5px;margin:5px">
                        {{ $message }}
              </div>
              @enderror


              <!-- form start -->
              <form method="post" autocomplete="off" action="{{ route('super-admin.early-intervention-registrations.store') }}" enctype="multipart/form-data">
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
                      <div class="col-sm-4">
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
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="aadhar">Aadhar</label>
                          <input type="text" class="form-control" id="aadhar" placeholder="Aadhar" name="aadhar" maxlength="255">
                        </div>
                      </div>                              
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="reffered_by">Reffered By</label>
                          <input type="text" class="form-control" id="reffered_by" placeholder="Reffered By" name="reffered_by" maxlength="255">
                        </div>
                      </div>                     
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_name">Father Name</label>
                          <input type="text" class="form-control" id="father_name" placeholder="Father Name" name="father_name" maxlength="255">
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_occupation">Father Occupation</label>
                          <input type="text" class="form-control" name="father_occupation" placeholder="Father Occupation" id="father_occupation" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_contact">Father Contact No</label>
                          <input type="text" class="form-control" id="father_contact" placeholder="Father Contact No" name="father_contact" maxlength="255">
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_name">Mother Name</label>
                          <input type="text" class="form-control" id="mother_name" placeholder="Mother Name" name="mother_name" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row"> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_occupation">Mother Occupation</label>
                          <input type="text" class="form-control" name="mother_occupation" placeholder="Mother Occupation" id="mother_occupation" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_contact">Mother Contact No</label>
                          <input type="text" class="form-control" id="mother_contact" placeholder="Mother Contact No" name="mother_contact" maxlength="255">
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
                            <label for="present_complaints">Present Complaints</label>
                            <textarea class="form-control" name="present_complaints" placeholder="Present Complaints" id="present_complaints" rows="3"></textarea>
                        </div>
                      </div>                      
                    </div>

                    <br>
                    <h4>Developmental Milestones:	</h4><br>
                    <div class="row"> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="head_control">Head Control</label>
                          <input type="text" class="form-control" name="head_control" placeholder="Head Control(months)" id="head_control" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="sitting">Sitting</label>
                          <input type="text" class="form-control" id="sitting" placeholder="Sitting(months)" name="sitting" maxlength="255">
                        </div>
                      </div> 
                    </div>
                    <div class="row"> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="standing">Standing</label>
                          <input type="text" class="form-control" name="standing" placeholder="Standing(months)" id="standing" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="walking">Walking</label>
                          <input type="text" class="form-control" id="walking" placeholder="Walking(months)" name="walking" maxlength="255">
                        </div>
                      </div> 
                    </div>
                    <div class="row"> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="first_meaningfull_word">First Meaningfull Word</label>
                          <input type="text" class="form-control" name="first_meaningfull_word" placeholder="First Meaningfull Word(months)" id="first_meaningfull_word" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="bowel_bladder_control">Bowel Bladder Control</label>
                          <input type="text" class="form-control" id="bowel_bladder_control" placeholder="Bowel Bladder Control(months)" name="bowel_bladder_control" maxlength="255">
                        </div>
                      </div> 
                    </div>
                    <br>

                    <h4>To be answered by parents or caregiver</h4><br>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="child_hear">Do you think your child hears well?</label>
                            If no, explain:<textarea class="form-control" name="child_hear"  id="child_hear" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="child_talk">Do you think your child talks like other toddlers his age </label>
                            If no, explain:<textarea class="form-control" name="child_talk" id="child_talk" rows="2"></textarea>
                        </div>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="understand_child">Can you understand most of what your child says?</label>
                            If no, explain:<textarea class="form-control" name="understand_child"  id="understand_child" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="like_other">Do you think your child walks, runs, and climb like other toddlers her age? </label>
                            If no, explain:<textarea class="form-control" name="like_other" id="like_other" rows="2"></textarea>
                        </div>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="family_history">Does either parent have a family history of childhood deafness or hearing impairment?</label>
                            If no, explain:<textarea class="form-control" name="family_history"  id="family_history" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="child_vision">Do you have concern about your child’s vision?</label>
                            If no, explain:<textarea class="form-control" name="child_vision" id="child_vision" rows="2"></textarea>
                        </div>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="medical_problems">Has your child had any medical problem in the last several months?</label>
                            If no, explain:<textarea class="form-control" name="medical_problems"  id="medical_problems" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="worries">Does anything about your child worry you?</label>
                            If no, explain:<textarea class="form-control" name="worries" id="worries" rows="2"></textarea>
                        </div>
                      </div>                      
                    </div>
                   
                    <br>
                    <h4>To be filled by administrator:</h4><br>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="motor_development">Motor Development</label>
                            <textarea class="form-control" name="motor_development" placeholder="Motor Development" id="motor_development" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="language_development">Language Development</label>
                            <textarea class="form-control" name="language_development" placeholder="Language Development" id="language_development" rows="3"></textarea>
                        </div>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="social_development">Social Development</label>
                            <textarea class="form-control" name="social_development" placeholder="Social Development" id="social_development" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cognitive_development">Cognitive Development</label>
                            <textarea class="form-control" name="cognitive_development" placeholder="Cognitive Development" id="cognitive_development" rows="3"></textarea>
                        </div>
                      </div>                      
                    </div>
                    <br><br>

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
                                <label for="photo">Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="photo" name="photo" accept="image/*" >
                                    <label class="custom-file-label" for="photo">Choose a photo</label>
                                </div>
                            </div>
                        </div>
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
