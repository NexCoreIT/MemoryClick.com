@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 700px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">Edit Testimonial</h3>
        </div>
        <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $testimonial->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Ratings (out of 5) <span class="text-danger">*</span></label>
                    <input type="number" name="rating" value="{{ old('rating', $testimonial->rating) }}" min="1" max="5" step="1" class="form-control @error('ratings') is-invalid @enderror" required>
                    @error('rating')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="1" {{ $testimonial->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $testimonial->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('testimonial.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update Testimonial</button>
            </div>
        </form>
    </div>
</div>
@endsection
