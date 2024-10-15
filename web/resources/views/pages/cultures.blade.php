@extends('layouts.main')

@section('content')
    <main class="main">

        @include('template.banner')

        <section>
            <div class="container">
                <!-- filter -->
                <div class="row justify-content-end">
                    <div class="col-lg-3">
                        <div class="input-group mb-3 mt-3 mt-lg-0">
                            <input type="text" class="form-control rounded-start-5" placeholder="Ketik di sini..."
                                aria-label="Ketik di sini..." aria-describedby="button-addon2">
                            <button class="btn button-outline-primary rounded-end-5" type="button"
                                id="button-addon2">Cari</button>
                        </div>
                    </div>
                </div>

                <hr class="mt-2 mb-4">


                <!-- card tourism -->
                <div class="container card-container">

                    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                        <ul class="card-filters isotope-filters">
                            <li data-filter="*" class="filter-active">Semua</li>
                            <li data-filter=".filter-agama">Agama</li>
                            <li data-filter=".filter-adat-istiadat">Adat Istiadat</li>
                            <li data-filter=".filter-bahasa">Bahasa</li>
                            <li data-filter=".filter-kesenian">Kesenian</li>
                            <li data-filter=".filter-lainnya">Lainnya</li>
                        </ul>

                        <div class="no-data-message"
                            style="display: none; text-align: center; font-size: 18px; color: #999; margin: 40px;">
                            Tidak Ada Data
                        </div>
                        <div class="row gy-4 isotope-container">
                            <div class="col-lg-6 card-item isotope-item filter-agama">
                                <div class="card shadow-sm border-0 mb-3 table-color">
                                    <div class="row g-0">
                                        <div class="col-lg-5">
                                            <img src="assets/img/A beautiful street in Malang City.jpg"
                                                class="card-cultures rounded-4 shadow-sm" alt="...">
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="card-body">
                                                <h5 class="card-title mb-2 mt-lg-4">Card title</h5>
                                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur. Explicabo fuga
                                                    enim in, maxime
                                                    debitis libero, nobis saepe ratione exercitationem...</p>
                                                <a href="cultures-description.html"
                                                    class="btn button-primary mt-3 text-start text-md-center">Baca
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 card-item isotope-item filter-adat-istiadat">
                                <div class="card shadow-sm border-0 mb-3 table-color">
                                    <div class="row g-0">
                                        <div class="col-lg-5">
                                            <img src="assets/img/A beautiful street in Malang City.jpg"
                                                class="card-cultures rounded-4 shadow-sm" alt="...">
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="card-body">
                                                <h5 class="card-title mb-2 mt-lg-4">Card title</h5>
                                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur. Explicabo fuga
                                                    enim in, maxime
                                                    debitis libero, nobis saepe ratione exercitationem...</p>
                                                <a href="cultures-description.html"
                                                    class="btn button-primary mt-3 text-start text-md-center">Baca
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 card-item isotope-item filter-bahasa">
                                <div class="card shadow-sm border-0 mb-3 table-color">
                                    <div class="row g-0">
                                        <div class="col-lg-5">
                                            <img src="assets/img/A beautiful street in Malang City.jpg"
                                                class="card-cultures rounded-4 shadow-sm" alt="...">
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="card-body">
                                                <h5 class="card-title mb-2 mt-lg-4">Card title</h5>
                                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur. Explicabo fuga
                                                    enim in, maxime
                                                    debitis libero, nobis saepe ratione exercitationem...</p>
                                                <a href="cultures-description.html"
                                                    class="btn button-primary mt-3 text-start text-md-center">Baca
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 card-item isotope-item filter-kesenian">
                                <div class="card shadow-sm border-0 mb-3 table-color">
                                    <div class="row g-0">
                                        <div class="col-lg-5">
                                            <img src="assets/img/A beautiful street in Malang City.jpg"
                                                class="card-cultures rounded-4 shadow-sm" alt="...">
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="card-body">
                                                <h5 class="card-title mb-2 mt-lg-4">Card title</h5>
                                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur. Explicabo fuga
                                                    enim in, maxime
                                                    debitis libero, nobis saepe ratione exercitationem...</p>
                                                <a href="cultures-description.html"
                                                    class="btn button-primary mt-3 text-start text-md-center">Baca
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row mt-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">2</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
        
    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}" defer></script>

    
@endsection
