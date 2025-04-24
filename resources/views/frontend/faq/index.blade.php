@php
$removeHero = true;
@endphp

@extends('frontend.layout.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')

<style>
    nav {
        background-color: #4a60a1;
        transition: all 0.3s ease-in-out;
    }

    nav .sbd-nav-links li a.active {
        background: #233978ad;
    }
    
    nav .sbd-nav-links li a:hover {
        background: #233978ad;
    }
</style>

<body class="bg-gray-100">
    <section class="max-w-4xl mx-auto py-12 px-6" style="margin-top: 80px">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Frequently Asked Questions</h2>
                <p class="text-gray-600 mt-2">Find answers to the most common queries.</p>
            </div>

            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                <div class="accordion-item">
                    <button class="accordion-button {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                        {{ $faq->question }}
                        <span>
                            <i class="fa-solid fa-angle-down"></i>
                        </span>
                    </button>
                    <div class="accordion-content scrollbar {{ $index === 0 ? 'show' : '' }}">
                        {{ $faq->answer }}
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

</body>

@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
