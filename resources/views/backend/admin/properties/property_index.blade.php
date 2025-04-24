@extends('backend.layout.app')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">{{ $title }}</h2>

        <div class="d-flex justify-content-end">
            <a href="{{ route('property_create') }}" class="btn btn-info mb-3">
                + Add Property
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="propertyTable" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Video</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($row as $property)
                                <tr>
                                    <td>{{ $property->title ? Str::limit($property->title, 30) : 'Not Found' }}</td>
                                    <td>{{ $property->description ? Str::limit($property->description, 30) : 'Not Found' }}</td>

                                    <!-- Video Column -->
                                    <td class="text-center">
                                        @if($property->video)
                                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                                @if($property->video)
                                                    <video width="80" height="50" controls class="rounded">
                                                        <source src="{{ asset('public/'.$property->video) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif

                                            </div>
                                        @else
                                            <span class="text-danger">Not Found</span>
                                        @endif
                                    </td>

                                    <!-- Image Column -->
                                    <td class="text-center">
                                        @if($property->before_image || $property->after_image)
                                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                                @if($property->before_image)
                                                    <img src="{{ asset('public/'.$property->before_image) }}"
                                                         class="img-thumbnail rounded" width="60"
                                                         alt="Before Image">
                                                @endif
                                                @if($property->after_image)
                                                    <img src="{{ asset('public/'.$property->after_image) }}"
                                                         class="img-thumbnail rounded" width="60"
                                                         alt="After Image">
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-danger">Not Found</span>
                                        @endif
                                    </td>

                                    <!-- Action Buttons -->
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('property_edit', $property->slug) }}"
                                               class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                               title="Edit">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('property_delete', $property->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this property?');"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="tooltip" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                            </form>

                                            <a href="{{ route('property_show', $property->slug) }}"
                                               class="btn btn-info btn-sm" data-bs-toggle="tooltip"
                                               title="Show">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">
                                        <strong>No Property Found</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
@isset($row)
@if(count($row) > 0)
    <!-- jQuery & DataTable JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endif
@endisset

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#propertyTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
            });

            // Initialize Bootstrap tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
