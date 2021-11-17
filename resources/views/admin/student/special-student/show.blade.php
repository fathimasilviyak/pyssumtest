@extends('layouts.admin')
@section("page-name","Special Student Details")
@section('page-content')


@php
    $default = "not available";

    $dob = isset($specialStudent->dob) ? \Carbon\Carbon::parse($specialStudent->dob)->format('d/m/Y') : $default;
    $date_register = isset($specialStudent->date_register) ? \Carbon\Carbon::parse($specialStudent->date_register)->format('d/m/Y') : $default;
    
@endphp

<div class="container-fluid">
    <div class="d-flex justify-content-end mb-4">
    <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#selectDataModal"><i class="fas fa-file-pdf"></i>Export to Pdf</button>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="tab-identification-data" data-toggle="pill" href="#div-identification-data" role="tab" aria-controls="div-identification-data" aria-selected="true">Identification Data</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      Developmental History <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" id="tab-prenatal" tabindex="-1"  data-toggle="pill"  href="#div-prenatal" role="tab" aria-controls="div-prenatal" aria-selected="false" style="color:black;">Prenatal</a>
                      <a class="dropdown-item" id="tab-natal" tabindex="-1" data-toggle="pill" href="#div-natal" role="tab" aria-controls="div-natal" aria-selected="false" style="color:black;">Natal</a>
                      <a class="dropdown-item" id="tab-neonatal" tabindex="-1"  data-toggle="pill"  href="#div-neonatal" role="tab" aria-controls="div-neonatal" aria-selected="false" style="color:black;">Neonatal</a>
                      <a class="dropdown-item" id="tab-postnatal" tabindex="-1" data-toggle="pill" href="#div-postnatal" role="tab" aria-controls="div-postnatal" aria-selected="false" style="color:black;">Postnatal</a>
                      <a class="dropdown-item" id="tab-immunization" tabindex="-1"  data-toggle="pill"  href="#div-immunization" role="tab" aria-controls="div-immunization" aria-selected="false" style="color:black;">Immunization History</a>
                      <a class="dropdown-item" id="tab-dev-milestones" tabindex="-1" data-toggle="pill" href="#div-dev-milestones" role="tab" aria-controls="div-dev-milestones" aria-selected="false" style="color:black;">Developmental Milestones</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-school-history" data-toggle="pill" href="#div-school-history" role="tab" aria-controls="div-school-history" aria-selected="false">School History</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-play-behaviour" data-toggle="pill" href="#div-play-behaviour" role="tab" aria-controls="div-play-behaviour" aria-selected="false">Play Behaviour</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      Family Details <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" id="tab-family-information" tabindex="-1"  data-toggle="pill"  href="#div-family-information" role="tab" aria-controls="div-family-information" aria-selected="false" style="color:black;">Family Information</a>
                      <a class="dropdown-item" id="tab-family-history" tabindex="-1" data-toggle="pill" href="#div-family-history" role="tab" aria-controls="div-family-history" aria-selected="false" style="color:black;">Family History</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-social-environment" data-toggle="pill" href="#div-social-environment" role="tab" aria-controls="div-social-environment" aria-selected="false">Social Environment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-home-environment" data-toggle="pill" href="#div-home-environment" role="tab" aria-controls="div-home-environment" aria-selected="false">Home Environment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-social-worker-impression" data-toggle="pill" href="#div-social-worker-impression" role="tab" aria-controls="div-social-worker-impression" aria-selected="false">Social Worker Impression</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-medical-examination" data-toggle="pill" href="#div-medical-examination" role="tab" aria-controls="div-medical-examination" aria-selected="false">Medical Examination</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-psychological-assessment" data-toggle="pill" href="#div-psychological-assessment" role="tab" aria-controls="div-psychological-assessment" aria-selected="false">Psychological Assessment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-occupational-assessment" data-toggle="pill" href="#div-occupational-assessment" role="tab" aria-controls="div-occupational-assessment" aria-selected="false">Occupational/Physio Therapy Assessment</a>
                  </li>
                </ul>
              </div>
                @if (session('success'))
                    <div class="alert" style="background-color:green;color:white;padding:5px;margin:5px">
                        {{ session('success') }}
                    </div>
                @endif
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade active show" id="div-identification-data" role="tabpanel" aria-labelledby="tab-identification-data">
                    @include('admin.student.special-student.case-record.identification-data')
                  </div>
                  <div class="tab-pane fade" id="div-prenatal" role="tabpanel" aria-labelledby="tab-prenatal">
                    @include('admin.student.special-student.case-record.developmental-history.prenatal')
                  </div>
                  <div class="tab-pane fade" id="div-natal" role="tabpanel" aria-labelledby="tab-natal">
                    @include('admin.student.special-student.case-record.developmental-history.natal')
                  </div>
                  <div class="tab-pane fade" id="div-neonatal" role="tabpanel" aria-labelledby="tab-neonatal">
                    @include('admin.student.special-student.case-record.developmental-history.neonatal')
                  </div>
                  <div class="tab-pane fade" id="div-postnatal" role="tabpanel" aria-labelledby="tab-postnatal">
                    @include('admin.student.special-student.case-record.developmental-history.postnatal')
                  </div>
                  <div class="tab-pane fade" id="div-immunization" role="tabpanel" aria-labelledby="tab-immunization">
                    @include('admin.student.special-student.case-record.developmental-history.immunization')
                  </div>
                  <div class="tab-pane fade" id="div-dev-milestones" role="tabpanel" aria-labelledby="tab-dev-milestones">
                    @include('admin.student.special-student.case-record.developmental-history.developmental-milestones')
                  </div>
                  <div class="tab-pane fade" id="div-school-history" role="tabpanel" aria-labelledby="tab-school-history">
                    @include('admin.student.special-student.case-record.school-history')
                  </div>
                  <div class="tab-pane fade" id="div-play-behaviour" role="tabpanel" aria-labelledby="tab-play-behaviour">
                    @include('admin.student.special-student.case-record.play-behaviour')
                  </div>
                  <div class="tab-pane fade" id="div-family-information" role="tabpanel" aria-labelledby="tab-family-information">
                    @include('admin.student.special-student.case-record.family.information')
                  </div>
                  <div class="tab-pane fade" id="div-family-history" role="tabpanel" aria-labelledby="tab-family-history">
                    @include('admin.student.special-student.case-record.family.history')
                  </div>
                  <div class="tab-pane fade" id="div-social-environment" role="tabpanel" aria-labelledby="tab-social-environment">
                    @include('admin.student.special-student.case-record.social-environment')
                  </div>
                  <div class="tab-pane fade" id="div-home-environment" role="tabpanel" aria-labelledby="tab-home-environment">
                    @include('admin.student.special-student.case-record.home-environment')
                  </div>
                  <div class="tab-pane fade" id="div-social-worker-impression" role="tabpanel" aria-labelledby="tab-social-worker-impression">
                    @include('admin.student.special-student.case-record.social-worker-impression')
                  </div>
                  <div class="tab-pane fade" id="div-medical-examination" role="tabpanel" aria-labelledby="tab-medical-examination">
                    @include('admin.student.special-student.case-record.medical-examination')
                  </div>
                  <div class="tab-pane fade" id="div-psychological-assessment" role="tabpanel" aria-labelledby="tab-psychological-assessment">
                    @include('admin.student.special-student.case-record.psychological-assessment')
                  </div>
                  <div class="tab-pane fade" id="div-occupational-assessment" role="tabpanel" aria-labelledby="tab-occupational-assessment">
                    @include('admin.student.special-student.case-record.occupational-assessment')
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
        </div>
          <!-- /.col -->
    </div>
        <!-- /.row -->
</div>
      <!-- /.container-fluid -->



<!-- modal for select data -->

<div class="modal fade" id="selectDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select the Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="selectDataForm" method="post" action="{{ route('admin.students.special-students.generate-pdf',$specialStudent->id) }}">  
    @csrf
      <div class="modal-body">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="checkAll" value="1">
          <label class="form-check-label" for="checkAll">Select All</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="identification" value="1" checked disabled>
          <label class="form-check-label" for="identification">Identification Data</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="developmental_history" name="developmental_history" value="1">
          <label class="form-check-label" for="developmental_history">Developmental History</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="school_history" value="1" name="school_history">
          <label class="form-check-label" for="school_history">School History</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="play_behaviour" value="1" name="play_behaviour">
          <label class="form-check-label" for="play_behaviour">Play Behaviour</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="family_details" value="1" name="family_details">
          <label class="form-check-label" for="family_details">Family Details</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="social_environment" value="1" name="social_environment" >
          <label class="form-check-label" for="social_environment">Social Environment</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="home_environment" value="1" name="home_environment">
          <label class="form-check-label" for="home_environment">Home Environment</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="social_worker_impression" value="1" name="social_worker_impression" >
          <label class="form-check-label" for="social_worker_impression">Social Worker's Impression</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="medical_examination" value="1" name="medical_examination">
          <label class="form-check-label" for="medical_examination">Medical Examination</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="psychological_assessment" value="1" name="psychological_assessment" >
          <label class="form-check-label" for="psychological_assessment">Psychological Assessment</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="occupationl_assessment" value="1" name="occupational_assessment">
          <label class="form-check-label" for="occupationl_assessment">Occupationl Assessment</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" id="genarate_pdf">Genarate PDF</button>
      </div>
    </form>  
    </div>
  </div>
</div>

<!-- modal select data close -->

@endsection

@push('scripts')
<script>
  $("#checkAll").click(function(){
    $('#selectDataModal input:checkbox').not(this).prop('checked', this.checked);
    $('#selectDataModal #identification').prop('checked', true);
});
$("#selectDataModal").on('hide.bs.modal', function(){
         $('#selectDataModal input:checkbox').prop('checked', false);
         $('#selectDataModal #identification').prop('checked', true);
  });
</script>
@endpush