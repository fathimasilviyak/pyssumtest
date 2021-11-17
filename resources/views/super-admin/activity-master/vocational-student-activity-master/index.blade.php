@extends('layouts.super-admin')
@section("page-name","Vocational Student Activity Master")
@section('page-content')

@php
    $default = "not available";
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="tab-identification-data" data-toggle="pill" href="#div-identification-data" role="tab" aria-controls="div-identification-data" aria-selected="true">Identification Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-school-history" data-toggle="pill" href="#div-school-history" role="tab" aria-controls="div-school-history" aria-selected="false">School History</a>
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
                    @include('super-admin.activity-master.vocational-student-activity-master.general-skill-assessment')
                  </div>
                  <div class="tab-pane fade" id="div-school-history" role="tabpanel" aria-labelledby="tab-prenatal">
                    @include('super-admin.activity-master.vocational-student-activity-master.work-behaviour-assessment')
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




@endsection
