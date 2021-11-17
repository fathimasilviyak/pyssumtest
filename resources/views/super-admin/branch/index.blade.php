@extends('layouts.super-admin')

@section('links')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section("page-name","view Branches")
@section('page-content')

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Branches</h3>
                <button type="button"  class="btn btn-success" style="display: inline-block; float: right" data-toggle="modal" data-target="#addBranchModal"><i class="fas fa-plus"></i>Create Branch</button>
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
                    <th>Location</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php
                    $s_no = 0;
                    $default = "not available";
                  @endphp
                  @forelse ($branches as $branch) 
                  @php ($s_no++)
                    <tr style="word-break:break-all;">
                        <td>{{ $s_no }}</td>
                        <td>{{ $branch->name }}</td>
                        <td>{{ $branch->location }}</td>
                        <td>{{ $branch->address }}</td>                  
                        <td style="width:250px">
                        <button class="btn btn-warning btnEditBranch" data-branch='{{ $branch }}' data-url="{{ route('super-admin.branches.update',$branch->id) }}" id="btnUpdateBranch{{$branch->id}}"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the branch?')){
                                            document.getElementById('form-delete-{{$branch->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$branch->id}}" method="post" action="{{route('super-admin.branches.destroy',$branch->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>

                        </td>
                    </tr>
              
          @empty
                    <tr>
                      <td></td>
                      <td><p style="color:#e3342f">No Branches to Show, Create one !</p></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
          @endforelse  
                   
                  </tbody>
                  <tfoot>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Address</th>
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

 

<!-- modal for add branch -->

<div class="modal fade" id="addBranchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="addBranchForm" method="post" action="{{ route('super-admin.branches.store') }}">  
    @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-form-label" >Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Branch Name" required maxlength="255" >
          </div>
          <div class="form-group">
            <label for="location" class="col-form-label" >Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Branch Location" required maxlength="255" >
          </div>
          <div class="form-group">
            <label for="address" class="col-form-label" >Address</label>
            <textarea rows="3" class="form-control" id="address" name="address" placeholder="Branch Address"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnAddBranch">Add</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal add branch close -->


<!-- modal for edit branch -->

<div class="modal fade" id="editBranchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="updateBranchForm" method="post" >  
    @csrf
    @method('put')
      <div class="modal-body">
          <div class="form-group">
            <label for="updt_name" class="col-form-label" >Name</label>
            <input type="text" class="form-control" id="updt_name" name="updt_name" placeholder="Branch Name" required maxlength="255" >
          </div>
          <div class="form-group">
            <label for="updt_location" class="col-form-label" >Location</label>
            <input type="text" class="form-control" id="updt_location" name="updt_location" placeholder="Branch Location" required maxlength="255" >
          </div>
          <div class="form-group">
            <label for="updt_address" class="col-form-label" >Address</label>
            <textarea rows="3" class="form-control" id="updt_address" name="updt_address" placeholder="Branch Address" ></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnUpdateBranch">Update</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal edit branch close -->



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

$('#addBranchModal').on('show.bs.modal', function (e) {
  $(this)
    .find("#name,#address")
       .val('')
       .end()   
});

$(".btnEditBranch").on('click',function(){

  $('#editBranchModal').modal('show');
  var data = $(this).data('branch');
  var updateFormUrl = $(this).data('url');
		$("#updt_name").val(data.name);
    $("#updt_location").val(data.location);
    $("#updt_address").val(data.address);
    $('#updateBranchForm').attr('action', updateFormUrl);

});


$('#editBranchModal').on('hidden.bs.modal', function (e) {
  $(this)
    .find("#updt_name,#updt_address")
       .val('')
       .end()  
});


</script>   

@endpush

