<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>StudentDocs | Past paper downloading website</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('images/frontend_images/favicon.ico" type="image/x-icon')}}">
    <link rel="apple-touch-icon" href="{{ asset('images/frontend_images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/custom.css')}}">

    <link rel="stylesheet" href="{{ asset('css/frontend_css/font-awesome.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/frontend_css/prettyPhoto.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/frontend_css/price-range.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/frontend_css/animate.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/frontend_css/main.css')}}" >

    <!--[if lt IE 9]>
    <script src="{{ asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
    <script src="{{ asset('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

@include('layouts.frontLayout.front_header')

@yield('content')

@include('layouts.frontLayout.front_footer')

<!--<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>-->

<!-- ALL JS FILES -->
<script src="{{ asset('js/frontend_js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/popper.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/bootstrap.min.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{ asset('js/frontend_js/jquery.superslides.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/bootstrap-select.js')}}"></script>
<script src="{{ asset('js/frontend_js/inewsticker.js')}}"></script>
<script src="{{ asset('js/frontend_js/bootsnav.js.')}}"></script>
<script src="{{ asset('js/frontend_js/images-loded.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/isotope.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/baguetteBox.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/frontend_js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('js/frontend_js/form-validator.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/contact-form-script.js')}}"></script>
<script src="{{ asset('js/frontend_js/custom.js')}}"></script>



<!-----------------from other template------------>
<script src="{{ asset('js/frontend_js/jquery.js')}}"></script>
<script src="{{ asset('js/frontend_js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/jquery.scrollUp.min.js')}}"></script>
<script src="{{ asset('js/frontend_js/price-range.js')}}"></script>
<script src="{{ asset('js/frontend_js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('js/frontend_js/main.js')}}"></script>
<!-------------------------------------------------->

</body>

</html>
