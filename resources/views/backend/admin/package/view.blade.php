@extends('backend.layout.app')

@section('package_menu', 'show')
@section('packages', 'show active')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h4 class="m-0">{{ $package->package_name }}</h4>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <img src="{{ asset($package->image) }}" width="120" alt="">
            </div>
            <p><strong>Division:</strong> {{ $package->division?->name }}</p>
            <p><strong>Category:</strong> {{ $package->category?->name }}</p>
            <p><strong>Price:</strong> TK {{ $package->price }}</p>
            <p><strong>Chief:</strong> {{ $package->chief }}</p>
            <p><strong>Photographer:</strong> {{ $package->photographer }}</p>
            <p><strong>Cinematographer:</strong> {{ $package->cinematographer }}</p>
            <p><strong>Number of Photos:</strong> {{ $package->number_of_photos }}</p>
            <p><strong>Status:</strong> <span class="badge text-white bg-{{ $package->status == 1 ? 'success' : 'danger' }}">{{ $package->status == 1 ? 'Active' : 'Inactive' }}</span></p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Package Features</h5>
        </div>
        <div class="card-body">
            @if ($package->features->count() > 0)
                <ul class="list-group">
                    @foreach ($package->features as $feature)
                        <li class="list-group-item">{{ $feature->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>No features available for this package.</p>
            @endif
        </div>
    </div>

</div>
@endsection
