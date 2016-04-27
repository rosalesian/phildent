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
    {!! Form::open(['url' => 'dental/users','class' => 'form-horizontal']) !!}
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
          <label for="role" class="col-sm-2 control-label">Role</label>
          <div class="col-sm-10">
                <select class="form-control " name="role" value="{{ old('role') }}" id="select2" style="width: 100%;">
                  <option selected="selected"  value="super_admin">SuperAdmin</option>
                  <option value="admindental">Dental Admin</option>
                </select>
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