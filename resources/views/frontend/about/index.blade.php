@extends('frontend.layout.app')
@section('content')

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

@endsection
