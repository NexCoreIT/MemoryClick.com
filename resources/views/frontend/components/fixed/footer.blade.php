 @php
     $links = DB::table('home_page_contents')->find(1);
 @endphp

 <!-- Footer Start -->
 <div class="footer_sec bg-dark text-white border-top border-secondary py-4">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-sm-between">
            <div class="text-center mb-3 mb-sm-0 text-sm-start">
                <p class="mb-0">&copy; {{ date('Y') }} <a class="text-primary" href="#">{{$links->footer_title ?? 'memorylick.com'}}</a>. All Rights Reserved.</p>

            </div>
            <div class="text-center text-sm-end">
                <div class="d-flex align-items-center justify-content-center justify-content-sm-end">
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="{{$links->facebook_link ?? '#'}}">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="{{$links->twitter_link ?? '#'}}">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="{{$links->instagram_link ?? '#'}}">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
