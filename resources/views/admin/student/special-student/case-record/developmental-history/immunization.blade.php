<h4><b>IMMUNIZATION HISTORY</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('admin.students.special-students.immunization-record.update',$specialStudent->immunizationRecord->id) }}">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="primary_polio">Primary Polio</label>
                <select class="form-control" name="primary_polio" id="primary_polio">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->primary_polio == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->primary_polio == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="booster_polio">Booster Polio</label>
                <select class="form-control" name="booster_polio" id="booster_polio">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->booster_polio == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->booster_polio == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                  
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="primary_diptheria">Primary Diptheria</label>
                <select class="form-control" name="primary_diptheria" id="primary_diptheria">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->primary_diptheria == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->primary_diptheria == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="booster_diptheria">Booster Diptheria</label>
                <select class="form-control" name="booster_diptheria" id="booster_diptheria">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->booster_diptheria == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->booster_diptheria == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                  
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="primary_pertusis">Primary Pertusis</label>
                <select class="form-control" name="primary_pertusis" id="primary_pertusis">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->primary_pertusis == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->primary_pertusis == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="booster_pertusis">Booster Pertusis</label>
                <select class="form-control" name="booster_pertusis" id="booster_pertusis">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->booster_pertusis == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->booster_pertusis == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                  
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="primary_bcg">Primary BCG</label>
                <select class="form-control" name="primary_bcg" id="primary_bcg">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->primary_bcg == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->primary_bcg == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="booster_bcg">Booster BCG</label>
                <select class="form-control" name="booster_bcg" id="booster_bcg">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->booster_bcg == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->booster_bcg == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                  
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="primary_measles">Primary Measles</label>
                <select class="form-control" name="primary_measles" id="primary_measles">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->primary_measles == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->primary_measles == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="booster_measles">Booster Measles</label>
                <select class="form-control" name="booster_measles" id="booster_measles">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->booster_measles == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->booster_measles == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                  
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="primary_typhoid">Primary Typhoid</label>
                <select class="form-control" name="primary_typhoid" id="primary_typhoid">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->primary_typhoid == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->primary_typhoid == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="booster_typhoid">Booster Typhoid</label>
                <select class="form-control" name="booster_typhoid" id="booster_typhoid">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->booster_typhoid == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->booster_typhoid == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                  
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="primary_cholera">Primary Cholera</label>
                <select class="form-control" name="primary_cholera" id="primary_cholera">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->primary_cholera == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->primary_cholera == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="booster_cholera">Booster Cholera</label>
                <select class="form-control" name="booster_cholera" id="booster_cholera">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->immunizationRecord->booster_cholera == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->immunizationRecord->booster_cholera == 'no' ? 'selected' : '' }} >NO</option>                    
                </select>                  
            </div>
        </div>                                                          
    </div>

    
    <button type="submit" class="btn btn-warning">Update</button>
</form>

