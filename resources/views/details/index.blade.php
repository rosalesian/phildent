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
                <h3 class="box-title">Dental Details</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Clinic Name</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>Municipality</th>
                        <th>Barangay</th>
                        <th>Telephone</th>
                        <th>Staff Name</th>
                        <th>Staff Email</th>
                        <th>Staff Number</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $detail)
                    <tr>
                        <td><a href="{!! url('dental/details', $detail->id) !!}">{{ $detail->clinics->name }}</a></td>
                        <td>{{ $detail->clinics['street'] }}</td>
                        <td>{{ $detail->clinics['city']  }}</td>
                        <td>{{ $detail->clinics['municipality']}}</td>
                        <td>{{ $detail->clinics['barangay'] }}</td>
                        <td>{{ $detail->clinics['telephone'] }}</td>
                        <td>{{ $detail->staffs['firstname'] .' '. $detail->staffs['middlename'] }}</td>
                        <td>{{ $detail->staffs['email'] }}</td>
                        <td>{{ $detail->staffs['number'] }}</td>
                        <td class="center">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['dental.details.destroy', $detail->id]]) !!}
                            <a href="{!! url('dental/details/'.$detail->id.'/edit') !!}">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            {!! Form::hidden('id', $detail->id) !!}
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
