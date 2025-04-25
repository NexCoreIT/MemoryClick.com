@extends('frontend.layout.app')
@section('content')

<!-- breadcrump start -->
<div class="breadcrumb_sec bg-light py-4">
    <div class="container">
        <h4>Photography</h4>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Photography</li>
            </ol>
        </nav>
    </div>
</div>
<!-- breadcrump end -->

{{--
<!-- Photography Start -->
<div class="cinematography_sec section_gap">
    <div class="container">
        <div class="text-center mx-auto mb-4" style="max-width:600px;">
            <p class="text-primary text-uppercase sub_title mb-2">Photography</p>
            <h1 class="display-6 mb-4">See our all Photography</h1>
        </div>
        <div class="">
            <div align="center" class="mb-5">
                <button class="btn btn-default shadow-none active border-0 bg-transparent filter-button"
                    data-filter="all">All</button>
                <button class="btn btn-default shadow-none border-0 bg-transparent filter-button"
                    data-filter="reception">Wedding/Reception</button>
                <button class="btn btn-default shadow-none border-0 bg-transparent filter-button"
                    data-filter="engagement">Akdh/Engagement</button>
                <button class="btn btn-default shadow-none border-0 bg-transparent filter-button"
                    data-filter="mehendi">Haldi/Mehendi</button>
                <button class="btn btn-default shadow-none border-0 bg-transparent filter-button"
                    data-filter="Hindu-wedding">Hindu Wedding</button>
                <button class="btn btn-default shadow-none border-0 bg-transparent filter-button"
                    data-filter="birthday">Birthday</button>
            </div>

            <div id="lightgallery" class="gallery row gy-4">

                @forelse ($rows as $row)


                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter reception">
                    <div class="photograpy_item text-center">
                        <a href="{{$row->image}}">
                            @if ($row->images && is_array(json_decode($row->images, true)))
                            @foreach (json_decode($row->images, true) as $img)
                            <img src="{{ asset($img) }}" class="img-fluid mb-3 rounded" alt="">
                            @endforeach
                            @endif
                        </a>
                        <h4>Simona ~ Badhon</h4>
                        <p class="m-0">Wedding/Reception</p>
                    </div>
                </div>
                @empty
                <div class="text-center">
                    <strong class="text-danger">NO DATA FOUND</strong>
                </div>
                @endforelse


            </div>

        </div>
    </div>
</div>
<!-- Photography End --> --}}

<!-- Photography Start -->
<div class="cinematography_sec section_gap">
    <div class="container">
        <div class="text-center mx-auto mb-4" style="max-width:600px;">
            <p class="text-primary text-uppercase sub_title mb-2">Photography</p>
            <h1 class="display-6 mb-4">See our all Photography</h1>
        </div>

        <div align="center" class="mb-5">
            <button class="btn btn-default shadow-none active border-0 bg-transparent filter-button"
                data-filter="all">All</button>
            @foreach($categories as $category)
            <button class="btn btn-default shadow-none border-0 bg-transparent filter-button"
                data-filter="{{ Str::slug($category->name) }}">
                {{ $category->name }}
            </button>
            @endforeach
        </div>

        <div id="lightgallery" class="gallery row gy-4">
            @forelse ($rows as $row)
            @php
            $categorySlug = $row->category ? Str::slug($row->category->name) : 'uncategorized';
            $additionalImages = json_decode($row->images, true);
            @endphp

            @if ($row->image && $additionalImages && is_array($additionalImages)) {{-- Check for thumbnail and
            additional images --}}
            {{-- @dd($row->images) --}}
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter {{ $categorySlug }}">
                <div class="photograpy_item text-center">
                    <!-- Thumbnail image (clickable but not part of LightGallery slideshow) -->
                    <a href="{{ asset($additionalImages[0]) }}" data-lg-size="1600-1067" class="lightgallery-item">
                        <img src="{{ asset($row->image) }}" class="img-fluid mb-3 rounded" alt="">
                    </a>
                    <!-- Additional images (hidden but included in LightGallery) -->
                    @foreach ($additionalImages as $image)
                    <a href="{{ asset($image) }}" data-lg-size="1600-1067" class="lightgallery-item d-none">
                        <img src="{{ asset($image) }}" class="img-fluid" alt="">
                    </a>
                    @endforeach
                    <h4>{{ $row->title ?? 'Photography' }}</h4>
                    <p class="m-0">{{ $row->category->name ?? 'Uncategorized' }}</p>
                </div>
            </div>
            @endif
            @empty
            <div class="text-center">
                <strong class="text-danger">NO DATA FOUND</strong>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Photography End -->

@endsection


@push('scripts')
<script>
    lightGallery(document.getElementById('lightgallery'), {
        selector: '.lightgallery-item'
    });
</script>
@endpush
