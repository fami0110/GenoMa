<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @php
        $segments = request()->segments();

        $prefix = '';
        if (in_array('admin', $segments)) {
            $prefix = __('manage') . ' ';
        } elseif (count($segments) == 2) {
            $prefix = 'Detail ';
        }
    @endphp
    <title>GenoMa - {{ $prefix . __("title-$current_page") }}</title>

    <meta name="description" content="Get to Know Malang: Explore Malang City with GenoMa. Discover its rich culture, breathtaking tourism destinations, local traditions, and much more." />
    <meta name="keywords" content="Malang, Malang City, Kota Malang, budaya, pariwisata, UMKM, kuliner, " />
    <meta name="author" content="GenoMa's Team">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/icon-logo.svg') }}" rel="icon">
    <link href="{{ asset('assets/img/icon-logo.svg') }}" rel="apple-touch-icon">
    
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/DataTables/datatables.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

</head>

<body>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('assets/img/Logo.svg') }}" alt="Genoma Logo">
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
                            'title-contact' => '/contact',
                        ];
                    @endphp

                    @foreach ($routes as $key => $route)
                        <li>
                            <a href="{{ url($route) }}" <?= "title-$current_page"==$key && !in_array('admin',
                                $segments) ? 'class="active"' : '' ?>>
                                {{ __($key) }}
                            </a>
                        </li>
                    @endforeach

                    <li class="dropdown">
                        <a href="#">
                            <span>
                                <img src="{{ asset('assets/img/' . session('locale', 'id') . '.jpeg') }}" class="me-2" style="height: 20px;" alt="Current flag">
                                {{ strtoupper(session('locale', 'id')) }}
                            </span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul class="dropdown-menu-mobile">
                            <li>
                                <a href="{{ url('/locale/id') }}"><img src="{{ asset('assets/img/id.jpeg') }}"
                                    style="height: 20px;" alt="ID flag">ID</a>
                            </li>
                            <li>
                                <a href="{{ url('/locale/en') }}"><img src="{{ asset('assets/img/en.jpeg') }}"
                                    style="height: 20px;" alt="EN flag">EN</a>
                            </li>
                        </ul>
                    </li>

                    @if (auth()->check())
                        <li class="dropdown ms-0">
                            <a href="#">
                                <span>Menu Admin</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                @foreach ($routes as $key => $route)
                                    <?php if (in_array($route, ['/', '/contact'])) continue; ?>
                                    <li><a href="{{ url("/admin$route") }}">{{ __('manage') . ' ' . __($key) }}</a></li>
                                @endforeach
                                <li class="border-top"><a href="{{ url('/logout') }}">Keluar</a></li>
                            </ul>
                        </li>
                    @endif

                </ul>
                <div class="mode-toggle ms-4 mt-2">
                    <a id="mode-toggle" onclick="toggleMode()">
                        <i class="bi bi-brightness-high mode-toggle-icon" style="font-size: large; font-weight: bold; margin: 0;"
                            id="theme-icon"></i>
                    </a>
                </div>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    @include('template.flasher')
