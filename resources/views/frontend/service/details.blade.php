@php
$removeHero = true;
@endphp

@extends('frontend.layout.app')
@php
    $steps = json_decode($product->steps, true); // Decode steps JSON as an associative array
    $stepCount = is_array($steps) ? count($steps) : 0; // Get count of steps
    $steps = json_decode($product->steps, true) ?? [];
@endphp
@section('content')
<section class="hero-section" style="background-image: url({{asset('public/'.$product->category->image)}});">
    <div class="hero-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2>{{$product->name ?? ''}}</h2>
                    <small>{!!$product->description ?? ''!!}</small>
                </div>
            </div>
        </div>
        {{-- <div class="mt-3">
            <a class="label" href="{{route('registration')}}">{{$home_content->home_btn ?? ''}}</a>
        </div> --}}
    </div>
    </section>

<main class="page-content service-details" style="padding-bottom: 0">

<style>
    nav {
        background-color:#4a60a1 !important;
        transition: all 0.3s ease-in-out;
    }

    .scrolled nav {
        background-color: #4a60a1 !important;
    }

    nav .sbd-nav-links li a.active {
        background: #233978ad;
    }

    nav .sbd-nav-links li a:hover {
        background: #233978ad;
    }

    .hero-section .hero-content h2 {
        font-size: 42px;
        color: #FFFFFF;
        margin-bottom: 15px;
        text-shadow: 2px 2px 0 #6E80B4, 2px -2px 0 #6E80B4, -2px 2px 0 #6E80B4, -2px -2px 0 #6E80B4, 2px 0px 0 #6E80B4, 0px 2px 0 #6E80B4, -2px 0px 0 #6E80B4, 0px -2px 0 #6E80B4;
    }

    .hero-section::after {
        display: none;
    }

    .hero-section .hero-content small {
        color: #fff;
        font-size: 18px;
        line-height: 28px;
        text-shadow: 0 -1px 4px #FFF, 0 -2px 10px #000000, 0 -10px 20px #495fa0, 0 -18px 40px;
    }
</style>



     <div class="container">
        <div class="section">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-12 section-header">
                    <h2 style="margin-top: 0">{{ $stepCount }} Processing Steps</h2>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-7 mx-auto">
                    <div class="row">
                    @foreach(json_decode($product->steps) as $step)
                        <div class="col-12 col-md-6">
                            <div class="list-items mb-1">
                                <div class="icon me-1">
                                    <i class="fa-regular fa-circle-check"></i>
                                </div>
                                <p class="text">{{ $step }}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

        </div>

        <!-- Steps Section End -->

        <!-- Gallery Section Start -->
        <div class="img-collection">
            <div class="row justify-content-center">
                @if(!$product->youtube_link)
                <div class="col-12 col-md-8 col-lg-12 section-header">
                    <h2> Collection </h2>
                </div>
                @endif
            </div>

            {{-- <div class="images-container">
                @if($product->images->isNotEmpty())
                    @foreach($product->images as $image)
                        <div class="img-item">
                            <img class="img-fluid" src="{{ asset('public/'.$image->images) }}" alt="Service Image">
                        </div>
                    @endforeach
                @else
                    <p>No images available.</p>
                @endif
            </div> --}}

            <div class="media-container">
                {{-- Display Images --}}
                @if($product->images->isNotEmpty())
                    <div class="images-container">
                        @foreach($product->images as $image)
                            <div class="img-item">
                                <img class="img-fluid" src="{{ asset('public/'.$image->images) }}" alt="Service Image">
                            </div>
                        @endforeach
                    </div>
                @endif

             {{-- Display YouTube Video --}}
             @if($product->youtube_link)
             <div style="display: flex; justify-content: center; margin: 20px 0;">
                 <div style="width: 70%; max-width: 1200px;">
                     <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                         <iframe
                             style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                             src="https://www.youtube.com/embed/{{ getYouTubeVideoId($product->youtube_link) }}"
                             title="Service Video"
                             allowfullscreen>
                         </iframe>
                     </div>
                 </div>
             </div>
         @endif



            </div>


        </div>
        <!-- Gallery Section End -->


    </div>
</main>



@endsection
