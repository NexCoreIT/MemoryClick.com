@extends('backend.layout.app')
@section('package_menu', 'show')
@section('packages', 'show active')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
 <style>
	            #container {
	                width: 1000px;
	                margin: 20px auto;
	            }
	            .ck-editor__editable[role="textbox"] {
	                /* editing area */
	                min-height: 200px;
	            }
	            .ck-content .image {
	                /* block images */
	                max-width: 80%;
	                margin: 20px auto;
	            }

	        </style>


@section('content')
    <div class="container">
        <div class="col-12 d-flex justify-content-center mt-4">
            <div class="card shadow-lg" style="max-width: 1000px; width: 100%;">
                <div class="card-header">
                    <h3 class="card-title mb-0">Add New Package</h3>
                </div>
                <form action="{{ route('package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row" id="featureContainer">

                            <div class="mb-4">
                                <img src="{{ asset($package->image) }}" width="120" alt="">
                            </div>

                            {{-- Package Name --}}
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Package Name</label>
                                    <input type="text" name="package_name"
                                        value="{{ old('package_name', $package->package_name) }}" class="form-control"
                                        placeholder="Name" required="">
                                    @error('package_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Package Image</label>
                                    <input type="file" name="image" class="form-control" placeholder="Name"
                                        >
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Division --}}
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Division</label>
                                    <select name="division_id" class="form-control form-select" required>
                                        <option value="" class="d-none">Select</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}"
                                                {{ old('division_id', $package->division_id) == $division->id ? 'selected' : '' }}>
                                                {{ $division->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control form-select" required>
                                        <option value="" class="d-none">Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $package->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" value="{{ old('price', $package->price) }}"
                                        class="form-control" placeholder="Price" required="">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Chief --}}
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Chief</label>
                                    <input type="text" name="chief" value="{{ old('chief', $package->chief) }}"
                                        class="form-control" placeholder="Chief">
                                </div>
                            </div>

                            {{-- Photographer --}}
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Photographer</label>
                                    <input type="text" name="photographer"
                                        value="{{ old('photographer', $package->photographer) }}" class="form-control"
                                        placeholder="Photographer">
                                </div>
                            </div>

                            {{-- Cinematographer --}}
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Cinematographer</label>
                                    <input type="text" name="cinematographer"
                                        value="{{ old('cinematographer', $package->cinematographer) }}"
                                        class="form-control" placeholder="Cinematographer">
                                </div>
                            </div>

                            {{-- Number of Photos --}}
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Number of Photos</label>
                                    <input type="text" name="number_of_photos"
                                        value="{{ old('number_of_photos', $package->number_of_photos) }}"
                                        class="form-control" placeholder="Number of Photos" required="">
                                    @error('number_of_photos')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Package Description</label>
                                <textarea id="editor" name="description">{{ old('description',$package->description) }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                            {{-- Status --}}
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control form-select">
                                        <option value="1"
                                            {{ old('status', $package->status) == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0"
                                            {{ old('status', $package->status) == '0' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>

                            {{-- Features --}}
                            @php
                                $features = old(
                                    'features',
                                    $package->features ? json_decode($package->features, true) : [],
                                );
                            @endphp
                            @if (!empty($features))
                                @foreach ($features as $key => $feature)
                                    <div class="col-sm-6 removeItem">
                                        <label class="form-label">Features</label>
                                        <div class="mb-3">
                                            <div class="input-group mb-3">
                                                <input type="text" name="features[]" value="{{ $feature['name'] }}"
                                                    class="form-control" placeholder="Feature" required="">
                                                @if ($key == 0)
                                                    <button type="button" class="btn btn-success addFeature">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M5 12h14" />
                                                            <path d="M12 5v14" />
                                                        </svg>
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger removeFeature">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M18 6L6 18"></path>
                                                            <path d="M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-sm-6 mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Features</label>
                                        <div class="input-group mb-2">

                                            <input type="text" name="features[]" class="form-control"
                                                placeholder="Feature" required="">
                                            <button type="button" class="btn btn-success addFeature">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14" />
                                                    <path d="M12 5v14" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif

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
<!-- CKEditor 4.25.1 LTS CDN and init -->
<script src="https://cdn.ckeditor.com/4.25.1/lts/ckeditor.js"></script>
<script>
  		ClassicEditor
	        .create( document.querySelector( '#editor' ) )
	        .catch( error => {
	            console.error( error );
	        } );
	</script>
@endpush
