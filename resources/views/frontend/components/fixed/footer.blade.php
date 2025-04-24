@php
    $links = DB::table('home_page_contents')->first();
    $categories = DB::table('categories')->where('status','1')->latest()->take(10)->get();
@endphp

<!-- Font Awesome for social icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Footer  -->
<footer class="footer" style="background-color: #4a60a1; color: white;">
    <div class="container">
        <div class="row">
            <!-- Contact Info Column -->
            <div class="col-12 col-md-6 col-lg-3">
                <a href="#" class="logo">
                    <img src="images/logo.svg" alt="">
                </a>
                <h4 class="mt-3" style="color: white;">Contact Us</h4>
                <p class="mb-1" style="color: white;"><i class="fas fa-phone me-2"></i> <a href="tel:+8801620666162" style="color: white;">+8801620666162</a></p>
                <p class="mb-1" style="color: white;"><i class="fas fa-map-marker-alt me-2"></i> {{ $links->address ?? '' }}</p>
                <p class="mb-1" style="color: white;"><i class="fas fa-envelope me-2"></i> <a href="mailto:{{ $links->email ?? '' }}" style="color: white;">{{ $links->email ?? '' }}</a></p>

                <div class="mt-4">
                    <p class="mb-0" style="color: white;">
                        <strong>Developed by</strong>
                        <a href="https://www.facebook.com/zidan.khan.1234/" target="_blank" style="color: white; font-weight: bold;">Zidan</a>
                    </p>
                </div>
            </div>

            <!-- Categories Section -->
            <div class="col-12 col-md-6 col-lg-3 mb-4 my-4">
                <h4 style="color: white;">Our Services</h4>
                <div class="d-flex flex-column">
                    @forelse ($categories as $item)
                        <a href="{{ route('CatWiseService', $item->slug) }}" style="color: white;" class="py-1">{{ $item->name }}</a>
                    @empty
                        <p style="color: white;">No Service Found</p>
                    @endforelse
                </div>
            </div>

            <!-- Social Links Column -->
            <div class="col-12 col-md-6 col-lg-3 mb-4 my-4">
                <h4 style="color: white;">Follow Us</h4>
                <div class="d-flex flex-column">
                    <a href="{{ $links->youtube_link ?? '#' }}" style="color: white;" class="py-1"><i class="fab fa-youtube me-2"></i> YouTube</a>
                    <a href="{{ $links->facebook_link ?? '#' }}" style="color: white;" class="py-1"><i class="fab fa-facebook me-2"></i> Facebook</a>
                    <a href="{{ $links->linkedin_link ?? '#' }}" style="color: white;" class="py-1"><i class="fab fa-linkedin me-2"></i> LinkedIn</a>
                    <a href="https://t.me/c/2492282050/107" style="color: white;" class="py-1"><i class="fab fa-telegram me-2"></i> Telegram</a>
                    <a href="{{ $links->instagram_link ?? '#' }}" style="color: white;" class="py-1"><i class="fab fa-instagram me-2"></i> Instagram</a>
                    <a href="{{ $links->twitter_link ?? '#' }}" style="color: white;" class="py-1"><i class="fab fa-twitter me-2"></i> Twitter</a>
                </div>
            </div>

            <!-- Quick Links Column -->
            <div class="col-12 col-md-6 col-lg-3 mb-4 my-4">
                <h4 style="color: white;">Quick Links</h4>
                <div class="d-flex flex-column">
                    <a href="{{route('home')}}" style="color: white;" class="py-1"><i class="fas fa-home me-2"></i> Home</a>
                    <a href="{{route('about.page')}}" style="color: white;" class="py-1"><i class="fas fa-info-circle me-2"></i> About Us</a>
                    <a href="{{route('ourWorkIndex')}}" style="color: white;" class="py-1"><i class="fas fa-briefcase me-2"></i> Our Work</a>
                    <a href="{{route('faq.page')}}" style="color: white;" class="py-1"><i class="fas fa-question-circle me-2"></i> FAQ</a>
                    <a href="{{route('login')}}" style="color: white;" class="py-1"><i class="fas fa-sign-in-alt me-2"></i> Login</a>
                </div>
            </div>
        </div>
               <!-- Payment Image Row -->
<div class="row mt-2 mb-3 justify-content-center">
    <div class="col-auto text-center">
        <h3 class="text-white mb-2">We Accept</h3>
        <img src="{{ asset('payment-methods.png') }}" alt="We Accept Payment" style="max-width: 180px; height: auto;">
    </div>
</div>


        <!-- Footer Bottom -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <p class="mb-0" style="color: white;">&copy; {{ date('Y') }} brightvisionbd.com All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
