@extends('backend.layout.app')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="mb-0">{{ $title ?? 'Home Page Contents' }}</h2>
                </div>

                <div class="card-body text-center py-5">
                    <!-- User Message -->
                    <div class="alert alert-info mb-4">
                        <i class="fas fa-info-circle me-2"></i>
                        Click below to edit your home page content
                    </div>

                    <!-- Edit Button -->
                    <div class="d-grid gap-2 col-md-6 mx-auto">
                        <a href="{{ route('home.page.edit') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-edit me-2"></i> Edit Content
                        </a>
                    </div>

                    <!-- Additional Help Text -->
                    <div class="text-muted mt-4">
                        <small>You can update all homepage content including title, images, and sections</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
