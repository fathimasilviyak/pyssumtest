@extends('layouts.admin')

@section('links')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section("page-name","view faculty")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Faculties</h3>
                <a href="{{ route('admin.faculties.create') }}"  class="btn btn-success" style="display: inline-block; float: right"><i class="fas fa-user-plus"></i> Create Faculty</a>
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
                    <th>Username</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Role</th>
                    <th>Action</th>
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
                        <td>{{ $user->faculty->name ?? $default; }}</td>
                        <td>{{ $user->faculty->designation ?? $default; }}</td>
                        <td>{{ $user->role }}</td>                      
                        <td style="width:200px">
                        
                        <a href="{{ route('admin.faculties.show', $user->faculty->id) }}"  class="btn btn-info">Show</a>
                            <!-- <button class="btn btn-warning btnProductUpdate" data-product='' data-url="" id=""><i class="fa fa-pencil"></i></button> -->
                            <a href="{{ route('admin.faculties.edit', $user->faculty->id) }}"  class="btn btn-warning"> <i class="fa fa-pencil"></i> </a>
                          @if($user->id != auth()->id())
                            <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the faculty?')){
                                            document.getElementById('form-delete-{{$user->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$user->id}}" method="post" action="{{route('admin.faculties.destroy',$user->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>
                          @endif
                        </td>
                    </tr>
              @else
              <tr style="background-color:#FFE0DC">
                        <td>{{ $s_no }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td></td>
                        <td style="text-align:center; color:red">Incomplete Registration!! Either Complete or Delete</td>
                        <td>{{ $user->role }}</td>                      
                        <td>
                        
                            <!-- <button class="btn btn-warning btnProductUpdate" data-product='' data-url="" id=""><i class="fa fa-pencil"></i></button> -->
                            <a href="{{ route('admin.faculties.complete-create',$user->id) }}"  class="btn btn-warning"> <i class="fa fa-pencil"></i> </a>
                          @if($user->id != auth()->id())  
                            <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the faculty?')){
                                            document.getElementById('form-delete-{{$user->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$user->id}}" method="post" action="{{route('admin.faculties.destroy',$user->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>
                          @endif
                        </td>
                    </tr>
              
              




              @endif
          @empty
                    <tr>
                      <td><p style="color:#e3342f">No Faculties to Show, Create one !</p></td>
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
                    <th>Designation</th>
                    <th>Role</th>
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
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>


@endpush

