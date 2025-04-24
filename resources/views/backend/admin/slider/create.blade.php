@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{ $title ?? 'Create Slider' }}</h3>
        </div>
        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Slider Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                    <small class="text-muted">Preferred size: 1200x500 pixels</small>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Sort Number <span class="text-danger">*</span></label>
                    <input type="number" name="sort_number" class="form-control @error('sort_number') is-invalid @enderror" placeholder="e.g., 1" required>
                    @error('sort_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('slider.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Create Slider</button>
            </div>

        </form>
    </div>
</div>
@endsection
