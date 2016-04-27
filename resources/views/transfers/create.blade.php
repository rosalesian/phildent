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
        {!! Form::open(['action' => 'TransfersController@transferAddAll', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="form-group">
                <label for="user_name" class=" control-label">CLINIC FROM :  {!! $name !!}</label>
                <div class="col-sm-10">

                </div>
            </div>

         <!--   <div class="form-group">

                <div class="col-sm-10">
                    {!! Form::select('clinicsFrom', $clinics, null, ['class' => 'js-example-responsive', 'id' => 'clinicsFrom', 'style' => 'width: 100%']) !!}
                </div>
            </div>-->






            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">PATIENT LISTS</h3>

                    <div class="box-tools pull-right">
                        <ul class="pagination pagination-sm inline">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="todo-list">
                        <li>
                            <!-- drag handle -->

                      @foreach($patients as $patient)
                      </span>
                            <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                            <!-- checkbox -->
                            <input type="checkbox" value="{!! $patient->id !!}" name="patients[]">
                            <!-- todo text -->
                            <span class="text">{!! $patient->firstname !!}</span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> {!! $patient->lastname !!}</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>

                      @endforeach

                </div><!-- /.box-body -->

                <br/>
                <div class="form-group">

                    <label for="street" class="col-sm-2 control-label">CLINIC TO : </label>
                    <div class="col-sm-10">
                        {!! Form::select('clinicsTo', $clinics, null, ['class' => 'js-example-responsive', 'id' => 'clinicsFrom', 'style' => 'width: 100%']) !!}
                    </div>
                </div>
                <br/>
                <div class="box-footer clearfix no-border">
                    <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                </div>
            </div><!-- /.box -->




        </div>
    </div><!-- /.box-body -->
    {!! Form::close() !!}
</div><!-- /.box -->
@stop