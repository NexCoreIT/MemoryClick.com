@extends('backend.layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Photography List</h3>
        <a href="{{ route('photography.create') }}" class="btn btn-primary">Add New</a>
    </div>


    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Client Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photographies as $item)
                    <tr>
                        <td><img src="{{ asset($item->image) }}" width="60" class="img-thumbnail" /></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->client_name }}</td>
                        <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('photography.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('photography.delete', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$photographies->links()}}
    </div>
</div>
@endsection
