@extends('backend.layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4 class="mb-0">Recent Works</h4>
        <a href="{{ route('recent-work.create') }}" class="btn btn-primary">Add New</a>
    </div>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Package Name</th>
                        <th>Name</th>
                        <th>Social Media</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentWorks as $item)
                    <tr>
                        <td>
                            <img src="{{ asset($item->image) }}" alt="Image" style="width: 60px;" class="img-thumbnail">
                        </td>
                        <td>{{ $item->package_name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->social_media_name }}</td>
                        <td>
                            <span class="badge bg-{{ $item->status ? '1' : '0' }}">
                                {{ $item->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('recent-work.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('recent-work.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No recent works found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
