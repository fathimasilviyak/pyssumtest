<h4><b>SOCIAL ENVIRONMENT</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('super-admin.students.special-students.social-environment.update',$specialStudent->socialEnvironment->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="neighbourhood_interaction">Neighbourhood Interaction</label>
               <input type="text" class="form-control" name="neighbourhood_interaction" id="neighbourhood_interaction" value="{{ $specialStudent->socialEnvironment->neighbourhood_interaction ?? $default; }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="family_support">Extended Family Support</label>
               <input type="text" class="form-control" name="family_support" id="family_support" value="{{ $specialStudent->socialEnvironment->family_support ?? $default; }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="outside_visits">Family's Outside Visits</label>
               <input type="text" class="form-control" name="outside_visits" id="outside_visits" value="{{ $specialStudent->socialEnvironment->outside_visits ?? $default; }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="socio_religious_acts">Socio Religious Acts</label>
               <input type="text" class="form-control" name="socio_religious_acts" id="socio_religious_acts" value="{{ $specialStudent->socialEnvironment->socio_religious_acts ?? $default; }}">                          
            </div>
        </div>                                                          
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

