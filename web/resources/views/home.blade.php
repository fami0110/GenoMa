@extends('layouts.main')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="hero-bg">
                <div class="video-wrap">
                    <video preload="none" autoplay loop muted poster="{{ asset('assets/img/thumbnail.png') }}" class="custom-video">
                        <source src="{{ asset('assets/img/video.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <img src="{{ asset('assets/img/asset-light-hero.svg') }}" loading="lazy" alt="hero image" class="asset-hero-image"
                    draggable="false">
            </div>
            <div class="container text-center">
                <div class="d-flex flex-column align-items-center">
                    <div class="text-start" data-aos="fade-up" data-aos-delay="100">
                        <p>#<span class="typed" data-typed-items="Get to Know, GenoMa"></span><span
                                class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span
                                class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
                        <h1 data-aos="fade-up" data-aos-delay="200">MALANG</h1>
                    </div>
                    <a href="#about" class="btn-scroll" title="Scroll Down"><i class="bi bi-chevron-down"></i></a>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- about section  -->
        <section class="about" id="about">
            <div class="about-bg">
                <img src="{{ asset('assets/img/asset-light.svg') }}" loading="lazy" alt="asset" class="about-image">
                <img src="{{ asset('assets/img/asset-light-mobile.svg') }}" loading="lazy" alt="asset mobile" class="about-image-mobile">
            </div>
            <div class="about-content">
                <h2 data-aos="fade-up" data-aos-delay="100">{{ __('home-about-title') }}</h2>
                <p data-aos="fade-up" data-aos-delay="200">
                    {{ __('home-about-desc') }}
                </p>
            </div>
        </section>

        <!-- pariwisata section -->
        <section class="pariwisata">
            <div class="container text-center mb-5 title-landing" data-aos="fade-up">
                @if (session('locale') == 'id')
                    <h2 class="title">{{ __('home-tourism-title') }}</h2>
                    <h3 class="subtitle">MALANG</h3>
                @else
                    <h3 class="title">MALANG</h3>
                    <h2 class="subtitle">{{ __('home-tourism-title') }}</h2>
                @endif
            </div>

            <div class="container mb-0">
                <div class="row gy-4 isotope-container">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-lg-12 col-md-12 card-item isotope-item filter-culture">
                                <a href="{{ url('/tourism') }}">
                                    <div class="card text-white card-hover rounded-4 border-0" data-aos="fade-up"
                                        data-aos-delay="100">
                                        <img src="{{ asset('assets/img/pantai-watu-leter.webp') }}" loading="lazy"
                                            class="card-img-landing rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Pantai Watu Leter</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-6 col-md-6 card-item isotope-item filter-nature">
                                <a href="{{ url('/tourism') }}">
                                    <div class="card text-white card-hover rounded-4 border-0" data-aos="fade-up"
                                        data-aos-delay="200">
                                        <img src="{{ asset('assets/img/coban-pelangi.webp') }}"
                                            class="card-img-landing rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Coban Pelangi</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-6 col-md-6 card-item isotope-item filter-religious">
                                <a href="{{ url('/tourism') }}">
                                    <div class="card text-white card-hover rounded-4 border-0" data-aos="fade-up"
                                        data-aos-delay="300">
                                        <img src="{{ asset('assets/img/download.jpg') }}" loading="lazy"
                                            class="card-img-landing rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Kampung Warna Warni Jodipan</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 card-item isotope-item filter-culture">
                        <a href="{{ url('/tourism') }}">
                            <div class="card text-white card-hover rounded-4 border-0" data-aos="fade-up"
                                data-aos-delay="400">
                                <img src="{{ asset('assets/img/A beautiful street in Malang City.jpg') }}" loading="lazy"
                                    class="card-img-landing-2 rounded-4" alt="...">
                                <div class="card-img-overlay rounded-4">
                                    <h5 class="card-title">Alun-alun Kota Malang</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12 col-md-6 card-item isotope-item filter-nature">
                                <a href="{{ url('/tourism') }}">
                                    <div class="card text-white card-hover rounded-4 border-0" data-aos="fade-up"
                                        data-aos-delay="500">
                                        <img src="{{ asset('assets/img/East Java Tours with Bromo Photography, Ijen Blue Fire and Waterfall.jpg') }}" loading="lazy"
                                            class="card-img-landing rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Bromo</h5>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-12 col-md-6 card-item isotope-item filter-religious">
                                <a href="{{ url('/tourism') }}">
                                    <div class="card text-white card-hover rounded-4 border-0" data-aos="fade-up"
                                        data-aos-delay="600">
                                        <img src="{{ asset('assets/img/santera.webp') }}" class="card-img-landing rounded-4" loading="lazy"
                                            alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Florawisata Santerra De Laponte</h5>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 mt-5 row justify-content-center">
                        <div class="col-12 col-md-5">
                            <div class="d-grid">
                                <a href="{{ url('/culinary') }}" class="btn button-primary fs-5" data-aos="fade-up"
                                    data-aos-delay="200">{{ __('see-more') }} <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="image-text-container">
                <img src="{{ asset('assets/img/bromo-pariwisata.webp') }}" loading="lazy" draggable="false" alt="Bromo Pariwisata">
                <p class="text-white" data-aos="fade-up" data-aos-delay="200">
                    {{ __('home-tourism-desc') }}
                </p>
            </div>
        </section>

        <!-- kuliner section  -->
        <section class="kuliner">
            <div class="container text-center title-landing text-white" data-aos="fade-up">
                <h2 class="title">{{ __('home-culinary-title') }}</h2>
                <h3 class="subtitle">{{ __('home-culinary-subtitle') }} MALANG</h3>
            </div>

            <div class="container mb-md-5 mb-0 text-white">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-3 col-md-6 col-12 col-kuliner">
                        <div class="card card-kuliner rounded-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="image-container">
                                <img src="{{ asset('assets/img/1.webp') }}" loading="lazy" class="card-img-kuliner"
                                    alt="Nasi Goreng Mawut" draggable="false">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Nasi Goreng Mawut</h5>
                                <p class="card-text py-2">{{ __('home-culinary-desc-1') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 col-kuliner">
                        <div class="card card-kuliner rounded-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="image-container">
                                <img src="{{ asset('assets/img/2.webp') }}" loading="lazy" class="card-img-kuliner" alt="Bakso Malang"
                                    draggable="false">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Bakso Malang</h5>
                                <p class="card-text py-2">{{ __('home-culinary-desc-2') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 col-kuliner">
                        <div class="card card-kuliner rounded-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="image-container">
                                <img src="{{ asset('assets/img/3.webp') }}" loading="lazy" class="card-img-kuliner" alt="Angsle"
                                    draggable="false">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Angsle</h5>
                                <p class="card-text py-2">{{ __('home-culinary-desc-3') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 col-kuliner">
                        <div class="card card-kuliner rounded-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="400">
                            <div class="image-container">
                                <img src="{{ asset('assets/img/4.webp') }}" loading="lazy" class="card-img-kuliner" alt="Rawon Dengkul"
                                    draggable="false">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Rawon Dengkul</h5>
                                <p class="card-text py-2">{{ __('home-culinary-desc-4') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-grid mt-lg-5">
                            <a href="{{ url('/culinary') }}" class="btn button-blur mt-2" data-aos="fade-up"
                                data-aos-delay="200">{{ __('see-more') }} <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- budaya section -->
        <section id="budaya" class="budaya section">

            <div class="container text-start my-5 title-landing mt-3" data-aos="fade-up">
                @if (session('locale') == 'id')
                    <h2 class="title">{{ __('home-cultures-title') }}</h2>
                    <h3 class="subtitle">MALANG</h3>
                @else
                    <h3 class="title">MALANG</h3>
                    <h2 class="subtitle">{{ __('home-cultures-title') }}</h2>
                @endif
                <button class="btn button-primary">{{ __('see-more') }} <i class="bi bi bi-arrow-right"></i></button>
            </div>

            <div class="container-fluid mt-3">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                                },
                                "1200": {
                                "slidesPerView": 3,
                                "spaceBetween": 1
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                            style="background-image: url({{ asset('assets/img/budaya-topeng-malang.jpg') }})">
                            <h3>{{ __('home-cultures-1') }}</h3>
                            <p class="description">{{ __('home-cultures-1-desc') }}</p>
                        </div>

                        <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                            style="background-image: url({{ asset('assets/img/budaya-larung-sesaji.jpg') }})">
                            <h3>{{ __('home-cultures-2') }}</h3>
                            <p class="description">{{ __('home-cultures-2-desc') }}</p>
                        </div>

                        <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                            style="background-image: url({{ asset('assets/img/budaya-tari-topeng-malang.jpg') }})">
                            <h3>{{ __('home-cultures-3') }}</h3>
                            <p class="description">{{ __('home-cultures-3-desc') }}</p>
                        </div>

                        <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                            style="background-image: url({{ asset('assets/img/budaya-bantengan.jpg') }})">
                            <h3>{{ __('home-cultures-4') }}</h3>
                            <p class="description">{{ __('home-cultures-4-desc') }}</p>
                        </div>

                    </div>
                </div>

            </div>

        </section>

        <!-- macito section  -->
        <section id="macito" class="macito mt-3 mb-5">
            <div class="container">
                <div class="row justify-content-between align-items-center text-center text-lg-start g-5">
                    <div class="col-lg-4 text-lg-end mt-0" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('assets/img/macito.webp') }}" loading="lazy" alt="macito" draggable="false">
                    </div>
                    <div class="col-lg-8">
                        <div class="title-landing" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="subtitle">Macito</h3>
                        </div>
                        <p data-aos="fade-up" data-aos-delay="300">
                            {{ __('home-macito-desc') }}
                        </p>
                        <a href="https://macito.malangkota.go.id/Machito_phone" target="_blank"
                            class="btn button-primary mt-3 me-1" data-aos="fade-up" data-aos-delay="400">{{ __('home-macito-ride') }}</bi></a>
                        <a href="https://play.google.com/store/apps/details?id=com.kominfo.macito_mlg&hl=id"
                            target="_blank" class="btn button-outline-primary mt-3" data-aos="fade-up"
                            data-aos-delay="400">{{ __('home-macito-download') }}</bi></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- contact section -->
        <section id="kontak-landing" class="kontak-landing section dark-background">

            <img src="{{ asset('assets/img/kontak-background.jpg') }}" loading="lazy" alt="">

            <div class="container">

                <div class="row justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-9 text-center text-xl-start">
                        <h3>{{ __('home-recomendation-send') }}</h3>
                        <p class="fs-6">{{ __('home-recomendation-desc') }}</p>
                    </div>
                    <div class="col-xl-3 text-center">
                        <a href="{{ url('/contact') }}" class="btn btn-outline-light rounded-5 px-5" href="#">{{ __('home-recomendation-send') }}</a>
                    </div>
                </div>

            </div>

        </section>

        <!-- umkm section -->
        <section id="umkm" class="umkm section dark-background mt-4 mb-5">
            <div class="container text-start my-5 title-landing" data-aos="fade-up">
                <div class="row">
                    <div class="col">
                        <h3 class="subtitle">{{ __('home-msmes-title') }}</h3>
                    </div>
                    <div class="col text-end">
                        <a href="{{ url('/msmes') }}" class="btn button-primary">
                            {{ __('see-more') }} <i class="bi bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper rounded-4">

                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "centeredSlides": true,
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "navigation": {
                                "nextEl": ".swiper-button-next",
                                "prevEl": ".swiper-button-prev"
                            }
                        }
                    </script>

                    <div class="swiper-wrapper">

                        <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/umkm1.jpg') }}');">
                            <div class="content">
                                <h2><a href="{{ url('/msmes') }}">{{ __('home-msmes-1') }}</a></h2>
                                <p>{{ __('home-msmes-1-desc') }}</p>
                            </div>
                        </div>

                        <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/umkm2.jpg') }}');">
                            <div class="content">
                                <h2><a href="{{ url('/msmes') }}">{{ __('home-msmes-2') }}</a></h2>
                                <p>{{ __('home-msmes-2-desc') }}</p>
                            </div>
                        </div>

                        <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/umkm3.jpg') }}');">
                            <div class="content">
                                <h2><a href="{{ url('/msmes') }}">{{ __('home-msmes-3') }}</a></h2>
                                <p>{{ __('home-msmes-3-desc') }}</p>
                            </div>
                        </div>

                        <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/umkm4.jpg') }}');">
                            <div class="content">
                                <h2><a href="{{ url('/msmes') }}">{{ __('home-msmes-4') }}</a></h2>
                                <p>{{ __('home-msmes-4-desc') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section>

    </main>

    <!-- Vendor JS Files -->

    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}" defer></script>

    <script src="{{ asset('assets/js/user/home.js') }}" defer></script>
    
@endsection
