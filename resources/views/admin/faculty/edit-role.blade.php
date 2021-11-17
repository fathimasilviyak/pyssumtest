@extends('layouts.admin')
@section("page-name","Faculty| Change Role")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Role</h3>
              </div>
              <!-- /.card-header -->

          
          

              <!-- form start -->
              <form method="post" autocomplete="off" action="{{ route('admin.faculties.update-role', $faculty->id) }}">
                  @csrf
                  @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="user_name">Username</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $faculty->user->user_name}}" disabled>
              
                </div>
     

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="">Choose a role</option>
                            <option value="admin" {{ $faculty->user->role == 'admin' ? 'selected' : '' }} >admin</option>
                            <option value="teacher" {{ $faculty->user->role == 'teacher' ? 'selected' : '' }} >teacher</option>                         
                        </select>
                        <span class="text-danger">@error('role'){{ $message }} @enderror</span>
                    </div>
                  

                    
                  
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Change</button>
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


