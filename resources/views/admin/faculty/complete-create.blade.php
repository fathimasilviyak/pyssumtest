@extends('layouts.admin')

@section('links')
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('assets/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

@section("page-name","register faculty")
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
              <form method="post" autocomplete="off" action="{{ route('admin.faculties.complete-store') }}" enctype="multipart/form-data">
                  @csrf
                 
                <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name="name" maxlength="255">
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-6">
                      <!-- text input -->
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" placeholder="Email" name="email" maxlength="255">
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
                      <!-- text input -->
                        <div class="form-group">
                          <label for="gender">Gender</label>
                          <input type="text" class="form-control" name="gender" placeholder="Male/Female/Other" id="gender" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="aadhar">Aadhar</label>
                          <input type="text" class="form-control" name="aadhar" placeholder="Aadhar no" id="aadhar" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                      <!-- text input -->
                        <div class="form-group">
                          <label for="guardian">Guardian</label>
                          <input type="text" class="form-control" name="guardian" placeholder="guardian" id="guardian" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="qualification">Qualification</label>
                          <input type="text" class="form-control" name="qualification" placeholder="qualification" id="qualification" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                      <!-- text input -->
                        <div class="form-group">
                          <label for="date_appoinment">Date of Appoinment</label>
                          <div class="input-group date" id="appoinmentdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#appoinmentdate" name="date_appoinment" id="date_appoinment" placeholder="DD/MM/YYYY">
                            <div class="input-group-append" data-target="#appoinmentdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                        </div>
   
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="designation">Designation</label>
                          <input type="text" class="form-control" name="designation" placeholder="Designation" id="designation" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                      <!-- text input -->
                        <div class="form-group">
                          <label for="nature_appoinment">Nature of Appoinment</label>
                          <select class="form-control" name="nature_appoinment" id="nature_appoinment">
                            <option value="">Choose the nature of appoinment</option>
                            <option value="contractual">Contractual</option>
                            <option value="temporary">Temporary</option>
                            <option value="observational">observational</option>                         
                          </select>
                        
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="specialized_in">Specialized in</label>
                          <input type="text" class="form-control" name="specialized_in" placeholder="Specialized in" id="specialized_in" maxlength="255">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                      <!-- text input -->
                        <div class="form-group">
                          <label for="pan">PAN</label>
                          <input type="text" class="form-control" name="pan" placeholder="PAN number" id="pan" maxlength="255">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="mobile">Mobile</label>
                          <input type="text" class="form-control" name="mobile" placeholder="Mobile" id="mobile" maxlength="255">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">  
                        <div class="form-group">
                          <label for="permenent_address">Permenent Address</label>
                          <textarea class="form-control" name="permenent_address" placeholder="Permenent Address" id="permenent_address" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">  
                        <div class="form-group">
                          <label for="local_address">Local Address</label>
                          <textarea class="form-control" name="local_address" placeholder="Local Address" id="local_address" rows="3"></textarea>
                        </div>
                      </div>    
                    </div>

                    <div class="row">
                      <div class="col-sm-6">  
                        <div class="form-group">
                          <label for="date_leaving">Date of Leaving</label>
                          <div class="input-group date" id="leavingdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#leavingdate" name="date_leaving" id="date_leaving" placeholder="DD/MM/YYYY">
                            <div class="input-group-append" data-target="#leavingdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">  
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
$('#birthdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });

$('#appoinmentdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });

$('#leavingdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });

//Page specific script 

$(function () {
  bsCustomFileInput.init();
});



</script>
@endpush
