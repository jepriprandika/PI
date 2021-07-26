@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Services</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>    
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->sku }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>{{ $service->status }}</td>
                                        <td>
                                            <a href="{{ url('admin/services/'. $service->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                            @can('delete_services')
                                            {!! Form::open(['url' => 'admin/services/'. $service->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $services->links() }}
                    </div>
                    @can('add_services')
                    <div class="card-footer text-right">
                        <a href="{{ url('admin/services/create') }}" class="btn btn-primary">Add New</a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection