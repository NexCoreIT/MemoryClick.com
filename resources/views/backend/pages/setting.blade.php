@extends('backend.layout.app')

@section('content')

<div class="page">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Account Settings</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">

                    <!-- Sidebar -->
                    <div class="col-md-3 d-none d-md-block border-end bg-light p-3">
                        <h4 class="text-center">My Account</h4>
                        <hr>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('change.password') }}" class="nav-link">Change Password</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Main Content -->
                    <div class="col-md-9">
                        <div class="container">
                        <div class="card border-0">
                                        <div class="card-header">
                                            <h4 class="mb-0">My Account</h4>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Profile Details</h5>

                                            <form action="{{ route('registration.update', auth()->user()->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf


                                                <!-- Profile Image Upload -->
                                                <div class="mb-4 text-center">
                                                    <label for="image-upload" class="d-block" style="cursor: pointer;">
                                                        <img id="image-preview"
                                                            src="{{ asset(auth()->user()->image) }}"
                                                            alt="Profile Image"
                                                            class="rounded-circle border img-thumbnail"
                                                            style="width: 120px; height: 120px; object-fit: cover;">
                                                    </label>
                                                    <input type="file" id="image-upload" name="image" class="d-none">
                                                    <p class="small text-muted mt-2">Click on the image to change</p>
                                                </div>

                                                <!-- Profile Information -->
                                                <h5 class="card-title mt-4">Profile Information</h5>
                                                <div class="row g-3">
                                                    <!-- Name -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            value="{{ old('name', auth()->user()->name) }}" required>
                                                        @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            value="{{ old('email', auth()->user()->email) }}" required>
                                                        @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Mobile -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Mobile</label>
                                                        <input type="text" name="phone"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            value="{{ old('phone', auth()->user()->phone) }}" required>
                                                        @error('phone')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Form Actions -->
                                                <div class="d-flex justify-content-end mt-4">
                                                    <a href="{{ route('dashboard') }}"
                                                        class="btn btn-secondary me-2">Cancel</a>
                                                    <button type="submit" class="btn btn-primary">Update
                                                        Profile</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                        </div><br>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
     <!-- Image Preview Script -->
     <script>
        document.getElementById('image-upload').addEventListener('change', function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                document.getElementById('image-preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
@endpush
