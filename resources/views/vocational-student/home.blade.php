@extends('layouts.vocational-student')
@section('links')
<!-- fullcalendar -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
   
<style>
  .fc-title{
    font-size: 14px;
    color: white;
}
</style>
@endsection
@section("page-name","Home")
@section('page-content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Calendar</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div id='calendar'></div>          
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
          <!-- /.col -->
    </div>
        <!-- /.row -->
</div>
      <!-- /.container-fluid -->


      <!-- modal for event -->

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Event Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form>  
      <div class="modal-body">
        <div class="form-group">
            <label for="eventImage" class="col-form-label"></label>
            <img src="" alt="" id="eventImage" height=150 width=150>
            <input type="hidden" id="imagePath" value="{{ asset('images/event/') }}/">
          </div>
          <div class="form-group">
            <label for="upd_title" class="col-form-label">Title</label>
            <input type="text" class="form-control" id="upd_title" disabled>
          </div>
          <div class="form-group">
            <label for="upd_start" class="col-form-label">Start Date:</label>
            <input type="date" class="form-control" id="upd_start" disabled>
          </div>
          <div class="form-group">
            <label for="upd_end" class="col-form-label">End Date:</label>
            <input type="date" class="form-control" id="upd_end" disabled>
          </div>
          <div class="form-group">
            <label for="upd_description" class="col-form-label">Description:</label>
            <textarea  id="upd_description" rows="3" class="form-control" disabled></textarea>
          </div>
          <!-- <div class="form-group">
            <label for="upd_seen_by" class="col-form-label">Seen By:</label>
            <select id="upd_seen_by" class="form-control" disabled>
              <option value=""> Choose...</option>
              <option value="everyone">Everyone</option>
              <option value="faculty">Faculty</option>
            </select>
          </div> -->
          <input type="hidden" id="event_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal event close -->



@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
<script>
$(document).ready(function () {
   
var SITEURL = "{{ url('/vocational-student') }}";
  
var calendar = $('#calendar').fullCalendar({
                    editable: false,
                    events: SITEURL + "/fullcalendar",
                    displayEventTime: false,
                    editable: false,
                    eventRender: function (event, element, view) {
                        if (event.allDay === 'true') {
                                event.allDay = true;
                        } else {
                                event.allDay = false;
                        }
                    },
                    eventClick: function (event) {
                        
                        $('#eventModal').modal('show');
                        var imagePath = $('#imagePath').val()+event.image;
                        document.getElementById("eventImage").src = imagePath;
                        $('#upd_title').val(event.title);
                        $('#upd_start').val($.fullCalendar.formatDate(event.start, "Y-MM-DD"));
                        $('#upd_end').val($.fullCalendar.formatDate(event.end, "Y-MM-DD"));
                        document.getElementById("upd_end").stepDown(1);
                        $('#upd_description').val(event.description);
                        $('#upd_seen_by').val(event.seen_by);
                        $('#event_id').val(event.id);
                        
                        
                    }
 
                });


 
});

// function displayMessage(message) {
//     toastr.success(message, 'Event');
// } 
  
</script>
@endpush