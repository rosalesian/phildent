@extends('app')

@section('content')
@if($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

@if (Session::has('update_flash'))
        <div class="alert alert-success fade in">
        {{ Session::get('update_flash')}}
        </div>
@endif

@if (Session::has('not_found'))
        <div class="alert alert-success fade in">
        {{ Session::get('not_found')}}
        </div>
@endif

@if (Session::has('delete'))
        <div class="alert alert-success fade in">
        {{ Session::get('delete')}}
        </div>
@endif
<div class="box-body">
  <div class="row">
    <div class="col-md-12">
     {!! Form::open(['action' => 'TransfersController@transfer', 'method' => 'post']) !!}
      <div class="form-group">
        <label>From</label>
      {!! Form::select('clinicsFrom', $clinicsFrom, null, ['class' => 'js-example-responsive', 'id' => 'clinicsFrom', 'style' => 'width: 100%']) !!}
      </div><!-- /.form-group -->
     
    </div><!-- /.col -->
    <div class="col-md-12">
      <!--<div class="form-group">
        <label>To</label>
       {!! Form::select('clinicsTo', $clinicsTo, null, ['class' => 'js-example-responsive', 'id' => 'clinicsTo', 'style' => 'width: 100%']) !!} 
      </div><!-- /.form-group -->

        <button type="submit" class="btn btn-info">TRANSFER</button>
      </div><!-- /.box-footer -->
       {!! Form::close() !!}
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.box-body -->
@stop