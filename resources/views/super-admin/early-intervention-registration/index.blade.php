@extends('layouts.super-admin')

@section('links')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section("page-name","Early Intervention Registration")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Early Intervention Registration</h3>
                <a href="{{ route('super-admin.early-intervention-registrations.create') }}"  class="btn btn-success" style="display: inline-block; float: right"><i class="fas fa-user-plus"></i>Early Intervention Registration</a>
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
                  <div class="col-sm-3">
                    <select name="" id="selectFilter15" class="form-control">
                      <option value="">Choose Academic Session</option>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <select name="" id="selectFilter14" class="form-control">
                      <option value="">Choose City</option>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <button id="resetTable" class="btn btn-danger">Reset</button>
                  </div>
                </div>
                <br>


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="noExport">S/N</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Reffered By</th>
                    <th>Father Name</th>
                    <th>Father Occupation</th>
                    <th>Father Contact No</th>
                    <th>Mother Name</th>
                    <th>Mother Occupation</th>
                    <th>Mother Contact No</th>
                    <th>Address</th>
                    <th>Present Complaints</th>
                    <th>Date</th>
                    <th>City</th>
                    <th>Academic Sesssion</th>
                    <th class="noExport">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php
                    $s_no = 0;
                    $default = "not available";
                  @endphp
          @forelse ($eIRegistrations as $eIRegistration) 
          @php ($s_no++)
                    <tr style="word-break:break-all;">
                        <td>{{ $s_no }}</td>
                        <td>{{ $eIRegistration->name ?? $default; }}</td> 
                        <td>{{ isset($eIRegistration->dob) ? \Carbon\Carbon::parse($eIRegistration->dob)->format('d/m/Y') : $default;}}</td>  
                        <td>{{ $eIRegistration->gender ?? $default; }}</td> 
                        <td>{{ $eIRegistration->reffered_by ?? $default; }}</td> 
                        <td>{{ $eIRegistration->father_name ?? $default; }}</td> 
                        <td>{{ $eIRegistration->father_occupation ?? $default; }}</td> 
                        <td>{{ $eIRegistration->father_contact ?? $default; }}</td> 
                        <td>{{ $eIRegistration->mother_name ?? $default; }}</td>                 
                        <td>{{ $eIRegistration->mother_occupation ?? $default; }}</td> 
                        <td>{{ $eIRegistration->mother_contact ?? $default; }}</td> 
                        <td>{{ $eIRegistration->address ?? $default; }}</td> 
                        <td>{{ $eIRegistration->present_complaints ?? $default; }}</td> 
                        <td>{{ isset($eIRegistration->date) ? \Carbon\Carbon::parse($eIRegistration->date)->format('d/m/Y') : $default; }}</td> 
                        <td>{{ $eIRegistration->city ?? $default; }}</td> 
                        <td>{{ $eIRegistration->academic_session ?? $default; }}</td>
                        <td style="width:200px">
                        
                        <a href="{{ route('super-admin.early-intervention-registrations.show', $eIRegistration->id) }}"  class="btn btn-info">Show</a>
                            <!-- <button class="btn btn-warning btnProductUpdate" data-product='' data-url="" id=""><i class="fa fa-pencil"></i></button> -->
                            <a href="{{ route('super-admin.early-intervention-registrations.edit', $eIRegistration->id) }}"  class="btn btn-warning"> <i class="fa fa-pencil"></i> </a>
                            <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the Early Intervention Registration?')){
                                            document.getElementById('form-delete-{{$eIRegistration->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$eIRegistration->id}}" method="post" action="{{route('super-admin.early-intervention-registrations.destroy',$eIRegistration->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>

                        </td>
                    </tr>
          @empty
                    <tr>
                      <td><p style="color:#e3342f">No Early Intervention Registration to Show, Create one !</p></td>
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
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Reffered By</th>
                    <th>Father Name</th>
                    <th>Father Occupation</th>
                    <th>Father Contact No</th>
                    <th>Mother Name</th>
                    <th>Mother Occupation</th>
                    <th>Mother Contact No</th>
                    <th>Address</th>
                    <th>Present Complaints</th>
                    <th>Date</th>
                    <th>City</th>
                    <th>Academic Sesssion</th>
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
                "targets": [ 2,3,4,5,6,7,8,9,10,11,12,13 ],
                "visible": false
            }
        ],
        buttons: [
            {
                extend: 'print',
                title: 'Pyssum',
                messageTop: 'Early Intervention Registrations',
                exportOptions: {
                    columns: [':visible :not(.noExport)']
                }
            },
            {
                extend: 'excelHtml5',
                title: 'Pyssum',
                messageTop: 'Early Intervention Registrations',
                exportOptions: {
                    columns: [':visible :not(.noExport)']
                }
            },
            {
                extend: 'pdfHtml5',
                download: 'open',
                title: 'Pyssum',
                messageTop: 'Early Intervention Registrations',
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
            this.api().columns([14,15]).every( function () {
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
      $("#selectFilter14").val('');
      $("#selectFilter15").val('');
      $("#example1").DataTable().search( '' ).columns().search( '' ).draw();
    });


  });

</script>

@endpush

