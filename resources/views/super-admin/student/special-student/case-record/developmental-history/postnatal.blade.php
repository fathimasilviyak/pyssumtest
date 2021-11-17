<h4><b>POSTNATAL</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('super-admin.students.special-students.postnatal-record.update',$specialStudent->postnatalRecord->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exanthemata">Exanthemata</label>
               <input type="text" class="form-control" name="exanthemata" id="exanthemata" value="{{ $specialStudent->postnatalRecord->exanthemata ?? $default; }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="infection">Infection</label>
               <input type="text" class="form-control" name="infection" id="infection" value="{{ $specialStudent->postnatalRecord->infection ?? $default; }}">                          
            </div>
        </div>                                                          
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <label for="injury">Injury</label>
               <input type="text" class="form-control" name="injury" id="injury" value="{{ $specialStudent->postnatalRecord->injury ?? $default; }}">                         
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"> 
                <label for="convulsions">Convulsions</label>
                <select class="form-control" name="convulsions" id="convulsions">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->postnatalRecord->convulsions == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->postnatalRecord->convulsions == 'no' ? 'selected' : '' }} >NO</option>                                                  
                </select>                        
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="jaundice">Jaundice</label>
                <select class="form-control" name="jaundice" id="jaundice">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->postnatalRecord->jaundice == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->postnatalRecord->jaundice == 'no' ? 'selected' : '' }} >NO</option>                         
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="nutritional_disorders">Nutritional Disorders</label>
                <select class="form-control" name="nutritional_disorders" id="nutritional_disorders">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->postnatalRecord->nutritional_disorders == 'yes' ? 'selected' : '' }} >YES</option>
                    <option value="no" {{ $specialStudent->postnatalRecord->nutritional_disorders == 'no' ? 'selected' : '' }} >NO</option>                       
                </select>                        
            </div>
        </div>                                                         
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="any_other">Any Other</label>
                <input type="text" class="form-control" name="any_other" id="any_other" value="{{ $specialStudent->postnatalRecord->any_other ?? $default; }}" >                 
            </div>
        </div>                                                        
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

