@extends('app')
@section('content')

<h2 class="page-header">patient Info</h2>

<div class="row">
<div class="col-md-12">
  <!-- Widget: patient widget style 1 -->
  <div class="box box-widget widget-patient-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-patient-header bg-yellow">
      <div class="widget-patient-image">
        <img class="img-circle" src="{!! asset('dist/img/patient7-128x128.jpg') !!}" alt="patient Avatar">
      </div><!-- /.widget-patient-image -->
      <h3 class="widget-patient-patientname">{!! $patient->firstname,' ',$patient->middlename,', ',$patient->lastname !!}</h3>
      <h5 class="widget-patient-desc">Patient Info</h5>
    </div>
    <div class="box-footer no-padding">
      <ul class="nav nav-stacked">
        <li><a href="#">Username <span class="pull-right badge bg-blue"> {!! $patient->user_name !!} </span></a></li>
        <li><a href="#">Birthdate <span class="pull-right badge bg-blue"> {!! $patient->birthdate !!} </span></a></li>
        <li><a href="#">Gender <span class="pull-right badge bg-blue"> {!! $patient->gender !!} </span></a></li>
        <li><a href="#">Address <span class="pull-right badge bg-blue"> {!! $patient->address !!} </span></a></li>
        <li><a href="#">Mobile <span class="pull-right badge bg-blue"> {!! $patient->mobile !!} </span></a></li>
        <li><a href="#">Telephone <span class="pull-right badge bg-blue"> {!! $patient->telephone !!} </span></a></li>
        <li><a href="#">Gardian <span class="pull-right badge bg-blue"> {!! $patient->gardian_name !!} </span></a></li>
        <li><a href="#">Email <span class="pull-right badge bg-blue"> {!! $patient->email !!} </span></a></li>
        <li><a href="#">Status <span class="pull-right badge bg-blue"> {!! $patient->status !!} </span></a></li>
      </ul>
    </div>
  </div><!-- /.widget-patient -->
</div><!-- /.col -->
@stop