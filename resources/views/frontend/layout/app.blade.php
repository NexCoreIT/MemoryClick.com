<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <title>Bridal - Photo Studio Website Template</title> --}}
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    @yield('seo')
    <title>memoryclick.com</title>
    @include('frontend.components.fixed.style')
    @stack('styles')
</head>

<body>



    {{-- header --}}

    @include('frontend.components.fixed.header')


    {{-- main content --}}
    @yield('content')


    {{-- footer --}}

    @include('frontend.components.fixed.footer')

    {{-- script --}}
    @include('frontend.components.fixed.script')

    @stack('scripts')
</body>

</html>
