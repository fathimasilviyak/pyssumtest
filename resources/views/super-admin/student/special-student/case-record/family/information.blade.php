<h4><b>FAMILY INFORMATION</b></h4>
<br>
<div class="row">
    <div class="col-sm-6">
        <p id="special_student_register_number"><b>Register Number:</b> {{ $specialStudent->register_number ?? $default; }}</p>
    </div>
    <div class="col-sm-6">
        <p id="special_student_name"><b>Name of Angel:</b> {{ $specialStudent->name ?? $default; }}</p>
    </div>
</div>
<br>

    <div class="row">
        <div class="col-sm-12">
        <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#addInfoModal"><i class="fas fa-plus"></i>Add Family Information</button>
        </div>
    </div>
    <br>
    <table id="tbl_family_info" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Education</th>
                <th>Health</th>
                <th>Relation</th>
                <th>Level of Attachment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $s_no = 0;
            $default = "not available";
            @endphp
            @forelse ($specialStudent->familyInformations as $familyInformation) 
            @php ($s_no++)
            <tr style="word-break:break-all;">
                <td>{{ $s_no }}</td>
                <td>{{ $familyInformation->name ?? $default; }}</td>
                <td>{{ $familyInformation->age ?? $default; }}</td> 
                <td>{{ $familyInformation->gender ?? $default; }}</td>
                <td>{{ $familyInformation->education ?? $default; }}</td>
                <td>{{ $familyInformation->health ?? $default; }}</td> 
                <td>{{ $familyInformation->relation ?? $default; }}</td>
                <td>{{ $familyInformation->level_attachment ?? $default; }}</td>                   
                <td style="width:200px">
                    <button class="btn btn-warning btnEditInfo" data-familyinfo='{{ $familyInformation }}' data-url="{{ route('super-admin.students.special-students.family-information.update',$familyInformation->id) }}" id="btnEditInfo{{$familyInformation->id}}"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete the family information?')){
                                            document.getElementById('form-delete-{{$familyInformation->id}}').submit()
                                        }">Delete</button>
                                                <form style="display:none" id="{{'form-delete-'.$familyInformation->id}}" method="post" action="{{route('super-admin.students.special-students.family-information.destroy',$familyInformation->id)}}">
                                                     @csrf
                                                     @method('delete')
                                                </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9">No data Available!!</td>
            </tr>
            @endforelse  
        </tbody>
        <tfoot>
            <th>S/N</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Education</th>
            <th>Health</th>
            <th>Relation</th>
            <th>Level of Attachment</th>
            <th>Action</th>
        </tfoot>
    </table>
 

<!-- modal for add member section -->

<div class="modal fade" id="addInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Family Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="addInfoForm" method="post" action="{{ route('super-admin.students.special-students.family-information.store') }}">  
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name" class="col-form-label" >Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" maxlength="255" >
                    </div>
                </div>
              <div class="col-sm-6">
                    <div class="form-group">
                        <label for="age" class="col-form-label" >Age</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Age" maxlength="255" >
                    </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="gender" class="col-form-label" >Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" placeholder="Male/Female/Other" maxlength="255" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="education" class="col-form-label" >Education</label>
                        <input type="text" class="form-control" id="education" name="education" placeholder="Education" maxlength="255" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="health" class="col-form-label" >Health</label>
                        <input type="text" class="form-control" id="health" name="health" placeholder="Health" maxlength="255" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="relation" class="col-form-label" >Relation</label>
                        <input type="text" class="form-control" id="relation" name="relation" placeholder="relation" maxlength="255" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="level_attachment" class="col-form-label" >Level of Attachment</label>
                        <input type="text" class="form-control" id="level_attachment" name="level_attachment" placeholder="Level of Attachment" maxlength="255" >
                    </div>
                </div>
                <input type="hidden" name="special_student_id" id="special_student_id" value="{{ $specialStudent->id }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
            <button type="submit" class="btn btn-primary" id="btnAddInfo">Add</button>
        </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal add member close -->


<!-- modal for edit member section -->
<div class="modal fade" id="editInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Family Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="updateInfoForm" method="post" action="">  
    @csrf
    @method('put')
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="updt_name" class="col-form-label" >Name</label>
                        <input type="text" class="form-control" id="updt_name" name="updt_name" placeholder="Name" maxlength="255" >
                    </div>
                </div>
              <div class="col-sm-6">
                    <div class="form-group">
                        <label for="updt_age" class="col-form-label" >Age</label>
                        <input type="text" class="form-control" id="updt_age" name="updt_age" placeholder="Age" maxlength="255" >
                    </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="updt_gender" class="col-form-label" >Gender</label>
                        <input type="text" class="form-control" id="updt_gender" name="updt_gender" placeholder="Male/Female/Other" maxlength="255" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="updt_education" class="col-form-label" >Education</label>
                        <input type="text" class="form-control" id="updt_education" name="updt_education" placeholder="Education" maxlength="255" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="updt_health" class="col-form-label" >Health</label>
                        <input type="text" class="form-control" id="updt_health" name="updt_health" placeholder="Health" maxlength="255" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="updt_relation" class="col-form-label" >Relation</label>
                        <input type="text" class="form-control" id="updt_relation" name="updt_relation" placeholder="relation" maxlength="255" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="updt_level_attachment" class="col-form-label" >Level of Attachment</label>
                        <input type="text" class="form-control" id="updt_level_attachment" name="updt_level_attachment" placeholder="Level of Attachment" maxlength="255" >
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
            <button type="submit" class="btn btn-primary" id="btnUpdateInfo">Update</button>
        </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal edit member close -->

@push('scripts')
<script type="text/javascript">

$('#addInfoModal').on('show.bs.modal', function (e) {
  $(this)
    .find("#name, #age, #gender, #education, #health, #relation, #level_attachment")
       .val('')
       .end()    
});

$(".btnEditInfo").on('click',function(){
    $('#editInfoModal')
    .find("#updt_name, #updt_age, #updt_gender, #updt_education, #updt_health, #updt_relation, #updt_level_attachment")
       .val('')
       .end() 

  $('#editInfoModal').modal('show');
  var data = $(this).data('familyinfo');
  var updateFormUrl = $(this).data('url');
	$("#updt_name").val(data.name);
    $("#updt_age").val(data.age);
    $("#updt_gender").val(data.gender);
    $("#updt_education").val(data.education);
    $("#updt_health").val(data.health);
    $("#updt_relation").val(data.relation);
    $("#updt_level_attachment").val(data.level_attachment);

    $('#updateInfoForm').attr('action', updateFormUrl);

});




</script>   
@endpush