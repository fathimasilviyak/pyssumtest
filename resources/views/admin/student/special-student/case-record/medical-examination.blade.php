<h4><b>MEDICAL EXAMINATION</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('admin.students.special-students.medical-examination.update',$specialStudent->medicalExamination->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="observed_by">Observed By</label>
                <input type="text" class="form-control" name="observed_by" id="observed_by" value="{{ $specialStudent->medicalExamination->observed_by ?? $default; }}">                      
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="general_appearance">General Appearance</label>
                <textarea class="form-control" name="general_appearance" id="general_appearance" rows="3">{{ $specialStudent->medicalExamination->general_appearance ?? $default; }}</textarea>                      
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="sensory_motor_disabilities">Sensory Motor Disabilities</label>
                <textarea class="form-control" name="sensory_motor_disabilities" id="sensory_motor_disabilities" rows="3">{{ $specialStudent->medicalExamination->sensory_motor_disabilities ?? $default; }}</textarea>                      
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="clinical_impressions">Clinical Impressions</label>
                <textarea class="form-control" name="clinical_impressions" id="clinical_impressions" rows="3">{{ $specialStudent->medicalExamination->clinical_impressions ?? $default; }}</textarea>                      
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="provisonal_diagnosis">Provisonal Diagnosis</label>
                <textarea class="form-control" name="provisonal_diagnosis" id="provisonal_diagnosis" rows="3">{{ $specialStudent->medicalExamination->provisonal_diagnosis ?? $default; }}</textarea>                      
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="recommendations">Recommendations</label>
                <textarea class="form-control" name="recommendations" id="recommendations" rows="3">{{ $specialStudent->medicalExamination->recommendations ?? $default; }}</textarea>                      
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

