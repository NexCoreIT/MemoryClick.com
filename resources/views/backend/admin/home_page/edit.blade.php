@extends('backend.layout.app')
@section('content')
<div class="col-12 card">
    <form action="{{ route('home.page.update') }}" method="POST">
        @csrf
        <div class="card-body">
            <h3 class="card-title">Edit Page Content</h3>
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Client Reviews</label>
                        <input type="text" name="homepage_title" class="form-control" placeholder="Homepage Title" value="{{ old('homepage_title', $item->homepage_title) }}" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Homepage Content</label>
                        <textarea name="homepage_content" id="summernote" class="form-control" rows="5" placeholder="Homepage Content" required>{{ old('homepage_content', $item->homepage_content) }}</textarea>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">About Title</label>
                                <input type="text" name="about_title" class="form-control" placeholder="About Title" value="{{ old('about_title', $item->about_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">About Content</label>
                                <textarea name="about_content" class="form-control" rows="3" placeholder="About Content" required>{{ old('about_content', $item->about_content) }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Home Button Text</label>
                                <input type="text" name="home_btn" class="form-control" placeholder="Home Button Text" value="{{ old('home_btn', $item->home_btn) }}" required>
                            </div>
                        </div>

                    </div> --}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Footer Title</label>
                                <input type="text" name="footer_title" class="form-control" placeholder="Footer Title" value="{{ old('footer_title', $item->footer_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">About Button Text</label>
                                <input type="text" name="about_btn" class="form-control" placeholder="About Button Text" value="{{ old('about_btn', $item->about_btn) }}" required>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Footer Button Text</label>
                                <input type="text" name="footer_btn" class="form-control" placeholder="Footer Button Text" value="{{ old('footer_btn', $item->footer_btn) }}" required>
                            </div>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ old('address', $item->address) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email', $item->email) }}">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">YouTube Link</label>
                                <input type="url" name="youtube_link" class="form-control" placeholder="YouTube Link" value="{{ old('youtube_link', $item->youtube_link) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Facebook Link</label>
                                <input type="url" name="facebook_link" class="form-control" placeholder="Facebook Link" value="{{ old('facebook_link', $item->facebook_link) }}">
                            </div>
                        </div>
                    </div>

                  <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Instagram Link</label>
                                <input type="url" name="instagram_link" class="form-control" placeholder="Instagram Link" value="{{ old('instagram_link', $item->instagram_link) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Twitter Link</label>
                                <input type="url" name="twitter_link" class="form-control" placeholder="Twitter Link" value="{{ old('twitter_link', $item->twitter_link) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Facebook Messenger</label>
                                <input type="text" name="messenger_username" class="form-control" placeholder="Messenger Username" value="{{ old('messenger_username', $item->messenger_username) }}">
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"> Phone </label>
                                <input type="tel" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone', $item->phone) }}">
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">LinkedIn Link</label>
                                <input type="url" name="linkedin_link" class="form-control" placeholder="LinkedIn Link" value="{{ old('linkedin_link', $item->linkedin_link) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}

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
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Enter content here...',
            tabsize: 2,
            height: 200
        });
    });
</script>
@endpush
