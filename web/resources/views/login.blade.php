<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>GenoMa - Login</title>

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
            background-color: rgba(255, 255, 255, 0.187);
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
                            <img src="{{ asset('assets/img/bromo.jpg') }}" class="img-sign-in rounded-4 shadow-sm"
                                alt="...">
                        </div>
                        <div class="col-lg-7 d-flex justify-content-center align-items-center">
                            <div class="card-body content-sign-in text-center">

                                <form action="{{ url('/admin/login') }}" method="POST">
                                    @csrf
                                    <img src="{{ asset('assets/img/LogoGenoma.svg') }}" alt="logo genoma">
                                    <h5 class="card-title mb-2 mt-lg-4"></h5>
                                    <div class="form-floating rounded-5 mb-3">
                                        <input type="email" name="email" id="email" class="form-control rounded-5 px-3"
                                            placeholder="example@email.com">
                                        <label class="px-3" for="email">Email address</label>
                                    </div>
                                    <div class="form-floating rounded-5 position-relative">
                                        <input type="password" name="password" id="password" class="form-control rounded-5 px-3"
                                            placeholder="Password">
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
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

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
