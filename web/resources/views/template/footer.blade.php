<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
        <div class="row">
            <div class="col-lg-2 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="{{ asset('assets/img/LogoGenoma.svg') }}" alt="logo" draggable="false">
                </a>
            </div>
            <div class="col-lg-8 col-md-9 footer-about order-md-2">
                <p class="fs-6 deafult-font fw-light">{{ __('footer-1') }}</p>
                <p class="fs-6 deafult-font fw-light">{{ __('footer-2') }}</p>
            </div>
            <div class="col-lg-2 col-md-3 footer-links order-md-1">
                <h4>{{ __('footer-link') }}</h4>
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
                            <a href="{{ url($route) }}">{{ __($key) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    <div class="container copyright text-start mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">GenoMa</strong><span>All Right Reserved</span></p>
        <div class="credits">
            Design by<span> Tim GenoMa</span>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}" defer></script>


</body>

</html>
