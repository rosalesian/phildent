@extends('app')
@section('content')

<div class="row">
<div class="col-md-12">
  <!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-yellow">
      <div class="widget-user-image">
        <img class="img-circle" src="{!! asset('dist/img/user7-128x128.jpg') !!}" alt="User Avatar">
      </div><!-- /.widget-user-image -->
      <h3 class="widget-user-username">{!! $clinic->name !!}</h3>
      <h5 class="widget-user-desc">{!! $clinic->street !!}r</h5>
    </div>
    <div class="box-footer no-padding">
      <ul class="nav nav-stacked">
        <li><a href="#">City <span class="pull-right badge bg-blue"> {!! $clinic->city !!} </span></a></li>
        <li><a href="#">Municipality <span class="pull-right badge bg-blue"> {!! $clinic->municipality !!} </span></a></li>
        <li><a href="#">Barangay <span class="pull-right badge bg-blue"> {!! $clinic->barangay !!} </span></a></li>
        <li><a href="#">Telephone <span class="pull-right badge bg-aqua"> {!! $clinic->telephone !!} </span></a></li>
        <li><a href="#">Created on <span class="pull-right badge bg-aqua"> {!! $clinic->created_at->diffForHumans() !!} </span></a></li>
      </ul>
    </div>
  </div><!-- /.widget-user -->
</div><!-- /.col -->
<div class="box-footer">
	<button type="submit" class="btn btn-default">Edit</button>
	<button type="submit" class="btn btn-danger">Delete</button>
</div><!-- /.box-footer -->
@stop