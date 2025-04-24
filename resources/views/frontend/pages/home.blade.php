@extends('frontend.layout.app')
@section('content')
@php
    $seo = DB::table('custom_pages')->first();
@endphp
@section('seo')

<title>{{ $title ?? 'brightvisionbd.com' }}</title>
<meta name="description" content="{{ $seo->meta_description ?? 'Default website description for SEO' }}">
<meta name="keywords" content="{{ $seo->meta_keywords ?? 'real estate, property, rent, buy, sell' }}">

<meta property="og:title" content="{{ $seo->meta_title ?? 'brightvisionbd.com' }}">
<meta property="og:description" content="{{ $seo->meta_description ?? 'Default website description for SEO' }}">
<meta property="og:image" content="{{ $seo->meta_image ?? asset('frontend/images/default-image.jpg') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta name="robots" content="index, follow">

@endsection
<!-- Properties Section -->
<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-12 section-header">
                <h2>Services</h2>
                <p>We bring years of experience in real estate photography, delivering fast turnaround times and
                    high-quality images that will take your real estate listings to the next level.</p>
            </div>
        </div>
        @if ($row->isNotEmpty())

        <div class="row g-4">
            @forelse ($row as $property)
                <div class="col-12 col-md-6 col-xl-6">
                    @if (!empty($property->video))
                        <div>
                            <video width="100%" controls>
                                <source src="{{ asset('public/'.$property->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @else
                    <div class="loader-container">
                        <div class="loader"></div>
                        <div class="before_after">
                            <img src="{{ asset('public/'.($property->before_image ?? 'default-before.jpg')) }}" alt="Before" onload="imageLoaded(this)">
                            <img src="{{ asset('public/'.($property->after_image ?? 'default-after.jpg')) }}" alt="After" onload="imageLoaded(this)">
                        </div>
                    </div>
                    @endif

                    <h2 class="mt-4" style="text-align: center">{{ $property->title ?? 'No Title Available' }}</h2>

                    <div class="mt-2">
                        <p>{{ $property->description ?? 'No Description Available' }}</p>
                    </div>
                </div>
            @empty
                <strong class="text-center w-100">No Service Added Yet</strong>
            @endforelse
        </div>

        @else
        <br><br>
        <h2 style="text-align: center"><strong style="color: red">No Data Found</strong></h2>
        @endif
    </div>
</section>

<!-- Properties by Type  -->
<section class="section properties-type">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 section-header">
                <h2>How We Works</h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="properties-type-item">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="96"  height="96"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                    <h3>STEP 1</h3>
                    <p>Message Us</p>
                    {{-- <a href="#">Read more</a> --}}
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="properties-type-item">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="96"  height="96"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M12 17v1m0 -8v1" /></svg>
                    <h3>STEP 2</h3>
                    <p>Tell Us Your Budget</p>
                    {{-- <a href="#">Read more</a> --}}
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="properties-type-item">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="96"  height="96"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-reserved-line"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 20h6" /><path d="M12 14v6" /><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M9 9h6" /></svg>
                    <h3>STEP 3</h3>
                    <p>Upload images on drive</p>
                    {{-- <a href="#">Read more</a> --}}
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="properties-type-item">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="96"  height="96"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.004h-5.343c-2.572 -.004 -4.657 -2.011 -4.657 -4.487c0 -2.475 2.085 -4.482 4.657 -4.482c.393 -1.762 1.794 -3.2 3.675 -3.773c1.88 -.572 3.956 -.193 5.444 1c1.488 1.19 2.162 3.007 1.77 4.769h.99c1.38 0 2.573 .813 3.13 1.99" /><path d="M19 16v6" /><path d="M22 19l-3 3l-3 -3" /></svg>
                    <h3>STEP 4</h3>
                    <p>Download via drive</p>
                    {{-- <a href="#">Read more</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Property Listing  -->
<section class=" section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-12 section-header">
                <h2>Bring your real estate photos to a new level</h2>
                <p>Ensuring the best real estate image editing service</p>
            </div>
        </div>
        <div class="row g-4 listing-view-items">
            @forelse ($service as $item)

            <div class="col-12 col-md-6 col-xl-4">
                <a href="{{ route('service.details', $item->slug) }}" class="listing-card">
                    <div class="listing-view">
                        <div class="img-container">
                           <img src="{{ asset('public/'.$item->image) }}" alt="img" style="filter: none; transform: none; transition: none;">

                        </div>
                        <div class="hot-labels">
                            <div class="label">
                                New
                            </div>
                        </div>
                    </div>
                    <div class="listing-info">
                        <a href="{{ route('service.details', $item->slug) }}"><h3>{{Str::limit($item->name,20)}}</h3></a>
                    </div>
                </a>
            </div>

            @empty
            <h2 style="text-align: center"><strong style="color: red">No Data Found</strong></h2>
            @endforelse

        </div>
    </div>
</section>

<!-- About Us -->
<section id="about-us" class="property-listing section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center mb-4">
                    <h2 class="fw-bold" style="text-align: center">About Us</h2>
                </div>
                <div class="about-content bg-light p-4 rounded shadow-sm">
                    <div class="content">
                        {!! nl2br($about->body) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<!-- Call to Action -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-lg-12">
                <div class="card shadow-lg p-4 bg-white" style="text-align: center">
                    <h2 class="card-title text-dark fw-bold mb-3">Love what you see</h2>
                    <p class="card-text text-muted mb-4">Try our seamless platform and services to see how good your real estate photos can be!</p>
                    <a href="{{route('registration')}}" class="custom-btn d-inlie-block">Try Now </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="devider-img" style="text-align: center">
    <img src="frontend/images/divider.jpg" alt="devider" class="img-fluid">
</div>

@endsection
@push('styles')
<style>

</style>
@endpush

@push('scripts')

@endpush
