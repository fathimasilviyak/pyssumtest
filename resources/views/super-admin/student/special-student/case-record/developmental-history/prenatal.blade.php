<h4><b>PRENATAL</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('super-admin.students.special-students.prenatal-record.update',$specialStudent->prenatalRecord->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="pregnancy">Pregnancy</label>
                <select class="form-control" name="pregnancy" id="pregnancy">
                    <option value="">Choose...</option>
                    <option value="wanted" {{ $specialStudent->prenatalRecord->pregnancy == 'wanted' ? 'selected' : '' }} >WANTED</option>
                    <option value="unwanted" {{ $specialStudent->prenatalRecord->pregnancy == 'unwanted' ? 'selected' : '' }} >UNWANTED</option>                      
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="abortion">Abortion</label>
                <select class="form-control" name="abortion" id="abortion">
                    <option value="">Choose...</option>
                    <option value="attempted" {{ $specialStudent->prenatalRecord->abortion == 'attempted' ? 'selected' : '' }} >ATTEMPTED</option>
                    <option value="threatened" {{ $specialStudent->prenatalRecord->abortion == 'threatened' ? 'selected' : '' }} >THREATENED</option>                        
                </select>                        
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="father_age">Father's age at conception</label>
                <input type="text" class="form-control" id="father_age" placeholder="father age" name="father_age" value="{{$specialStudent->prenatalRecord->father_age ?? $default; }}" maxlength="255">
            </div>
        </div>                            
        <div class="col-sm-6">
            <div class="form-group">
                <label for="mother_age">Mother's age at conception</label>
                <input type="text" class="form-control" id="mother_age" placeholder="mother age" name="mother_age" value="{{$specialStudent->prenatalRecord->mother_age ?? $default; }}" maxlength="255">
            </div>
        </div>                      
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exposure">Exposure to X-ray/Drug Intake</label>
                <select class="form-control" name="exposure" id="exposure">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->prenatalRecord->exposure == 'yes' ? 'selected' : '' }}>yes</option>
                    <option value="no" {{ $specialStudent->prenatalRecord->exposure == 'no' ? 'selected' : '' }} >no</option>                        
                </select>                        
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="rh_incompatibility">RH--Incompatibility</label>
                <select class="form-control" name="rh_incompatibility" id="rh_incompatibility">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->prenatalRecord->rh_incompatibility == 'yes' ? 'selected' : '' }} >yes</option>
                    <option value="no" {{ $specialStudent->prenatalRecord->rh_incompatibility == 'no' ? 'selected' : '' }} >no</option>                         
                </select>                        
            </div>
        </div>                                                           
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="maternal_illness">Maternal Illness</label>
                <select class="form-control" name="maternal_illness" id="maternal_illness">
                    <option value="">Choose...</option>
                    <option value="trauma" {{ $specialStudent->prenatalRecord->maternal_illness == 'trauma' ? 'selected' : '' }} >TRUAMA</option>
                    <option value="diabetes" {{ $specialStudent->prenatalRecord->maternal_illness == 'diabetes' ? 'selected' : '' }} >DIABETES</option>
                    <option value="hyper tension" {{ $specialStudent->prenatalRecord->maternal_illness == 'hyper tension' ? 'selected' : '' }} >HYPER TENSION</option> 
                    <option value="feet swelling" {{ $specialStudent->prenatalRecord->maternal_illness == 'feet swelling' ? 'selected' : '' }} >FEET SWELLING</option>
                    <option value="jaundice" {{ $specialStudent->prenatalRecord->maternal_illness == 'jaundice' ? 'selected' : '' }} >JAUNDICE</option>                        
                </select>                        
            </div>
        </div>                                    
        <div class="col-sm-6">
            <div class="form-group">
                <label for="foetal_movement">Foetal Movement</label>
                <select class="form-control" name="foetal_movement" id="foetal_movement">
                    <option value="">Choose...</option>
                    <option value="normal" {{ $specialStudent->prenatalRecord->foetal_movement == 'normal' ? 'selected' : '' }} >NORMAL</option>
                    <option value="excessive" {{ $specialStudent->prenatalRecord->foetal_movement == 'excessive' ? 'selected' : '' }} >EXCESSIVE</option>
                    <option value="sluggish" {{ $specialStudent->prenatalRecord->foetal_movement == 'sluggish' ? 'selected' : '' }} >SLUGGISH</option>                         
                </select>                        
            </div>
        </div>                      
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

