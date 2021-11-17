@extends('layouts.admin')
@section("page-name","register Vocational Student")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Register Vocational Student</h3>
              </div>
              <!-- /.card-header -->
<!-- show success or error while Vocational Student register -->
              @if (session('success'))
                            <div class="alert" style="background-color:green;color:white;padding:5px;margin:5px">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('fail'))
                            <div class="alert" style="background-color:red;color:white;padding:5px;margin:5px">
                                {{ session('fail') }}
                            </div>
                        @endif
          
          

              <!-- form start -->
              <form method="post" autocomplete="off" action="{{ route('admin.students.vocational-students.store') }}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="user_name">Username</label>
                    <input type="text" class="form-control" id="user_name" placeholder="Username" name="user_name" value="{{old('user_name')}}" required>
                    <span class="text-danger">@error('user_name'){{ $message }}@enderror</span>
                </div>
                    <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required minlength="8">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm password" required minlength="8" >
                        <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                    </div>

                    <input type="hidden" class="form-control" id="role" name="role" value="vocational_student">
                    <span class="text-danger">@error('role'){{ $message }} @enderror</span>

                   
                  

                    
                  
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Next</button>
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


