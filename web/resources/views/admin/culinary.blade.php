@extends('layouts.main')

@section('content')
    <main class="main">

        @include('template.banner')

        <section>
            <div class="container">
                <div class="card border-0 shadow p-3 mb-2 rounded-4 card-bg table-color">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <h4 class="text-secondary mx-2">Tabel Konten Kuliner</h4>
                        </div>
                        <div class="text-end col-lg-6">
                            <button type="button" class="btn button-primary mx-2" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="container my-2 card table-color">
                        <div class="table-responsive p-3 table-scrollable">
                            <table id="datatables" class="table table-striped py-3" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Rekomendasi</th>
                                        <th>No. HP</th>
                                        <th>Alamat</th>
                                        <th>Link Gmaps</th>
                                        <th>Garis Bujur</th>
                                        <th>Garis Lintang</th>
                                        <th>Harga Min</th>
                                        <th>Harga Max</th>
                                        <th>Jadwal</th>
                                        <th>Penilaian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Gunung Bromo</td>
                                        <td>
                                            <a type="button" class="badge bg-primary text-white" data-bs-toggle="modal"
                                                data-bs-target="#imgModal">
                                                Lihat
                                            </a>
                                        </td>
                                        <td>Nature</td>
                                        <td>
                                            <a type="button" class="badge text-white color-secondary"
                                                data-bs-toggle="modal" data-bs-target="#textModal">
                                                Lihat
                                            </a>
                                        </td>

                                        <td><span class="badge bg-success">Ya</span></td>
                                        <td>089987665543</td>
                                        <td>Jl. Example</td>
                                        <td>https://example.com</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>
                                            <a type="button" class="badge bg-primary text-white" data-bs-toggle="modal"
                                                data-bs-target="#scheduleModal">
                                                Lihat
                                            </a>
                                        </td>
                                        <td>5</td>
                                        <td>
                                            <!-- Button Edit -->
                                            <button class="btn btn-sm mb-2 text-white rounded-3 color-secondary"
                                                data-bs-toggle="modal" data-bs-target="#addModal">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <!-- Button Delete -->
                                            <button id="deleteBtn" class="btn btn-danger btn-sm rounded-3">
                                                <i class="bi bi-trash2-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}" defer></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/vendor/DataTables/jquery.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/DataTables/datatables.min.js') }}" defer></script>

    
@endsection
