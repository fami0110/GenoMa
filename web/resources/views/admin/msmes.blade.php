@extends('layouts.main')

@section('content')
    <main class="main">

        @include('template.banner')

        <section>
            <div class="container">
                <div class="card border-0 shadow p-3 mb-2 rounded-4 card-bg table-color">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <h4 class="text-secondary mx-2">Tabel Konten UMKM</h4>
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
                                        <th>Kategori</th>
                                        <th>Rekomendasi</th>
                                        <th>Alamat</th>
                                        <th>Gambar</th>
                                        <th>Rating</th>
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

        <!-- Modal Tambah -->
        <div class="modal modal-xl fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content table-color">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Nama <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control mb-2" id="name"
                                        placeholder="Masukkan judul" required>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="image-1" class="form-label">Gambar 1<small class="text-secondary">
                                                    (Include for
                                                    Cover)</small> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-4 mb-2 d-flex justify-content-end">
                                        </div>
                                    </div>
                                    <input type="file" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="image-1" class="form-label">Gambar Slider</label>
                                        </div>
                                        <div class="col-4 mb-2 d-flex justify-content-end">
                                        </div>
                                    </div>
                                    <input multiple type="file" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="category" required>
                                        <option selected disabled>Pilih...</option>
                                        <option value="1">Fashion</option>
                                        <option value="2">Oleh - oleh Makanan</option>
                                        <option value="3">Kriya</option>
                                        <option value="4">Lain - lain</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" rows="3" placeholder="Masukkan deskripsi" required></textarea>
                                </div>

                            </div>
                            <div class="col-12 col-md-12 col-lg-6">

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="facility" class="form-label">Jadwal</label>
                                        </div>
                                        <div class="col-4 mb-2 d-flex justify-content-end">
                                            <span class="badge bg-success d-flex justify-content-center align-items-center"
                                                id="add-schedule-btn" style="cursor: pointer;">
                                                <i class="bi bi-plus-circle"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <input class="form-control" id="facility-1" rows="3"
                                                placeholder="Hari" required></input>
                                        </div>
                                        <div class="col-4">
                                            <input type="time" class="form-control" id="openTimeMonday"
                                                placeholder="09:00">
                                        </div>
                                        <div class="col-4">
                                            <input type="time" class="form-control" id="closeTimeMonday"
                                                placeholder="17:00">
                                        </div>
                                    </div>
                                </div>
                                <div class="additional-date-container"></div>


                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="phone" class="form-label">No. HP <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="phone"
                                            placeholder="088899997666" required>
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="address" class="form-label">Alamat <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="address"
                                            placeholder="Jl. Example" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label for="inputLink" class="form-label">Link Gmaps<span
                                                class="text-danger">*</span></label>
                                        <input type="url" class="form-control" id="inputLink"
                                            placeholder="https://example.com" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="longitude" class="form-label">Longitude <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="longitude" placeholder="0"
                                            required>
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="latitude" class="form-label">Latitude <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="latitude" placeholder="0"
                                            required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="priceMin" class="form-label">Harga Minimum <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control" id="priceMin" placeholder="0"
                                                required>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="priceMax" class="form-label">Harga Maximum <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control" id="priceMax" placeholder="0"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Rekomendasi <span class="text-danger">*</span></label>
                                        <div class="card table-color p-3">
                                            <div class="d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="recommendation"
                                                        id="checkboxYes2" value="Yes" required>
                                                    <label class="form-check-label" for="checkboxYes2">
                                                        Ya
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 col-6">
                                        <label for="rate" class="form-label">Rating <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="rate" placeholder="0"
                                            required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn button-primary">Kirim</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}" defer></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/vendor/DataTables/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#datatables').DataTable();
        });
    </script>


@endsection
