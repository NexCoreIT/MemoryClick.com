@extends('backend.layout.app')
@section('package_menu', 'show')
@section('packages', 'show active')
@section('content')
    <div class="container">

        <div class="col-12 d-flex justify-content-center mt-4">
            <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
                <div class="card-header">
                    <h3 class="card-title mb-0">Edit Division</h3>
                </div>
                <form action="{{ route('division.update', $division->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="mb-4">
                            <img src="{{ asset($division->image) }}" width="120" class="rounded" alt="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Division Name</label>
                            <input type="text" name="name" value="{{ $division->name }}" class="form-control"
                                placeholder="Name" required="">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control form-select">
                                <option value="1" {{ $division->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $division->status == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
@endpush
