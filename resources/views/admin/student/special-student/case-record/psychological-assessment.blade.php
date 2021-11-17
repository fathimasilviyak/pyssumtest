<h4><b>PSYCHOLOGICAL ASSESSMENT</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('admin.students.special-students.psychological-assessment.update',$specialStudent->psychologicalAssessment->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="tests_administered">Tests Administered</label>
                <textarea class="form-control" name="tests_administered" id="tests_administered" rows="3">{{ $specialStudent->psychologicalAssessment->tests_administered ?? $default; }}</textarea>                      
            </div>
        </div>  
        <div class="col-sm-6">
            <div class="form-group">
                <label for="general_test_behaviour">General Test Behaviour</label>
                <textarea class="form-control" name="general_test_behaviour" id="general_test_behaviour" rows="6">{{ $specialStudent->psychologicalAssessment->general_test_behaviour ?? $default; }}</textarea>                      
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="test_findings">Test Findings</label>
                <textarea class="form-control" name="test_findings" id="test_findings" rows="3">{{ $specialStudent->psychologicalAssessment->test_findings ?? $default; }}</textarea>                      
            </div>
        </div>  
        <div class="col-sm-6">
            <div class="form-group">
                <label for="recommendations">Recommendations</label>
                <textarea class="form-control" name="recommendations" id="recommendations" rows="3">{{ $specialStudent->psychologicalAssessment->recommendations ?? $default; }}</textarea>                      
            </div>
        </div>                                                          
    </div>
   
    <button type="submit" class="btn btn-warning">Update</button>
</form>

