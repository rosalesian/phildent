@extends('app')
@section('content')

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
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Subscriptions</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Clinic Name</th>
              <th>Dentist</th>
              <th>Patient</th>
              <th>Product</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subscriptions as $subscription)
            <tr>
              <td>{{ $subscription->clinic_name }}</td>
              <td>{{ $subscription->dentist_name }}</td>

              <td>{{ $subscription->patient_name }}</td>
              <td>{{ $subscription->product_name }}</td>

              <td class="center">
              {!! Form::open(['method' => 'DELETE', 'route' => ['dental.subscriptions.destroy', $subscription->id]]) !!}
                  <a href="{!! url('dental/subscriptions/'.$subscription->id.'/edit') !!}">
                      <i class="glyphicon glyphicon-edit"></i>
                  </a>
                  {!! Form::hidden('id', $subscription->id) !!}
                  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-link']) !!}
              {!! Form::close() !!}   
            </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
@stop