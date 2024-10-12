<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>GenoMa - {{ __("title-$current_page") }}</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="Frontend by GenoMa's Team" />
    <meta name="keywords" content="">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="starter-page-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('assets/img/Logo.svg') }}" alt="">
                <h1 class="sitename"></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    @php
                        $routes = [
                            'title-home' => '/',
                            'title-tourism' => '/tourism',
                            'title-msmes' => '/msmes',
                            'title-cultures' => '/cultures',
                            'title-culinary' => '/culinary',
                        ];
                    @endphp

                    @foreach ($routes as $key => $route)
                        <li>
                            <a href="{{ url($route) }}" <?= ("title-$current_page" == $key) ? 'class="active"' : '' ?>>
                                {{ __($key) }}
                            </a>
                        </li>
                    @endforeach

                    <li class="dropdown">
                        <a>
                            <span>
                                <img src="{{ asset("assets/img/". session('locale', 'id') .".jpeg") }}" class="me-2" style="height: 20px;">
                                {{ strtoupper(session('locale', 'id')) }}
                            </span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul class="dropdown-menu-mobile">
                            <li>
                                <a href="{{ url('/locale/id') }}"><img src="{{ asset('assets/img/id.jpeg') }}" style="height: 20px;">ID</a>
                            </li>
                            <li>
                                <a href="{{ url('/locale/en') }}"><img src="{{ asset('assets/img/en.jpeg') }}" style="height: 20px;">EN</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>
