<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Thanathip Dungpimai">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title') | กรมควบคุมโรค
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon/favicon.png') }}" />
    @include('frontend.layouts.js')
    @yield('css-custom-script')
  	@yield('css-custom')
</head>
<body>
    @yield('content')
</body>
@include('frontend.layouts.js')
@yield('js-custom-script')
@yield('js-custom')
</html>
