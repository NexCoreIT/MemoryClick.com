@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 style="text-align: center">{{ $title ?? 'Our Services' }}</h2>
        <div style="text-align: right">
            <a href="{{ route('service.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Service</a>
        </div>
        <br><br>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td data-label="Image">
                                        <img src="{{ asset($service->image) }}" alt="Service Image" class="img-thumbnail" style="width: 100px; height: auto;">
                                    </td>
                                    <td data-label="Title">{{ $service->title }}</td>
                                    <td data-label="Description">{{ Str::limit($service->description, 100) }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('service.edit', $service->id) }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <a href="{{ route('service.delete', $service->id) }}"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure you want to delete this service?');">
                                              Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($services->isEmpty())
                        <p class="text-center mt-1">No Data Found</p>
                    @endif
                </div>
                {{$services->links()}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
