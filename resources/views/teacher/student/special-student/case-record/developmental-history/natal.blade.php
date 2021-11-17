<h4><b>NATAL</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('teacher.students.special-students.natal-record.update',$specialStudent->natalRecord->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="labour">Labour</label>
                <select class="form-control" name="labour" id="labour">
                    <option value="">Choose...</option>
                    <option value="prolonged" {{ $specialStudent->natalRecord->labour == 'prolonged' ? 'selected' : '' }} >PROLONGED</option>
                    <option value="induced" {{ $specialStudent->natalRecord->labour == 'induced' ? 'selected' : '' }} >INDUCED</option>                      
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="abnormal">Abnormal</label>
                <select class="form-control" name="abnormal" id="abnormal">
                    <option value="">Choose...</option>
                    <option value="abnormal presentation" {{ $specialStudent->natalRecord->abnormal == 'abnormal presentation' ? 'selected' : '' }} >ABNORMAL PRESENTATION</option>
                    <option value="prolapsed cord" {{ $specialStudent->natalRecord->abnormal == 'prolapsed cord' ? 'selected' : '' }} >PROLAPSED CORD</option>                        
                </select>                        
            </div>
        </div>                                                          
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="delivery_term">Delivery Term</label>
                <select class="form-control" name="delivery_term" id="delivery_term">
                    <option value="">Choose...</option>
                    <option value="full term" {{ $specialStudent->natalRecord->delivery_term == 'full term' ? 'selected' : '' }}>FULL TERM</option>
                    <option value="premature" {{ $specialStudent->natalRecord->delivery_term == 'premature' ? 'selected' : '' }} >PREMATURE</option>                        
                </select>                        
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="delivery_place">Delivery Place</label>
                <select class="form-control" name="delivery_place" id="delivery_place">
                    <option value="">Choose...</option>
                    <option value="home" {{ $specialStudent->natalRecord->delivery_place == 'home' ? 'selected' : '' }} >HOME</option>
                    <option value="hospital" {{ $specialStudent->natalRecord->delivery_place == 'hospital' ? 'selected' : '' }} >HOSPITAL</option>                         
                </select>                        
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="delivery_type">Delivery Type</label>
                <select class="form-control" name="delivery_type" id="delivery_type">
                    <option value="">Choose...</option>
                    <option value="normal" {{ $specialStudent->natalRecord->delivery_type == 'normal' ? 'selected' : '' }} >NORMAL</option>
                    <option value="instrumental" {{ $specialStudent->natalRecord->delivery_type == 'instrumental' ? 'selected' : '' }} >INSTRUMENTAL</option>
                    <option value="caesarean" {{ $specialStudent->natalRecord->delivery_type == 'caesarean' ? 'selected' : '' }} >CAESAREAN</option>                         
                </select>                        
            </div>
        </div>                                                           
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="maternal">Maternal</label>
                <select class="form-control" name="maternal" id="maternal">
                    <option value="">Choose...</option>
                    <option value="convulsion" {{ $specialStudent->natalRecord->maternal == 'convulsion' ? 'selected' : '' }} >CONVULSION</option>
                    <option value="excessive bleeding" {{ $specialStudent->natalRecord->maternal == 'excessive bleeding' ? 'selected' : '' }} >EXCESSIVE BLEEDING</option>                         
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="birth_cry">Birth Cry</label>
                <select class="form-control" name="birth_cry" id="birth_cry">
                    <option value="">Choose...</option>
                    <option value="normal" {{ $specialStudent->natalRecord->birth_cry == 'normal' ? 'selected' : '' }} >NORMAL</option>
                    <option value="delayed" {{ $specialStudent->natalRecord->birth_cry == 'delayed' ? 'selected' : '' }} >DELAYED</option>                        
                </select>                        
            </div>
        </div>                                                         
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="birth_weight">Birth Weight</label>
                <select class="form-control" name="birth_weight" id="birth_weight">
                    <option value="">Choose...</option>
                    <option value="normal" {{ $specialStudent->natalRecord->birth_weight == 'normal' ? 'selected' : '' }} >NORMAL</option>
                    <option value="low" {{ $specialStudent->natalRecord->birth_weight == 'low' ? 'selected' : '' }} >LOW</option>
                    <option value="high" {{ $specialStudent->natalRecord->birth_weight == 'high' ? 'selected' : '' }} >HIGH</option>                         
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="disease">Disease</label>
                <select class="form-control" name="disease" id="disease">
                    <option value="">Choose...</option>
                    <option value="jaundice" {{ $specialStudent->natalRecord->disease == 'jaundice' ? 'selected' : '' }} >JAUNDICE</option>
                    <option value="infection" {{ $specialStudent->natalRecord->disease == 'infection' ? 'selected' : '' }} >INFECTION</option>                        
                </select>                        
            </div>
        </div>                                                        
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

