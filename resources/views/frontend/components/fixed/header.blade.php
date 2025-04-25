@php
$categories = DB::table('categories')->where('status','1')->get();
$links = DB::table('home_page_contents')->first();
@endphp

<nav>
    <div class="sbd-wrapper">
        <div class="sbd-logo">
            <a href="{{route('home')}}" class="logo">
                <img src="{{asset ('frontend/images/logo-white.svg') }}" alt="Logo">
            </a>
        </div>
        <input type="radio" name="slider" id="menu-btn">
        <input type="radio" name="slider" id="close-btn">
        <ul class="sbd-nav-links">
            <label for="close-btn" class="sbd-btn sbd-close-btn">
                Menu
                <i class="fas fa-times"></i>
            </label>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <!-- <li>
        <a href="#" class="sbd-desktop-item">Dropdown Menu</a>
        <input type="checkbox" id="showDrop">
        <label for="showDrop" class="sbd-mobile-item">Dropdown Menu</label>
        <ul class="sbd-drop-menu">
          <li><a href="#">Drop menu 1</a></li>
          <li><a href="#">Drop menu 2</a></li>
          <li><a href="#">Drop menu 3</a></li>
          <li><a href="#">Drop menu 4</a></li>
        </ul>
      </li> -->
            <li>
                <a href="#" class="sbd-desktop-item">Services</a>
                <input type="checkbox" id="showMega">
                <!-- <label for="showMega" class="sbd-mobile-item">Mega Menu</label> -->
                <div class="sbd-mega-box">
                    <div class="sbd-content">

                        @forelse ($categories as $item)
                        <!--<div>-->
                        <!--    <a href="{{ route('CatWiseService', $item->slug) }}">{{ $item->name }}</a>-->

                        <!--</div>-->
                        <div>
                            <a href="{{ route('CatWiseService', $item->slug) }}"
                                class="{{ request()->routeIs('CatWiseService') && request()->segment(2) == $item->slug ? 'active' : '' }}">
                                {{ $item->name }}
                            </a>
                        </div>

                        @empty
                        <div>
                            <p>No Category Found</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('ourWorkIndex') }}"
                    class="{{ request()->routeIs('ourWorkIndex') ? 'active' : '' }}">Portfolio</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('bulkOrder') }}"
                    class="{{ request()->routeIs('bulkOrder') ? 'active' : '' }}">Bulk Order</a>
            </li>

            {{-- <li class="nav-item">
                <a href="{{ route('blog.page') }}"
                    class="{{ request()->routeIs('blog.page','blog.details') ? 'active' : '' }}">Blog</a>
            </li> --}}

            {{-- <li><a href="{{ route('faq.page') }}" class="{{ request()->routeIs('faq.page') ? 'active' : '' }}">FAQ</a> --}}
            </li>
            <li><a href="{{ route('about.page') }}" class="{{ request()->routeIs('about.page') ? 'active' : '' }}">About
                    US</a></li>
            @if (auth()->check() && auth()->user()->role != 'admin')
            <li>
                <a href="{{ route('user.dashboard') }}" class="custom-login-btn">Dashboard</a>
            </li>
            @else
            <li>
                <a href="{{ route('login') }}" class="custom-login-btn">Login</a>
            </li>
            @endif
        </ul>
        <label for="menu-btn" class="sbd-btn sbd-menu-btn"><i class="fas fa-bars"></i></label>
    </div>
</nav>

<!-- Floating Icons - Start -->
<div class="floating-icons">
    <a href="https://wa.me/{{$links->phone ?? '#'}}" target="_blank" class="floating-icon">
        <span> Whatsapp </span>
        <svg width="40" height="40" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle class="color-element" cx="19.4395" cy="19.4395" r="19.4395" fill="#49E670"></circle>
            <path
                d="M12.9821 10.1115C12.7029 10.7767 11.5862 11.442 10.7486 11.575C10.1902 11.7081 9.35269 11.8411 6.84003 10.7767C3.48981 9.44628 1.39593 6.25317 1.25634 6.12012C1.11674 5.85403 2.13001e-06 4.39053 2.13001e-06 2.92702C2.13001e-06 1.46351 0.83755 0.665231 1.11673 0.399139C1.39592 0.133046 1.8147 1.01506e-06 2.23348 1.01506e-06C2.37307 1.01506e-06 2.51267 1.01506e-06 2.65226 1.01506e-06C2.93144 1.01506e-06 3.21063 -2.02219e-06 3.35022 0.532183C3.62941 1.19741 4.32736 2.66092 4.32736 2.79397C4.46696 2.92702 4.46696 3.19311 4.32736 3.32616C4.18777 3.59225 4.18777 3.59224 3.90858 3.85834C3.76899 3.99138 3.6294 4.12443 3.48981 4.39052C3.35022 4.52357 3.21063 4.78966 3.35022 5.05576C3.48981 5.32185 4.18777 6.38622 5.16491 7.18449C6.42125 8.24886 7.39839 8.51496 7.81717 8.78105C8.09636 8.91409 8.37554 8.9141 8.65472 8.648C8.93391 8.38191 9.21309 7.98277 9.49228 7.58363C9.77146 7.31754 10.0507 7.1845 10.3298 7.31754C10.609 7.45059 12.2841 8.11582 12.5633 8.38191C12.8425 8.51496 13.1217 8.648 13.1217 8.78105C13.1217 8.78105 13.1217 9.44628 12.9821 10.1115Z"
                transform="translate(12.9597 12.9597)" fill="#FAFAFA"></path>
            <path
                d="M0.196998 23.295L0.131434 23.4862L0.323216 23.4223L5.52771 21.6875C7.4273 22.8471 9.47325 23.4274 11.6637 23.4274C18.134 23.4274 23.4274 18.134 23.4274 11.6637C23.4274 5.19344 18.134 -0.1 11.6637 -0.1C5.19344 -0.1 -0.1 5.19344 -0.1 11.6637C-0.1 13.9996 0.624492 16.3352 1.93021 18.2398L0.196998 23.295ZM5.87658 19.8847L5.84025 19.8665L5.80154 19.8788L2.78138 20.8398L3.73978 17.9646L3.75932 17.906L3.71562 17.8623L3.43104 17.5777C2.27704 15.8437 1.55796 13.8245 1.55796 11.6637C1.55796 6.03288 6.03288 1.55796 11.6637 1.55796C17.2945 1.55796 21.7695 6.03288 21.7695 11.6637C21.7695 17.2945 17.2945 21.7695 11.6637 21.7695C9.64222 21.7695 7.76778 21.1921 6.18227 20.039L6.17557 20.0342L6.16817 20.0305L5.87658 19.8847Z"
                transform="translate(7.7758 7.77582)" fill="white" stroke="white" stroke-width="0.2"></path>
        </svg>
    </a>
    <a href="mailto:{{$links->email ?? '#'}}" class="floating-icon">
        <span> Email </span>
        <svg width="40" height="40" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle class="color-element" cx="19.4395" cy="19.4395" r="19.4395" fill="#FF485F"></circle>
            <path
                d="M20.5379 14.2557H1.36919C0.547677 14.2557 0 13.7373 0 12.9597V1.29597C0 0.518387 0.547677 0 1.36919 0H20.5379C21.3594 0 21.9071 0.518387 21.9071 1.29597V12.9597C21.9071 13.7373 21.3594 14.2557 20.5379 14.2557ZM20.5379 12.9597V13.6077V12.9597ZM1.36919 1.29597V12.9597H20.5379V1.29597H1.36919Z"
                transform="translate(8.48619 12.3117)" fill="white"></path>
            <path
                d="M10.9659 8.43548C10.829 8.43548 10.692 8.43548 10.5551 8.30588L0.286184 1.17806C0.012346 0.918864 -0.124573 0.530073 0.149265 0.270879C0.423104 0.0116857 0.833862 -0.117911 1.1077 0.141283L10.9659 7.00991L20.8241 0.141283C21.0979 -0.117911 21.5087 0.0116857 21.7825 0.270879C22.0563 0.530073 21.9194 0.918864 21.6456 1.17806L11.3766 8.30588C11.2397 8.43548 11.1028 8.43548 10.9659 8.43548Z"
                transform="translate(8.47443 12.9478)" fill="white"></path>
            <path
                d="M9.0906 7.13951C8.95368 7.13951 8.81676 7.13951 8.67984 7.00991L0.327768 1.17806C-0.0829894 0.918864 -0.0829899 0.530073 0.190849 0.270879C0.327768 0.0116855 0.738525 -0.117911 1.14928 0.141282L9.50136 5.97314C9.7752 6.23233 9.91212 6.62112 9.63828 6.88032C9.50136 7.00991 9.36444 7.13951 9.0906 7.13951Z"
                transform="translate(20.6183 18.7799)" fill="white"></path>
            <path
                d="M0.696942 7.13951C0.423104 7.13951 0.286185 7.00991 0.149265 6.88032C-0.124573 6.62112 0.012346 6.23233 0.286185 5.97314L8.63826 0.141282C9.04902 -0.117911 9.45977 0.0116855 9.59669 0.270879C9.87053 0.530073 9.73361 0.918864 9.45977 1.17806L1.1077 7.00991C0.970781 7.13951 0.833862 7.13951 0.696942 7.13951Z"
                transform="translate(8.47443 18.7799)" fill="white"></path>
        </svg>
    </a>
    <a href="{{$links->instagram_link ?? '#'}}" target="_blank" class="floating-icon">
        <span> Instagram </span>
        <svg width="40" height="40" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="linear-gradient" x1="0.892" y1="0.192" x2="0.128" y2="0.85"
                    gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#4a64d5"></stop>
                    <stop offset="0.322" stop-color="#9737bd"></stop>
                    <stop offset="0.636" stop-color="#f15540"></stop>
                    <stop offset="1" stop-color="#fecc69"></stop>
                </linearGradient>
            </defs>
            <circle class="color-element" cx="19.5" cy="19.5" r="19.5" fill="url(#linear-gradient)"></circle>
            <path id="Path_1923" data-name="Path 1923"
                d="M13.177,0H5.022A5.028,5.028,0,0,0,0,5.022v8.155A5.028,5.028,0,0,0,5.022,18.2h8.155A5.028,5.028,0,0,0,18.2,13.177V5.022A5.028,5.028,0,0,0,13.177,0Zm3.408,13.177a3.412,3.412,0,0,1-3.408,3.408H5.022a3.411,3.411,0,0,1-3.408-3.408V5.022A3.412,3.412,0,0,1,5.022,1.615h8.155a3.412,3.412,0,0,1,3.408,3.408v8.155Z"
                transform="translate(10 10.4)" fill="#fff"></path>
            <path id="Path_1924" data-name="Path 1924"
                d="M45.658,40.97a4.689,4.689,0,1,0,4.69,4.69A4.695,4.695,0,0,0,45.658,40.97Zm0,7.764a3.075,3.075,0,1,1,3.075-3.075A3.078,3.078,0,0,1,45.658,48.734Z"
                transform="translate(-26.558 -26.159)" fill="#fff"></path>
        </svg>
    </a>
    <a href="{{$links->messenger_username ?? '#'}}" target="_blank" class="floating-icon">
        <span> Messanger </span>
        <svg width="40" height="40" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle class="color-element" cx="19.4395" cy="19.4395" r="19.4395" fill="#1E88E5"></circle>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M0 9.63934C0 4.29861 4.68939 0 10.4209 0C16.1524 0 20.8418 4.29861 20.8418 9.63934C20.8418 14.98 16.1524 19.2787 10.4209 19.2787C9.37878 19.2787 8.33673 19.1484 7.42487 18.8879L3.90784 20.8418V17.1945C1.56311 15.3708 0 12.6353 0 9.63934ZM8.85779 10.1604L11.463 13.0261L17.1945 6.90384L12.1143 9.76959L9.37885 6.90384L3.64734 13.0261L8.85779 10.1604Z"
                transform="translate(9.01854 10.3146)" fill="white"></path>
        </svg>
    </a>
</div>

<style>
    /* Floating Icons */
.floating-icons {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 1000;
}

/* Fallback for older browsers that don't support 'gap' in flex */
.floating-icons .floating-icon:not(:last-child) {
    margin-bottom: 5px;
}

.floating-icons .floating-icon {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    position: relative;
}

.floating-icons .floating-icon svg {
    -webkit-animation: pulseInfinity 2s infinite ease-in-out;
    animation: pulseInfinity 2s infinite ease-in-out;
}

@-webkit-keyframes pulseInfinity {

    0%,
    100% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 1;
    }

    50% {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
        opacity: 0.8;
    }
}

@keyframes pulseInfinity {

    0%,
    100% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 1;
    }

    50% {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
        opacity: 0.8;
    }
}

.floating-icons .floating-icon span {
    right: 45px;
    display: none;
    font-size: 14px;
    padding: 4px 8px;
    border-radius: 4px;
    color: #4a60a1;
    position: absolute;
    margin-right: 10px;
    white-space: nowrap;
    background-color: #fff;
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}

.floating-icons .floating-icon:hover span {
    display: inline-block;
}
</style>
<!-- Floating Icons - End -->
