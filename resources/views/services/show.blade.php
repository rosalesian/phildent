@extends('app')
@section('content')

<h2 class="page-header">User Info</h2>

<div class="row">
<div class="col-md-12">
  <!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-yellow">
      <div class="widget-user-image">
        <img class="img-circle" src="{!! asset('dist/img/user7-128x128.jpg') !!}" alt="User Avatar">
      </div><!-- /.widget-user-image -->
      <h3 class="widget-user-username">Nadia Carmichael</h3>
      <h5 class="widget-user-desc">Lead Developer</h5>
    </div>
    <div class="box-footer no-padding">
      <ul class="nav nav-stacked">
        <li><a href="#">Service Name <span class="pull-right badge bg-blue"> {!! $services->service_name !!} </span></a></li>
        <li><a href="#">Clinic Name <span class="pull-right badge bg-aqua"> {!! $services->clinic_name !!} </span></a></li>
        <li><a href="#">Street <span class="pull-right badge bg-green"> {!! $services->street !!} </span></a></li>
        <li><a href="#">City <span class="pull-right badge bg-green"> {!! $services->city !!} </span></a></li>
      </ul>
    </div>
  </div><!-- /.widget-user -->
</div><!-- /.col -->
<div class="box-footer">
	<button type="submit" class="btn btn-default">Edit</button>
	<button type="submit" class="btn btn-danger">Delete</button>
</div><!-- /.box-footer -->
@stop