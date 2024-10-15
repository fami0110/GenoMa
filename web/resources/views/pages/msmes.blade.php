@extends('layouts.main')

@section('content')

    <main class="main">
        
        @include('template.banner')

        <section>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-9">
                        <div class="row">
                            <label class="col-form-label col-sm-4">Rentang Jarak dari Lokasi Anda:</label>
                            <div class="col-lg-3 col-8">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control rounded-start-5" placeholder="Masukkan Angka">
                                    <span class="input-group-text rounded-end-5">KM</span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-2">
                                <button class="btn button-primary">Kirim</button>
                            </div>
                        </div>
                    </div>
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
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-fashion">Fashion</li>
                            <li data-filter=".filter-culinary">Oleh - oleh Makanan</li>
                            <li data-filter=".filter-handi-craft">Kriya</li>
                            <li data-filter=".filter-others">Lain - lain</li>
                        </ul>

                        <div class="no-data-message"
                            style="display: none; text-align: center; font-size: 18px; color: #999; margin: 40px;">
                            Tidak Ada Data
                        </div>
                        <div class="row gy-4 isotope-container">

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-fashion">
                                <a href="msmes-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0 shadow">
                                        <img src="assets/img/Crane Embroidery Cardigan Kimono - Red _ L.jpg"
                                            class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Baju Keren</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-culinary">
                                <a href="msmes-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0 shadow">
                                        <span class="badge badge-top-left">
                                            <i class="bi bi-star-fill"></i>
                                            Recommended
                                        </span>
                                        <img src="assets/img/Hampers Lebaran Kue Kering Cantik dan Enak Ada di Sini.jpg"
                                            class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Kue Cantik</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-others">
                                <a href="msmes-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0 shadow">
                                        <img src="assets/img/I deserve pleasure in my life.jpg" class="card-img rounded-4"
                                            alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Candle</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-fashion">
                                <a href="msmes-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0 shadow">
                                        <img src="assets/img/model baju batik kerja wanita.jpg" class="card-img rounded-4"
                                            alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Batik Keren</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-fashion">
                                <a href="msmes-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0 shadow">
                                        <img src="assets/img/Crane Embroidery Cardigan Kimono - Red _ L.jpg"
                                            class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Baju Keren</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-culinary">
                                <a href="msmes-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0 shadow">
                                        <span class="badge badge-top-left">
                                            <i class="bi bi-star-fill"></i>
                                            Recommended
                                        </span>
                                        <img src="assets/img/download (1).jpg" class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Kue Enak</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-others">
                                <a href="msmes-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0 shadow">
                                        <img src="assets/img/I deserve pleasure in my life.jpg" class="card-img rounded-4"
                                            alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Candle</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-fashion">
                                <a href="msmes-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0 shadow">
                                        <img src="assets/img/model baju batik kerja wanita.jpg" class="card-img rounded-4"
                                            alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Batik Keren</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
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
