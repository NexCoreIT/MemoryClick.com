@extends('backend.layout.app')
@section('package_menu', 'show')
@section('packages', 'show active')
@section('content')
    <div class="container">
        <div class="d-flex py-4 align-items-center justify-content-between">
            <div class="">
                <h2 class="m-0">{{ $title ?? 'Packages' }}</h2>
            </div>
            <div>
                <a href="{{ route('package.index') }}" class="btn btn-info" style="margin-right: 10px;">Back</a>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="post">
                        @csrf

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
