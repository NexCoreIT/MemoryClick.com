@extends('backend.layout.app')
@section('content')
<div class="col-12 card">
    <form action="{{ route('custom.page.update',$item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h3 class="card-title">Edit</h3>
            <div class="row">
                <!-- Title & Meta Title Side by Side -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Title"
                               value="{{ old('title', $item->title) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Meta Title <span class="text-danger">*</span></label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Meta Title"
                               value="{{ old('meta_title', $item->meta_title) }}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Meta Description <span class="text-danger">*</span></label>
                        <textarea name="meta_description" class="form-control" placeholder="Meta Description"
                                  rows="3" required>{{ old('meta_description', $item->meta_description) }}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Meta Keywords <span class="text-danger">*</span></label>
                        <input type="text" name="meta_keywords" class="form-control" placeholder="Meta Keywords"
                               value="{{ old('meta_keywords', $item->meta_keywords) }}" required>
                    </div>
                </div>
                 @if($item->id !== 1)
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Body <span class="text-danger">*</span></label>
                        <textarea name="body" id="summernote" class="form-control" rows="5"
                                  placeholder="Body" required>{{ old('body', $item->body) }}</textarea>
                    </div>
                </div>
                @endif
                {{-- ✅ Extra Fields show only if id == 1 --}}
                @if($item->id == 1)
                <hr>
                <h4 class="mt-3">Extra About Section</h4>

               <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Title</label>
                                <input type="text" name="title_1" class="form-control" placeholder="About Our CEO"
                                    value="{{ old('title_1', $item->title_1) }}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Name</label>
                                <input type="text" name="ceo_name" class="form-control" placeholder="CEO Name"
                                    value="{{ old('ceo_name', $item->ceo_name) }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Designation</label>
                                <input type="text" name="ceo_designation" class="form-control" placeholder="CEO Designation"
                                    value="{{ old('ceo_designation', $item->ceo_designation) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About CEO -->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">About CEO</label>
                        <textarea name="body" class="form-control" rows="4"
                                  placeholder="Write about CEO">{{ old('body', $item->body ?? '') }}</textarea>
                    </div>
                </div>

                <!-- CEO Image -->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">CEO Image</label>
                        <input type="file" name="ceo_image" class="form-control">
                        @if(!empty($item->ceo_image))
                            <img src="{{ asset($item->ceo_image) }}" alt="CEO Image" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                </div>


                 <h4 class="mt-3">MemoryClick About Section</h4>

                <!-- Memoryclick Section -->
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Title</label>
                        <input type="text" name="title_2" class="form-control" placeholder="Memoryclick Title"
                            value="{{ old('title_2', $item->title_2) }}">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Memoryclick Image</label>
                        <input type="file" name="memoryclick_image" class="form-control">
                        @if(!empty($item->memoryclick_image))
                            <img src="{{ asset($item->memoryclick_image) }}" alt="Memoryclick Image" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                </div>


                <!-- About Memoryclick -->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">About Memoryclick</label>
                        <textarea name="about_memoryclick" class="form-control" rows="4"
                                  placeholder="Write about Memoryclick">{{ old('about_memoryclick', $item->about_memoryclick ?? '') }}</textarea>
                    </div>
                </div>


                @endif
                {{-- ✅ End Extra Fields --}}

                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>
    $('#summernote').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 4,
      height: 100
    });
</script>
@endpush
