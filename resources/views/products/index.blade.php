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
                        <th>Product Namee</th>
                        <th>Details</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><a href="{{ url('/dental/products', $product->id) }}">{{ $product->name }}</a></td>

                        <td>{{ $product->description}}</td>
                        <td>{{ $product->created_at}}</td>
                        <td>{{ $product->updated_at}}</td>

                        <td class="center">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['dental.products.destroy', $product->id]]) !!}
                            <a href="{!! url('dental/products/'.$product->id.'/edit') !!}">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            {!! Form::hidden('id', $product->id) !!}
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