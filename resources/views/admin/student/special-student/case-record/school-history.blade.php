<h4><b>SCHOOL HISTORY</b></h4>
<br>
<div class="row">
    <div class="col-sm-6">
        <p id="special_student_register_number"><b>Register Number:</b> {{ $specialStudent->register_number ?? $default; }}</p>
    </div>
    <div class="col-sm-6">
        <p id="special_student_name"><b>Name of Angel:</b> {{ $specialStudent->name ?? $default; }}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p id="class"><b>Class:</b>{{ $specialStudent->studentClass->name ?? $default; }}</p>
    </div>
    <div class="col-sm-6">
        <p id="section"><b>Section:</b>@if($specialStudent->classSection){{ $specialStudent->classSection->name }} @else {{ $default }} @endif</p>
    </div>
</div>
<br>
<form method="post" autocomplete="off" action="{{ route('admin.students.special-students.school-history.update',$specialStudent->schoolHistory->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="school_attended">School Attended</label>
                <select class="form-control" name="school_attended" id="school_attended">
                    <option value="">Choose...</option>
                    <option value="attended" {{ $specialStudent->schoolHistory->school_attended == 'attended' ? 'selected' : '' }} >Attended</option>
                    <option value="discontinued" {{ $specialStudent->schoolHistory->school_attended == 'discontinued' ? 'selected' : '' }} >Discontinued</option> 
                    <option value="integrated" {{ $specialStudent->schoolHistory->school_attended == 'integrated' ? 'selected' : '' }} >Integrated</option>                         
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="school_nature">Nature of School</label>
                <select class="form-control" name="school_nature" id="school_nature">
                    <option value="">Choose...</option>
                    <option value="normal" {{ $specialStudent->schoolHistory->school_nature == 'normal' ? 'selected' : '' }} >Normal</option>
                    <option value="special" {{ $specialStudent->schoolHistory->school_nature == 'special' ? 'selected' : '' }} >Special</option>  
                    <option value="integrated" {{ $specialStudent->schoolHistory->school_nature == 'integrated' ? 'selected' : '' }} >Integrated</option>                      
                </select>                        
            </div>
        </div>                                                         
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="school_address">Address of School</label>
                <textarea  class="form-control" name="school_address" id="school_address" rows="3">{{ $specialStudent->schoolHistory->school_address ?? $default; }}</textarea>                   
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="date_joining">Joining Date</label>
               <input type="date" class="form-control" name="date_joining" id="date_joining" value="{{ $specialStudent->schoolHistory->date_joining }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="attendance">Attendance</label>
                <select class="form-control" name="attendance" id="attendance">
                    <option value="">Choose...</option>
                    <option value="regular" {{ $specialStudent->schoolHistory->attendance == 'regular' ? 'selected' : '' }} >Regular</option>
                    <option value="irregular" {{ $specialStudent->schoolHistory->attendance == 'irregular' ? 'selected' : '' }} >Irregular</option>                         
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="irregularity_reason">Reason for Irregularity</label>
                <select class="form-control" name="irregularity_reason" id="irregularity_reason">
                    <option value="">Choose...</option>
                    <option value="does not go" {{ $specialStudent->schoolHistory->irregularity_reason == 'does not go' ? 'selected' : '' }} >Does Not Go</option>
                    <option value="not sent" {{ $specialStudent->schoolHistory->irregularity_reason == 'not sent' ? 'selected' : '' }} >Not Sent</option>  
                    <option value="not well" {{ $specialStudent->schoolHistory->irregularity_reason == 'not well' ? 'selected' : '' }} >Not Well</option>    
                </select>                        
            </div>
        </div>                                                         
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="teacher_report">School Teacher's Report</label>
                <textarea name="teacher_report" id="teacher_report" rows="5" class="form-control" >{{ $specialStudent->schoolHistory->teacher_report ?? $default; }}</textarea>                 
            </div>
        </div>                                                        
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

