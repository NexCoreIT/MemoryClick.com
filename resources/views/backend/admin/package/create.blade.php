@extends('backend.layout.app')
@section('package_menu', 'show')
@section('packages', 'show active')
@section('content')
    <div class="container">
        <div class="col-12 d-flex justify-content-center mt-4">
            <div class="card shadow-lg" style="max-width: 1000px; width: 100%;">
                <div class="card-header">
                    <h3 class="card-title mb-0">Add New Package</h3>
                </div>
                <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row" id="featureContainer">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Package Name</label>
                                    <input type="text" name="package_name" value="{{ old('package_name') }}" class="form-control" placeholder="Name"
                                        required="">
                                    @error('package_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Package Image</label>
                                    <input type="file" name="image" class="form-control" placeholder="Name"
                                        required="">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Division</label>
                                    <select name="division_id" class="form-control form-select" required>
                                        <option value="" class="d-none">Select</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control form-select" required>
                                        <option value="" class="d-none">Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="price"
                                        required="">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Chief</label>
                                    <input type="text" name="chief" value="{{ old('chief') }}" class="form-control" placeholder="Chief">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Photographer</label>
                                    <input type="text" name="photographer" value="{{ old('photographer') }}" class="form-control"
                                        placeholder="Photographer">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Cinematographer</label>
                                    <input type="text" name="cinematographer" value="{{ old('cinematographer') }}" class="form-control"
                                        placeholder="Cinematographer">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Number of Photos</label>
                                    <input type="text" name="number_of_photos" value="{{ old('number_of_photos') }}" class="form-control" placeholder="Number of Photos"
                                        required="">
                                    @error('number_of_photos')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control form-select">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Features</label>
                                    <div class="input-group">
                                        <input type="text" name="features[]" class="form-control" placeholder="Feature"
                                            required="">
                                        <button type="button" class="btn btn-success addFeature">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-plus-icon lucide-plus">
                                                <path d="M5 12h14" />
                                                <path d="M12 5v14" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.addFeature').click(function() {
                var featureInput = `
                    <div class="col-sm-6 removeItem">
                        <div class="mb-3">
                            <label class="form-label">Features</label>
                            <div class="input-group mb-2">
                                <input type="text" name="features[]" class="form-control" placeholder="Feature" required="">
                                <button type="button" class="btn btn-danger removeFeature">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6L6 18"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                $('#featureContainer').append(featureInput);
            });

            // Remove Feature field
            $(document).on('click', '.removeFeature', function() {
                $(this).closest('.removeItem').remove();
            });
        });
    </script>
@endpush
