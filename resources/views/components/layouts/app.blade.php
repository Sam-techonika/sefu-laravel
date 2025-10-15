<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ $title ?? 'Sefu - Insurance & Finance HTML5 Template' }}</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    {{-- ===== CSS Files ===== --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/circular-font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>
@font-face {
  font-family: 'Circular Std';
  src: url('{{ asset("assets/fonts/CircularStd-Black.woff2") }}') format("woff2"),
       url('{{ asset("assets/fonts/CircularStd-Black.woff") }}') format("woff"),
       url('{{ asset("assets/fonts/CircularStd-Black.ttf") }}') format("truetype");
  font-weight: 900;
  font-style: normal;
}

@font-face {
  font-family: 'Circular Std';
  src: url('{{ asset("assets/fonts/CircularStd-Medium.woff2") }}') format("woff2"),
       url('{{ asset("assets/fonts/CircularStd-Medium.woff") }}') format("woff"),
       url('{{ asset("assets/fonts/CircularStd-Medium.ttf") }}') format("truetype");
  font-weight: 500;
  font-style: normal;
}

@font-face {
  font-family: 'Circular Std';
  src: url('{{ asset("assets/fonts/CircularStd-Bold.woff2") }}') format("woff2"),
       url('{{ asset("assets/fonts/CircularStd-Bold.woff") }}') format("woff"),
       url('{{ asset("assets/fonts/CircularStd-Bold.ttf") }}') format("truetype");
  font-weight: bold;
  font-style: normal;
}

@font-face {
  font-family: 'Circular Std Book';
  src: url('{{ asset("assets/fonts/CircularStd-Book.woff2") }}') format("woff2"),
       url('{{ asset("assets/fonts/CircularStd-Book.woff") }}') format("woff"),
       url('{{ asset("assets/fonts/CircularStd-Book.ttf") }}') format("truetype");
  font-weight: normal;
  font-style: normal;
}

/* Apply globally */
body {
    font-family: 'Circular Std Book', sans-serif;
}

/* Headings or bold text */
h1, h2, h3, h4, h5, h6, strong, b {
    font-family: 'Circular Std', sans-serif;
    font-weight: bold;
}
</style>



    {{-- Livewire Styles --}}
    @livewireStyles

    {{-- Page-specific extra styles --}}
    @stack('styles')
</head>

<body>
  
    {{-- ===== Header Section ===== --}}
    @include('includes.header')
        {{-- ===== Main Content ===== --}}
        {{ $slot }}

        {{-- ===== Footer Section ===== --}}
    @include('includes.footer')

    {{-- ===== JS Files ===== --}}
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/slick.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.nice-select.js') }}" defer></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}" defer></script>
    <script src="{{ asset('assets/js/wow.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.easypiechart.js') }}" defer></script>
    <script src="{{ asset('assets/js/tilt.jquery.js') }}" defer></script>
    <script src="{{ asset('assets/js/animate-headline.js') }}" defer></script>
    <script src="{{ asset('assets/js/plugins.js') }}" defer></script>
    <script src="{{ asset('assets/js/main.js') }}" defer></script>

    {{-- Livewire Scripts --}}
    @livewireScripts

    {{-- Page-specific extra scripts --}}
    @stack('scripts')
</body>
</html>
