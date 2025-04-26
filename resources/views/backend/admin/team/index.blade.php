@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 class="text-center">{{ $title }}</h2>
        <div class="text-end mb-3">
            <a href="{{ route('team.create') }}" class="btn btn-info">+ Add Team Member</a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Designation</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teams as $member)
                                <tr>
                                    <td>{{ Str::limit($member->name, 20) }}</td>
                                    <td>
                                        @if ($member->image)
                                            <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" style="width: 50px; height: 50px;" class="rounded-circle">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($member->designation, 30) }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('team.edit', $member->id) }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('team.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        <x-backend.svg.notfound-svg />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $teams->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
