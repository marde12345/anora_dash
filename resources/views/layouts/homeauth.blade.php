<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dieka Prastya">
    <meta name="author" content="Dieka Prastya">
    <title>{{ config('app.name', 'Laravel') . ' | ' .  $widget['title'] }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon Icon-->
    <link rel="icon" type="image/png" href="{{ asset('img/anora_small.png') }}">

    <!-- Bootstrap core CSS-->
    <link href="/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome-->
    <link href="/home/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Material Design Icons-->
    <link href="/home/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">

    <!-- Slick-->
    <link href="/home/vendor/slick-master/slick/slick.css" rel="stylesheet" type="text/css">

    <!-- Lightgallery-->
    <link href="/home/vendor/lightgallery-master/dist/css/lightgallery.min.css" rel="stylesheet">

    <!-- Select2 CSS-->
    <link href="/home/vendor/select2/css/select2-bootstrap.css">
    <link href="/home/vendor/select2/css/select2.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/home/stylesheets/landing/style.css" rel="stylesheet">
</head>

@yield('main-content')
<!-- End Login-->

<!-- Bootstrap core JavaScript-->
<script src="/home/vendor/jquery/jquery.min.js"></script>
<script src="/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Slick-->
<script src="/home/vendor/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>

<!-- lightgallery-->
<script src="/home/vendor/lightgallery-master/dist/js/lightgallery-all.min.js"></script>

<!-- select2 Js-->
<script src="/home/vendor/select2/js/select2.min.js"></script>

<!-- Custom-->
<script src="/home/javascripts/landing/custom.js"></script>