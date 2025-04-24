@php
$removeHero = true;
@endphp

@extends('frontend.layout.app')

@section('content')
<section class="section our-work pt-0"><br>
    <style>
        nav {
            background-color: #4a60a1;
            transition: all 0.3s ease-in-out;
        }

        nav .sbd-nav-links li a.active {
            background: #233978ad;
        }

        nav .sbd-nav-links li a:hover {
            background: #233978ad;
        }
    </style>
    <div class="container" style="margin-top: 15px">

        <div class="row justify-content-center mb-0">

            <div class="col-12 col-md-8 col-lg-12 section-header"><br><br><br><br>
                <!-- More Details Section -->
                <section class="section bg-light pt-0 pb-0">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 text-center">
                                <h2>More Details About Our Work</h2>
                                <p class="text-muted"><small>
                                        We have been providing various image manipulation and video editing services for the last 30 years all over the world. Basically, we do quality works on Adobe Photoshop based clipping path services for image manipulation. But we also have expertise knowledge on photoshop image masking, retouching, color restoration, post production, pre-press work, web design and more. Have a look at the portfolio of our work samples. (Please click on an image to see “before” and “after” versions of the same image)</small></p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        @if ($row->isNotEmpty())

        <div class="row g-4">
            @forelse ($row as $property)
            <div class="col-12 col-md-6 col-lg-3"> <!-- Change col-xl-6 to col-lg-3 to get 4 items per row -->
                @if (!empty($property->video))
                <div>
                    <video width="100%" controls>
                        <source src="{{ asset($property->video) }}" type="video/mp4">
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

                <h4 class="mt-4" style="text-align: center">{{ $property->title ?? 'No Title Available' }}</h4>

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

@endsection
