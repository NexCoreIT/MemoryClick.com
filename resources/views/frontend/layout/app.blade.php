<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('seo')
    <title>brightvisionbd.com</title>
    @include('frontend.components.fixed.style')
    <style>
        .custom-btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 8px;
            transition: background 0.3s ease-in-out, transform 0.2s;
            text-decoration: none;
        }

        .custom-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .box__inner {
            width: 600px;
        }
    </style>
    @stack('styles')
</head>

<body>



    <div>
        {{-- <div class="overlay"> </div> --}}
        <!-- Top Header -->

        {{-- header --}}

        @include('frontend.components.fixed.header')

        {{-- hero --}}

        @if (!isset($removeHero) || !$removeHero)
        @include('frontend.components.fixed.hero')
        @endif
    </div>






    @yield('content')


    {{-- footer --}}

    @include('frontend.components.fixed.footer')


    @include('frontend.components.fixed.script')

    @stack('scripts')
</body>

</html>
