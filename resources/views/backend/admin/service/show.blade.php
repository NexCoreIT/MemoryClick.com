@extends('backend.layout.app')

@section('content')

<div class="col-12">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <h3 class="card-title text-center mb-4 text-primary">{{$title}}</h3>
            <div class="row g-3">
                <!-- Service Name -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">Title:</label>
                        <p class="form-control-plaintext"><a href="">{{ $product->name ?? '-' }}</a></p>
                    </div>
                </div>

                <!-- Service Images -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label fw-bold">Service Images:</label>
                        <div class="d-flex flex-wrap gap-2">
                            @forelse($product->images as $image)
                                <img src="{{ asset( 'public/'.$image->images) }}" alt="Product Image" class="img-thumbnail" style="max-width: 200px;">
                            @empty
                                <p class="text-muted">No images available</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">Service Description:</label>
                        <p class="form-control-plaintext">{{ $product->description ?? 'No description available' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-end bg-light">
            <a href="{{ route('product.edit', $product->slug) }}" class="btn btn-primary px-4">Edit</a>
            <a href="{{ route('product.index') }}" class="btn btn-secondary px-4">Back</a>
        </div>
    </div>
</div>

@endsection
