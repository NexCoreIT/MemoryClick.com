@php
$removeHero = true;
$home_content = DB::table('home_page_contents')->find(1);
@endphp

@extends('frontend.layout.app')
@push('styles')
    <!-- Styles -->
<style>
    nav {
        background-color: #4a60a1;
        transition: all 0.3s ease-in-out;
    }

    nav .sbd-nav-links li a.active,
    nav .sbd-nav-links li a:hover {
        background: #233978ad;
    }

    .controls {
        text-align: center;
        margin-bottom: 30px;
    }

    .controls button {
        padding: 10px 20px;
        margin: 5px;
        cursor: pointer;
        color: #161616;
        border: none;
        background-color: rgb(237, 237, 237);
        border-radius: 5px;
        font-size: 16px;
        transition: background 0.3s;
    }

    .controls button:hover {
        background: #0056b3;
    }

    .controls button.mixitup-control-active {
        color: #ffffff;
        background-color: #4a60a1;
    }

    .mix img {
        border-radius: 8px;
        width: 100%;
        height: auto;
    }

    .lightgallery a {
        display: block;
    }
</style>
@endpush
@section('content')



<!-- LightGallery CSS -->
<link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" rel="stylesheet">

<section class="hero-section" style="background-image: url('6.jpg');">
    <div class="hero-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-lg-8 col-xl-8 text-center">
                    <h1>{{$home_content->homepage_title ?? ''}}</h1>
                    <p>{!!$home_content->homepage_content ?? ''!!}</p>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a class="label" href="{{route('registration')}}">{{$home_content->home_btn ?? ''}}</a>
        </div>
    </div>
</section>
<main class="page-content services">
    <div class="container">

        <!-- Hero Image -->
        {{-- <div class="mb-5 text-center">
            <img src="{{ asset('6.jpg') }}" alt="Hero Image" class="img-fluid rounded shadow"
                style="max-height: 400px; object-fit: cover; width: 100%;">
        </div> --}}

        <h1 class="text-light mb-4 text-center">Portfolio Hero Content</h1>

        <!-- Category Filter Buttons -->
        <div class="controls">
            <button class="filter" data-filter="all">All</button>
            @foreach ($category as $item)
            <button class="filter" data-filter=".{{ Str::slug($item->name) }}">{{ $item->name ?? '' }}</button>
            @endforeach
        </div>

        <!-- Gallery Grid -->
        <div class="row g-4 lightgallery" id="lightgallery">
            @forelse ($row as $product)
            <div class="col-12 col-md-6 col-xl-4 mix {{ Str::slug(optional($product->category)->name) }}">
                <div class="card shadow-sm h-100 p-3">
                    @php
                    $images = $product->images;
                    $groupId = 'group-' . $product->id;
                    @endphp

                    @if ($images->isNotEmpty())
                    {{-- Show only the first image visibly --}}
                    <a href="{{ asset($images[0]->images) }}" data-lg-size="1600-1067"
                        data-sub-html="{{ $product->name }}" data-lg-group="{{ $groupId }}">
                        <img class="img-fluid mb-3" src="{{ asset($images[0]->images) }}" alt="{{ $product->name }}">
                    </a>

                    {{-- Include hidden links for other images --}}
                    @foreach ($images->skip(1) as $image)
                    <a href="{{ asset($image->images) }}" data-lg-size="1600-1067" data-sub-html="{{ $product->name }}"
                        data-lg-group="{{ $groupId }}" style="display: none;"></a>
                    @endforeach
                    @else
                    <img class="img-fluid mb-3" src="{{ asset('default.jpg') }}" alt="No image found">
                    @endif

                    <a class="btn btn-primary w-100 mt-2" href="{{ route('service.details', $product->slug) }}">
                        {{ $product->name }}
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <h3 class="text-danger">No Products Found</h3>
            </div>
            @endforelse
        </div>
    </div>
</main>




@endsection


@push('scripts')
    <!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/mixitup@3/dist/mixitup.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.umd.min.js"></script>

<script>
    // Initialize MixItUp
    var mixer = mixitup('.row.g-4', {
        selectors: {
            target: '.mix'
        },
        animation: {
            duration: 300
        }
    });

    // Initialize LightGallery
    lightGallery(document.getElementById('lightgallery'), {
        selector: 'a',
        zoom: true,
        thumbnail: true
    });
</script>
@endpush
