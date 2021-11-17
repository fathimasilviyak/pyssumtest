@extends('layouts.super-admin')

@section('links')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section("page-name","view Student Classes")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Classes</h3>
                <button type="button"  class="btn btn-success" style="display: inline-block; float: right" data-toggle="modal" data-target="#addClassModal"><i class="fas fa-plus"></i>Create Class</button>
              </div>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php
                    $s_no = 0;
                    $default = "not available";
                  @endphp
                  @forelse ($studentClasses as $studentClass) 
                  @php ($s_no++)
                    <tr style="word-break:break-all;">
                        <td>{{ $s_no }}</td>
                        <td>{{ $studentClass->name }}</td>
                        <td>{{ $studentClass->type }}</td>
                        <td style="width:250px">
                        <button class="btn btn-warning btnEditClass" data-studentclass='{{ $studentClass }}' data-url="{{ route('super-admin.student-classes.update',$studentClass->id) }}" id="btnUpdateClass{{$studentClass->id}}"><i class="fa fa-pencil"></i></button>
                            <!-- <a href=""  class="btn btn-warning btnUpdateClass"> <i class="fa fa-pencil"></i> </a> -->
                        <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the class?')){
                                            document.getElementById('form-delete-{{$studentClass->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$studentClass->id}}" method="post" action="{{route('super-admin.student-classes.destroy',$studentClass->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>
                        <a class="btn btn-info" href="{{ route('super-admin.student-classes.class-sections.index',$studentClass->id) }}">Sections</button>
                        

                        </td>
                    </tr>
              
          @empty
                    <tr>
                      <td><p style="color:#e3342f">No Classes to Show, Create one !</p></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
          @endforelse  
           
    
                  </tbody>
                  <tfoot>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

 

<!-- modal for add class -->

<div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="addClassForm" method="post" action="{{ route('super-admin.student-classes.store') }}">  
    @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-form-label" >Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Class Name" value="{{ old('name') }}" required maxlength="255" >
            <span class="text-danger">  @if ($errors->addClassErrors->has("name")){{$errors->addClassErrors->first("name")}} @endif</span>
          </div>
          <div class="form-group">
            <label for="type" class="col-form-label">Type:</label>
            <select id="type" class="form-control" name="type" required maxlength="255" >
              <option value=""> Choose Student Type...</option>
              <option value="EI" >EI</option>
              <option value="special_student" >Special Student</option>
              <option value="inclusive_student">Inclusive Student</option>
              <option value="training_student">Training Student</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnAddClass">Add</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal add class close -->


<!-- modal for edit class -->

<div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="updateClassForm" method="post" action="@if(Session::has('urlValue')) {{session()->get('urlValue')}} @endif">  
    @csrf
    @method('put')
      <div class="modal-body">
          <div class="form-group">
            <label for="updt_name" class="col-form-label" >Name</label>
            <input type="text" class="form-control" id="updt_name" name="updt_name" placeholder="Class Name" value="{{ old('updt_name') }}" required maxlength="255" >
            <span class="text-danger">  @if ($errors->updateClassErrors->has("updt_name")){{$errors->updateClassErrors->first("updt_name")}} @endif</span>
          </div>
          <div class="form-group">
            <label for="updt_type" class="col-form-label">Type:</label>
            <select id="updt_type" class="form-control" name="updt_type" required maxlength="255">
              <option value=""> Choose Student Type...</option>
              <option value="EI" >EI</option>
              <option value="special_student" >Special Student</option>
              <option value="inclusive_student">Inclusive Student</option>
              <option value="training_student">Training Student</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnUpdateClass">Update</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal edit class close -->



@endsection

@push('scripts')

<!-- DataTables  & Plugins -->

<script src="{{ asset('assets/user/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/user/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/user/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

  <!-- pop up model if there is error for add class in server side validation     -->
  <script type="text/javascript">
@if(!$errors->addClassErrors->isEmpty())
    $('#addClassModal').modal('show');
@endif

$('#addClassModal').on('show.bs.modal', function (e) {
  $(this)
    .find("#name,#type")
       .val('')
       .end()
    .find(".text-danger")
        .html('')
        .end()    
});

$(".btnEditClass").on('click',function(){

  $('#editClassModal').modal('show');
  var data = $(this).data('studentclass');
  var updateFormUrl = $(this).data('url');
		$("#updt_name").val(data.name);
    $("#updt_type").val(data.type);
    $('#updateClassForm').attr('action', updateFormUrl);

});

// <!-- pop up model if there is error for update class in server side validation     -->

@if(!$errors->updateClassErrors->isEmpty())
    $('#editClassModal').modal('show');
@endif
$('#editClassModal').on('hidden.bs.modal', function (e) {
  $(this)
    .find("#updt_name,#updt_type")
       .val('')
       .end()
    .find(".text-danger")
        .html('')
        .end()    
});


</script>   

@endpush

