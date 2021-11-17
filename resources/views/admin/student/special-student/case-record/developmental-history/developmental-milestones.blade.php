<h4><b>DEVELOPMENTAL MILESTONES</b></h4>
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
<form method="post" autocomplete="off" action="{{ route('admin.students.special-students.developmental-milestone.update',$specialStudent->developmentalMilestone->id) }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="smiling">Smiling(6 weeks)</label>
               <input type="text" class="form-control" name="smiling" id="smiling" value="{{ $specialStudent->developmentalMilestone->smiling ?? $default;  }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="head_control">Head Control(4 months)</label>
               <input type="text" class="form-control" name="head_control" id="head_control" value="{{ $specialStudent->developmentalMilestone->head_control ?? $default;  }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="rolling_over">Rolling Over(5-7 months)</label>
               <input type="text" class="form-control" name="rolling_over" id="rolling_over" value="{{ $specialStudent->developmentalMilestone->rolling_over ?? $default;  }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="sitting">Sitting(6-7 months)</label>
               <input type="text" class="form-control" name="sitting" id="sitting" value="{{ $specialStudent->developmentalMilestone->sitting ?? $default;  }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="crawling">Crawling(8-10 months)</label>
               <input type="text" class="form-control" name="crawling" id="crawling" value="{{ $specialStudent->developmentalMilestone->crawling ?? $default;  }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="standing">Standing(11 months)</label>
               <input type="text" class="form-control" name="standing" id="standing" value="{{ $specialStudent->developmentalMilestone->standing ?? $default;  }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="bowel_bladder_control">Bowel Bladder Control</label>
               <input type="text" class="form-control" name="bowel_bladder_control" id="bowel_bladder_control" value="{{ $specialStudent->developmentalMilestone->bowel_bladder_control ?? $default;  }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="walking">Walking(12-14 months)</label>
               <input type="text" class="form-control" name="walking" id="walking" value="{{ $specialStudent->developmentalMilestone->walking ?? $default;  }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="teething">Teething(4 to 6 at 1 year)</label>
               <input type="text" class="form-control" name="teething" id="teething" value="{{ $specialStudent->developmentalMilestone->teething ?? $default;  }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="babbling">Babbling(8 months)</label>
               <input type="text" class="form-control" name="babbling" id="babbling" value="{{ $specialStudent->developmentalMilestone->babbling ?? $default;  }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="first_meaningful_word">First Meaningful Word(1 year)</label>
               <input type="text" class="form-control" name="first_meaningful_word" id="first_meaningful_word" value="{{ $specialStudent->developmentalMilestone->first_meaningful_word ?? $default;  }}">                      
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="form-group">
                <label for="small_phrases">Small Phrases(2 years)</label>
               <input type="text" class="form-control" name="small_phrases" id="small_phrases" value="{{ $specialStudent->developmentalMilestone->small_phrases ?? $default;  }}">                          
            </div>
        </div>                                                          
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="fluent_speech">Fluent Speech(3 years)</label>
               <input type="text" class="form-control" name="fluent_speech" id="fluent_speech" value="{{ $specialStudent->developmentalMilestone->fluent_speech ?? $default;  }}">                      
            </div>
        </div>                                                          
    </div>
  


    <button type="submit" class="btn btn-warning">Update</button>
</form>

