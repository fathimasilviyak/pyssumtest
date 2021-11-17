@extends('layouts.teacher')
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


<!-- modal for add event -->

<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="addEventForm" method="post" enctype="multipart/form-data">  
      <div class="modal-body">
          <div class="form-group">
            <label for="title" class="col-form-label" >Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="start" class="col-form-label">Start Date:</label>
            <input type="date" class="form-control" id="start" name="start">
          </div>
          <div class="form-group">
            <label for="end" class="col-form-label">End Date:</label>
            <input type="date" class="form-control" id="end" name="end">
          </div>
          <div class="form-group">
            <label for="description" class="col-form-label">Description:</label>
            <textarea  id="description" rows="3" class="form-control" name="description" ></textarea>
          </div>
          <div class="form-group">
            <label for="seen_by" class="col-form-label">Seen By:</label>
            <select id="seen_by" class="form-control" name="seen_by" >
              <option value=""> Choose...</option>
              <option value="everyone">Everyone</option>
              <option value="faculty">Faculty</option>
            </select>
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label" >Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" >
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnAddEvent">Add</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal add event close -->


<!-- modal for update event -->

<div class="modal fade" id="updateEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Event View/Edit/Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="updateEventForm" method="post" enctype="multipart/form-data">  
      <div class="modal-body">
          <div class="form-group">
            <label for="eventImage" class="col-form-label"></label>
            <img src="" alt="" id="eventImage" height=150 width=150>
            <input type="hidden" id="imagePath" value="{{ asset('images/event/') }}/">
          </div>
          <div class="form-group">
            <label for="upd_title" class="col-form-label">Title</label>
            <input type="text" class="form-control" id="upd_title" name="title">
          </div>
          <div class="form-group">
            <label for="upd_start" class="col-form-label">Start Date:</label>
            <input type="date" class="form-control" id="upd_start" name="start">
          </div>
          <div class="form-group">
            <label for="upd_end" class="col-form-label">End Date:</label>
            <input type="date" class="form-control" id="upd_end" name="end">
          </div>
          <div class="form-group">
            <label for="upd_description" class="col-form-label">Description:</label>
            <textarea  id="upd_description" rows="3" class="form-control" name="description" ></textarea>
          </div>
          <div class="form-group">
            <label for="upd_seen_by" class="col-form-label">Seen By:</label>
            <select id="upd_seen_by" class="form-control" name="seen_by" >
              <option value=""> Choose...</option>
              <option value="everyone">Everyone</option>
              <option value="faculty">Faculty</option>
            </select>
          </div>
          <div class="form-group">
            <label for="upd_image" class="col-form-label"> Change Image?</label>
            <input type="file" class="form-control" id="upd_image" name="image" accept="image/*">
          </div>
          <input type="hidden" id="event_id" name="eventId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btnDeleteEvent" >Delete</button>
        <button type="submit" class="btn btn-primary" id="btnUpdateEvent">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- modal update event close -->

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
<script>
$(document).ready(function () {
   
var SITEURL = "{{ url('/teacher') }}";
  
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/fullcalendar",
                    displayEventTime: false,
                    editable: true,
                    eventRender: function (event, element, view) {
                        if (event.allDay === 'true') {
                                event.allDay = true;
                        } else {
                                event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {

                        // var title = prompt('Event Title:');
                        $('#addEventModal').modal('show');
                        $('#start').val($.fullCalendar.formatDate(start, "Y-MM-DD"));
                        $('#end').val($.fullCalendar.formatDate(end, "Y-MM-DD"));
                        document.getElementById("end").stepDown(1);
                       
                    },
                    eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
                        $.ajax({
                            url: SITEURL + '/fullcalendarAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update'
                            },
                            type: "POST",
                            success: function (response) {
                                displayMessage("Event Updated Successfully");
                            }
                        });
                    },
                    eventClick: function (event) {
                        
                        $('#updateEventModal').modal('show');
                        var imagePath = $('#imagePath').val()+event.image;
                        document.getElementById("eventImage").src = imagePath;
                        $('#upd_title').val(event.title);
                        $('#upd_start').val($.fullCalendar.formatDate(event.start, "Y-MM-DD"));
                        $('#upd_end').val($.fullCalendar.formatDate(event.end, "Y-MM-DD"));
                        document.getElementById("upd_end").stepDown(1);
                        $('#upd_description').val(event.description);
                        $('#upd_seen_by').val(event.seen_by);
                        $('#event_id').val(event.id);
                        $('#upd_image').val('');
                        
                        
                    }
 
                });


$(document).on('submit', '#addEventForm', function(e){
  e.preventDefault();

  document.getElementById("end").stepUp(1);
  var formData = new FormData($('#addEventForm')[0]);
  formData.append('type', 'add');
  $("#addEventModal").modal('hide');
    var title = $('#title').val();
    if(title) {
        $.ajax({
            url: SITEURL + "/fullcalendarAjax",
            data: formData,
            type: "POST",
            contentType:false,
            processData: false,
            success: function (data) {
                displayMessage("Event Created Successfully");
                $('#calendar').fullCalendar( 'refetchEvents' );
                
            }
        });
                            
    }   

});

$(document).on('submit', '#updateEventForm', function(e){
  e.preventDefault();

  $("#updateEventModal").modal('hide');
    document.getElementById("upd_end").stepUp(1);
    var formData = new FormData($('#updateEventForm')[0]);
    formData.append('type', 'updateEventDetails');
    var title = $('#upd_title').val();
  if(title) {
    $.ajax({
            url: SITEURL + "/fullcalendarAjax",
            data: formData,
            type: "POST",
            contentType:false,
            processData: false,
            success: function (data) {
                $('#calendar').fullCalendar( 'refetchEvents' );
                displayMessage("Event Updated Successfully");
            }
    });
  }  


});



$('#btnDeleteEvent').on('click', function(e){
    e.preventDefault();

doDelete();
});

function doDelete(){

    $("#updateEventModal").modal('hide');
    var eventId = $('#event_id').val();
    var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalendarAjax',
                                data: {
                                        id: eventId,
                                        type: 'delete'
                                },
                                success: function (response) {
                                    calendar.fullCalendar('removeEvents', eventId);
                                    displayMessage("Event Deleted Successfully");
                                }
                            });
                        }

}
 
});

function displayMessage(message) {
    toastr.success(message, 'Event');
} 

$('#addEventModal').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,select,textarea")
       .val('')
       .end()    
});


  
</script>
@endpush