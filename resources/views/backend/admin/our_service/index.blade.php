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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round" class="icon icon-tabler icon-tabler-edit">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                                                    <path d="M16 5l3 3"/>
                                                </svg>
                                            </a>

                                            <a href="{{ route('service.delete', $service->id) }}"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure you want to delete this service?');">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="icon icon-tabler icon-tabler-trash">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M4 7l16 0"/>
                                                    <path d="M10 11l0 6"/>
                                                    <path d="M14 11l0 6"/>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                                                </svg>
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
