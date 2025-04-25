@extends('backend.layout.app')
@section('package_menu', 'show')
@section('packages', 'show active')
@section('content')

<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{$title}}</h3>
        </div>
        <form action="{{route('package.category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Type Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Type Name" required>
                    <small>
                        @error('name')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror

                    </small>
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" placeholder="Image Name" required>
                    <small>
                        @error('image')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror

                    </small>
                </div> --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>


@endsection
