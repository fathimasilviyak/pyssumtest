@extends('layouts.super-admin')

@section('links')
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('assets/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

@section("page-name","Edit Inclusive Student")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Inclusive Student</h3>
              </div>
              <!-- /.card-header -->
             
              <!-- form start -->
              <form method="post" autocomplete="off" action="{{ route('super-admin.students.inclusive-students.update',$inclusiveStudent->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                 
                <div class="card-body">
                    
                    <div class="form-group">
                      <label for="viewImage"></label>
                      <img src="{{ asset('images/student/inclusive-student/'.$inclusiveStudent->photo) }}" alt="" id="viewImage" height="150" width="150" >
                    </div>
                    <div class="row">
                      <div class="col-sm-6">                      
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" maxlength="255" value="{{ $inclusiveStudent->name }}" >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="dob">DOB</label>
                          <div class="input-group date" id="birthdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#birthdate" name="dob" id="dob" placeholder="DD/MM/YYYY" value="{{  isset($inclusiveStudent->dob) ? \Carbon\Carbon::parse($inclusiveStudent->dob)->format('d/m/Y') : ''; }}" >
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
                            <option value="male" {{ $inclusiveStudent->gender  == 'male' ? 'selected' : '' }} >male</option>
                            <option value="female" {{ $inclusiveStudent->gender  == 'female' ? 'selected' : '' }} >female</option>
                            <option value="trans" {{ $inclusiveStudent->gender  == 'trans' ? 'selected' : '' }} >trans</option>                         
                          </select>                        
                        </div>
                      </div>                                    
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="aadhar">Aadhar</label>
                          <input type="text" class="form-control" id="aadhar" placeholder="Aadhar" name="aadhar" maxlength="255" value="{{ $inclusiveStudent->aadhar }}" >
                        </div>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_name">Father Name</label>
                          <input type="text" class="form-control" id="father_name" placeholder="Father Name" name="father_name" maxlength="255" value="{{ $inclusiveStudent->father_name }}" >
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_profession">Father Profession</label>
                          <input type="text" class="form-control" name="father_profession" placeholder="Father Profession" id="father_profession" maxlength="255" value="{{ $inclusiveStudent->father_profession }}" >
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_contact">Father Contact No</label>
                          <input type="text" class="form-control" id="father_contact" placeholder="Father Contact No" name="father_contact" maxlength="255" value="{{ $inclusiveStudent->father_contact }}" >
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="father_income">Father Monthly Income</label>
                          <input type="text" class="form-control" name="father_income" placeholder="Father Monthly Income" id="father_income" maxlength="255" value="{{ $inclusiveStudent->father_income }}" >
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_name">Mother Name</label>
                          <input type="text" class="form-control" id="mother_name" placeholder="Mother Name" name="mother_name" maxlength="255" value="{{ $inclusiveStudent->mother_name }}" >
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_profession">Mother Profession</label>
                          <input type="text" class="form-control" name="mother_profession" placeholder="Mother Profession" id="mother_profession" maxlength="255" value="{{ $inclusiveStudent->mother_profession }}" >
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_contact">Mother Contact No</label>
                          <input type="text" class="form-control" id="mother_contact" placeholder="Mother Contact No" name="mother_contact" maxlength="255" value="{{ $inclusiveStudent->mother_contact }}" >
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mother_income">Mother Monthly Income</label>
                          <input type="text" class="form-control" name="mother_income" placeholder="Mother Monthly Income" id="mother_income" maxlength="255" value="{{ $inclusiveStudent->mother_income }}" >
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
                              <option value="{{ $studentClass->id }}"  {{ $inclusiveStudent->student_class_id  == $studentClass->id ? 'selected' : '' }} >{{ $studentClass->name}}</option>
                            @endforeach
                          </select>
                        </div>  
                      </div>
                      <div class="col-sm-6">  
                        <div class="form-group">
                          <label for="class_section_id" class="col-form-label">Section:</label>
                          <select id="class_section_id" class="form-control" name="class_section_id" maxlength="255" >
                            @foreach ($classSections as $classSection )
                              <option value="{{ $classSection->id }}"  {{ $inclusiveStudent->class_section_id  == $classSection->id ? 'selected' : '' }} >{{ $classSection->name }}</option>
                            @endforeach
                          </select>
                        </div>                    
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" placeholder="Address" id="address" rows="3">{{ $inclusiveStudent->address }}</textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="date_register">Date</label>
                          <div class="input-group date" id="registerdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#registerdate" name="date_register" id="date_register" placeholder="DD/MM/YYYY" value="{{  isset($inclusiveStudent->date) ? \Carbon\Carbon::parse($inclusiveStudent->date)->format('d/m/Y') : ''; }}" >
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
                          <input type="text" class="form-control" id="city" placeholder="City" name="city" maxlength="255" value="{{ $inclusiveStudent->city }}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="academic_session">Academic Session</label>
                          <input type="text" class="form-control" id="academic_session" placeholder="Academic Session" name="academic_session" maxlength="255" value="{{ $inclusiveStudent->academic_session }}">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                          <label for="photo"> Change Photo?</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="photo" name="photo" accept="image/*" >
                            <label class="custom-file-label" for="photo">Choose a photo</label>
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


$(document).ready(function(){
  if($('#student_class_id').val().length == 0){
   $("#class_section_id").attr('disabled', true);
  }
$('#student_class_id').change(function(e){
    e.preventDefault();
    $("#class_section_id").attr('disabled', true);
    $("#class_section_id").val("");
    var student_class_id = $(this).val();
    if (student_class_id) {
      $("#class_section_id").attr('disabled', false);
          $.ajax({
              type: "GET",
              url: "{{route('super-admin.get-class-sections')}}",
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
