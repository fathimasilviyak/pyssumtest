@extends('layouts.teacher')

@section('links')
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('assets/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

@section("page-name","register Inclusive Student")
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
              <form method="post" autocomplete="off" action="{{ route('teacher.students.inclusive-students.complete-store') }}" enctype="multipart/form-data">
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
                          <label for="aadhar">Aadhar</label>
                          <input type="text" class="form-control" id="aadhar" placeholder="Aadhar" name="aadhar" maxlength="255">
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
                          <label for="father_profession">Father Profession</label>
                          <input type="text" class="form-control" name="father_profession" placeholder="Father Profession" id="father_profession" maxlength="255">
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
                          <label for="father_income">Father Monthly Income</label>
                          <input type="text" class="form-control" name="father_income" placeholder="Father Monthly Income" id="father_income" maxlength="255">
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
                          <label for="mother_profession">Mother Profession</label>
                          <input type="text" class="form-control" name="mother_profession" placeholder="Mother Profession" id="mother_profession" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_contact">Mother Contact No</label>
                          <input type="text" class="form-control" id="mother_contact" placeholder="Mother Contact No" name="mother_contact" maxlength="255">
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_income">Mother Monthly Income</label>
                          <input type="text" class="form-control" name="mother_income" placeholder="Mother Monthly Income" id="mother_income" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">                     
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
                      <div class="col-sm-6">  
                        <div class="form-group">
                          <label for="class_section_id" class="col-form-label">Section:</label>
                          <select id="class_section_id" class="form-control" name="class_section_id" maxlength="255" disabled >
                          </select>
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
              url: "{{route('teacher.get-class-sections')}}",
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
