<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="author" content="PIXINVENT">
    <title>Brequigny</title>
    <link rel="apple-touch-icon" href="{{ vendor_url() }}app-assets/images/logo/logo-dark-bio.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ vendor_url() }}app-assets/images/logo/logo-dark-bio.png">
    <link rel="stylesheet" type="text/css" href="{{ base_url('vendor/webfonts/open-sans/open-sans.css') }}" >

    <link rel="stylesheet" type="text/css" href="{{ base_url('vendor/fontawesome/all.min.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ base_url('vendor/fontawesome/fontawesome.min.css') }}" media="screen">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ base_url('vendor/app-assets/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ base_url('vendor/app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ base_url('vendor/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ base_url('vendor/app-assets/css/core/colors/palette-gradient.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ base_url('vendor/css/style.css') }}">
    <!-- END Custom CSS-->

    
</head>

<body id="page-top">

<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center" data-nav="brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-container container center-layout">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item">
                        <a class="navbar-brand d-flex justify-content-start align-items-center" href="{{ base_url('/') }}">
                            <img class="brand-logo" alt="modern admin logo" src="{{ vendor_url() }}app-assets/images/logo/logo-dark-bio.png">
                            <h3 class="brand-text" style="font-weight: 700; text-transform: uppercase; margin: 0px; margin-left: 10px;">Open Data Rennes</h3>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">

                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Begin Page Content -->
<main>

    @yield('contents')

</main>
@include('app.footer_bar')

<script src="{{ vendor_url() }}js/jquery/jquery.min.js" type="text/javascript"></script>
<script src="{{ vendor_url() }}js/popper/popper.min.js" type="text/javascript"></script>
<script src="{{ vendor_url() }}js/bootstrap/boostrap.min.js" type="text/javascript"></script>
<script src="{{ vendor_url() }}js/switch/bootstrap-checkbox.min.js" type="text/javascript"></script>
<script src="{{ vendor_url() }}js/switch/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="{{ vendor_url() }}js/switch/switch.min.js" type="text/javascript"></script>
<script src="{{ vendor_url() }}js/clock/clock.min.js" type="text/javascript"></script>
<script src="{{ vendor_url() }}js/cookie/cookie.min.js" type="text/javascript"></script>

@yield('scripts')

</body>
<html>

