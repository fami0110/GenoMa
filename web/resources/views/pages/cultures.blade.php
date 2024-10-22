@extends('layouts.main')

@section('content')
    <main class="main">

        @include('template.banner')

        <section>
            <div class="container">
                <!-- filter -->
                <div class="row justify-content-end">
                    <div class="col-lg-3">
                        <div class="input-group mb-3 mt-3 mt-lg-0" id="search">
                            <input type="text" class="form-control rounded-start-5" placeholder="{{ __('type-here') }}">
                            <button class="btn button-outline-primary rounded-end-5" type="button">
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

                            <?php $category_names = __('categories-cultures'); ?>

                            @foreach ($category_names as $i => $category)
                                <li data-filter="filter-{{ $i+1 }}">{{ $category }}</li>
                            @endforeach
                        </ul>

                        <div class="no-data-message"
                            style="display: none; text-align: center; font-size: 18px; color: #999; margin: 40px;">
                            Tidak Ada Data
                        </div>

                        <div class="row gy-4 isotope-container">

                            @foreach ($data as $item)
                                
                                <div class="col-lg-6 card-item isotope-item filter-{{ $item->category }}"">
                                    <div class="card shadow-sm border-0 mb-3 table-color">
                                        <div class="row g-0">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('storage/cultures/' . $item->cover) }}" 
                                                    class="card-cultures rounded-4 shadow-sm" alt="{{ $item->name }}" loading="lazy">
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-2 mt-lg-4">{{ $item->name }}</h5>
                                                    <p class="card-text">{{ substr(preg_replace('/<[^>]*>/i', '', $item->content), 0, 125) . "..." }}</p>
                                                    <a href="{{ url('/cultures/' . $item->id) }}" class="btn button-primary mt-3 text-start text-md-center">
                                                        {{ __('see-more') }}<i class="bi bi-arrow-right ms-1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <!-- Page Script -->
    <script src="{{ asset('assets/js/user/common.js') }}" defer></script>

    
@endsection
