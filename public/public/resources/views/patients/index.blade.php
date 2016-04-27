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
              <th>User Name</th>
              <th>Firstname</th>
              <th>Middlename</th>
              <th>Lastname</th>
              <th>Birthdate</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Mobile</th>
              <th>Telephone</th>
              <th>Gardian Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            @foreach($patients as $patient)
            <tr>
              <td><a href="{{ url('/dental/patients', $patient->id) }}">{{ $patient->user_name }}</a></td>
              <td>{{ $patient->firstname }}</td>
              <td>{{ $patient->middlename }}</td>
              <td>{{ $patient->lastname}}</td>
              <td>{{ $patient->birthdate}}</td>
              <td>{{ $patient->gender}}</td>
              <td>{{ $patient->address}}</td>
              <td>{{ $patient->mobile}}</td>
              <td>{{ $patient->telephone}}</td>
              <td>{{ $patient->gardian_name}}</td>
              <td>{{ $patient->email}}</td>
              <td>{{ $patient->status}}</td>
              <td class="center">
              {!! Form::open(['method' => 'DELETE', 'route' => ['dental.patients.destroy', $patient->id]]) !!}
                  <a href="{!! url('dental/patients/'.$patient->id.'/edit') !!}">
                      <i class="glyphicon glyphicon-edit"></i>
                  </a>
                  {!! Form::hidden('id', $patient->id) !!}
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