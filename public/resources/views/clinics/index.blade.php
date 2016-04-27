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
        <h3 class="box-title">Data Table With Full Features</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>Name</th>
                <th>Street</th>
                <th>City</th>
                <th>Municipality</th>
                <th>Barangay</th>
                <th>Telephone</th>
                <th>Options</th>
            </tr>
          </thead>
          <tbody>
            @foreach($clinics as $clinic)
              <tr>
                <td><a href="{!! url('dental/clinics', $clinic->id) !!}">{{ $clinic->name }}</a></td>
                <td>{{ $clinic->street }}</td>
                <td>{{ $clinic->city }}</td>
                <td>{{ $clinic->municipality }}</td>
                <td>{{ $clinic->barangay }}</td>
                <td>{{ $clinic->telephone }}</td>
                <td class="center">
                {!! Form::open(['method' => 'DELETE', 'route' => ['dental.clinics.destroy', $clinic->id]]) !!}
                    <a href="{!! url('dental/clinics/'.$clinic->id.'/edit') !!}">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    {!! Form::hidden('id', $clinic->id) !!}
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
