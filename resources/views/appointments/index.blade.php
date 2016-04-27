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
                        <th>Services Name</th>
                        <th>Patient Firstname</th>
                        <th>Patiennt Middlename</th>
                        <th>Patient Lastname</th>
                        <th>Patient Birthdate</th>
                        <th>Patient Gender</th>
                        <th>Patient Address</th>
                        <th>Patient Mobile</th>
                        <th>Patient Telephone</th>
                        <th>Patient Gardian Name</th>
                        <th>Patient Email</th>
                        <th>Patient Status</th>
                        <th>Created at</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appointments as $appointment)
                    <tr>
                        <td><a href="{{ url('/dental/appointments', $appointment->id) }}">{{ $appointment->services['name'] }}</a></td>
                        <td>{{ $appointment->patients['firstname'] }}</td>
                        <td>{{ $appointment->patients['middlename']}}</td>
                        <td>{{ $appointment->patients['lastname'] }}</td>
                        <td>{{ $appointment->patients['birthdate'] }}</td>
                        <td>{{ $appointment->patients['gender'] }}</td>
                        <td>{{ $appointment->patients['address'] }}</td>
                        <td>{{ $appointment->patients['mobile'] }}</td>
                        <td>{{ $appointment->patients['telephone'] }}</td>
                        <td>{{ $appointment->patients['gardian_name'] }}</td>
                        <td>{{ $appointment->patients['email']}}</td>
                        <td>{{ $appointment->patients['status'] }}</td>
                        <td>{{ $appointment->created_at->diffForHumans() }}</td>
                        <td class="center">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['dental.patients.destroy', $appointment->id]]) !!}
                            <a href="{!! url('dental/appointments/'.$appointment->id.'/edit') !!}">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            {!! Form::hidden('id', $appointment->id) !!}
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