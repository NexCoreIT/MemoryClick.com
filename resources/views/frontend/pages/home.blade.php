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
            <div class="testimonial-item bg-white border border-light rounded shadow-sm p-2 p-md-3 text-center">
                <img src="assets/img/services/1.jpg" class="img-fluid mb-3 rounded shadow-sm" alt="">
                <div>
                    <h5 class="mb-3 fs-5 fw-bold"><strong>Maternity Photography</strong></h5>
                    <p class="m-0">
                        Make your special day last a lifetime with Bridal Harmony's exceptional wedding
                        photography services. Our talented team is dedicated to capturing the magic of your...
                    </p>
                </div>
            </div>
            <div class="testimonial-item bg-white border border-light rounded shadow-sm p-2 p-md-3 text-center">
                <img src="assets/img/services/2.png" class="img-fluid mb-3 rounded shadow-sm" alt="">
                <div>
                    <h5 class="mb-3 fs-5 fw-bold"><strong>Wedding Cinematography</strong></h5>
                    <p class="m-0">
                        Elevate your wedding day memories with the enchanting storytelling of Bridal Harmony's
                        wedding cinematography services. We specialize in capturing the essence of your love
                        story...
                    </p>
                </div>
            </div>
            <div class="testimonial-item bg-white border border-light rounded shadow-sm p-2 p-md-3 text-center">
                <img src="assets/img/services/7.png" class="img-fluid mb-3 rounded shadow-sm" alt="">
                <div>
                    <h5 class="mb-3 fs-5 fw-bold"><strong>Birthday Photography</strong></h5>
                    <p class="m-0">
                        Celebrate your special day with Bridal Harmony's birthday photography services. We
                        specialize in capturing the joy, laughter, and unforgettable moments of your birthday
                        celebration. Our...
                    </p>
                </div>
            </div>

            <div class="testimonial-item bg-white border border-light rounded shadow-sm p-2 p-md-3 text-center">
                <img src="assets/img/services/4.jpg" class="img-fluid mb-3 rounded shadow-sm" alt="">
                <div>
                    <h5 class="mb-3 fs-5 fw-bold"><strong>Birthday Photography</strong></h5>
                    <p class="m-0">
                        Celebrate your special day with Bridal Harmony's birthday photography services. We
                        specialize in capturing the joy, laughter, and unforgettable moments of your birthday
                        celebration. Our...
                    </p>
                </div>
            </div>

            <div class="testimonial-item bg-white border border-light rounded shadow-sm p-2 p-md-3 text-center">
                <img src="assets/img/services/3.jpg" class="img-fluid mb-3 rounded shadow-sm" alt="">
                <div>
                    <h5 class="mb-3 fs-5 fw-bold"><strong>Corporate/Promotional Photography</strong></h5>
                    <p class="m-0">
                        Elevate your brand's visual identity with Bridal Harmony's professional branding and
                        promotional photography services. We specialize in capturing the essence of your business,
                        products, and...

                    </p>
                </div>
            </div>
            <div class="testimonial-item bg-white border border-light rounded shadow-sm p-2 p-md-3 text-center">
                <img src="assets/img/services/7.png" class="img-fluid mb-3 rounded shadow-sm" alt="">
                <div>
                    <h5 class="mb-3 fs-5 fw-bold"><strong>Birthday Photography</strong></h5>
                    <p class="m-0">
                        Celebrate your special day with Bridal Harmony's birthday photography services. We
                        specialize in capturing the joy, laughter, and unforgettable moments of your birthday
                        celebration. Our...
                    </p>
                </div>
            </div>

            <div class="testimonial-item bg-white border border-light rounded shadow-sm p-2 p-md-3 text-center">
                <img src="assets/img/services/4.jpg" class="img-fluid mb-3 rounded shadow-sm" alt="">
                <div>
                    <h5 class="mb-3 fs-5 fw-bold"><strong>Birthday Photography</strong></h5>
                    <p class="m-0">
                        Celebrate your special day with Bridal Harmony's birthday photography services. We
                        specialize in capturing the joy, laughter, and unforgettable moments of your birthday
                        celebration. Our...
                    </p>
                </div>
            </div>

            <div class="testimonial-item bg-white border border-light rounded shadow-sm p-2 p-md-3 text-center">
                <img src="assets/img/services/3.jpg" class="img-fluid mb-3 rounded shadow-sm" alt="">
                <div>
                    <h5 class="mb-3 fs-5 fw-bold"><strong>Corporate/Promotional Photography</strong></h5>
                    <p class="m-0">
                        Elevate your brand's visual identity with Bridal Harmony's professional branding and
                        promotional photography services. We specialize in capturing the essence of your business,
                        products, and...

                    </p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a class="btn btn-primary py-2 px-4" href="package.html">View All Services</a>
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
                <div class="testimonial-item bg-white p-3 p-lg-4 rounded shodow-sm border">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" width="100" height="100"
                            src="assets/img/testimonial-1.jpg" alt="">
                        <div class="ms-2 ms-lg-4">
                            <h5 class="mb-1">Emily Watson</h5>
                            <span>Wedding Client</span>
                        </div>
                    </div>
                    <div class="start mb-3">
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text_light small"></i>
                        <i class="fa fa-star text_light small"></i>
                    </div>
                    <p class="mb-0">
                        The team captured every magical moment of our wedding! The photos and cinematic
                        highlights were breathtaking — we couldn’t be happier with their work.
                    </p>
                </div>

                <div class="testimonial-item bg-white p-3 p-lg-4 rounded shodow-sm border">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" width="100" height="100"
                            src="assets/img/testimonial-2.jpg" alt="">
                        <div class="ms-2 ms-lg-4">
                            <h5 class="mb-1">Mark Johnson</h5>
                            <span>Event Organizer</span>
                        </div>
                    </div>
                    <div class="start mb-3">
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text_light small"></i>
                        <i class="fa fa-star text_light small"></i>
                    </div>
                    <p class="mb-0">Our corporate event was perfectly documented. Their team is professional,
                        punctual, and incredibly talented. Highly recommended for any high-end shoot!</p>
                </div>

                <div class="testimonial-item bg-white p-3 p-lg-4 rounded shodow-sm border">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" width="100" height="100"
                            src="assets/img/testimonial-3.jpg" alt="">
                        <div class="ms-2 ms-lg-4">
                            <h5 class="mb-1">Sophia Lee</h5>
                            <span>Model & Influencer</span>
                        </div>
                    </div>
                    <div class="start mb-3">
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text_light small"></i>
                    </div>
                    <p class="mb-0">Their studio photoshoots are top-notch! From lighting to direction, everything
                        felt premium. They really know how to bring out your best angles.</p>
                </div>

                <div class="testimonial-item bg-white p-3 p-lg-4 rounded shodow-sm border">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" width="100" height="100"
                            src="assets/img/testimonial-4.jpg" alt="">
                        <div class="ms-2 ms-lg-4">
                            <h5 class="mb-1">Rahul Mehra</h5>
                            <span>Groom</span>
                        </div>
                    </div>
                    <div class="start mb-3">
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text_light small"></i>
                        <i class="fa fa-star text_light small"></i>
                    </div>
                    <p class="mb-0">Our pre-wedding shoot felt like a movie set! The cinematography was elegant,
                        emotional, and beautifully edited. Thank you for the lifetime memories.</p>
                </div>
                <div class="testimonial-item bg-white p-3 p-lg-4 rounded shodow-sm border">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" width="100" height="100"
                            src="assets/img/testimonial-2.jpg" alt="">
                        <div class="ms-2 ms-lg-4">
                            <h5 class="mb-1">Mark Johnson</h5>
                            <span>Event Organizer</span>
                        </div>
                    </div>
                    <div class="start mb-3">
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text_light small"></i>
                    </div>
                    <p class="mb-0">Our corporate event was perfectly documented. Their team is professional,
                        punctual, and incredibly talented. Highly recommended for any high-end shoot!</p>
                </div>

                <div class="testimonial-item bg-white p-3 p-lg-4 rounded shodow-sm border">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" width="100" height="100"
                            src="assets/img/testimonial-3.jpg" alt="">
                        <div class="ms-2 ms-lg-4">
                            <h5 class="mb-1">Sophia Lee</h5>
                            <span>Model & Influencer</span>
                        </div>
                    </div>
                    <div class="start mb-3">
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                        <i class="fa fa-star text-primary small"></i>
                    </div>
                    <p class="mb-0">Their studio photoshoots are top-notch! From lighting to direction, everything
                        felt premium. They really know how to bring out your best angles.</p>
                </div>
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
                <div class="col-lg-6">
                    <div class="row g-0 flex-sm-row">
                        <div class="col-sm-6">
                            <div class="team-img position-relative">
                                <a href="#">
                                    <img class="img-fluid rounded mb-3 mb-sm-0" src="assets/img/about-1.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div
                                class="recent_work_item h-100 p-2 p-md-3 p-xl-5 d-flex flex-column justify-content-between">
                                <div class="mb-3">
                                    <h4><a href="#">Simona ~ Badhon</a></h4>
                                    <span>Package : Signature Series</span>
                                </div>
                                <p>
                                    Wedding Reception || Bridal Harmony
                                    Instagram : bridalharmony.bangladesh
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-0 flex-sm-row-reverse flex-lg-row">
                        <div class="col-sm-6">
                            <div class="team-img position-relative">
                                <a href="#"><img class="img-fluid rounded mb-3 mb-sm-0" src="assets/img/hero-1.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div
                                class="recent_work_item h-100 p-2 p-md-3 p-xl-5 d-flex flex-column justify-content-between">
                                <div class="mb-3">
                                    <h4><a href="#">Labono ~ Apu</a></h4>
                                    <span>Engagement || Bridal Harmony</span>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita nisi nulla
                                    voluptatem quos veniam cupiditate explicabo ab fuga inventore saepe.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-0 flex-lg-row-reverse">
                        <div class="col-sm-6">
                            <div class="team-img position-relative">
                                <a href="#">
                                    <img class="img-fluid rounded mb-3 mb-sm-0" src="assets/img/team-1.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div
                                class="recent_work_item h-100 p-2 p-md-3 p-xl-5 d-flex flex-column justify-content-between">
                                <div class="mb-3">
                                    <h4><a href="#">Richard Archer</a></h4>
                                    <span>Retoucher</span>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita nisi nulla
                                    voluptatem quos veniam cupiditate explicabo ab fuga inventore saepe.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-0 flex-sm-row-reverse">
                        <div class="col-sm-6">
                            <div class="team-img position-relative">
                                <a href="#">
                                    <img class="img-fluid rounded mb-3 mb-sm-0" src="assets/img/service-1.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div
                                class="recent_work_item h-100 p-2 p-md-3 p-xl-5 d-flex flex-column justify-content-between">
                                <div class="mb-3">
                                    <h4><a href="#">Noushin & Shahruk || Haldi || Bridal Harmony</a></h4>
                                    <span>Instagram : bridalharmony.bangladesh</span>
                                </div>
                                <p>
                                    Contact us for Booking : +88 01742 225584, +88 01772 225565 <br>
                                    © Bridal Harmony Bangladesh
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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

                <div class="testimonial-item bg-white text-center">
                    <div class="ratio ratio-16x9  mb-4">
                        <iframe width="100%" src="https://www.youtube.com/embed/zE04Ua6E52U"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div>
                        <h5 class="mb-3 fs-5 fw-bold">
                            <strong>Jessica & Sanjib || Wedding || Bridal Harmony</strong>
                        </h5>
                        <p class="m-0">
                            Film Credits: Bridal Harmony
                        </p>
                    </div>
                </div>

                <div class="testimonial-item bg-white text-center">
                    <div class="ratio ratio-16x9  mb-4">
                        <iframe width="100%" src="https://www.youtube.com/embed/zE04Ua6E52U"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div>
                        <h5 class="mb-3 fs-5 fw-bold">
                            <strong>Dr. Prema & Rayhan || Holud Teaser || Bridal Harmony </strong>
                        </h5>
                        <p class="m-0">
                            Film Credits: Bridal Harmony
                        </p>
                    </div>
                </div>

                <div class="testimonial-item bg-white text-center">
                    <div class="ratio ratio-16x9  mb-4">
                        <iframe width="100%" src="https://www.youtube.com/embed/zE04Ua6E52U"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div>
                        <h5 class="mb-3 fs-5 fw-bold">
                            <strong>Ritu & Shaikat || Akdth || Bridal Harmony </strong>
                        </h5>
                        <p class="m-0">
                            Film Credits: Bridal Harmony
                        </p>
                    </div>
                </div>

                <div class="testimonial-item bg-white text-center">
                    <div class="ratio ratio-16x9  mb-4">
                        <iframe width="100%" src="https://www.youtube.com/embed/zE04Ua6E52U"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div>
                        <h5 class="mb-3 fs-5 fw-bold">
                            <strong>Jessica & Sanjib || Wedding || Bridal Harmony </strong>
                        </h5>
                        <p class="m-0">
                            Film Credits: Bridal Harmony
                        </p>
                    </div>
                </div>

                <div class="testimonial-item bg-white text-center">
                    <div class="ratio ratio-16x9  mb-4">
                        <iframe width="100%" src="https://www.youtube.com/embed/zE04Ua6E52U"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div>
                        <h5 class="mb-3 fs-5 fw-bold">
                            <strong>Dr. Prema & Rayhan || Holud Teaser || Bridal Harmony </strong>
                        </h5>
                        <p class="m-0">
                            Film Credits: Bridal Harmony
                        </p>
                    </div>
                </div>

                <div class="testimonial-item bg-white text-center">
                    <div class="ratio ratio-16x9  mb-4">
                        <iframe width="100%" src="https://www.youtube.com/embed/zE04Ua6E52U"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div>
                        <h5 class="mb-3 fs-5 fw-bold">
                            <strong>Ritu & Shaikat || Akdth || Bridal Harmony </strong>
                        </h5>
                        <p class="m-0">
                            Film Credits: Bridal Harmony
                        </p>
                    </div>
                </div>

                <div class="testimonial-item bg-white text-center">
                    <div class="ratio ratio-16x9  mb-4">
                        <iframe width="100%" src="https://www.youtube.com/embed/zE04Ua6E52U"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div>
                        <h5 class="mb-3 fs-5 fw-bold">
                            <strong>Jessica & Sanjib || Wedding || Bridal Harmony </strong>
                        </h5>
                        <p class="m-0">
                            Film Credits: Bridal Harmony
                        </p>
                    </div>
                </div>

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
