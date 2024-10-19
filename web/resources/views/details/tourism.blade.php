@extends('layouts.main')

@section('content')
    <main class="main">

        @include('template.banner')
        
        <section>
            <div class="container">
                <div class="row g-5 mb-5">
                    <div class="col-lg-6">
                        <div class="position-sticky" style="top: 6rem;">
                            <h3 class="mb-4 mt-0 pt-0">{{ $data->name }}</h3>

                            <?php $images =  json_decode($data->photos, true); ?>

                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>

                                    @for ($i = 1; $i < count($images); $i++)
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}"></button>
                                    @endfor
                                </div>
                                <div class="carousel-inner rounded-3">

                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/tourism/'. $images[0]) }}" class="d-block w-100 object-fit-cover" 
                                            style="height: 400px;" alt="Image 1" loading="lazy">
                                    </div>

                                    @for ($i = 1; $i < count($images); $i++)
                                        <div class="carousel-item">
                                            <img src="{{ asset('storage/tourism/'. $images[$i]) }}" class="d-block w-100 object-fit-cover" 
                                                style="height: 400px;" alt="Image {{ $i+1 }}" loading="lazy">
                                        </div>
                                    @endfor
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                            <div class="row mt-5">
                                <p>{{ $data->description }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card border-0 shadow p-3 rounded-4 table-color">
                            <div class="card-body">
                                <div class="d-flex">
                                    @if ($data->is_recomended)
                                        <p><span class="badge text-bg-primary text-uppercase me-2">#RECOMENDED</span></p>
                                    @endif
                                    
                                    <?php $category_names = __('categories-tourism'); ?>

                                    <p><span class="badge text-bg-primary text-uppercase me-2">#{{ $category_names[intval($data->category)-1] }}</span></p>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-7 order-2 order-lg-1">

                                        <h5>{{ __('detail-facilities') }}</h5>

                                        <div class="col-12">
                                            <ol class="list-group list-group-numbered mb-3">

                                                <?php $facilities = json_decode($data->facilities, true); ?>
                                                
                                                @foreach ($facilities as $facility)
                                                    <li class="list-group-item table-color">{{ $facility }}</li>
                                                @endforeach

                                            </ol>
                                        </div>
                        
                                    </div>

                                    <div class="col-lg-5 order-1 order-lg-2">

                                        <h5>Rating</h5>

                                        <div class="d-flex">
                                            <p class="fs-2 me-2 star-rating ">{{ $data->rate }}</p>
                                            <div class="d-flex star-rating mt-2">
                                                <?php  $tmp = $data->rate; ?>
                                                @for ($i = ceil($data->rate); $i > 0; $i--)
                                                    @if ($tmp >= 1)
                                                        <i class="bi bi-star-fill"></i>
                                                    @elseif ($tmp >= 0.5)                                                
                                                        <i class="bi bi-star-half"></i>
                                                    @else
                                                        <i class="bi bi-star"></i>
                                                    @endif
                                                    <?php $tmp--; ?>
                                                @endfor
                                                @for ($i = 0; $i < floor(5 - $data->rate); $i++)
                                                    <i class="bi bi-star"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <h5>{{ __('detail-prices') }}</h5>
                                    <p>
                                        <i class="bi bi-ticket-perforated fs-4 primary-text-color border-end pe-3 me-3"></i>
                                        @if ($data->price_min != 0 && $data->price_max != 0)
                                            <span>Rp {{ number_format($data->price_min, 0, '.', '.') }} <span class="mx-2">-</span> {{ number_format($data->price_max, 0, '.', '.') }}</span>
                                        @else
                                            <span>{{ __('detail-free') }}</span>
                                        @endif
                                    </p>
                                </div>

                                <div class="row mb-3">
                                    <h5>{{ __('detail-address') }}</h5>
                                    <p>
                                        <i class="bi bi-map fs-5 border-end pe-3 me-3 primary-text-color"></i>
                                        {{ $data->address }}
                                    </p>
                                </div>

                                <div class="row mb-5">
                                    <div id="map" 
                                        data-longitude="{{ $data->longitude }}" 
                                        data-latitude="{{ $data->latitude }}"
                                        data-title="{{ $data->name }}"
                                    ></div>
                                </div>

                                <div class="row">
                                    <div class="d-grid">
                                        <a class="btn button-primary" href="{{ $data->link }}" target="_blank">
                                            {{ __('detail-maps') }}
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <hr>
            </div>
        </section>

    </main>

    <!-- Vendor JS Files -->
    <link href="{{ asset('assets/vendor/leaflet/leaflet.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/vendor/leaflet/leaflet.js') }}" defer></script>

    <!-- Page Script -->
    <script src="{{ asset('assets/js/user/detail.js') }}" defer></script>


@endsection
