<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('frontend/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ url('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  @include('includes.user.style')

  @stack('addon-style')

  <!-- =======================================================
  * Template Name: Arsha - v4.7.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('includes.user.navbarcontent')

    @yield('content')


    @include('includes.user.footercontent')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('includes.user.script')
</body>
@stack('addon-script')
</html>
