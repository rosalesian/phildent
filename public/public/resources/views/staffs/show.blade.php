@extends('app')
@section('content')

<h2 class="page-header">Dental Staff Info</h2>

<div class="row">
<div class="col-md-12">
  <!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-yellow">
      <div class="widget-user-image">
        <img class="img-circle" src="{!! asset('dist/img/user7-128x128.jpg') !!}" alt="User Avatar">
      </div><!-- /.widget-user-image -->
      <h3 class="widget-user-username">{!! $staff->user_name !!}</h3>
      <h5 class="widget-user-desc">{!! $staff->role !!}r</h5>
    </div>
    <div class="box-footer no-padding">
      <ul class="nav nav-stacked">
        <li><a href="#">First name <span class="pull-right badge bg-blue"> {!! $staff->firstname !!} </span></a></li>
        <li><a href="#">Middle name <span class="pull-right badge bg-blue"> {!! $staff->middlename !!} </span></a></li>
        <li><a href="#">Last name <span class="pull-right badge bg-blue"> {!! $staff->lastname !!} </span></a></li>
        <li><a href="#">Email <span class="pull-right badge bg-aqua"> {!! $staff->email !!} </span></a></li>
      </ul>
    </div>
  </div><!-- /.widget-user -->
</div><!-- /.col -->
<div class="box-footer">
	<button type="submit" class="btn btn-default">Edit</button>
	<button type="submit" class="btn btn-danger">Delete</button>
</div><!-- /.box-footer -->
@stop