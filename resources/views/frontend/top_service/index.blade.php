@extends('frontend.layout.app')

@section('content')

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
            <div class="text-center">
                <strong class="text-danger">NO DATA FOUND</strong>
            </div>

            @endforelse
        </div>

        <div class="text-center mt-5">

        </div>

    </div>
    <!-- Services End -->

@endsection
