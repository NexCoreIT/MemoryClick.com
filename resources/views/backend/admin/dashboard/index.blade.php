@extends('backend.layout.app')


@push('styles')
    <style>
        .diff {
            position: relative;
            width: 100%;
            height: 200px;
            /* Reduced height */
            overflow: hidden;
            user-select: none;
            border-radius: 8px;
            cursor: ew-resize;
        }

        .diff-item-1,
        .diff-item-2 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .diff-item-1 img,
        .diff-item-2 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .diff-item-2 {
            width: 50%;
            overflow: hidden;
            transition: width 0.3s ease-in-out;
        }

        .diff-resizer {
            position: absolute;
            top: 0;
            left: 50%;
            width: 4px;
            height: 100%;
            background: #fff;
            cursor: ew-resize;
            transition: left 0.3s ease-in-out;
        }
    </style>
@endpush


@section('content')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader"><a
                                        href="{{ route('photography.index') }}">PHOTOGRAPHY({{ $total_properties }})</a></div>
                                <div class="ms-auto lh-1">

                                </div>
                            </div>
                            <div class="h1 mb-3"><a href="{{ route('property_index') }}">{{ $total_properties }}</a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader"><a
                                        href="{{ route('cinematographies.index') }}">CINEMATOGRAPHY({{ $total_service }})</a>
                                </div>
                                <div class="ms-auto lh-1">

                                </div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-0 me-2"><a href="{{ route('product.index') }}">{{ $total_service }}</a>
                                </div>
                                <div class="me-auto">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader"><a
                                        href="{{ route('category.index') }}">Categories({{ $total_categories }})</a></div>
                                <div class="ms-auto lh-1">

                                </div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-3 me-2"><a
                                        href="{{ route('category.index') }}">{{ $total_categories }}</a>
                                </div>
                                <div class="me-auto">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader"><a href="{{ route('user.list') }}">Users({{ $total_users }})</a>
                                </div>
                                <div class="ms-auto lh-1">

                                </div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-3 me-2"><a href="{{ route('user.list') }}">{{ $total_users }}</a></div>
                                <div class="me-auto">

                                </div>
                            </div>




                        </div>
                    </div>


                </div>

                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="row row-cards">

                            @forelse ($row as $item)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm">
                                        <a class="d-block"><img src="{{('public/'.$item->image)}}"
                                                class="card-img-top"></a>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">

                                                <div>
                                                    <div>{{ Str::limit($item->name, 20) }}</div>
                                                    <div class="text-secondary">
                                                        {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @empty
                            {{-- <h2 style="text-align: center"><br><br><br><br><strong style="color: red">No Data Found</strong></h2> --}}
                            <x-backend.svg.notfound-service-svg />
                            @endforelse


                        </div>
                    </div>






                </div>

            </div>

        </div>
    @endsection
