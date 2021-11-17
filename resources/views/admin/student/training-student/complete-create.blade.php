@extends('layouts.admin')

@section('links')
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('assets/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

@section("page-name","register Training Student")
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
              <form method="post" autocomplete="off" action="{{ route('admin.students.training-students.complete-store') }}" enctype="multipart/form-data">
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
                            <label for="father_name">Father Name</label>
                            <input type="text" class="form-control" id="father_name" placeholder="Father Name" name="father_name" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="guardian">Guardian</label>
                            <input type="text" class="form-control" id="guardian" placeholder="Guardian" name="guardian" maxlength="255">
                        </div>                       
                      </div>
                      <div class="col-sm-4">                      
                        <div class="form-group">
                            <label for="mother_name">Mother Name</label>
                            <input type="text" class="form-control" id="mother_name" placeholder="Mother Name" name="mother_name" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                     <div class="col-sm-4">                      
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" id="age" placeholder="Age" name="age" maxlength="255">
                        </div>
                      </div>
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
                          <label for="marital_status">Marital Status</label>
                          <input type="text" class="form-control" id="marital_status" placeholder="Marital Status" name="marital_status" maxlength="255">
                        </div>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-sm-4">                      
                        <div class="form-group">
                            <label for="aadhar">Aadhar No</label>
                            <input type="text" class="form-control" id="aadhar" placeholder="Aadhar No" name="aadhar" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nationality">Nationality</label>
                            <input type="text" class="form-control" id="nationality" placeholder="Nationality" name="nationality" maxlength="255">
                        </div>                       
                      </div>
                      <div class="col-sm-4">                      
                        <div class="form-group">
                            <label for="domicile">Domicile</label>
                            <input type="text" class="form-control" id="domicile" placeholder="Domicile" name="domicile" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="category">Category</label>
                          <select class="form-control" name="category" id="category">
                            <option value="">Choose Category</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="OBC">OBC</option>
                            <option value="PH">PH</option>
                            <option value="Gen">Gen</option>                       
                          </select>                        
                        </div>
                      </div>  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="income">Annual Income</label>
                          <input type="text" class="form-control" name="income" placeholder="Annual Income" id="income" maxlength="255">
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
                            <label for="correspondance_address">Correspondance Address</label>
                            <textarea class="form-control" name="correspondance_address" placeholder="Correspondance Address" id="correspondance_address" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="permanent_address">Permanent Address</label>
                            <textarea class="form-control" name="permanent_address" placeholder="Permanent Address" id="permanent_address" rows="3"></textarea>
                        </div>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-sm-4">                      
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" placeholder="State" name="state" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="pincode">Pin code</label>
                            <input type="text" class="form-control" id="pincode" placeholder="Pin code" name="pincode" maxlength="255">
                        </div>                       
                      </div>
                      <div class="col-sm-4">                      
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" maxlength="255">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" placeholder="Contact Number" name="contact_number" maxlength="255">
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
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control" id="city" placeholder="City" name="city" maxlength="255" >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="academic_session">Academic Session</label>
                          <input type="text" class="form-control" id="academic_session" placeholder="Academic Session" name="academic_session" maxlength="255" >
                        </div>
                      </div>
                    </div>


                    <br><br>

                    <h4>Details of examinations passed:</h4>
                    <br>
                    <div class="table-responsive">
                    <table class="table table-bordered table-active">
                    <tr>
                        <td>Sl.No</td>
                        <td>Name of the exam passed</td>
                        <td>Name of the Board/University</td>
                        <td>Year of passing</td>
                        <td>Total Marks</td>
                        <td>Marks obtained</td>
                        <td>Percentage obtained</td>
                        <td>Subject</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>SSC/X Std</td>
                        <td><input type="text" class="form-control" id="ssc_board" placeholder="Board" name="ssc_board" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="ssc_year_passing" placeholder="year" name="ssc_year_passing" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="ssc_total_marks" placeholder="Marks" name="ssc_total_marks" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="ssc_marks_obtained" placeholder="Marks" name="ssc_marks_obtained" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="ssc_percentage_obtained" placeholder="Percentage" name="ssc_percentage_obtained" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="ssc_subject" placeholder="Subject" name="ssc_subject" maxlength="255"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>HSC/XII Std</td>
                        <td><input type="text" class="form-control" id="hsc_board" placeholder="Board" name="hsc_board" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="hsc_year_passing" placeholder="year" name="hsc_year_passing" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="hsc_total_marks" placeholder="Marks" name="hsc_total_marks" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="hsc_marks_obtained" placeholder="Marks" name="hsc_marks_obtained" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="hsc_percentage_obtained" placeholder="Percentage" name="hsc_percentage_obtained" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="hsc_subject" placeholder="Subject" name="hsc_subject" maxlength="255"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Any other</td>
                        <td><input type="text" class="form-control" id="examination_board_university" placeholder="Board/University" name="examination_board_university" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="examination_year_passing" placeholder="year" name="examination_year_passing" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="examination_total_marks" placeholder="Marks" name="examination_total_marks" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="examination_marks_obtained" placeholder="Marks" name="examination_marks_obtained" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="examination_percentage_obtained" placeholder="Percentage" name="examination_percentage_obtained" maxlength="255"></td>
                        <td><input type="text" class="form-control" id="examination_subject" placeholder="Subject" name="examination_subject" maxlength="255"></td>
                    </tr>
                
                    </table>
                    </div>

                    <br>
                    <br>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="extra_curricular_activities">Extra Curricular Activities</label>
                            <textarea class="form-control" name="extra_curricular_activities" placeholder="Extra Curricular Activities" id="extra_curricular_activities" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="course_reason">Why do they want to join this course</label>
                            <textarea class="form-control" name="course_reason" placeholder="Why do they want to join this course" id="course_reason" rows="3"></textarea>
                        </div>
                      </div>                      
                    </div>
                    <br>

              <h4>Documents to Attach:</h4>
                  <br>
                    <div class="row">
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label for="statement_marks">Statement of Marks of Intermediate / Higher Secondary or other qualifying Examination</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="statement_marks" name="statement_marks" >
                          <label class="custom-file-label" for="statement_marks">Choose the document</label>
                        </div>
                       </div>
                      </div>  
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label for="character_certificate">Attested copy of character certificate from last institution passed</label>
                        <p></p>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="character_certificate" name="character_certificate" >
                          <label class="custom-file-label" for="character_certificate">Choose the document</label>
                        </div>
                       </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label for="birth_certificate">Attested copy of Birth Certificate</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="birth_certificate" name="birth_certificate" >
                          <label class="custom-file-label" for="birth_certificate">Choose the document</label>
                        </div>
                       </div>
                      </div>  
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label for="experience_certificate">Work experience certificate (in case of any)</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="experience_certificate" name="experience_certificate" >
                          <label class="custom-file-label" for="experience_certificate">Choose the document</label>
                        </div>
                       </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label for="photo">Latest coloured passport size photograph</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="photo" name="photo" accept="image/*" >
                          <label class="custom-file-label" for="photo">Choose a photo</label>
                        </div>
                       </div>
                      </div>  
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label for="fee_document">Fee Draft / Cheque / Cash (Non-refundable)</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control" id="fee_document" name="fee_document" >
                          <label class="custom-file-label" for="fee_document">Choose the document</label>
                        </div>
                       </div>
                      </div>
                    </div>
      
     
                     <br><br>                                   
                

                                     
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
