@extends('backend.layout.app')

@section('content')

<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{ $title }}</h3>
        </div>
        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <!-- Service Name -->
                <div class="mb-3">
                    <label class="form-label">Service Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                    @error('name') <strong class="text-danger">{{ $message }}</strong> @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" required>{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id" required>
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Thumbnail -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Current Thumbnail</label><br>
                    <img src="{{ asset('public/'.$product->image) }}" alt="Product Thumbnail" class="img-thumbnail" width="100">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Change Thumbnail</label>
                    <input type="file" class="form-control" name="image" accept="image/*">
                    @error('image') <strong class="text-danger">{{ $message }}</strong> @enderror
                </div>

                <!-- Product Images -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Current Service Images</label><br>
                    @if (!empty($product->images) && $product->images->isNotEmpty())
                        @foreach ($product->images as $image)
                            <img src="{{ asset('public/'.$image->images) }}" alt="Product Image" class="img-thumbnail m-1" width="100">
                        @endforeach
                    @else
                        <p>No images available</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Change Service Images</label>
                    <input type="file" class="form-control" name="images[]" accept="image/jpeg,image/png" multiple>
                </div>

                <div class="mb-3">
                    <label class="form-label">YouTube Video Link</label>
                    <input type="url" class="form-control" name="youtube_link" placeholder="Enter YouTube video URL" value="{{$product->youtube_link}}">
                    @error('youtube_link')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Steps -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Steps</label>
                    <div id="steps-container">
                        @if (!empty($product->steps))
                            @foreach ($product->steps as $step)
                                <div class="step-input mb-2 d-flex align-items-center gap-2">
                                    <input type="text" class="form-control" name="steps[]" value="{{ $step }}" required>
                                    <button type="button" class="btn btn-danger remove-step">Remove</button>
                                </div>
                            @endforeach
                        @endif
                        <!-- Button to add new step -->
                        <button type="button" id="add-step" class="btn btn-secondary mt-2">+ Add Step</button>
                    </div>
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update Service</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stepsContainer = document.getElementById('steps-container');
        const addStepButton = document.getElementById('add-step');

        // Function to add a new step
        function addStep(value = '') {
            const newStepInput = document.createElement('div');
            newStepInput.classList.add('step-input', 'mb-2', 'd-flex', 'align-items-center', 'gap-2');
            newStepInput.innerHTML = `
                <input type="text" class="form-control" name="steps[]" value="${value}" placeholder="Enter step description" required>
                <button type="button" class="btn btn-danger remove-step">Remove</button>
            `;
            stepsContainer.insertBefore(newStepInput, addStepButton);

            // Attach event listener for remove button
            newStepInput.querySelector('.remove-step').addEventListener('click', function () {
                stepsContainer.removeChild(newStepInput);
            });
        }

        // Add event listener for the "Add Step" button
        addStepButton.addEventListener('click', function () {
            addStep();
        });

        // Add event listeners to existing remove buttons
        document.querySelectorAll('.remove-step').forEach(button => {
            button.addEventListener('click', function () {
                const stepInput = button.closest('.step-input');
                stepsContainer.removeChild(stepInput);
            });
        });
    });
</script>
@endpush
