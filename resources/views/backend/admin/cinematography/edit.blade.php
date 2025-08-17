@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 800px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">Edit Cinematography</h3>
        </div>
        <form action="{{ route('cinematographies.update', $cinematography->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $cinematography->title) }}" class="form-control @error('title') is-invalid @enderror" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Facebook URL <span class="text-danger">*</span> </label>
                    <input type="text" name="youtube_url" value="{{ old('youtube_url', $cinematography->youtube_url) }}" class="form-control @error('youtube_url') is-invalid @enderror" required>
                    <small class="text-warning d-block mt-1">
                        <i class="fas fa-exclamation-triangle"></i> URL must be the embedded format from Facebook.
                    </small>

                    @error('youtube_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Film Credit <span class="text-danger">*</span></label>
                    <input type="text" name="credit" value="{{ old('credit', $cinematography->credit) }}" class="form-control @error('credit') is-invalid @enderror" value="{{ old('credit') }}" required>
                    @error('credit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="1" {{ $cinematography->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $cinematography->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('cinematographies.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
