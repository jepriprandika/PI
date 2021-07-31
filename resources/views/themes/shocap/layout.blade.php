<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nyuci.in</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('themes/shocap/assets/img/Free sneaker icon vector png.png') }}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shocap/assets/css/responsive.css' ) }}">
    <script src="{{ asset('themes/shocap/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>

    @include('themes.shocap.partials.header')


    @yield('content')


    @include('themes.shocap.partials.service')



    @include('themes.shocap.partials.footer')

    <!-- all js here -->
    <script src="{{ asset('themes/shocap/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/popper.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('themes/shocap/assets/js/main.js') }}"></script>
    <script> 
        $(".delete").on("click", function() {
            return confirm("Do you want remove this?");
        });
    </script>
</body>

</html>