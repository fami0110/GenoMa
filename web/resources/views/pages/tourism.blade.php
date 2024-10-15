@extends('layouts.main')

@section('content')
    <main class="main">

        @include('template.banner')

        <section>
            <div class="container">
                <!-- filter -->
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
                            <li data-filter=".filter-culture">Budaya</li>
                            <li data-filter=".filter-nature">Alam</li>
                            <li data-filter=".filter-religious">Religi</li>
                            <li data-filter=".filter-recreation">Rekreasi</li>
                            <li data-filter=".filter-history">Sejarah</li>
                            <li data-filter=".filter-adventur">Petualangan</li>
                            <li data-filter=".filter-sport">Olahraga</li>
                            <li data-filter=".filter-city">Kota</li>
                        </ul>

                        <div class="no-data-message"
                            style="display: none; text-align: center; font-size: 18px; color: #999; margin: 40px;">
                            Tidak Ada Data
                        </div>
                        <div class="row gy-4 isotope-container">

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-culture">
                                <a href="tourism-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0">
                                        <img src="assets/img/A beautiful street in Malang City.jpg"
                                            class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Alun-alun Kota Malang</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-nature">
                                <a href="tourism-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0">
                                        <span class="badge badge-top-left">
                                            <i class="bi bi-star-fill"></i>
                                            Recommended
                                        </span>
                                        <img src="assets/img/East Java Tours with Bromo Photography, Ijen Blue Fire and Waterfall.jpg"
                                            class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Bromo</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-religious">
                                <a href="tourism-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0">
                                        <img src="assets/img/download.jpg" class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Kampung Warna Warni Jodipan</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-culture">
                                <a href="tourism-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0">
                                        <img src="assets/img/wanna go back.jpg" class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Jatim Park</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-culture">
                                <a href="tourism-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0">
                                        <img src="assets/img/A beautiful street in Malang City.jpg"
                                            class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Alun-alun Kota Malang</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-nature">
                                <a href="tourism-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0">
                                        <span class="badge badge-top-left">
                                            <i class="bi bi-star-fill"></i>
                                            Recommended
                                        </span>
                                        <img src="assets/img/East Java Tours with Bromo Photography, Ijen Blue Fire and Waterfall.jpg"
                                            class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Bromo</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-religious">
                                <a href="tourism-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0">
                                        <img src="assets/img/download.jpg" class="card-img rounded-4" alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Kampung Warna Warni Jodipan</h5>
                                            <p class="card-text">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-6 card-item isotope-item filter-culture">
                                <a href="tourism-description.html">
                                    <div class="card mb-4 text-white card-hover rounded-4 border-0">
                                        <img src="assets/img/wanna go back.jpg" class="card-img rounded-4"
                                            alt="...">
                                        <div class="card-img-overlay rounded-4">
                                            <h5 class="card-title">Jatim Park</h5>
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
