<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="adepti,ti, uai, programación, hacking" name="keywords">
    <meta content="Aprender y dar a conocer el mundo de las tecnologías de información" name="description">
    <!-- Favicons -->
    <link href="{{url('/img/favicon.png')}}" rel="icon">
    <link href="{{url('/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Bootstrap CSS File -->
    <link href="{{url('/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="{{url('/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{url('/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="{{url('/css/style-sky-blue.css')}}" rel="stylesheet">

    <!-- =======================================================
      Theme Name: DevFolio
      Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>
<body id="page-top">
@include('partials.navbar')
@include('partials.home')
@include('partials.about')
@include('partials.services')
@include('partials.info')
@include('partials.portfolio')
@include('partials.testimonials')
@include('partials.blog')
@include('partials.footer')
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>
<!-- JavaScript Libraries -->
<script src="{{url('/lib/jquery/jquery.min.js')}}"></script>
<script src="{{url('/lib/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{url('/lib/popper/popper.min.js')}}"></script>
<script src="{{url('/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('/lib/easing/easing.min.js')}}"></script>
<script src="{{url('/lib/counterup/jquery.waypoints.min.js')}}"></script>
<script src="{{url('/lib/counterup/jquery.counterup.js')}}"></script>
<script src="{{url('/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{url('/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="{{url('/lib/typed/typed.min.js')}}"></script>
<!-- Contact Form JavaScript File -->
<script src="{{url('/contactform/contactform.js')}}"></script>
<!-- Template Main Javascript File -->
<script src="{{url('/js/main.js')}}"></script>
</body>
</html>
