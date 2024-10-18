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
                                        <img src="{{ asset('storage/culinary/'. $images[0]) }}" class="d-block w-100 object-fit-cover" 
                                            style="height: 400px;" alt="Image 1" loading="lazy">
                                    </div>

                                    @for ($i = 1; $i < count($images); $i++)
                                        <div class="carousel-item">
                                            <img src="{{ asset('storage/culinary/'. $images[$i]) }}" class="d-block w-100 object-fit-cover" 
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
                                    
                                    <?php $category_names = __('categories-msmes'); ?>

                                    <p><span class="badge text-bg-primary text-uppercase me-2">#{{ $category_names[intval($data->category)-1] }}</span></p>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-7 order-2 order-lg-1">
                                        
                                        <h5>{{ __('detail-schedules') }}</h5>

                                        <div class="accordion accordion-flush" id="shedules">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    @php
                                                        $schedules = json_decode($data->schedules, true);
                                                        
                                                        $currentDay = strtolower(date('D'));
                                                        $schedule = $schedules[$currentDay] ?? null; 
                                                        $currentTime = date('H:i');

                                                        $isOpen = false;
                                                        $nextOpenTime = null;

                                                        if ($schedule) {
                                                            if ($currentTime >= $schedule['time-start'] && $currentTime <= $schedule['time-end']) {
                                                                $isOpen = true;
                                                            } else {
                                                                $nextOpenTime = $schedule['time-start'];
                                                            }
                                                        }
                                                    @endphp
                                                    <button class="accordion-button collapsed table-color mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        <i class="bi bi-clock"></i>
                                                        @if ($schedule)
                                                            @if($isOpen)
                                                                <span class="border-start text-success px-3 mx-2">{{ __('detail-open') }}</span>
                                                            @else
                                                                <span class="border-start text-danger px-3 mx-2">{{ __('detail-closed') }}</span>
                                                                @if($nextOpenTime) <span class="border-start px-3 mx-2">{{ __('detail-openat') }} {{ $nextOpenTime }}</span> @endif
                                                            @endif
                                                        @else
                                                            <span class="border-start text-danger px-3 mx-2">{{ __('detail-closed') }}</span>
                                                        @endif
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#shedules">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <?php $days = [
                                                                'sun' => __('day-sun'),
                                                                'mon' => __('day-mon'),
                                                                'tue' => __('day-tue'),
                                                                'wed' => __('day-wed'),
                                                                'thu' => __('day-thu'),
                                                                'fri' => __('day-fri'),
                                                                'sat' => __('day-sat'),
                                                            ]; ?>

                                                            @foreach ($schedules as $day => $schedule)
                                                                <tr>
                                                                    <td class="table-color py-0">{{ $days[$day] }}</td>
                                                                    <td class="table-color py-0 text-start" style="width: 20%;">{{ $schedule['time-start'] }}</td>
                                                                    <td class="table-color py-0 text-center">-</td>
                                                                    <td class="table-color py-0 text-end" style="width: 20%;">{{ $schedule['time-end'] }}</td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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

                                <div class="row mb-3">
                                    <div class="d-grid">
                                        <a class="btn button-primary mb-3" href="{{ $data->link }}" target="_blank">{{ __('detail-maps') }}</a>
                                        <button class="btn button-outline-primary py-2 fs-6 copy-btn" data-copy="{{ $data->contact }}">
                                            {{ __('detail-contact') }}<i class="bi bi-telephone-outbound ms-3"></i>
                                        </button>
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