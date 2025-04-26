@extends('frontend.layout.app')
@section('content')


<!-- breadcrump start -->
<div class="breadcrumb_sec bg-light py-4">
    <div class="container">
        <h4>About Us</h4>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- breadcrump end -->

  <!-- About Start -->
  <div class="about_sec section_gap">
    <div class="container">
        {!!$page->body!!}
    </div>
</div>
<!-- About End -->


<!-- Founder Start -->
<div class="founder_sec section_gap pt-0">
    <div class="container">
        <div class="row d-flex allign-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 order-lg-2">
                <div class="about_bx text-center text-lg-end">
                    <img src="frontend/assets/img/about-2.jpg" class="img-fluid rounded shape-md" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div>
                    <p class="text-primary text-uppercase sub_title mb-2">Founder & CEO</p>
                    <h1 class="title mb-4">Emily R.</h1>
                    <p class="mb-4 text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, natus! Vero autem accusantium
                        ipsam repellendus doloremque ipsum culpa temporibus quidem nesciunt dignissimos, perferendis
                        veniam expedita animi veritatis corporis deleniti debitis facere sequi. Minima dolore nobis
                        repellat illo tempora dolorum at temporibus, a consectetur! Ex quibusdam autem a eveniet
                        nihil, repudiandae recusandae. Veniam, dolor quis aperiam neque explicabo adipisci quam
                        voluptatum.
                    </p>
                    <p class="m-0">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum commodi placeat odio aperiam
                        explicabo error. Recusandae sed dolores iste ipsa cumque, quisquam earum veritatis
                        aspernatur, inventore enim tempora perspiciatis consequuntur?
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Founder End -->

<!-- Team Start -->
<div class="team_sec mb-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width:600px;">
            <p class="text-primary text-uppercase sub_title mb-2">Team Member</p>
            <h1 class="display-6 mb-4">Meet with our Team Member</h1>
        </div>

        <div class="row">

            @forelse ($teams as $team)


            <div class="col-sm-6 col-xl-3">
                <div class="team-membem shadow-sm bg-white p-3 p-lg-4 rounded text-center">
                    <img src="{{asset($team->image)}}" class="img-fluid rounded mb-3" alt="Photographer">
                    <h4>{{$team->name}}</h4>
                    <p class="m-0 small">{{$team->designation}}</p>
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
<!-- Team End -->

<!-- brand Start -->
<div class="brand_sec section_gap pt-0">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width:600px;">
            <p class="text-primary text-uppercase sub_title mb-2">Our Memberships</p>
            <h1 class="display-6 mb-4">Best Memberships for you</h1>
        </div>
        <div class="row gy-4 d-flex align-items-center text-center">
            <div class="col-sm-6 col-lg-3">
                <div class="membership_logo">
                    <img src="frontend/assets/img/PPAC.png" class="img-fluid" width="150" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="membership_logo">
                    <img src="frontend/assets/img/AsiaWPA.png" class="img-fluid" width="150" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="membership_logo">
                    <img src="frontend/assets/img/WPPB.png" class="img-fluid" width="150" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="membership_logo">
                    <img src="frontend/assets/img/my-wed.png" class="img-fluid" width="150" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand End -->

@endsection
