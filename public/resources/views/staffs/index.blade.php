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
                <th>lastname</th>
                <th>phone</th>
                <th>number</th>
                <th>email</th>
                <th>role</th>
                <th>Options</th>
            </tr>
          </thead>
          <tbody>
            @foreach($staffs as $staff)
            <tr>
              <td><a href="{!! url('dental/staffs', $staff->id) !!}">{{ $staff->user_name }}</a></td>
              <td>{{ $staff->firstname }}</td>
              <td>{{ $staff->middlename }}</td>
              <td>{{ $staff->lastname }}</td>
              <td>{{ $staff->phone }}</td>
              <td>{{ $staff->number }}</td>
              <td>{{ $staff->email }}</td>
              <td>{{ $staff->role}}</td>
              <td class="center">
              {!! Form::open(['method' => 'DELETE', 'route' => ['dental.staffs.destroy', $staff->id]]) !!}
                  <a href="{!! url('dental/staffs/'.$staff->id.'/edit') !!}">
                      <i class="glyphicon glyphicon-edit"></i>
                  </a>
                  {!! Form::hidden('id', $staff->id) !!}
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