<h4><b>NEONATAL</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('super-admin.students.special-students.neonatal-record.update',$specialStudent->neonatalRecord->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="baby_color">Baby Color</label>
                <select class="form-control" name="baby_color" id="baby_color">
                    <option value="">Choose...</option>
                    <option value="pink" {{ $specialStudent->neonatalRecord->baby_color == 'pink' ? 'selected' : '' }} >PINK</option>
                    <option value="yellow" {{ $specialStudent->neonatalRecord->baby_color == 'yellow' ? 'selected' : '' }} >YELLOW</option>
                    <option value="blue" {{ $specialStudent->neonatalRecord->baby_color == 'blue' ? 'selected' : '' }} >BLUE</option>
                    <option value="pale" {{ $specialStudent->neonatalRecord->baby_color == 'pale' ? 'selected' : '' }} >PALE</option>                      
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="respiratory_distress">Respiratory Distress</label>
                <select class="form-control" name="respiratory_distress" id="respiratory_distress">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->neonatalRecord->respiratory_distress == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->neonatalRecord->respiratory_distress == 'no' ? 'selected' : '' }} >NO</option>                        
                </select>                        
            </div>
        </div>                                                          
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="baby_activity">Baby Activity</label>
                <select class="form-control" name="baby_activity" id="baby_activity">
                    <option value="">Choose...</option>
                    <option value="normal" {{ $specialStudent->neonatalRecord->baby_activity == 'normal' ? 'selected' : '' }}>NORMAL</option>
                    <option value="jittery" {{ $specialStudent->neonatalRecord->baby_activity == 'jittery' ? 'selected' : '' }} >JITTERY</option>
                    <option value="lethargic" {{ $specialStudent->neonatalRecord->baby_activity == 'lethargic' ? 'selected' : '' }} >LETHARGIC</option>                        
                </select>                        
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"> 
                <label for="disease">Disease</label>
                <select class="form-control" name="disease" id="disease">
                    <option value="">Choose...</option>
                    <option value="jaundice" {{ $specialStudent->neonatalRecord->disease == 'jaundice' ? 'selected' : '' }} >JAUNDICE</option>
                    <option value="infections" {{ $specialStudent->neonatalRecord->disease == 'infections' ? 'selected' : '' }} >INFECTIONS</option>
                    <option value="convulsions" {{ $specialStudent->neonatalRecord->disease == 'convulsions' ? 'selected' : '' }} >CONVULSIONS</option>
                    <option value="congenital anamolies" {{ $specialStudent->neonatalRecord->disease == 'congenital anamolies' ? 'selected' : '' }} >CONGENITAL ANAMOLIES</option>                                                  
                </select>                        
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="feeding_by">Feeding By</label>
                <select class="form-control" name="feeding_by" id="feeding_by">
                    <option value="">Choose...</option>
                    <option value="breast" {{ $specialStudent->neonatalRecord->feeding_by == 'breast' ? 'selected' : '' }} >BREAST</option>
                    <option value="bottle" {{ $specialStudent->neonatalRecord->feeding_by == 'bottle' ? 'selected' : '' }} >BOTTLE</option>                         
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="feeding_on">Feeding On</label>
                <select class="form-control" name="feeding_on" id="feeding_on">
                    <option value="">Choose...</option>
                    <option value="demand" {{ $specialStudent->neonatalRecord->feeding_on == 'demand' ? 'selected' : '' }} >DEMAND</option>
                    <option value="scheduled feed" {{ $specialStudent->neonatalRecord->feeding_on == 'scheduled feed' ? 'selected' : '' }} >SCHEDULED FEED </option>  
                    <option value="feeding problem" {{ $specialStudent->neonatalRecord->feeding_on == 'feeding problem' ? 'selected' : '' }} >FEEDING PROBLEM</option>                      
                </select>                        
            </div>
        </div>                                                         
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="any_other">Any Other</label>
                <textarea class="form-control" name="any_other" id="any_other"  rows="5">{{ $specialStudent->neonatalRecord->any_other ?? $default; }}</textarea>                      
            </div>
        </div>                                                        
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

