@extends('backend.layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="mb-0">All Cinematographies</h3>
        <a href="{{ route('cinematographies.create') }}" class="btn btn-primary">Add New</a>
    </div>

    <div class="card shadow">
        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Facebook URL</th>
                            <th>Status</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cinematographies as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->youtube_url }}</td>
                            <td>
                                <span class="badge bg-{{ $item->status ? 'success' : 'danger' }}">
                                    {{ $item->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('cinematographies.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('cinematographies.delete', $item->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"
                                        class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if($cinematographies->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">No data found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{$cinematographies->links()}}
        </div>
    </div>
</div>

@endsection
