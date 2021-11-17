@extends('layouts.super-admin')

@section('links')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section("page-name","Special Student-Activity Master")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Special Student-Activity Master</h3>
                <button type="button"  class="btn btn-success" style="display: inline-block; float: right" data-toggle="modal" data-target="#addActivityMasterModal"><i class="fas fa-plus"></i>Add Activity Master</button>
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

              <div class="row">
                  <div class="col-sm-2">
                    <select name="" id="selectFilter1" class="form-control">
                      <option value="">Choose Class</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="" id="selectFilter2" class="form-control">
                      <option value="">Choose Section</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="" id="selectFilter3" class="form-control">
                      <option value="">Choose Group</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <button id="resetTable" class="btn btn-danger">Reset</button>
                  </div>
                </div>
                <br>


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Group</th>
                    <th>Activity Number</th>
                    <th>Max Mark</th>
                    <th>Activity Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php
                    $s_no = 0;
                    $default = "not available";
                  @endphp
                  @forelse ($specialStudentActivityMasters as $specialStudentActivityMaster) 
                  @php ($s_no++)
                    <tr style="word-break:break-all;">
                        <td>{{ $s_no }}</td>
                        <td>{{ $specialStudentActivityMaster->studentClass->name ?? $default; }}</td>
                        <td>{{ $specialStudentActivityMaster->classSection->name ?? $default; }}</td>
                        <td>{{ $specialStudentActivityMaster->group ?? $default; }}</td>
                        <td>{{ $specialStudentActivityMaster->activity_number ?? $default; }}</td>
                        <td>{{ $specialStudentActivityMaster->max_mark ?? $default; }}</td>
                        <td>{{ $specialStudentActivityMaster->name ?? $default; }}</td>
                        <td style="width:100px">
                        <button class="btn btn-warning btnEditActivityMaster" data-activitymaster='{{ $specialStudentActivityMaster }}' data-url="{{ route('super-admin.activity-master.special-student-activity-master.update',$specialStudentActivityMaster->id) }}" id="btnEditActivityMaster{{$specialStudentActivityMaster->id}}"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the Activity Master for Special Student?')){
                                            document.getElementById('form-delete-{{$specialStudentActivityMaster->id}}').submit()
                                        }"><i class="fas fa-trash-alt"></i></button>
                                                <form style="display:none" id="{{'form-delete-'.$specialStudentActivityMaster->id}}" method="post" action="{{route('super-admin.activity-master.special-student-activity-master.destroy',$specialStudentActivityMaster->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>

                        </td>
                    </tr>
              
          @empty
                    <tr>
                      <td></td>
                      <td><p style="color:#e3342f">No Activity Master to Show, Create one !</p></td>
                      <td></td>
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
                    <th>Class</th>
                    <th>Section</th>
                    <th>Group</th>
                    <th>Activity Number</th>
                    <th>Max Mark</th>
                    <th>Activity Name</th>
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

 

<!-- modal for add ActivityMaster -->

<div class="modal fade" id="addActivityMasterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Activity Master</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="addActivityMasterForm" method="post" action="{{ route('super-admin.activity-master.special-student-activity-master.store') }}">  
    @csrf
      <div class="modal-body">
          <div class="row">                     
            <div class="col-sm-6">  
              <div class="form-group">
                <label for="student_class_id" class="col-form-label">Class:</label>
                <select id="student_class_id" class="form-control" name="student_class_id" maxlength="255" required>
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
          <div class="col-sm-4">
            <div class="form-group">
              <label for="group">Group</label>
                <select class="form-control" name="group" id="group" required>
                  <option value="">Choose Group...</option>
                  <option value="personal">Personal</option>
                  <option value="social">Social</option>
                  <option value="academic">Academic</option>
                  <option value="occupational">Occupational</option>
                  <option value="recreational indoor">Recreational Indoor</option>                         
                  <option value="recreational outdoor">Recreational Outdoor</option>
                </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="activity-number" class="col-form-label" >Activity Number</label>
              <input type="text" class="form-control" id="activity_number" name="activity_number" placeholder="Activity Number" required maxlength="255" >
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="max_mark" class="col-form-label" >Max Mark</label>
              <input type="text" class="form-control" id="max_mark" name="max_mark" placeholder="Max Mark" required maxlength="255" >
            </div>
          </div>
        </div>
          <div class="form-group">
            <label for="name" class="col-form-label" >Activity Name</label>
            <textarea rows="3" class="form-control" id="name" name="name" placeholder="Activity Name" required></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnAddActivityMaster">Add</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal add activity master close -->


<!-- modal for edit activity master -->
<div class="modal fade" id="editActivityMasterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Activity Master</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="updateActivityMasterForm" method="post" action="{{ route('super-admin.activity-master.special-student-activity-master.store') }}">  
    @csrf
    @method('put')
      <div class="modal-body">
          <div class="row">                     
            <div class="col-sm-6">  
              <div class="form-group">
                <label for="updt_student_class_id" class="col-form-label">Class:</label>
                <select id="updt_student_class_id" class="form-control" name="updt_student_class_id" maxlength="255" required>
                  <option value=""> Choose Class...</option>
                  @foreach ($studentClasses as $studentClass )
                              <option value="{{ $studentClass->id }}">{{ $studentClass->name}}</option>
                            @endforeach
                </select>
              </div>                    
            </div>
            <div class="col-sm-6">  
              <div class="form-group">
                <label for="updt_class_section_id" class="col-form-label">Section:</label>
                <select id="updt_class_section_id" class="form-control" name="updt_class_section_id" maxlength="255" >
                </select>
              </div>                    
            </div> 
          </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="updt_group">Group</label>
                <select class="form-control" name="updt_group" id="updt_group" required>
                  <option value="">Choose Group...</option>
                  <option value="personal">Personal</option>
                  <option value="social">Social</option>
                  <option value="academic">Academic</option>
                  <option value="occupational">Occupational</option>
                  <option value="recreational indoor">Recreational Indoor</option>                         
                  <option value="recreational outdoor">Recreational Outdoor</option>
                </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="updt_activity_number" class="col-form-label" >Activity Number</label>
              <input type="text" class="form-control" id="updt_activity_number" name="updt_activity_number" placeholder="Activity Number" required maxlength="255" >
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="updt_max_mark" class="col-form-label">Max Mark</label>
              <input type="text" class="form-control" id="updt_max_mark" name="updt_max_mark" placeholder="Max Mark" required maxlength="255">
            </div>
          </div>
        </div>
          <div class="form-group">
            <label for="updt_name" class="col-form-label" >Activity Name</label>
            <textarea rows="3" class="form-control" id="updt_name" name="updt_name" placeholder="Activity Name" required></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnUpdateActivityMaster">Update</button>
      </div>
    </form>  
    </div>
  </div>
</div>
<!-- modal edit activity master close -->



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

      initComplete: function () {
            this.api().columns([1,2,3]).every( function () {
                var column = this;
               
                var select = $('#selectFilter'+column.index())
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
           
      },
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#resetTable").click(function(){
      $("#selectFilter1").val('');
      $("#selectFilter2").val('');
      $("#selectFilter3").val('');
      $("#example1").DataTable().search( '' ).columns().search( '' ).draw();
    });

  });
</script>


<script type="text/javascript">

var selectedSection = 0;

$('#addActivityMasterModal').on('show.bs.modal', function (e) {
  $(this)
    .find("#student_class_id, #class_section_id, #group, #activity_number, #max_mark, #name")
       .val('')
       .end()   
});


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


$(".btnEditActivityMaster").on('click',function(){

  $('#editActivityMasterModal').modal('show');
  var data = $(this).data('activitymaster');
  var updateFormUrl = $(this).data('url');
  $("#updt_student_class_id").val(data.student_class_id);
  $("#updt_student_class_id").trigger("change");
  selectedSection = data.class_section_id;
  $("#updt_group").val(data.group);
	$("#updt_activity_number").val(data.activity_number);
  $("#updt_max_mark").val(data.max_mark);
	$("#updt_name").val(data.name);
  $('#updateActivityMasterForm').attr('action', updateFormUrl);

});




$('#updt_student_class_id').change(function(e){
    e.preventDefault();
    var updt_student_class_id = $(this).val();
    if (updt_student_class_id) {
          $.ajax({
              type: "GET",
              url: "{{route('super-admin.get-class-sections')}}",
              data : { 'student_class_id' : updt_student_class_id},
              success: function(data) {
                  if (data) { 
                    $('#updt_class_section_id').find('option').remove();
                       $.each(data, function (i, item) {
                        $('#updt_class_section_id').append($('<option>', { 
                          value: item.id,
                          text : item.name 
                        }));
                      });
                  }
              }
          }).done(function(){
            if(selectedSection != 0){
              $('#updt_class_section_id').val(selectedSection);
              selectedSection = 0;
            }

      });
    }
   
});




$('#editActivityMasterModal').on('hidden.bs.modal', function (e) {
  $(this)
    .find("#updt_student_class_id, #updt_class_section_id, #updt_group, #updt_activity_number, #updt_max_mark, #updt_name")
       .val('')
       .end()  
});


</script>   

@endpush

