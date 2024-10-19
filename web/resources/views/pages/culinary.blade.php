@extends('layouts.main')

@section('content')

    <main class="main">

        @include('template.banner')

        <section>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-9">
                        <form action="{{ url('/culinary') }}" method="GET" id="neares-search">
                            <div class="row">
                                <input type="hidden" id="longitude" name="longitude">
                                <input type="hidden" id="latitude" name="latitude">
                                <label class="col-form-label col-sm-4" for="distance">{{ __('distance-desc') }}:</label>
                                <div class="col-lg-3 col-8">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control rounded-start-5" id="radius" name="radius" min="0" required
                                        @if ($radius) value="{{ $radius }}" @endif placeholder="{{ __('distance-enter') }}">
                                        <span class="input-group-text rounded-end-5">KM</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-2">
                                    <button type="submit" class="btn button-primary">{{ __('send') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group mb-3 mt-3 mt-lg-0">
                            <input type="text" class="form-control rounded-start-5" placeholder="{{ __('type-here') }}">
                            <button class="btn button-outline-primary rounded-end-5" type="button" id="button-addon2">
                                {{ __('search') }}
                            </button>
                        </div>
                    </div>
                </div>

                <hr class="mt-2 mb-4">


                <!-- card tourism -->
                <div class="container card-container">
                    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                        <ul class="card-filters isotope-filters">
                            <li data-filter="*" class="filter-active">All</li>

                            <?php $category_names = __('categories-culinary'); ?>

                            @foreach ($category_names as $i => $category)
                                <li data-filter="filter-{{ $i+1 }}">{{ $category }}</li>
                            @endforeach
                        </ul>

                        <div class="no-data-message" style="display: none; text-align: center; font-size: 18px; color: #999; margin: 40px;">
                            Tidak Ada Data
                        </div>

                        <div class="row gy-4 isotope-container">

                            @foreach ($data as $item)
                                
                                <div class="col-lg-3 col-md-6 card-item isotope-item filter-{{ $item->category }}">
                                    <a href="{{ url('/culinary/' . $item->id) }}">
                                        <div class="card mb-4 text-white card-hover rounded-4 border-0 shadow">
                                            @if ($item->is_recomended)
                                                <span class="badge badge-top-left"><i class="bi bi-star-fill"></i> Recommended</span>
                                            @endif

                                            @if (isset($item->distance))
                                                <span class="badge bg-info badge-top-right fw-bold">{{ number_format($item->distance, 2, ',', '.') }} KM</span>
                                            @endif

                                            <img src="{{ asset('storage/culinary/' . json_decode($item->photos)[0]) }}" 
                                                class="card-img rounded-4" alt="{{ $item->name }}" loading="lazy">
                                            <div class="card-img-overlay rounded-4">
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                <p class="card-text">{{ __('see-more') }} <i class="bi bi-arrow-right"></i></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <nav>
                        <ul class="pagination justify-content-center"></ul>
                    </nav>
                </div>

            </div>
        </section>

    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}" defer></script>

    <!-- Page Script -->
    <script src="{{ asset('assets/js/user/common.js') }}" defer></script>
    
@endsection
