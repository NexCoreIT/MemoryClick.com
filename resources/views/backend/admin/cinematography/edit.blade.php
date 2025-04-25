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
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="{{ old('title', $cinematography->title) }}" class="form-control @error('title') is-invalid @enderror" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">YouTube URL</label>
                    <input type="text" name="youtube_url" value="{{ old('youtube_url', $cinematography->youtube_url) }}" class="form-control @error('youtube_url') is-invalid @enderror" required>
                    @error('youtube_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
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
