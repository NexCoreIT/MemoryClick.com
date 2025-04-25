@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 800px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">Create Recent Work</h3>
        </div>
        <form action="{{ route('recent-work.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">

                <div class="mb-3 col-md-6">
                    <label class="form-label">Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Additional Images</label>
                    <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" multiple>
                    @error('images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Package Name <span class="text-danger">*</span></label>
                    <input type="text" name="package_name" class="form-control @error('package_name') is-invalid @enderror" required>
                    @error('package_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Social Media Name</label>
                    <input type="text" name="social_media_name" class="form-control @error('social_media_name') is-invalid @enderror">
                    @error('social_media_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('recent-work.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
