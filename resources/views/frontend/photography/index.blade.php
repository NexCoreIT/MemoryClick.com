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
                        <a href="frontend/assets/img/2.jpg">
                            <img src="frontend/assets/img/2.jpg" class="img-fluid mb-3 rounded" alt="">
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
<!-- Photography End -->
@endsection
