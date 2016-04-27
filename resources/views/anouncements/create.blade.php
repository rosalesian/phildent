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
    {!! Form::open(['url' => 'dental/anouncements','class' => 'form-horizontal']) !!}
      <div class="box-body">
        <div class="form-group">
          <label for="user_name" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
           {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name'])!!}
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
           {!! Form::text('descriptions', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Description']) !!}
          </div>
        </div>
         
        </div>
      </div><!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Create</button>
      </div><!-- /.box-footer -->
   {!! Form::close() !!}
  </div><!-- /.box -->
@stop