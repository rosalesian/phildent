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
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-6">
    
      <!-- table from -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Transfer Record Clinics From</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table">
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Barangay</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($transfers as $transfer)
                  <tr>
                    <td>{{ $transfer->name }}</td>
                    <td>{{ $transfer->street }}</td>
                    <td>{{ $transfer->city }}</td>
                    <td>{{ $transfer->barangay }}</td>
                    <td class="center">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['dental.request.destroy', $transfer->id]]) !!}
                  
                        {!! Form::hidden('id', $transfer->id) !!}
                        {!! Form::button('Approved', ['type' => 'submit', 'class' => 'btn btn-link']) !!}
                    {!! Form::close() !!}   
                    </td>
                  </tr>
                 @endforeach
              </tbody>
            </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->


    <!-- table to -->
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">To Clinics Record</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
           <table class="table">
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Barangay</th>
                </tr>
              </thead>
              <tbody>
                @foreach($transfersTo as $transferTo)
                  <tr>
                    <td>{{ $transferTo->name }}</td>
                    <td>{{ $transferTo->street }}</td>
                    <td>{{ $transferTo->city }}</td>
                    <td>{{ $transferTo->barangay }}</td>
                  </tr>
                 @endforeach
              </tbody>
            </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->

@stop
