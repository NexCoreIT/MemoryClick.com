@php
$removeHero = true;
@endphp

@extends('frontend.layout.app')

@section('content')

<style>
    nav {
        background-color: #4a60a1 !important;
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
        text-shadow: 2px 2px 0 #6E80B4, 2px -2px 0 #6E80B4, -2px 2px 0 #6E80B4, -2px -2px 0 #6E80B4, 2px 0px 0 #6E80B4, 0px 2px 0 #6E80B4, -2px 0px 0 #6E80B4, 0px -2px 0 #6E80B4;
    }

    .hero-section::after {
        display: none;
    }
</style>

@section('content')
<section class="hero-section" style="background-image: url({{asset('public/'.$row->first()->category->image)}});">
    {{-- @dd( $row->first()->category->image) --}}
    <div class="hero-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2>{{ $row->first()->category->name ?? ''}}</h2>
                    <small>{!!$product->description ?? ''!!}</small>
                </div>
            </div>
        </div>

    </div>
</section>

<main class="page-content services">
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-12 section-header">
                <h2>{{ $row->first()->category->name ?? ''}}</h2>


            </div>
        </div><br>

        <div class="row g-4">

            @forelse ($row as $product)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    @if($product->youtube_link)
                        <!-- Display YouTube video if youtube_link exists -->
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.youtube.com/embed/{{ getYouTubeVideoId($product->youtube_link) }}"
                                title="{{ $product->name }}"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @else
                        <!-- Display Image if youtube_link does not exist -->
                        <a href="{{ route('service.details', $product->slug) }}"><img class="img-fluid" src="{{ asset('public/'.$product->image) }}" alt="{{ $product->name }}"></a>
                    @endif

                    <a class="btn" href="{{ route('service.details', $product->slug) }}">
                        {{ $product->name }}
                    </a>
                    {{-- <p>{{$product->description ?? ''}}</p> --}}
                </div>
            </div>
        @empty
            <h3 style="color: red; text-align: center;"><br><br><strong>No Service Found</strong></h3>
            <br>
            <p style="text-align: center;"><small>Choose another category</small></p>
        @endforelse

        </div>



    </div>


</main>

@endsection
