@extends('layouts.teacher')

@section('links')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section("page-name","view Inclusive Students")

@section('page-content')

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Inclusive Students</h3>
                <a href="{{ route('teacher.students.inclusive-students.create') }}"  class="btn btn-success" style="display: inline-block; float: right"><i class="fas fa-user-plus"></i> Create Inclusive Student</a>
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
                    <select name="" id="selectFilter19" class="form-control">
                      <option value="">Choose Academic Session</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="" id="selectFilter18" class="form-control">
                      <option value="">Choose City</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="" id="selectFilter16" class="form-control">
                      <option value="">Choose Class</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="" id="selectFilter17" class="form-control">
                      <option value="">Choose Section</option>
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
                    <th class="noExport">S/N</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Dob</th>
                    <th>Gender</th>
                    <th>Aadhar no</th>
                    <th>Father Name</th>
                    <th>Father Profession</th>
                    <th>Father Contact No</th>
                    <th>Father Income</th>
                    <th>Mother Name</th>
                    <th>Mother Profession</th>
                    <th>Mother Contact No</th>
                    <th>Mother Income</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>City</th>
                    <th>Academic Session</th>
                    <th class="noExport">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php
                    $s_no = 0;
                    $default = "not available";
                  @endphp
          @forelse ($users as $user) 
          @php ($s_no++)
              @if($user->status == 1)
                    <tr style="word-break:break-all;">
                        <td>{{ $s_no }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->inclusiveStudent->name ?? $default; }}</td>
                        <td>{{ isset($user->inclusiveStudent->dob) ? \Carbon\Carbon::parse($user->inclusiveStudent->dob)->format('d/m/Y') : $default; }}</td>
                        <td>{{ $user->inclusiveStudent->gender ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->aadhar ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->father_name ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->father_profession ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->father_contact ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->father_income ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->mother_name ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->mother_profession ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->mother_contact ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->mother_income ?? $default; }}</td>
                        <td>{{ $user->inclusiveStudent->address ?? $default; }}</td>
                        <td>{{ isset($user->inclusiveStudent->date) ? \Carbon\Carbon::parse($user->inclusiveStudent->date)->format('d/m/Y') : $default; }}</td>
                        <td>{{ $user->inclusiveStudent->studentClass->name ?? $default; }}</td>  
                        <td>@if($user->inclusiveStudent->classSection){{ $user->inclusiveStudent->classSection->name }} @else {{ $default }} @endif</td>                   
                        <td>{{ $user->inclusiveStudent->city ?? $default; }}</td>  
                        <td>{{ $user->inclusiveStudent->academic_session ?? $default; }}</td>            
                        <td style="width:200px">
                        
                        <a href="{{ route('teacher.students.inclusive-students.show', $user->inclusiveStudent->id) }}"  class="btn btn-info">Show</a>
                            <!-- <button class="btn btn-warning btnProductUpdate" data-product='' data-url="" id=""><i class="fa fa-pencil"></i></button> -->
                            <a href="{{ route('teacher.students.inclusive-students.edit', $user->inclusiveStudent->id) }}"  class="btn btn-warning"> <i class="fa fa-pencil"></i> </a>
                            <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the inclusive_student?')){
                                            document.getElementById('form-delete-{{$user->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$user->id}}" method="post" action="{{route('teacher.students.inclusive-students.destroy',$user->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>

                        </td>
                    </tr>
              @else
              <tr style="background-color:#FFE0DC">
                        <td>{{ $s_no }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td style="text-align:center; color:red">Incomplete Registration!! Either Complete or Delete</td>                    
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        
                            <!-- <button class="btn btn-warning btnProductUpdate" data-product='' data-url="" id=""><i class="fa fa-pencil"></i></button> -->
                            <a href="{{ route('teacher.students.inclusive-students.complete-create',$user->id) }}"  class="btn btn-warning"> <i class="fa fa-pencil"></i> </a>
                            <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the inclusive_student?')){
                                            document.getElementById('form-delete-{{$user->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$user->id}}" method="post" action="{{route('teacher.students.inclusive-students.destroy',$user->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>

                        </td>
                    </tr>
              
              




              @endif
          @empty
                    <tr>
                      <td><p style="color:#e3342f">No Inclusive Students to Show, Create one !</p></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
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
                    <th>Username</th>
                    <th>Name</th>
                    <th>Dob</th>
                    <th>Gender</th>
                    <th>Aadhar no</th>
                    <th>Father Name</th>
                    <th>Father Profession</th>
                    <th>Father Contact No</th>
                    <th>Father Income</th>
                    <th>Mother Name</th>
                    <th>Mother Profession</th>
                    <th>Mother COntact No</th>
                    <th>Mother Income</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>City</th>
                    <th>Academic Session</th>
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
    var table = $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "columnDefs": [
            {
                "targets": [ 3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18 ],
                "visible": false
            }
        ],
        buttons: [
            {
                extend: 'print',
                title: 'Pyssum',
                messageTop: 'The List of Inclusive students',
                exportOptions: {
                    columns: [':visible :not(.noExport)']
                }
            },
            {
                extend: 'excelHtml5',
                title: 'Pyssum',
                messageTop: 'The List of Inclusive students',
                exportOptions: {
                    columns: [':visible :not(.noExport)']
                }
            },
            {
                extend: 'pdfHtml5',
                download: 'open',
                title: 'Pyssum',
                messageTop: 'The List of Inclusive students',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [':visible :not(.noExport)']
                }
            },
            {
                extend: 'colvis',
                postfixButtons: [ 'colvisRestore' ],
                columns: ':not(.noExport)',
            },
        ],
      initComplete: function () {
            this.api().columns([16,17,18,19]).every( function () {
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
      $("#selectFilter16").val('');
      $("#selectFilter17").val('');
      $("#selectFilter18").val('');
      $("#selectFilter19").val('');
      $("#example1").DataTable().search( '' ).columns().search( '' ).draw();
    });


  });

</script>

@endpush

