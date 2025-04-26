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
@include('frontend.components.fixed.hero')
<!-- About Start -->
<div class="about_sec pt-4 mt-4 pt-lg-5 mt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="count_items bg-light p-2 p-lg-5 rounded text-center">
                            <h5 class="text-dark fs-6">Since</h5>
                            <h2 class="fs-1 fw-bold" data-toggle="counter-up">2013</h2>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="count_items bg-light p-2 p-lg-5 rounded text-center">
                            <h5 class="text-dark fs-6">Events</h5>
                            <h2 class="fs-1 fw-bold">
                                <span data-toggle="counter-up">2036</span>

                            </h2>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="count_items bg-light p-2 p-lg-5 rounded text-center">
                            <h5 class="text-dark fs-6">Photos</h5>
                            <h2 class="fs-1 fw-bold">
                                <span data-toggle="counter-up">1000</span> k+
                            </h2>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="count_items bg-light p-2 p-lg-5 rounded text-center">
                            <h5 class="text-dark fs-6">Clients</h5>
                            <h2 class="fs-1 fw-bold">
                                <span data-toggle="counter-up">999</span> k+
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="h-100">
                    <p class="text-primary text-uppercase sub_title mb-2">About Us</p>
                    <h1 class="title mb-4">Premium Class Photography & Cinematography Services</h1>
                    <p class="mb-4">
                        Bridal Harmony is a team of experienced professional photographers, cinematographers and
                        photo-book experts who are dedicated to creating stunning, authentic stories of people's
                        live.
                    </p>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi quaerat animi asperiores
                        illo. Quaerat, deserunt natus. Minima sit numquam dolorum.
                    </p>
                    <a class="btn btn-primary py-2 px-4" href="about.html">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Services Start -->
<div class="service_sec pt-4 mt-4 pt-lg-4 mt-lg-4">
    <div class="container">
        <div class="text-center mx-auto mb-3">
            <p class="text-primary text-uppercase sub_title mb-2">Our Services</p>
            <h1 class="display-6 mb-5">Our Top Servies</h1>
        </div>

        <div class="owl-carousel service-carousel">
            @forelse ($service as $service)


            <div class="testimonial-item bg-white border border-light rounded shadow-sm p-2 p-md-3 text-center">
                <img src="{{asset($service->image)}}" class="img-fluid mb-3 rounded shadow-sm" alt="">
                <div>
                    <h5 class="mb-3 fs-5 fw-bold"><strong>{{$service->title}}</strong></h5>
                    <p class="m-0">
                        {{Str::limit($service->description, 100) }}
                    </p>
                </div>
            </div>
            @empty
            <strong class="text-danger">NO SERVICE FOUND</strong>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a class="btn btn-primary py-2 px-4" href="{{route('topService.page')}}">View All Services</a>
        </div>

    </div>
    <!-- Services End -->


    <!-- reviews Start -->
    <div class="bg-light reviews py-5  mt-4 mt-lg-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width:600px;">
                <p class="text-primary text-uppercase sub_title mb-2">Client Reviews</p>
                <h1 class="display-6 mb-4">More Than 2000+ Customers Trusted Us</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @forelse ($testimonials as $testimonial)


                <div class="testimonial-item bg-white p-3 p-lg-4 rounded shodow-sm border">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" width="100" height="100"
                            src="{{asset($testimonial->image)}}" alt="">
                        <div class="ms-2 ms-lg-4">
                            <h5 class="mb-1">{{$testimonial->name}}</h5>
                            <span>{{$testimonial->designation}}</span>
                        </div>
                    </div>
                    <div class="start mb-3">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $testimonial->rating)
                                <i class="fa fa-star text-primary small"></i>
                            @else
                                <i class="fa fa-star text_light small"></i>
                            @endif
                        @endfor
                    </div>
                    <p class="mb-0">
                        {{$testimonial->description}}
                    </p>
                </div>
                @empty
                <strong class="text-danger">NO DATA FOUND</strong>
                @endforelse

            </div>

        </div>
    </div>
    <!-- reviews End -->


    <!-- Recent Work Start -->
    <div class="recent_work_sec pb-5 pt-4 mt-4 pt-lg-4 mt-lg-4">
        <div class="container">
            <div class="text-center mx-auto mb-5 pb-4" style="max-width:600px;">
                <p class="text-primary text-uppercase sub_title mb-2">Recent Work</p>
                <h1 class="display-6 mb-0">Our recent stunning wedding photography</h1>
            </div>
            <div class="row gy-2 gy-xl-5">
                @forelse ($recent_work as $work)


                <div class="col-lg-6">
                    <div class="row g-0 flex-sm-row">
                        <div class="col-sm-6">
                            <div class="team-img position-relative">
                                <a href="#">
                                    <img class="img-fluid rounded mb-3 mb-sm-0" src="{{ asset($work->image) }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div
                                class="recent_work_item h-100 p-2 p-md-3 p-xl-5 d-flex flex-column justify-content-between">
                                <div class="mb-3">
                                    <h4><a href="#">{{$work->name}}</a></h4>
                                    <span>Package : {{$work->package_name}}</span>
                                </div>
                                <p>
                                    {{$work->social_media_name}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <strong class="text-danger">NO DATA FOUND</strong>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Recent Work End -->


    <!-- Cinematography Start -->
    <div class="cinematography_sec pb-5 mb-4 pt-0 mt-0 pt-lg-4 mt-lg-4">
        <div class="container">
            <div class="text-center mx-auto mb-3" style="max-width: 600px;">
                <p class="text-primary text-uppercase sub_title mb-2">Cinematography</p>
                <h1 class="display-6 mb-5">Take a peek at our recent stunning wedding photography</h1>
            </div>
            <div class="owl-carousel cinematography-carousel">

                @forelse ($cinematography as $video)


                <div class="testimonial-item bg-white text-center">
                    <div class="ratio ratio-16x9  mb-4">
                        <iframe width="100%" src="{{$video->youtube_url}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div>
                        <h5 class="mb-3 fs-5 fw-bold">
                            <strong>{{$video->title}}</strong>
                        </h5>
                        <p class="m-0">
                            Film Credits: {{$video->credit}}
                        </p>
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
    <!-- Cinematography  End -->

    @endsection
    @push('styles')
    <style>

    </style>
    @endpush

    @push('scripts')

    @endpush
