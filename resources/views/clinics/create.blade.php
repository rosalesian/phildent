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
    {!! Form::open(['url' => 'dental/clinics','class' => 'form-horizontal']) !!}
      <div class="box-body">
          <div class="form-group">
              <label for="user_name" class="col-sm-2 control-label">User Name</label>
              <div class="col-sm-10">
                  {!! Form::text('user_name', null, ['class' => 'form-control', 'placeholder' => 'User name'])!!}
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                  <input type="password" name="password"  class="form-control" value="{{ old('password') }}"  id="password" placeholder="password">
              </div>
          </div>
        <div class="form-group">
          <label for="clinic" class="col-sm-2 control-label">Clinic Name</label>
          <div class="col-sm-10">
           {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Cinic name', 'id' => 'clinic'])!!}
          </div>
        </div>
        <div class="form-group">
          <label for="street" class="col-sm-2 control-label">Street</label>
          <div class="col-sm-10">
           {!! Form::text('street', null, ['class' => 'form-control', 'id' => 'street', 'placeholder' => 'Street']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="city" class="col-sm-2 control-label">City</label>
          <div class="col-sm-10">
           {!! Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'placeholder' => 'City']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="municipal" class="col-sm-2 control-label">Municipal</label>
          <div class="col-sm-10">
           {!! Form::text('municipal', null, ['class' => 'form-control', 'id' => 'municipal', 'placeholder' => 'Municipal']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="barangay" class="col-sm-2 control-label">Barangay</label>
          <div class="col-sm-10">
           {!! Form::text('barangay', null, ['class' => 'form-control', 'id' => 'barangay', 'placeholder' => 'Barangay']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-2 control-label">Telephone Number</label>
          <div class="col-sm-10">
           {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'baraphonengay', 'placeholder' => 'Telephone Number']) !!}
          </div>
        </div>
       
      </div><!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Create</button>
      </div><!-- /.box-footer -->
   {!! Form::close() !!}
  </div><!-- /.box -->
@stop