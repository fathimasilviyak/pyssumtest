<h4><b>FAMILY HISTORY</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('super-admin.students.special-students.family-history.update',$specialStudent->familyHistory->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="mental_retardation">Mental Retardation</label>
               <input type="text" class="form-control" name="mental_retardation" id="mental_retardation" value="{{ $specialStudent->familyHistory->mental_retardation ?? $default; }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="illness">Illness</label>
               <input type="text" class="form-control" name="illness" id="illness" value="{{ $specialStudent->familyHistory->illness ?? $default; }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="epilepsy">Epilepsy</label>
               <input type="text" class="form-control" name="epilepsy" id="epilepsy" value="{{ $specialStudent->familyHistory->epilepsy ?? $default; }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="any_other">Any Other</label>
               <input type="text" class="form-control" name="any_other" id="any_other" value="{{ $specialStudent->familyHistory->any_other ?? $default; }}">                          
            </div>
        </div>                                                          
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

