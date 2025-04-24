@php
    $home_content = DB::table('home_page_contents')->find(1);
@endphp

<section class="hero-section" style="background-image: url('frontend/images/hero-bg.jpg');">
<div class="hero-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-lg-8 col-xl-8 text-center">
                <h1>{{$home_content->homepage_title ?? ''}}</h1>
                <p>{!!$home_content->homepage_content ?? ''!!}</p>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a class="label" href="{{route('registration')}}">{{$home_content->home_btn ?? ''}}</a>
    </div>
</div>
</section>
