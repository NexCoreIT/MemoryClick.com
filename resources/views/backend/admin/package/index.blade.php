@extends('backend.layout.app')
@section('package_menu', 'show')
@section('packages', 'show active')
@section('content')
    <div class="container">
        <div class="d-flex py-4 align-items-center justify-content-between">
            <div class="">
                <h2 class="m-0">{{ $title ?? 'Packages' }}</h2>
            </div>
            <div>
                <a href="{{ route('package.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add New</a>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th style="width:20%;">Package Name</th>
                                <th style="width:20%;">Division</th>
                                <th style="width:20%;">Category</th>
                                <th style="width:20%;">Price</th>
                                <th style="width:20%;">Status</th>
                                <th style="width:20%;">Description</th>
                                <th style="width:20%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                                <tr>
                                    <td>{{ $package->package_name }}</td>
                                    <td>{{ $package->division_id == '1' ? 'Dhaka' : 'Chittagong' }}</td>
                                    <td>{{ $package->category?->name }}</td>
                                    <td>TK {{ $package->price }}</td>
                                    <td>
                                        <span
                                            class="badge text-white bg-{{ $package->status == '1' ? 'success' : 'danger' }}">
                                            {{ $package->status == '1' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">

                                            <a href="{{ route('package.view', $package->id) }}"
                                                class="btn btn-warning btn-sm">
                                                View
                                            </a>


                                            <a href="{{ route('package.edit', $package->id) }}"
                                                class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <a href="{{ route('package.delete', $package->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this package?');">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($packages->isEmpty())
                        <p class="text-center mt-1">No Data Found</p>
                    @endif
                </div>
                {{ $packages->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
