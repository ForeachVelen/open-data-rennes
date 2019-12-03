<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="author" content="PIXINVENT">
    <title>Open Data Rennes</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ assets_url() }}css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ assets_url() }}css/mdb/modules/mdb.min.css">
    <link rel="stylesheet" href="{{ assets_url() }}css/sb-admin/sb-admin-2.min.css">
    <link rel="stylesheet" href="{{ assets_url() }}css/style.css">


</head>

<body id="page-top">

<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center" data-nav="brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-container container center-layout">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item">
                        <a class="navbar-brand d-flex justify-content-start align-items-center" href="{{ base_url('/') }}">
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

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>


<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>

@yield('scripts')

</body>
<html>

