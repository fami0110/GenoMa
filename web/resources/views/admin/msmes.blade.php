@extends('layouts.main')

@section('content')
    <main class="main">

        @include('template.banner')

        <section>
            <div class="container">
                <div class="card border-0 shadow p-3 mb-2 rounded-4 card-bg table-color">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <h4 class="text-secondary mx-2">{{ __('table-content') }}</h4>
                        </div>
                        <div class="text-end col-lg-6">
                            <label for="import-json" class="btn button-primary" style="background-color: #ff8126;">
                                <input type="file" id="import-json" accept=".json" hidden>
                                Import JSON
                            </label>
                            <button type="button" class="btn button-primary mx-2 add-btn" data-bs-toggle="modal" data-bs-target="#formModal">
                                {{ __('add-data') }}
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
                                        <th>Alamat</th>
                                        <th>Recomended</th>
                                        <th class="text-center">Rating</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $category_names = ['Fashion', 'Oleh - oleh Makanan', 'Kriya', 'Lain - lain']; ?>

                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <span class="badge bg-primary text-white slider-btn" data-id="{{ $item->id }}" style="cursor: pointer;"
                                                    data-bs-toggle="modal" data-bs-target="#imgModal">
                                                    Lihat
                                                </span>
                                            </td>
                                            <td>{{ $category_names[intval($item->category) - 1] }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>
                                                @if ($item->is_recomended)
                                                    <span class="badge bg-success">Ya</span>
                                                @else
                                                    <span class="badge bg-secondary">Tidak</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{ number_format($item->rate, 1, ",", ".") }}
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1 align-items-center">
                                                    <button class="btn btn-sm text-white rounded-3 color-secondary edit-btn" data-id="{{ $item->id }}"
                                                        data-bs-toggle="modal" data-bs-target="#formModal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <form action="{{ url('/admin/msmes/' . $item->id) }}" method="post">
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
        <div class="modal modal-xl fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content table-color">

                    <form data-default-action="{{ url('/admin/msmes') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">
                                            Nama <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control mb-2" id="name" name="name" placeholder="Masukkan judul" required>
                                    </div>
    
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <label for="image-1" class="form-label">
                                                    Gambar 1 <small class="text-secondary">(Include for Cover)</small> <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                        </div>
                                        <input type="file" class="form-control" name="cover" id="cover" required>
                                    </div>
    
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <label for="image-1" class="form-label">Gambar Slider</label>
                                            </div>
                                        </div>
                                        <input multiple type="file" class="form-control" name="slider[]">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                        <select class="form-select" id="category" name="category" required>
                                            <option selected disabled>Pilih...</option>
                                            <option value="1">Fashion</option>
                                            <option value="2">Oleh - oleh Makanan</option>
                                            <option value="3">Kriya</option>
                                            <option value="4">Lain - lain</option>
                                        </select>
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi" required></textarea>
                                    </div>
    
                                </div>
    
                                <div class="col-12 col-md-12 col-lg-6">

                                    <div class="row">
                                        <div class="col-8">
                                            <label for="facility" class="form-label">Jadwal</label>
                                        </div>
                                        <div class="col-4 mb-2 d-flex justify-content-end">
                                            <span class="badge bg-danger d-flex justify-content-center align-items-center me-1" id="reset-schedule-btn" style="cursor: pointer;">
                                                <i class="bi bi-dash-circle"></i>
                                            </span>
                                            <span class="badge bg-success d-flex justify-content-center align-items-center" id="add-schedule-btn" style="cursor: pointer;">
                                                <i class="bi bi-plus-circle"></i>
                                            </span>
                                        </div>
                                    </div>
    
                                    <div id="schedules">
                                        <div class="row mb-3">
                                            <div class="col-2 pe-1">
                                                <button type="button" class="btn btn-danger delete-schedule-btn w-100">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </div>
                                            <div class="col-4 px-1">
                                                <select class="form-select day-input" name="day[]" required>
                                                    <option disabled>Pilih Hari</option>
                                                    <option value="mon">Senin</option>
                                                    <option value="tue">Selasa</option>
                                                    <option value="wed">Rabu</option>
                                                    <option value="thu">Kamis</option>
                                                    <option value="fri">Jumat</option>
                                                    <option value="sat">Sabtu</option>
                                                    <option value="sun">Minggu</option>
                                                </select>
                                            </div>
                                            <div class="col-3 px-1">
                                                <input type="time" class="form-control" name="time-start[]" value="09:00" required>
                                            </div>
                                            <div class="col-3 ps-1">
                                                <input type="time" class="form-control" name="time-end[]" value="17:00" required>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="contact" class="form-label">
                                                Kontak <span class="text-danger">*</span>
                                            </label>
                                            <input type="tel" class="form-control" id="contact" name="contact" placeholder="088899997666" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="address" class="form-label">Alamat <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Jl. Example" required>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="mb-3 col-12">
                                            <label for="link" class="form-label">Link Gmaps<span class="text-danger">*</span></label>
                                            <input type="url" class="form-control" id="link" name="link" placeholder="https://example.com" required>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="longitude" class="form-label">Longitude <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control decimal-input" id="longitude" name="longitude" placeholder="0" required>
                                        </div>
    
                                        <div class="mb-3 col-lg-6">
                                            <label for="latitude" class="form-label">Latitude <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control decimal-input" id="latitude" name="latitude" placeholder="0" required>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="price_min" class="form-label">Harga Minimum <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" class="form-control" id="price_min" name="price_min" placeholder="0" min="0" required>
                                            </div>
                                        </div>
    
                                        <div class="mb-3 col-lg-6">
                                            <label for="price_max" class="form-label">Harga Maximum <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" class="form-control" id="price_max" name="price_max" placeholder="0" min="0" required>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Recomended <span class="text-danger">*</span></label>
                                            <div class="card table-color px-3 py-2">
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="is_recomended" id="is_recomended">
                                                        <label class="form-check-label" for="is_recomended">
                                                            Ya
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="mb-3 col-6">
                                            <label for="rate" class="form-label">Rating <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control decimal-input" id="rate" name="rate" placeholder="0" required>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
    
                        <div class="modal-footer">
                            <button type="submit" class="btn button-primary">{{ __('send') }}</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Modal Image -->
        <div class="modal fade" id="imgModal" tabindex="-1" aria-labelledby="imgModalLabel" aria-hidden="true" data-url-storage="{{ asset('storage/msmes') }}">
            <div class="modal-dialog">
                <div class="modal-content table-color">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imgModalLabel">Preview Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="img-slider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators"></div>
                            <div class="carousel-inner rounded-3"></div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#img-slider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#img-slider" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/sweet-alert/swal.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/DataTables/jquery.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/DataTables/datatables.min.js') }}" defer></script>
    
    <!-- Page Script -->
    <script src="{{ asset('assets/js/admin/msmes.js') }}" defer></script>


@endsection
