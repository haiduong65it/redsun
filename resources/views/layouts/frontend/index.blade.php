<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="{{asset('')}}">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>@yield('title') - Redsun Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="frontend/css/linearicons.css">
	<link rel="stylesheet" href="frontend/css/font-awesome.min.css">
	<link rel="stylesheet" href="frontend/css/themify-icons.css">
	<link rel="stylesheet" href="frontend/css/bootstrap.css">
	<link rel="stylesheet" href="frontend/css/owl.carousel.css">
	<link rel="stylesheet" href="frontend/css/nice-select.css">
	<link rel="stylesheet" href="frontend/css/nouislider.min.css">
	<link rel="stylesheet" href="frontend/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="frontend/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="frontend/css/main.css">
    @yield('css')
</head>

<body>    
    <!-- Start Header Area -->
    @include('layouts.frontend.header')
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    @yield('banner')
    <!-- End Banner Area -->

    <!-- Start Content Area -->
    @yield('content')
    <!-- End Content Area -->

    <!-- start footer Area -->
    @include('layouts.frontend.footer')
    <!-- End footer Area -->

    <script src="frontend/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="frontend/js/vendor/bootstrap.min.js"></script>
	<script src="frontend/js/jquery.ajaxchimp.min.js"></script>
	<script src="frontend/js/jquery.nice-select.min.js"></script>
	<script src="frontend/js/jquery.sticky.js"></script>
	<script src="frontend/js/nouislider.min.js"></script>
	<script src="frontend/js/countdown.js"></script>
	<script src="frontend/js/jquery.magnific-popup.min.js"></script>
	<script src="frontend/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="frontend/js/gmaps.min.js"></script>
    <script src="frontend/js/main.js"></script>
    @yield('script')
</body>

</html>