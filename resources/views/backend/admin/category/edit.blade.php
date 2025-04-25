@extends('backend.layout.app')
@section('content')

<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{ $title }}</h3>
        </div>

        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Type Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" placeholder="Type Name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                {{-- <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    @if($category->image && file_exists(public_path(Str::replaceFirst('public/', '', $category->image))))
                        <img src="{{ asset(Str::replaceFirst('public/', '', $category->image)) }}" alt="Current Image" style="width: 100px; height: auto; border: 1px solid #ddd; padding: 3px; border-radius: 4px;">
                    @else
                        <p>No image available</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Change Image</label>
                    <input type="file" name="image" class="form-control">
                </div> --}}

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update Category</button>
            </div>
        </form>
    </div>
</div>

@endsection
