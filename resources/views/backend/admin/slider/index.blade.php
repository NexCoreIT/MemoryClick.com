@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 style="text-align: center">{{ $title }}</h2>
        <div style="text-align: right">
            <a href="{{ route('slider.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Slider</a>
        </div>
        <br><br>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Sort Number</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td data-label="Image">
                                        <img src="{{ asset($slider->image) }}" alt="Slider Image" class="img-thumbnail" style="width: 100px; height: auto;">
                                    </td>
                                    <td data-label="Sort Number">{{ $slider->sort_number }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <a href="{{ route('slider.delete', $slider->id) }}"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure you want to delete this slider?');">
                                               Delete
                                            </a>


                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($sliders->isEmpty())
                        <p class="text-center mt-1">No Data Found</p>
                    @endif
                </div>
                {{$sliders->links()}}
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
