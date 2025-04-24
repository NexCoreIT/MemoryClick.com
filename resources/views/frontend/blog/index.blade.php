@php
$removeHero = true;
@endphp

@extends('frontend.layout.app')
@section('seo')
    <title>{{ $meta_title }}</title>

    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $meta_title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('default-thumbnail.jpg') }}"> {{-- Use default image for index page --}}

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">
    <meta name="twitter:image" content="{{ asset('default-thumbnail.jpg') }}">
@endsection


@section('content')
<section>

</section>



<section class="page-header">
    <div class="overlay"></div>
    <div class="container">
        <br><br><br><br>
        <h1></h1>
        <ul>
            <h1>Blog</h1>
        </ul>
    </div>
</section>

<main class="page-content">
    <div class="container">

        <div class="row listing-row">

            @foreach ($blogs as $item)
            <a href="{{route('blog.details',$item->slug)}}" class="col-12 listing-card listing-type-2">
                <div class="listing-view">
                    <img src="{{asset($item->thumbnail)}}" alt="">
                    <div class="hot-labels">
                        <div class="label">
                            New
                        </div>

                    </div>

                </div>
                <div class="listing-info">
                    <div class="listing-footer">
                        <div class="owner">
                            {{-- <img src="frontend/images/location/house-4.jpg" alt=""> --}}
                            <p>Admin</p>
                        </div>
                        <ul class="actions">
                            <li>
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.69189 14.73C7.21068 14.73 8.44189 13.4988 8.44189 11.98C8.44189 10.4612 7.21068 9.22998 5.69189 9.22998C4.17311 9.22998 2.94189 10.4612 2.94189 11.98C2.94189 13.4988 4.17311 14.73 5.69189 14.73Z"
                                        stroke="#4A60A1" stroke-width="1.38209" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M15.3169 20.9175C16.8357 20.9175 18.0669 19.6863 18.0669 18.1675C18.0669 16.6487 16.8357 15.4175 15.3169 15.4175C13.7981 15.4175 12.5669 16.6487 12.5669 18.1675C12.5669 19.6863 13.7981 20.9175 15.3169 20.9175Z"
                                        stroke="#4A60A1" stroke-width="1.38209" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M15.3169 8.54248C16.8357 8.54248 18.0669 7.31126 18.0669 5.79248C18.0669 4.2737 16.8357 3.04248 15.3169 3.04248C13.7981 3.04248 12.5669 4.2737 12.5669 5.79248C12.5669 7.31126 13.7981 8.54248 15.3169 8.54248Z"
                                        stroke="#4A60A1" stroke-width="1.38209" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M13.0052 7.2793L8.00366 10.4934" stroke="#4A60A1" stroke-width="1.38209"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8.00366 13.4666L13.0052 16.6806" stroke="#4A60A1" stroke-width="1.38209"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </li>
                            {{-- <li>
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.6061 19.5425C11.6061 19.5425 3.01233 14.73 3.01233 8.88624C3.01233 7.85317 3.37025 6.85201 4.02521 6.0531C4.68016 5.25419 5.59168 4.70687 6.60469 4.50427C7.61769 4.30167 8.6696 4.4563 9.58145 4.94185C10.4933 5.42741 11.2087 6.21389 11.6061 7.16749V7.16749C12.0034 6.21389 12.7189 5.42741 13.6307 4.94185C14.5426 4.4563 15.5945 4.30167 16.6075 4.50427C17.6205 4.70687 18.532 5.25419 19.187 6.0531C19.8419 6.85201 20.1998 7.85317 20.1998 8.88624C20.1998 14.73 11.6061 19.5425 11.6061 19.5425Z"
                                        stroke="#4A60A1" stroke-width="1.38209" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </li> --}}

                        </ul>
                    </div>
                    <h3>{{Str::limit($item->title ,60)}}</h3>

                    <p>{!! Str::limit($item->content, 600) !!}</p>


                </div>
            </a>
            @endforeach


        </div>
        <ul class="pagination">
           {{$blogs->links()}}
        </ul>
    </div>
</main>

@endsection
