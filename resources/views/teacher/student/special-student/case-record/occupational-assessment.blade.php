<h4><b>OCCUPATIONAL/PHYSIO THERAPY ASSESSMENT</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('teacher.students.special-students.occupational-assessment.update',$specialStudent->occupationalAssessment->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="findings">Findings</label>
                <textarea class="form-control" name="findings" id="findings" rows="5">{{ $specialStudent->occupationalAssessment->findings ?? $default; }}</textarea>                      
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="recommendations">Recommendations</label>
                <textarea class="form-control" name="recommendations" id="recommendations" rows="5">{{ $specialStudent->occupationalAssessment->recommendations ?? $default; }}</textarea>                      
            </div>
        </div>                                                        
    </div>
   
    <button type="submit" class="btn btn-warning">Update</button>
</form>

