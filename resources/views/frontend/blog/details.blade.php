@php
$removeHero = true;
@endphp

@extends('frontend.layout.app')
@section('seo')
    <title>{{ $blog->meta_title ?? $blog->title }}</title>

    <meta name="description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="keywords" content="{{ $blog->meta_keywords ?? 'blog, article, news' }}">

    <meta property="og:title" content="{{ $blog->meta_title ?? $blog->title }}">
    <meta property="og:description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ asset($blog->thumbnail) }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->meta_title ?? $blog->title }}">
    <meta name="twitter:description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="twitter:image" content="{{ asset($blog->thumbnail) }}">
@endsection

@section('content')
<section class="page-header">
    <div class="overlay"></div>
    <div class="container">
        <br><br><br><br>
        <h1></h1>
        <ul>
           <h1>Blog Details</h1>
        </ul>
    </div>
</section>

<main class="page-content">
    <div class="container">
        <div class="blog-detail-container">

            <!-- Blog Meta Information -->
            <div class="blog-meta mb-4">
                <span class="text-muted">
                    <i class="far fa-calendar-alt"></i> {{ $blog->created_at->format('F j, Y') }}
                </span>
                @if($blog->category)
                <span class="text-muted ml-3">
                    <i class="far fa-folder"></i> {{ $blog->category->name }}
                </span>
                @endif
                <span class="text-muted ml-3">
                    <i class="far fa-user"></i> Admin
                </span>
            </div>
            <p> <h1>{{ $blog->title }}</h1></p><br>
            <!-- Featured Image -->
            <div class="blog-featured-image mb-5 text-center">
                @if($blog->thumbnail)
                <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->title }}" class="img-fluid rounded">
                @else
                <img src="{{ asset('frontend/images/default-blog.jpg') }}" alt="Default blog image" class="img-fluid rounded">
                @endif
            </div>

            <!-- Blog Content -->
            <div class="blog-content">
                {!! $blog->content !!}
            </div>

            {{-- <!-- Tags -->
            @if($blog->meta_keywords)
            <div class="blog-tags mt-5">
                <h5>Tags:</h5>
                @php
                    $tags = explode(',', $blog->meta_keywords);
                @endphp
                @foreach($tags as $tag)
                    <span class="badge badge-secondary">{{ trim($tag) }}</span>
                @endforeach
            </div> --}}
            {{-- @endif --}}

            <!-- Share Buttons -->
            <div class="share-buttons mt-5 gap-2">
                <h5>Share this post:</h5><br>
                <div class="d-flex flex-wrap ">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                       target="_blank" class="btn btn-outline-primary">
                        <i class="fab fa-facebook-f me-1"></i>
                    </a>

                    <!-- Twitter -->
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}"
                       target="_blank" class="btn btn-outline-info">
                         <i class="fab fa-twitter me-1"></i>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($blog->title) }}"
                       target="_blank" class="btn btn-outline-primary">
                        <i class="fab fa-linkedin-in me-1"></i>
                    </a>
                </div>
            </div>

            <!-- Related Posts -->
            {{-- @if($relatedPosts->count() > 0)
            <div class="related-posts mt-5">
                <h3>Related Posts</h3>
                <div class="row">
                    @foreach($relatedPosts as $related)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($related->thumbnail)
                            <img src="{{ asset($related->thumbnail) }}" class="card-img-top" alt="{{ $related->title }}">
                            @else
                            <img src="{{ asset('frontend/images/default-blog.jpg') }}" class="card-img-top" alt="Default blog image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($related->title, 50) }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($related->content), 100) }}</p>
                                <a href="{{ route('blog.show', $related->slug) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif --}}
        </div>
    </div>
</main>

@endsection

@push('styles')
<style>
    .blog-detail-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .blog-featured-image img {
        max-height: 500px;
        width: auto;
        margin: 0 auto;
    }

    .blog-content {
        line-height: 1.8;
        font-size: 1.1rem;
    }

    .blog-content img {
        max-width: 100%;
        height: auto;
        margin: 20px 0;
    }

    .blog-content h2,
    .blog-content h3,
    .blog-content h4 {
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
    }

    .blog-meta {
        font-size: 0.9rem;
    }

    .badge {
        margin-right: 5px;
        padding: 5px 10px;
        font-weight: normal;
    }
</style>
@endpush
