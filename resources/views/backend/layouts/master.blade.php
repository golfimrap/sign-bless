<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    @include('backend.layouts.css')
    @yield('css-custom-script')
  	@yield('css-custom')
</head>
<body>
    <div class="container-scroller d-flex">
        <!-- partial:./partials/_sidebar.html -->
        @include('backend.layouts.main-ui.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            @include('backend.layouts.main-ui.navbar')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:./partials/_footer.html -->
                @include('backend.layouts.main-ui.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('backend.layouts.js')
    @yield('js-custom-script')
    @yield('js-custom')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4J7XK7E5WG"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-4J7XK7E5WG');
    </script>
</body>

</html>
