@extends('backend.layout.app')
@section('package_menu', 'show')
@section('packages', 'show active')
@section('content')
    <div class="container">
        <div class="d-flex py-4 align-items-center justify-content-between">
            <div class="">
                <h2 class="m-0">{{ $title ?? 'Divisions' }}</h2>
            </div>
            <div>
                <a href="{{ route('division.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add New</a>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Division Name</th>   
                                <th>Status</th> 
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $division)
                                <tr>
                                    <td>{{ $division->name }}</td> 
                                    <td>
                                        <span
                                            class="badge text-white bg-{{ $division->status == '1' ? 'success' : 'danger' }}">
                                            {{ $division->status == '1' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">

                                            <a href="{{ route('division.view', $division->id) }}"
                                                class="btn btn-warning btn-sm">
                                                View
                                            </a>


                                            <a href="{{ route('division.edit', $division->id) }}"
                                                class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <a href="{{ route('division.delete', $division->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this division?');">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($divisions->isEmpty())
                        <p class="text-center mt-1">No Data Found</p>
                    @endif
                </div>
                {{ $divisions->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
