@php
    use Illuminate\Support\Facades\DB;
    $sliders = DB::table('sliders')
        ->where('status', '1')
        ->orderBy('sort_number')
        ->get();
@endphp

<!-- Header Start -->
<div class="hero-header">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset($item->image) }}" class="w-100" alt="Slider Image">
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Header End -->
