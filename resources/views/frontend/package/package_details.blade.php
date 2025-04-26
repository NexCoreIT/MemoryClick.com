@php
    $settings = DB::table('home_page_contents')->find(1)
@endphp

<div class="modal-header">
    <h1 class="modal-title fs-5" id="packageDetailsLabel">{{ $package->package_name }}</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body text-center">
    <h5>{{ $package->package_name }}</h5>
    <p>
        @php
            $people = array_filter([$package->chief, $package->photographer, $package->cinematographer]);
        @endphp
        {{ implode(' + ', $people) }}
    </p>
    <ul>
        @foreach ($package->features as $feature)
            <li>* {{ $feature->name }}</li>
        @endforeach
    </ul>
    <h6 class="mt-4">For outside of Dhaka & Chittagong metropolitan area</h6>
    <p>Transportation + Accommodation & 15% shift charge (Package Price) will be added with package price.</p>
</div>
<div class="d-flex border-top p-3 mt-3 align-items-center justify-content-between">
    <div>
        <h4>{{ $package->price }} TK</h4>
    </div>
    <div>
        <a href="tel:{{$settings->phone}}" class="btn btn-sm btn-dark" target="_blank">Contact with us</a>
    </div>
</div>
