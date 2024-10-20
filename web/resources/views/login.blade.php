<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="robots" content="noindex">
    <title>GenoMa - Login</title>

    <meta name="description" content="Get to Know Malang: {{ __('meta-description') }}" />
    <meta property="og:image" content="{{ asset('assets/img/thumbnail.jpg') }}">
    <meta name="keywords" content="Malang, Malang City, Kota Malang, budaya, pariwisata, UMKM, kuliner, Indonesia, Jawa Timur " />
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

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        body {
            background-image: linear-gradient(135deg, rgba(0, 0, 255, 0.168), rgba(255, 255, 255, 0.5), rgba(174, 0, 255, 0.194));
        }

        .center-vertically-horizontally {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card-sign-in {
            background-color: rgba(9, 43, 112, 0.2);
            backdrop-filter: blur(40px);
            border: 1px solid rgba(75, 75, 75, 0.3);
        }

        .img-sign-in {
            height: 30rem;
            object-fit: cover;
            width: 100%;
        }

        .content-sign-in img {
            max-height: 80px;
        }

        .form-floating.position-relative i {
            font-size: 1.2rem;
            color: rgba(0, 0, 0, 0.5);
        }

        .form-control {
            background-color: #ffff;
            border: 1px solid #ffff;
            transition: all 0.3s ease;
        }

        label::after {
            background-color: transparent !important;
            font-weight: bold !important;
        }
    </style>

</head>

<body>

    <main class="main">

        @include('template.flasher')

        <div class="center-vertically-horizontally">
            <div class="col-10 col-md-6">
                <div class="card card-sign-in shadow-sm border-0 mb-3 rounded-4">
                    <div class="row g-0">
                        <div class="col-lg-5">
                            <img src="{{ asset('assets/img/East Java Tours with Bromo Photography, Ijen Blue Fire and Waterfall.jpg') }}"
                                class="img-sign-in rounded-4 shadow-sm" alt="...">
                        </div>
                        <div class="col-lg-7 d-flex justify-content-center align-items-center">
                            <div class="card-body content-sign-in text-center">
                                <form action="{{ url('/login') }}" method="POST">
                                    @csrf
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('assets/img/LogoGenoma2.svg') }}" alt="logo genoma">
                                    </a>
                                    <h5 class="card-title mb-2 mt-lg-4"></h5>
                                    <div class="form-floating rounded-5 mb-3">
                                        <input type="email" name="email" id="email" class="form-control rounded-5 px-3"
                                            placeholder="example@email.com" required>
                                        <label class="px-3" for="email">Email address</label>
                                    </div>
                                    <div class="form-floating rounded-5 position-relative">
                                        <input type="password" name="password" id="password" class="form-control rounded-5 px-3"
                                            placeholder="password" required>
                                        <label class="px-3" for="password">Password</label>
                                        <i class="bi bi-eye position-absolute" id="togglePassword"
                                            style="right: 20px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn button-primary mt-3">
                                            Masuk<i class="bi bi-arrow-right ms-1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

    <script>
        function setMode(mode) {
            const setVar = (varName, value) => {document.documentElement.style.setProperty(varName, value)};
            // dark mode
            if (mode === 'dark') {    
                setVar('--background-color', '#1e1e1e');
                setVar('--default-color', '#ffffff');
                setVar('--heading-color', '#ffffff');
                setVar('--surface-color', '#252525');
                setVar('--filter-color', '#ffff');
                setVar('--filter-hover-color', '#1e1e1e');
                setVar('--nav-color', '#ffff');
                setVar('--nav-hover-color', '#c1ceea');
                setVar('--nav-mobile-background-color', '#1E1E1E');
                setVar('--nav-dropdown-background-color', '#252525');
                setVar('--nav-dropdown-color', '#ffffff');
                setVar('--nav-dropdown-hover-color', '#c1ceea');
                setVar('--nav-mobile-text-color', '#000000b5');
                setVar('--background-transparent-color', '#000000ab');
                setVar('--title-color', '#4870B7');
                setVar('--nav-shadow', '#ffffff1c');
                setVar('--table-bg-color', '#2b2b2b');
                setVar('--table-text-color', '#eeeeee');
                setVar('--thead-bg-color', '#272626');
                setVar('--thead-text-color', '#eeeeee');

                // dark asset
                const aboutImage = document.querySelector('.about-image');
                if (aboutImage)
                aboutImage.src = 'assets/img/asset-dark.svg';

                const aboutImageMobile = document.querySelector('.about-image-mobile');
                if (aboutImageMobile)
                aboutImageMobile.src = 'assets/img/asset-dark-mobile.svg';

                const assetHeroImage = document.querySelector('.asset-hero-image');
                if (assetHeroImage)
                assetHeroImage.src = 'assets/img/asset-dark-hero.svg';

            } else {
                // light mode
                setVar('--background-color', '#f8fafc');
                setVar('--default-color', '#3d4348');
                setVar('--heading-color', '#3e5055');
                setVar('--surface-color', '#ffffff');
                setVar('--filter-color', '#02287A');
                setVar('--filter-hover-color', '#f8fafc');
                setVar('--nav-color', '#000000');
                setVar('--nav-hover-color', '#02287A');
                setVar('--nav-mobile-background-color', '#ffffff');
                setVar('--nav-dropdown-background-color', '#ffffff');
                setVar('--nav-dropdown-color', '#313336');
                setVar('--nav-dropdown-hover-color', '#02287A');
                setVar('--nav-mobile-text-color', '#ffffffb5');
                setVar('--background-transparent-color', '#a7bfd7da ');
                setVar('--title-color', '#02287A');
                setVar('--nav-shadow', '#0000001a');
                setVar('--table-bg-color', '#ffffff');
                setVar('--table-text-color', '#000000');
                setVar('--thead-bg-color', '#f8f9fa');
                setVar('--thead-text-color', '#000000');

                // light asset
                const aboutImage = document.querySelector('.about-image');
                if (aboutImage)
                aboutImage.src = 'assets/img/asset-light.svg';

                const aboutImageMobile = document.querySelector('.about-image-mobile');
                if (aboutImageMobile)
                aboutImageMobile.src = 'assets/img/asset-light-mobile.svg';

                const assetHeroImage = document.querySelector('.asset-hero-image');
                if (assetHeroImage)
                assetHeroImage.src = 'assets/img/asset-light-hero.svg';
            }

            localStorage.setItem('themeMode', mode);
        }
        
        window.addEventListener('DOMContentLoaded', function() {
            const savedMode = localStorage.getItem('themeMode') || 'light';
            setMode(savedMode);
        });
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle the eye icon
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>

</body>

</html>
