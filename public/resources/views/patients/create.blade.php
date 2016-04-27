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
    {!! Form::open(['url' => 'dental/patients','class' => 'form-horizontal']) !!}
      <div class="box-body">
        <div class="form-group">
          <label for="patient_name" class="col-sm-2 control-label">User Name</label>
          <div class="col-sm-10">
           {!! Form::text('user_name', null, ['class' => 'form-control', 'placeholder' => 'patient name'])!!}
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password"  class="form-control" value="{{ old('password') }}"  id="password" placeholder="password">
          </div>
        </div>

        <div class="form-group">
          <label for="patient_name" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-10">
           {!! Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'firstname name'])!!}
          </div>
        </div>

        <div class="form-group">
          <label for="patient_name" class="col-sm-2 control-label">Middle Name</label>
          <div class="col-sm-10">
           {!! Form::text('middlename', null, ['class' => 'form-control', 'placeholder' => 'middle name'])!!}
          </div>
        </div>

        <div class="form-group">
          <label for="patient_name" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-10">
           {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'last name'])!!}
          </div>
        </div>

         <div class="form-group">
          <label for="birthdate" class="col-sm-2 control-label">Birth Date</label>
          <div class="col-sm-10">
            <input type="date" name="birthdate"  class="form-control" value="{{ old('date') }}"  id="birthdate" placeholder="birthdate">
          </div>
        </div>

         <div class="form-group">
          <label for="birthdate" class="col-sm-2 control-label">Gender</label>
          <div class="col-sm-10">
            <!-- radio -->
          <div class="form-group">
            <div class="radio">
              <label>
                <input type="radio" name="gender" id="gender" value="MALE" checked>
                MALE
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="gender" id="gender" value="FEMALE">
                FEMALE
              </label>
            </div>
          </div>
          </div>
        </div>

          <div class="form-group">
          <label for="address" class="col-sm-2 control-label">Address</label>
          <div class="col-sm-10">
           {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address'])!!}
          </div>
        </div>


        <div class="form-group">
          <label for="mobile" class="col-sm-2 control-label">Mobile</label>
          <div class="col-sm-10">
           {!! Form::number('mobile', null, ['class' => 'form-control', 'placeholder' => 'Mobile number'])!!}
          </div>
        </div>


        <div class="form-group">
          <label for="telephone" class="col-sm-2 control-label">Telephone</label>
          <div class="col-sm-10">
           {!! Form::number('telephone', null, ['class' => 'form-control', 'placeholder' => 'Telephone'])!!}
          </div>
        </div>

          <div class="form-group">
          <label for="gardian" class="col-sm-2 control-label">Gardian</label>
          <div class="col-sm-10">
           {!! Form::text('gardian_name', null, ['class' => 'form-control', 'placeholder' => 'Gardian'])!!}
          </div>
        </div>




        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
           {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) !!}
          </div>
        </div>
        

          <div class="form-group">
          <label for="status" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
                <select class="form-control " name="status" value="{{ old('status') }}" id="select2" style="width: 100%;">
                  <option selected="selected"  value="active">Active</option>
                  <option value="inactive">InActive</option>
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