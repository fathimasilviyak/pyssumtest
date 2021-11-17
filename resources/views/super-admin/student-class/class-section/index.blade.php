@extends('layouts.super-admin')

@section('links')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section("page-name","view Class Sections")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Class Sections</h3>
                <button type="button"  class="btn btn-success" style="display: inline-block; float: right" data-toggle="modal" data-target="#addSectionModal"><i class="fas fa-plus"></i>Add Section</button>
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
                    <th>Description</th>
                    <th>Faculty</th>
                    <th>Class Strength</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php
                    $s_no = 0;
                    $default = "not available";
                  @endphp
                  @forelse ($classSections as $classSection) 
                  @php ($s_no++)
                    <tr style="word-break:break-all;">
                        <td>{{ $s_no }}</td>
                        <td>{{ $classSection->name ?? $default }}</td>
                        <td>{{ $classSection->description ?? $default; }}</td> 
                        <td>{{ $classSection->faculty->name ?? $default; }}</td>   
                        <td>
                          @if($classSection->studentClass->type == "special_student")
                          {{ $classSection->specialStudents()->count(); }} 
                          @elseif($classSection->studentClass->type == "inclusive_student")
                          {{ $classSection->inclusiveStudents()->count(); }} 
                          @elseif($classSection->studentClass->type == "training_student")
                          {{ $classSection->trainingStudents()->count(); }}
                          @else
                          not available
                          @endif</td>               
                        <td style="width:200px">
                        <button class="btn btn-warning btnEditSection" data-classsection='{{ $classSection }}' data-url="{{ route('super-admin.student-classes.class-sections.update',$classSection->id) }}" id="btnUpdateSection{{$classSection->id}}"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the class section?')){
                                            document.getElementById('form-delete-{{$classSection->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$classSection->id}}" method="post" action="{{route('super-admin.student-classes.class-sections.destroy',$classSection->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>
                        

                        </td>
                    </tr>
              
          @empty
                    <tr>
                      <td><p style="color:#e3342f">No Sections to Show, Create one !</p></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
          @endforelse  
           
    
                  </tbody>
                  <tfoot>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Decription</th>
                    <th>Faculty</th>
                    <th>Class Strength</th>
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

 

<!-- modal for add class section -->

<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="addSectionForm" method="post" action="{{ route('super-admin.student-classes.class-sections.store')}}">  
    @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-form-label" >Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Secion Name" maxlength="255" >
          </div>
          <div class="form-group">
            <label for="description" class="col-form-label">Description:</label>
            <textarea  id="description" rows="3" class="form-control" name="description" placeholder="Description" ></textarea>
          </div>
          <div class="form-group">
            <label for="faculty_id" class="col-form-label">Teacher:</label>
            <select id="faculty_id" class="form-control" name="faculty_id" maxlength="255" >
              <option value=""> Choose Teacher...</option>
              @foreach ($users as $user )
              <option value="{{ $user->faculty->id }}" >{{ $user->faculty->name }}</option>
              @endforeach
            </select>
          </div>
          <input type="hidden" value="{{ $studentClassId }}" name="student_class_id" id="student_class_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnAddSection">Add</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal add class section close -->


<!-- modal for edit class section -->

<div class="modal fade" id="editSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="updateSectionForm" method="post" action="">  
    @csrf
    @method('put')
      <div class="modal-body">
          <div class="form-group">
            <label for="updt_name" class="col-form-label" >Name</label>
            <input type="text" class="form-control" id="updt_name" name="updt_name" placeholder="Secion Name" maxlength="255" >
          </div>
          <div class="form-group">
            <label for="updt_description" class="col-form-label">Description:</label>
            <textarea  id="updt_description" rows="3" class="form-control" name="updt_description" placeholder="Description" ></textarea>
          </div>
          <div class="form-group">
            <label for="updt_faculty_id" class="col-form-label">Teacher:</label>
            <select id="updt_faculty_id" class="form-control" name="updt_faculty_id" maxlength="255" >
              <option value=""> Choose Teacher...</option>
              @foreach ($users as $user )
              <option value="{{ $user->faculty->id }}" >{{ $user->faculty->name }}</option>
              @endforeach
            </select>
          </div>
          <input type="hidden" value="{{ $studentClassId }}" name="updt_student_class_id" id="updt_student_class_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnUpdateSection">Update</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal edit class section close -->



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



<script type="text/javascript">

$('#addSectionModal').on('show.bs.modal', function (e) {
  $(this)
    .find("#name,#description,#faculty_id")
       .val('')
       .end()    
});

$(".btnEditSection").on('click',function(){
    $('#editSectionModal')
    .find("#updt_name,#updt_description,#updt_faculty_id")
       .val('')
       .end() 

  $('#editSectionModal').modal('show');
  var data = $(this).data('classsection');
  var updateFormUrl = $(this).data('url');
	$("#updt_name").val(data.name);
    $("#updt_description").val(data.description);
    if(data.faculty){
        $("#updt_faculty_id").val(data.faculty.id);
    }
    
    $('#updateSectionForm').attr('action', updateFormUrl);

});




</script>   

@endpush

