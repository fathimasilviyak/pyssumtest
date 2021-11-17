@extends('layouts.super-admin')

@section('links')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section("page-name","view Training Students")

@section('page-content')

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Training Students</h3>
                <a href="{{ route('super-admin.students.training-students.create') }}"  class="btn btn-success" style="display: inline-block; float: right"><i class="fas fa-user-plus"></i> Create Training Student</a>
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
                    <select name="" id="selectFilter27" class="form-control">
                      <option value="">Choose Academic Session</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="" id="selectFilter26" class="form-control">
                      <option value="">Choose City</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="" id="selectFilter15" class="form-control">
                      <option value="">Choose Class</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="" id="selectFilter16" class="form-control">
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
                    <th>Father Name</th>
                    <th>Guardian</th>
                    <th>Mother Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Marital Status</th>
                    <th>Aadhar No</th>
                    <th>Nationality</th>
                    <th>Domicile</th>
                    <th>Category</th>
                    <th>Annual Income</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Correspondance Address</th>
                    <th>Permanent Address</th>
                    <th>State</th>
                    <th>Pin Code</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Date</th>
                    <th>Extra Curricular Activities</th>
                    <th>Why do they want to join this course</th>
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
                        <td>{{ $user->trainingStudent->name ?? $default; }}</td>  
                        <td>{{ isset($user->trainingStudent->dob) ? \Carbon\Carbon::parse($user->trainingStudent->dob)->format('d/m/Y') : $default; }}</td>  
                        <td>{{ $user->trainingStudent->father_name ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->guardian ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->mother_name ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->age ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->gender ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->marital_status ?? $default; }}</td>
                        <td>{{ $user->trainingStudent->aadhar ?? $default; }}</td>    
                        <td>{{ $user->trainingStudent->nationality ?? $default; }}</td> 
                        <td>{{ $user->trainingStudent->domicile ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->category ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->income ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->studentClass->name ?? $default; }}</td>  
                        <td>@if($user->trainingStudent->classSection){{ $user->trainingStudent->classSection->name }} @else {{ $default }} @endif</td>  
                        <td>{{ $user->trainingStudent->correspondance_address ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->permanent_address ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->state ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->pincode ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->email ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->contact_number ?? $default; }}</td>  
                        <td>{{ isset($user->trainingStudent->date) ? \Carbon\Carbon::parse($user->trainingStudent->date)->format('d/m/Y') : $default; }}</td>  
                        <td>{{ $user->trainingStudent->extra_curricular_activities ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->course_reason ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->city ?? $default; }}</td>  
                        <td>{{ $user->trainingStudent->academic_session ?? $default; }}</td>                    
                        <td style="width:200px">
                        
                        <a href="{{ route('super-admin.students.training-students.show', $user->trainingStudent->id) }}"  class="btn btn-info">Show</a>
                            <!-- <button class="btn btn-warning btnProductUpdate" data-product='' data-url="" id=""><i class="fa fa-pencil"></i></button> -->
                            <a href="{{ route('super-admin.students.training-students.edit', $user->trainingStudent->id) }}"  class="btn btn-warning"> <i class="fa fa-pencil"></i> </a>
                            <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the Training Student?')){
                                            document.getElementById('form-delete-{{$user->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$user->id}}" method="post" action="{{route('super-admin.students.training-students.destroy',$user->id)}}">
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
                            <a href="{{ route('super-admin.students.training-students.complete-create',$user->id) }}"  class="btn btn-warning"> <i class="fa fa-pencil"></i> </a>
                            <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the Training Student?')){
                                            document.getElementById('form-delete-{{$user->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$user->id}}" method="post" action="{{route('super-admin.students.training-students.destroy',$user->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>

                        </td>
                    </tr>
              
              




              @endif
          @empty
                    <tr>
                      <td><p style="color:#e3342f">No Training Students to Show, Create one !</p></td>
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
                    <th>Father Name</th>
                    <th>Guardian</th>
                    <th>Mother Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Marital Status</th>
                    <th>Aadhar No</th>
                    <th>Nationality</th>
                    <th>Domicile</th>
                    <th>Category</th>
                    <th>Annual Income</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Correspondance Address</th>
                    <th>Permanent Address</th>
                    <th>State</th>
                    <th>Pin Code</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Date</th>
                    <th>Extra Curricular Activities</th>
                    <th>Why do they want to join this course</th>
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
                "targets": [ 3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26 ],
                "visible": false
            }
        ],
        buttons: [
            {
                extend: 'print',
                title: 'Pyssum',
                messageTop: 'The List of Training students',
                exportOptions: {
                    columns: [':visible :not(.noExport)']
                }
            },
            {
                extend: 'excelHtml5',
                title: 'Pyssum',
                messageTop: 'The List of Training students',
                exportOptions: {
                    columns: [':visible :not(.noExport)']
                }
            },
            {
                extend: 'pdfHtml5',
                download: 'open',
                title: 'Pyssum',
                messageTop: 'The List of Training students',
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
            this.api().columns([27,26,15,16]).every( function () {
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
      $("#selectFilter27").val('');
      $("#selectFilter26").val('');
      $("#selectFilter15").val('');
      $("#selectFilter16").val('');
      $("#example1").DataTable().search( '' ).columns().search( '' ).draw();
    });


  });

</script>

@endpush


