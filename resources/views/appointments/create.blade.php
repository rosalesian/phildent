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
            <h3 class="box-title">Appointment</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <!-- <form class="form-horizontal"> -->
        {!! Form::open(['url' => 'dental/details','class' => 'form-horizontal']) !!}
        <div class="box-body">
            <div class="form-group">
                <label for="patient_name" class="col-sm-2 control-label">Clinic</label>
                <div class="col-sm-10">
                    {!! Form::select('clinic_id', $clinics, null, ['class' => 'form-control select2', 'id' => 'clinic_id', 'style' => 'width: 100%']) !!}
                </div><!-- /.form-group -->
            </div>
            <div class="form-group">
                <label for="patient_name" class="col-sm-2 control-label">Staff</label>
                <div class="col-sm-10">
                    {!! Form::select('staff_id', $staffs, null, ['class' => 'form-control select2', 'id' => 'staff_id', 'style' => 'width: 100%']) !!}
                </div><!-- /.form-group -->
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Create</button>
        </div><!-- /.box-footer -->
        {!! Form::close() !!}
    </div><!-- /.box -->
    @stop