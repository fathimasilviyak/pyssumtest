<h4><b>PLAY BEHAVIOUR</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('teacher.students.special-students.play-behaviour.update',$specialStudent->playBehaviour->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="nature">Nature</label>
                <select class="form-control" name="nature" id="nature">
                    <option value="">Choose...</option>
                    <option value="enjoys" {{ $specialStudent->playBehaviour->nature == 'enjoys' ? 'selected' : '' }} >Enjoys</option>
                    <option value="plays most of the time" {{ $specialStudent->playBehaviour->nature == 'plays most of the time' ? 'selected' : '' }} >Plays Most of the Time</option> 
                    <option value="indifferent" {{ $specialStudent->playBehaviour->nature == 'indifferent' ? 'selected' : '' }} >Indifferent</option>                         
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="plays_with">Plays With</label>
                <select class="form-control" name="plays_with" id="plays_with">
                    <option value="">Choose...</option>
                    <option value="older" {{ $specialStudent->playBehaviour->plays_with == 'older' ? 'selected' : '' }} >Older</option>
                    <option value="younger" {{ $specialStudent->playBehaviour->plays_with == 'younger' ? 'selected' : '' }} >Younger</option>  
                    <option value="peers" {{ $specialStudent->playBehaviour->plays_with == 'peers' ? 'selected' : '' }} >Peers</option>                      
                </select>                        
            </div>
        </div>                                                         
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="plays_govern_rules">Plays Govern By Rules</label>
                <select class="form-control" name="plays_govern_rules" id="plays_govern_rules">
                    <option value="">Choose...</option>
                    <option value="yes" {{ $specialStudent->playBehaviour->plays_govern_rules == 'yes' ? 'selected' : '' }} >Yes</option>
                    <option value="no" {{ $specialStudent->playBehaviour->plays_govern_rules == 'no' ? 'selected' : '' }} >No</option>                         
                </select>                        
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="prefers_play">Prefers to Play</label>
                <select class="form-control" name="prefers_play" id="prefers_play">
                    <option value="">Choose...</option>
                    <option value="with friends" {{ $specialStudent->playBehaviour->prefers_play == 'with friends' ? 'selected' : '' }} >With Friends</option>
                    <option value="alone" {{ $specialStudent->playBehaviour->prefers_play == 'alone' ? 'selected' : '' }} >Alone</option>  
                    <option value="animals" {{ $specialStudent->playBehaviour->prefers_play == 'animals' ? 'selected' : '' }} >Animals</option>    
                </select>                        
            </div>
        </div>                                                         
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="leisure_time_activities">Leisure Time Activities</label>
                <textarea name="leisure_time_activities" id="leisure_time_activities" rows="5" class="form-control" >{{ $specialStudent->playBehaviour->leisure_time_activities ?? $default; }}</textarea>                 
            </div>
        </div>                                                        
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

