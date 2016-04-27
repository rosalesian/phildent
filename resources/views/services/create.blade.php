@extends('app')

@section('content')
@if($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif
<div class="col-md-12">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Horizontal Form</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <!-- <form class="form-horizontal"> -->
    {!! Form::open(['url' => 'dental/services','class' => 'form-horizontal']) !!}
      <div class="box-body">
       
        <div class="form-group">
          <label for="street" class="col-sm-2 control-label">Street</label>
          <div class="col-sm-10">
           {!! Form::select('detail_id', $services, null, ['class' => 'form-control select2', 'id' => 'detail_id', 'style' => 'width: 100%']) !!}
          </div>
        </div>
         <div class="form-group">
          <label for="clinic" class="col-sm-2 control-label">Service Name</label>
          <div class="col-sm-10">
           {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Cinic name', 'id' => 'clinic'])!!}
          </div>
        </div>
       
      </div><!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-info pull-right">Create</button>
      </div><!-- /.box-footer -->
   {!! Form::close() !!}
  </div><!-- /.box -->
@stop