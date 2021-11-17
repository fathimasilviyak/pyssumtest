<h4><b>HOME ENVIRONMENT</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('super-admin.students.special-students.home-environment.update',$specialStudent->homeEnvironment->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="physical_space">Physical Space Available</label>
               <input type="text" class="form-control" name="physical_space" id="physical_space" value="{{ $specialStudent->homeEnvironment->physical_space ?? $default; }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="accomodation_type">Accomodation Type</label>
                <select class="form-control" name="accomodation_type" id="accomodation_type">
                    <option value="">Choose...</option>
                    <option value="independent" {{ $specialStudent->homeEnvironment->accomodation_type == 'independent' ? 'selected' : '' }} >Independent</option>
                    <option value="shared" {{ $specialStudent->homeEnvironment->accomodation_type == 'shared' ? 'selected' : '' }} >Shared</option>                         
                </select>                        
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="number_rooms">Number of Rooms</label>
               <input type="text" class="form-control" name="number_rooms" id="number_rooms" value="{{ $specialStudent->homeEnvironment->number_rooms ?? $default; }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="personal_needs">Personal Needs of the Case</label>
               <input type="text" class="form-control" name="personal_needs" id="personal_needs" value="{{ $specialStudent->homeEnvironment->personal_needs ?? $default; }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="educational_needs">Educational Needs</label>
               <input type="text" class="form-control" name="educational_needs" id="educational_needs" value="{{ $specialStudent->homeEnvironment->educational_needs ?? $default; }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="activity">Play and Leisure Time Activity</label>
               <input type="text" class="form-control" name="activity" id="activity" value="{{ $specialStudent->homeEnvironment->activity ?? $default; }}">                          
            </div>
        </div>                                                          
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

