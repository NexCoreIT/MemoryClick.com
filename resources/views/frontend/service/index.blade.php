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

    nav .sbd-nav-links li a.active {
        background: #233978ad;
    }

    nav .sbd-nav-links li a:hover {
        background: #233978ad;
    }

    /* .hero-section .hero-content h2 {
        font-size: 42px;
        color: #FFFFFF;
        text-shadow: 2px 2px 0 #6E80B4, 2px -2px 0 #6E80B4, -2px 2px 0 #6E80B4, -2px -2px 0 #6E80B4, 2px 0px 0 #6E80B4, 0px 2px 0 #6E80B4, -2px 0px 0 #6E80B4, 0px -2px 0 #6E80B4;
    }

    .hero-section::after {
        diisplay: none;
    } */
</style>


<main class="page-content services">

    @if($row->isNotEmpty())

    <div class="container">

        @if($row->where('category_id', 1)->count() > 0)
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-12 section-header">
                <h2> Photo Services </h2>
            </div>
        </div><br>

        <div class="row g-4">
            @foreach($row as $product)
            @if($product->category_id == 1)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    <img class="img-fluid" src="{{ asset('public/'.$product->image) }}" alt="{{ $product->name }}">
                    <a class="btn" href="{{ route('service.details', $product->slug) }}">
                        {{ $product->name }}
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endif


    </div>

    <br><br><br>

    <div class="container">

        @if($row->where('category_id', 2)->count() > 0)
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-12 section-header">
                <h2> Virtual Photo Services </h2>
            </div>
        </div><br>

        <div class="row g-4">
            @foreach($row as $product)
            @if($product->category_id == 2)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    <img class="img-fluid" src="{{ asset('public/'.$product->image) }}" alt="{{ $product->name }}">
                    <a class="btn" href="{{ route('service.details', $product->slug) }}">
                        {{ $product->name }}
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endif


    </div>

    <br><br><br>

    <div class="container">

        @if($row->where('category_id', 3)->count() > 0)
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-12 section-header">
                <h2> Other Photo Services </h2>
            </div>
        </div><br>

        <div class="row g-4">
            @foreach($row as $product)
            @if($product->category_id == 3)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    <img class="img-fluid" src="{{ asset('public/'.$product->image) }}" alt="{{ $product->name }}">
                    <a class="btn" href="{{ route('service.details', $product->slug) }}">
                        {{ $product->name }}
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endif

    </div>

    <br><br><br>

    <div class="container">

        @if($row->where('category_id', 4)->count() > 0)
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-12 section-header">
                <h2> Video Services </h2>
            </div>
        </div><br>

        <div class="row g-4">
            @foreach($row as $product)
            @if($product->category_id == 4 && $product->youtube_link)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/{{ getYouTubeVideoId($product->youtube_link) }}"
                            title="{{ $product->name }}" allowfullscreen>
                        </iframe>
                    </div>
                    <a class="btn" href="{{ route('service.details', $product->slug) }}">
                        {{ $product->name }}
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        @endif

    </div>
    @else
    <br><br>
    <h2 style="text-align: center"><strong style="color: red">No Data Found</strong></h2>
    @endif
</main>

@endsection