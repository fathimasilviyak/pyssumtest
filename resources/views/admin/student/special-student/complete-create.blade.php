@extends('layouts.admin')

@section('links')
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('assets/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

@section("page-name","register special student")
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
              <form method="post" autocomplete="off" action="{{ route('admin.students.special-students.complete-store') }}" enctype="multipart/form-data">
                  @csrf
                 
                <div class="card-body">
                    
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="register_number">Register Number</label>
                          <input type="text" class="form-control" id="register_number" placeholder="Register Number" name="register_number" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="bill_number">Bill Number</label>
                          <input type="text" class="form-control" id="bill_number" placeholder="Bill Number" name="bill_number" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="date_register">Register Date</label>
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
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reffered_by">Reffered By</label>
                            <input type="text" class="form-control" id="reffered_by" placeholder="Reffered By" name="reffered_by" maxlength="255">
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
                          <label for="dob">DOB</label>
                          <div class="input-group date" id="birthdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#birthdate" name="dob" id="dob" placeholder="DD/MM/YYYY">
                              <div class="input-group-append" data-target="#birthdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div>                           
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="age">Age</label>
                          <input type="text" class="form-control" id="age" placeholder="Age" name="age" maxlength="255">
                        </div>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="language_spoken">Language Spoken</label>
                          <input type="text" class="form-control" id="language_spoken" placeholder="Language Spoken" name="language_spoken" maxlength="255">
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_name">Father Name</label>
                          <input type="text" class="form-control" name="father_name" placeholder="Father Name" id="father_name" maxlength="255">
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
                          <label for="occupation">Occupation</label>
                          <input type="text" class="form-control" id="occupation" placeholder="Occupation" name="occupation" maxlength="255">
                        </div>
                      </div>                      
                    </div>

                    <div class="row">                     
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="family_status">Family Status</label>
                          <select class="form-control" name="family_status" id="family_status">
                            <option value="">Choose Family Status</option>
                            <option value="high">high</option>
                            <option value="middle">middle</option>
                            <option value="low">low</option>                         
                          </select>                        
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="living_area">Living Area</label>
                          <select class="form-control" name="living_area" id="living_area">
                            <option value="">Choose Living Area</option>
                            <option value="rural">rural</option>
                            <option value="urban">urban</option>
                            <option value="semi_urban">semi_urban</option>                         
                          </select>                        
                        </div>
                      </div>                                                         
                    </div>

                    <div class="row">
                      <div class="col-sm-6">                      
                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" id="religion" placeholder="Religion" name="religion" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="caste">Caste</label>
                            <input type="text" class="form-control" id="caste" placeholder="Caste" name="caste" maxlength="255">
                        </div>                       
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">                      
                        <div class="form-group">
                            <label for="informant_name">Informant Name</label>
                            <input type="text" class="form-control" id="informant_name" placeholder="Informant Name" name="informant_name" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="informant_relationship">Informant Relationship</label>
                            <input type="text" class="form-control" id="informant_relationship" placeholder="Informant Relationship" name="informant_relationship" maxlength="255">
                        </div>                       
                      </div>
                      <div class="col-sm-4">                      
                        <div class="form-group">
                            <label for="contact_duration">Contact Duration</label>
                            <input type="text" class="form-control" id="contact_duration" placeholder="Contact Duration" name="contact_duration" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">                     
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="present_complaint">Present Complaint</label>
                            <input type="text" class="form-control" id="present_complaint" placeholder="Present Complaint" name="present_complaint" maxlength="255">
                        </div>                       
                      </div>
                      <div class="col-sm-6">                      
                        <div class="form-group">
                          <label for="student_class_id" class="col-form-label">Class:</label>
                          <select id="student_class_id" class="form-control" name="student_class_id" maxlength="255" >
                            <option value=""> Choose Class...</option>
                            @foreach ($studentClasses as $studentClass )
                              <option value="{{ $studentClass->id }}" >{{ $studentClass->name}}</option>
                            @endforeach
                          </select>
                        </div> 
                      </div>
                    </div>

                    <div class="row"> 
                      <div class="col-sm-4">  
                        <div class="form-group">
                          <label for="class_section_id" class="col-form-label">Section:</label>
                          <select id="class_section_id" class="form-control" name="class_section_id" maxlength="255" disabled >
                          </select>
                        </div>                    
                      </div>                     
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" placeholder="Contact Number" name="contact_number" maxlength="255">
                        </div>                       
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tfeec">tfeec</label>
                            <input type="text" class="form-control" id="tfeec" placeholder="tfeec" name="tfeec" maxlength="255">
                        </div>                       
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">                      
                        <div class="form-group">
                            <label for="tcno">tcno</label>
                            <input type="text" class="form-control" id="tcno" placeholder="tcno" name="tcno" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pinv">pinv</label>
                            <input type="text" class="form-control" id="pinv" placeholder="pinv" name="pinv" maxlength="255">
                        </div>                       
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control" id="city" placeholder="City" name="city" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="academic_session">Academic Session</label>
                          <input type="text" class="form-control" id="academic_session" placeholder="Academic Session" name="academic_session" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->
                          <label for="photo">Photo</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="photo" name="photo" accept="image/*" >
                            <label class="custom-file-label" for="photo">Choose a photo</label>
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


$(document).ready(function(){

$('#student_class_id').change(function(e){
    e.preventDefault();
    $("#class_section_id").attr('disabled', true);
    $("#class_section_id").val("");
    var student_class_id = $(this).val();
    if (student_class_id) {
      $("#class_section_id").attr('disabled', false);
          $.ajax({
              type: "GET",
              url: "{{route('admin.get-class-sections')}}",
              data : { 'student_class_id' : student_class_id},
              success: function(data) {
                  if (data) { 
                    $('#class_section_id').find('option').remove();
                       $.each(data, function (i, item) {
                        $('#class_section_id').append($('<option>', { 
                          value: item.id,
                          text : item.name 
                        }));
                      });
                  }
              }
          });
    }
   
});	

});


</script>
@endpush
