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
@if (Session::has('add'))
<div class="alert alert-success fade in">
    {{ Session::get('add')}}
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
                        <th>Dental Name</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td><a href="{!! url('dental/services', $service->id) !!}">{{ $service->service_name }}</a></td>
                        <td>{{ $service->clinic_name }}</td>
                        <td>{{ $service->street }}</td>
                        <td>{{ $service->city }}</td>

                        <td class="center">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['dental.services.destroy', $service->id]]) !!}
                            <a href="{!! url('dental/services/'.$service->id.'/edit') !!}">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            {!! Form::hidden('id', $service->id) !!}
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
