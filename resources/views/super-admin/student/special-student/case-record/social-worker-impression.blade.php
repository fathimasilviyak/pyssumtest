<h4><b>SOCIAL WORKER'S IMPRESSION</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('super-admin.students.special-students.social-worker-impression.update',$specialStudent->socialWorkerImpression->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" name="remarks" id="remarks" rows="10">{{ $specialStudent->socialWorkerImpression->remarks ?? $default; }}</textarea>                      
            </div>
        </div>                                                          
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

