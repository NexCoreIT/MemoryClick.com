@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 700px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">Edit Team Member</h3>
        </div>
        <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body row">

                <div class="mb-3 col-md-12">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $team->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                        value="{{ old('designation', $team->designation) }}" required>
                    @error('designation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

                    @if ($team->image)
                        <div class="mt-2">
                            <img src="{{ asset($team->image) }}" alt="Current Image" width="100" class="img-thumbnail">
                        </div>
                    @endif
                </div>

            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('team.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
