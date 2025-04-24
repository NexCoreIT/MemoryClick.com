@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">Edit Property</h3>
        </div>
        <form action="{{ route('property_update', $property->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $property->title) }}" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description', $property->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Before Image</label>
                    <input type="file" name="before_image" class="form-control @error('before_image') is-invalid @enderror">
                    @error('before_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($property->before_image)
                        <img src="{{ asset('public/'.$property->before_image) }}" alt="Before Image" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">After Image</label>
                    <input type="file" name="after_image" class="form-control @error('after_image') is-invalid @enderror">
                    @error('after_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($property->after_image)
                        <img src="{{ asset('public/'.$property->after_image) }}" alt="After Image" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="1" {{ $property->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $property->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('property_index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
