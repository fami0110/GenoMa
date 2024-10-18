@extends('layouts.main')

@section('content')

    <main class="main">
        @include('template.banner')

        <section class="kontak-content">
            <div class="container">
                <div class="row g-5 justify-content-center align-items-center">
                    <div class="col-xl-4">
                        <img src="assets/img/asset-kontak.svg" alt="" class="m-auto">
                    </div>
                    <div class="col-xl-7 col-md-12">
                        <div class="title-landing">
                            <h3 class="fs-2 primary-text-color">{{ __('contact-send') ." ". __('contact-suggest') }}</h3>
                            <p>{{ __('contact-desc') }}</p>
                        </div>
                        <div class="card rounded-4 card-kontak shadow py-2">
                            <div class="card-body">
                                <form action="{{ url('/contact') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="email-pengirim" class="form-label">Email</label>
                                        <input type="email" class="form-control rounded-5" id="email-pengirim" name="email" placeholder="{{ __('contact-enter') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="message" class="form-label">{{ __('contact-suggest') }}</label>
                                        <textarea class="form-control rounded-4" id="message" name="message" rows="5"></textarea>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn button-primary">{{ __('send') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
