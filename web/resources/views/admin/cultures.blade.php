@extends('layouts.main')

@section('content')
    <link href="{{ asset('assets/vendor/trix-editor/trix.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/vendor/trix-editor/trix.min.js') }}" defer></script>

    <main class="main">

        @include('template.banner')

        <section>
            <div class="container">
                <div class="card border-0 shadow p-3 mb-2 rounded-4 card-bg table-color">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <h4 class="text-secondary mx-2">Tabel Konten Budaya</h4>
                        </div>
                        <div class="text-end col-lg-6">
                            <button type="button" class="btn button-primary mx-2 add-btn" data-bs-toggle="modal" data-bs-target="#formModal">
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
                                        <th>Artikel</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $category_names = ['Agama', 'Adat Istiadat', 'Bahasa', 'Kesenian', 'Lainnya']; ?>

                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <span class="badge bg-primary text-white img-btn" data-id="{{ $item->id }}" style="cursor: pointer;"
                                                    data-bs-toggle="modal" data-bs-target="#imgModal">
                                                    Lihat
                                                </span>
                                            </td>
                                            <td>{{ $category_names[intval($item->category) - 1] }}</td>
                                            <td>
                                                <span class="badge bg-primary text-white content-btn" data-id="{{ $item->id }}" style="cursor: pointer;"
                                                    data-bs-toggle="modal" data-bs-target="#contentModal">
                                                    Lihat
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1 align-items-center">
                                                    <button class="btn btn-sm text-white rounded-3 color-secondary edit-btn" data-id="{{ $item->id }}"
                                                        data-bs-toggle="modal" data-bs-target="#formModal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <form action="{{ url('/admin/cultures/' . $item->id) }}" method="post">
                                                        @csrf @method("DELETE")
                                                        <button type="button" class="btn btn-danger btn-sm rounded-3 delete-btn">
                                                            <i class="bi bi-trash2-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Tambah -->
        <div class="modal modal-lg fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content table-color">
                    <form data-default-action="{{ url('/admin/cultures') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
    
                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" class="form-control mb-2" id="name" name="name" placeholder="Masukkan judul" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="cover" class="form-label">Gambar<small class="text-secondary"> (Include for Cover)</small>
                                        <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="cover" name="cover" required>
                                </div>
    
                                <div class="col-lg-4 mb-3">
                                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option selected disabled>Pilih...</option>
                                        <option value="1">Agama</option>
                                        <option value="2">Adat Istiadat</option>
                                        <option value="3">Bahasa</option>
                                        <option value="4">Kesenian</option>
                                        <option value="5">Lainnya</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label for="artikel" class="form-label">
                                    Tulis Artikel <span class="text-danger">*</span>
                                </label>
                                <input type="hidden" id="content" name="content" required>
                                <trix-editor input="content"></trix-editor>
                            </div>
    
                        </div>
    
                        <div class="modal-footer">
                            <button type="submit" class="btn button-primary">Kirim</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Modal Artikel -->
        <div class="modal modal-lg fade" id="contentModal" tabindex="-1" aria-labelledby="contentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content table-color">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contentModalLabel">Detail Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <!-- Modal Image -->
        <div class="modal fade" id="imgModal" tabindex="-1" aria-labelledby="imgModalLabel" aria-hidden="true" data-url-storage="{{ asset('storage/cultures') }}">
            <div class="modal-dialog">
                <div class="modal-content table-color">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imgModalLabel">Preview Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-block w-100 rounded-3 bg-loading overflow-hidden" style="height: 500px;">
                            <img class="object-fit-cover w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/sweet-alert/swal.min.js') }}" defer></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/vendor/DataTables/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables/datatables.min.js') }}"></script>

    <!-- Page Script -->
    <script src="{{ asset('assets/js/admin/cultures.js') }}"></script>
@endsection
