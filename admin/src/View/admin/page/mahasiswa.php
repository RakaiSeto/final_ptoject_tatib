<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/public/css/style-css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables with Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
    /* Custom Scrollbar Style */
    .dataTables_scrollBody {
        overflow-x: auto;
    }

    .dataTables_scrollBody::-webkit-scrollbar {
        height: 12px;
    }

    .dataTables_scrollBody::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .dataTables_scrollBody::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 6px;
    }

    .dataTables_scrollBody::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .dataTables_wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        margin-top: 10px;

    }

    #myTable {
        width: 100% !important;
    }
    </style>

</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>

        <!--Content -->
        <div class="content px-3 pt-3 " style="margin-top: 56px;">
            <div class="text-center position-fixed d-none justify-content-center align-items-center top-50 start-50 translate-middle bg-white bg-opacity-50 w-100 h-100"
                id="loading-spinner" style="z-index: 999; display: none;">
                <img src="/public/img/spinner-svg" alt="Loading..." class="mx-auto d-block"
                    style="width: 15%; height: 15%;">
            </div>
            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <div class="text-start mb-2">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="fas fa-plus"></i>
                    Tambah Mahasiswa
                </button>
            </div>

            <div class="bg-white">
                <!-- Button Tambah Mahasiswa -->
                <div class="filter-bar w-100 rounded align-items-center gap-2 mb-3 mt-1">
                    <h5 class="ms-2 mt-1">Filter</h5>
                    <hr class="my-2">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="d-flex flex-column">
                                <label for="prodi" class="form-label ps-2">Kelas</label>
                                <select id="kelas" class="form-select w-100"
                                    style="box-sizing: border-box; max-width: 100%;">
                                    <option value="" selected>Pilih Kelas</option>
                                    <?php foreach ($kelasList as $k) : ?>
                                    <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex flex-column">
                                <label for="prodi" class="form-label ps-2">Kategori</label>
                                <select id="kategori" class="form-select w-100"
                                    style="box-sizing: border-box; max-width: 100%;">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="nim">NIM</option>
                                    <option value="nama_mahasiswa">Nama Mahasiswa</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex flex-column">
                                <label for="prodi" class="form-label ps-2">Keyword</label>
                                <input type="text" id="keyword" class="form-control" placeholder="Cari"
                                    aria-label="Username" aria-describedby="basic-addon1">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="d-flex flex-column">
                                <button type="submit" id="btn-search" class="btn-detail">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="table-responsive" style="overflow-x: auto; min-width: 100%;">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>Kelas</th>
                                <th>Prodi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <!-- Modal lihat biodata-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-body-tertiary">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 mb-4 mb-md-0">
                                            <div class="bg-white">

                                                <h5 class="modal-title fw-bold mb-4" id="exampleModalLabel">Data
                                                    Mahasiswa
                                                </h5>
                                                <div class="row g-3 flex-column flex-md-row align-items-center p-2"
                                                    style="border-radius: 4px; border: 1px solid rgba(0, 0, 0, 0.1);">
                                                    <!-- Gambar dan Tombol -->
                                                    <div class="col-12 col-md-3">
                                                        <img alt="Profile Picture" id="detail-foto"
                                                            src="/public/img/fotoagung-jpeg"
                                                            class="img-fluid rounded mb-2"
                                                            style="max-width: 100%; height: auto;" />
                                                        <!-- <button class="btn-generate mt-2" data-bs-toggle="modal"
                                                            data-bs-target="#QRCodeModal">Generate QR
                                                            Code</button> -->
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <table class="ml-3 table table-responsive table-hover">
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td id="detail-nama">: Agung Fradiansyah</td>
                                                            </tr>
                                                            <tr>
                                                                <td>NIM</td>
                                                                <td id="detail-nim">: 2341720025</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td id="detail-email">: agungfradiansyah@gmail.com</td>
                                                            </tr>
                                                            <tr>
                                                                <td>No Telp</td>
                                                                <td id="detail-no-telp">: 081234567890</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kelas</td>
                                                                <td id="detail-kelas">: 2E</td>
                                                            <tr>
                                                                <td>Prodi</td>
                                                                <td id="detail-prodi">: Teknik Informatika</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Lahir</td>
                                                                <td id="detail-tanggal-lahir">: 28, Februari 2024</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Kelamin</td>
                                                                <td id="detail-jenis-kelamin">: Laki-laki</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <h5 class="modal-title fw-bold my-4" id="exampleModalLabel">Pelanggaran
                                                    Terbaru
                                                </h5>
                                                <div class="row g-3 flex-column flex-md-row align-items-center p-2"
                                                    style="border-radius: 4px; border: 1px solid rgba(0, 0, 0, 0.1);">
                                                    <table class="table table-responsive table-hover table-bordered">
                                                        <thead>
                                                            <th>Jenis Pelanggaran</th>
                                                            <th>Tingkat</th>
                                                            <th>Tanggal</th>
                                                            <th>Aksi</th>
                                                        </thead>
                                                        <tbody id="pelanggaran-terbaru">

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <h5 class="modal-title fw-bold my-4" id="exampleModalLabel">Riwayat
                                                    Pelanggaran
                                                </h5>
                                                <div class="row g-3 flex-column flex-md-row align-items-center p-2"
                                                    style="border-radius: 4px; border: 1px solid rgba(0, 0, 0, 0.1);">
                                                    <table class="table table-responsive table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>NO</th>
                                                                <th>Jenis Pelanggaran</th>
                                                                <th>Tingkat</th>
                                                                <th>Tanggal</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="riwayat-pelanggaran">

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <!-- Modal lihat biodata-->
                <div class="modal fade" id="modalDetailPelanggaran" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Pelanggaran</h5>
                                <button type="button" class="btn-close" id="close-modal-detail-pelanggaran"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-body-tertiary">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 mb-4 mb-md-0">
                                            <div class="bg-white">

                                                <h5 class="modal-title fw-bold mb-4" id="exampleModalLabel">Data
                                                    Pelanggaran
                                                </h5>
                                                <div class="row g-3 flex-column flex-md-row align-items-center p-2"
                                                    style="border-radius: 4px; border: 1px solid rgba(0, 0, 0, 0.1);">
                                                    <!-- Gambar dan Tombol -->
                                                    <div class="col-12 col-md-3">
                                                        <img alt="Profile Picture" id="foto-pelanggaran"
                                                            src="/public/img/fotoagung-jpeg"
                                                            class="img-fluid rounded mb-2"
                                                            style="max-width: 100%; height: auto;" />
                                                        <!-- <button class="btn-generate mt-2" data-bs-toggle="modal"
                                                            data-bs-target="#QRCodeModal">Generate QR
                                                            Code</button> -->
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <table class="ml-3 table table-responsive table-hover">
                                                            <tr>
                                                                <td>Kode Pelanggaran</td>
                                                                <td id="kode-pelanggaran">: 1234567890</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama Pelanggaran</td>
                                                                <td id="nama-pelanggaran">: Datang terlambat lebih dari
                                                                    15 menit</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tingkat Pelanggaran</td>
                                                                <td id="tingkat-pelanggaran">: 1234567890</td>
                                                            </tr>
                                                            <tr>
                                                                <td>NIP Dosen</td>
                                                                <td id="nip-dosen-pelanggaran">: 1234567890</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal</td>
                                                                <td id="tanggal-pelanggaran">: 28, Februari 2024</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kronologi</td>
                                                                <td id="kronologi-pelanggaran">: Datang terlambat lebih
                                                                    dari 15 menit</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <td id="status-pelanggaran">: Belum dikonfirmasi</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit data mahasiswa -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="edit-result" class="alert alert-danger d-none" role="alert">sdf</div>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <label for="editNim"
                                            class="col-sm-2 col-form-label text-start fw-bold">NIM</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="editNim" readonly class="form-control"
                                                placeholder="Masukkan NIM">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editNama"
                                            class="col-sm-2 col-form-label text-start fw-bold">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="editNama" class="form-control"
                                                placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editKelas"
                                            class="col-sm-2 col-form-label text-start fw-bold">Kelas</label>
                                        <div class="col-sm-10">
                                            <select id="editKelas" class="form-control">
                                                <option value="" selected disabled>Pilih Kelas</option>
                                                <?php foreach ($kelasList as $k) : ?>
                                                <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editJenisKelamin"
                                            class="col-sm-2 col-form-label text-start fw-bold">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select id="editJenisKelamin" class="form-control">
                                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="0">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editTanggalLahir"
                                            class="col-sm-2 col-form-label text-start fw-bold">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" id="editTanggalLahir" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editEmail"
                                            class="col-sm-2 col-form-label text-start fw-bold">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="editEmail" class="form-control"
                                                placeholder="Masukkan Email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editNoTelp" class="col-sm-2 col-form-label text-start fw-bold">No
                                            Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="editNoTelp" class="form-control"
                                                placeholder="Masukkan No Telp">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="editNamaHidden" value="">
                                <input type="hidden" id="editKelasHidden" value="">
                                <input type="hidden" id="editJenisKelaminHidden" value="">
                                <input type="hidden" id="editTanggalLahirHidden" value="">
                                <input type="hidden" id="editEmailHidden" value="">
                                <input type="hidden" id="editNoTelpHidden" value="">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="btn-edit" disabled>Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal tambah data mahasiswa -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true"
                    data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="addModalLabel">Tambah Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="add-result" class="alert alert-danger d-none" role="alert">sdf</div>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <label for="addNim"
                                            class="col-sm-2 col-form-label text-start fw-bold">NIM</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="addNim" class="form-control"
                                                placeholder="Masukkan NIM">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="addNama"
                                            class="col-sm-2 col-form-label text-start fw-bold">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="addNama" class="form-control"
                                                placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="addKelas"
                                            class="col-sm-2 col-form-label text-start fw-bold">Kelas</label>
                                        <div class="col-sm-10">
                                            <select id="addKelas" class="form-control">
                                                <option value="" selected disabled>Pilih Kelas</option>
                                                <?php foreach ($kelasList as $k) : ?>
                                                <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="addJenisKelamin"
                                            class="col-sm-2 col-form-label text-start fw-bold">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select id="addJenisKelamin" class="form-control">
                                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="0">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="addTanggalLahir"
                                            class="col-sm-2 col-form-label text-start fw-bold">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" id="addTanggalLahir" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="addEmail"
                                            class="col-sm-2 col-form-label text-start fw-bold">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="addEmail" class="form-control"
                                                placeholder="Masukkan Email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="addNoTelp" class="col-sm-2 col-form-label text-start fw-bold">No
                                            Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="addNoTelp" class="form-control"
                                                placeholder="Masukkan No Telp">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" disabled id="btn-add">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Scripts -->
            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <!-- DataTables JS -->
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <!-- DataTables with Bootstrap 5 JS -->
            <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


            <script>
            function getDetailMahasiswa(nim) {
                $('#loading-spinner').removeClass('d-none');
                $('#loading-spinner').addClass('d-flex');

                $('#modalDetailPelanggaran').modal('hide');
                $.ajax({
                    url: '/getDetailMahasiswa',
                    type: 'POST',
                    data: {
                        nim: nim
                    },
                    success: function(response) {
                        json = JSON.parse(response);
                        $('#detail-foto').attr('src', json.mahasiswa.foto_mahasiswa);
                        $('#detail-nama').text(': ' + json.mahasiswa.nama_mahasiswa);
                        $('#detail-nim').text(': ' + json.mahasiswa.nim);
                        $('#detail-email').text(': ' + json.mahasiswa.email);
                        $('#detail-no-telp').text(': ' + json.mahasiswa.no_telp);
                        $('#detail-kelas').text(': ' + json.mahasiswa.id_kelas);
                        $('#detail-prodi').text(': ' + json.mahasiswa.id_prodi);
                        $('#detail-tanggal-lahir').text(': ' + json.mahasiswa.tanggal_lahir);
                        $('#detail-jenis-kelamin').text(': ' + json.mahasiswa.jenis_kelamin);

                        $('#riwayat-pelanggaran').empty();
                        $('#pelanggaran-terbaru').empty();
                        if (json.pelanggaran != null) {
                            for (let i = 1; i <= json.pelanggaran.length; i++) {
                                $('#riwayat-pelanggaran').append('<tr><td>' + i + '</td><td>' + json
                                    .pelanggaran[i - 1].jenis_pelanggaran + '</td><td>' + json
                                    .pelanggaran[i - 1].tingkat_pelanggaran + '</td><td>' + json
                                    .pelanggaran[i - 1].datetime +
                                    '</td><td><button class="btn-detail-pelanggaran btn btn-primary" onclick="getDetailPelanggaran(\'' +
                                    json.pelanggaran[i - 1].kode_pelanggaran +
                                    '\')">Lihat</button></td></tr>');
                            }
                            $('#pelanggaran-terbaru').append('<tr><td>' + json.pelanggaran[0]
                                .jenis_pelanggaran + '</td><td>' + json.pelanggaran[0]
                                .tingkat_pelanggaran + '</td><td>' + json.pelanggaran[0].datetime +
                                '</td><td><button class="btn-detail-pelanggaran btn btn-primary" onclick="getDetailPelanggaran(\'' +
                                json.pelanggaran[0].kode_pelanggaran + '\')">Lihat</button></td></tr>');
                        } else {
                            $('#riwayat-pelanggaran').append(
                                '<tr><td colspan="5" class="text-center">Tidak ada pelanggaran</td></tr>'
                            );
                            $('#pelanggaran-terbaru').append(
                                '<tr><td colspan="5" class="text-center">Tidak ada pelanggaran</td></tr>'
                            );
                        }

                        $('#exampleModal').modal('show');
                    },
                    complete: function() {
                        $('#loading-spinner').removeClass('d-flex');
                        $('#loading-spinner').addClass('d-none');
                    }
                });
            };

            function deleteMahasiswa(nim) {
                if (confirm('Apakah anda yakin ingin menghapus data mahasiswa?')) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/doDeleteMahasiswa';

                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'nim';
                    input.value = nim;

                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            }

            function getDetailPelanggaran(id_pelanggaran) {
                $('#loading-spinner').removeClass('d-none');
                $('#loading-spinner').addClass('d-flex');

                $.ajax({
                    url: '/detailPelanggaran',
                    type: 'POST',
                    data: {
                        kode_pelanggaran: id_pelanggaran
                    },
                    success: function(response) {
                        json = JSON.parse(response);

                        $('#kode-pelanggaran').text(': ' + json[0].kode_pelanggaran);
                        $('#nama-pelanggaran').text(': ' + json[0].jenis_pelanggaran);
                        $('#tingkat-pelanggaran').text(': ' + json[0].tingkat_pelanggaran);
                        $('#nip-dosen-pelanggaran').text(': ' + json[0].nip_pelapor);
                        $('#tanggal-pelanggaran').text(': ' + json[0].datetime);
                        $('#kronologi-pelanggaran').text(': ' + json[0].kronologi);
                        $('#status-pelanggaran').html(': ' + json[0].status);
                        if (json[0].tautan_bukti != "-") {
                            $('#foto-pelanggaran').attr('src', json[0].tautan_bukti);
                        } else {
                            $('#foto-pelanggaran').attr('src', '/public/img/default-pp-png');
                        }

                        $('#close-modal-detail-pelanggaran').attr('onclick', 'getDetailMahasiswa(' + json[0]
                            .nim_terlapor + ')');

                        $('#loading-spinner').removeClass('d-flex');
                        $('#loading-spinner').addClass('d-none');

                        $('#exampleModal').modal('hide');
                        $('#modalDetailPelanggaran').modal('show');
                    }
                });
            }

            $(document).ready(function() {
                // spinner
                $('#loading-spinner').removeClass('d-none');
                $('#loading-spinner').addClass('d-flex');

                var t = $('#myTable').DataTable({
                    "lengthMenu": [10, 15, 20],
                    "pageLength": 10,
                    "paging": true,
                    "info": true,
                    "searching": false,
                    "responsive": true,
                    "scrollX": true,
                    "order": [
                        [2, 'asc']
                    ],
                    ajax: {
                        url: '/getDataMahasiswa',
                        type: 'POST',
                        data: function() {
                            return {
                                kategori: $('#kategori').val(),
                                value: $('#keyword').val(),
                                kelas: $('#kelas').val()
                            };
                        },
                        dataSrc: function(json) {
                            $('#loading-spinner').removeClass('d-flex');
                            $('#loading-spinner').addClass('d-none');
                            return json;
                        }
                    },
                    columns: [{
                            data: 'nim'
                        },
                        {
                            data: 'nim'
                        },
                        {
                            data: 'nama_mahasiswa'
                        },
                        {
                            data: 'jenis_kelamin'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'no_telp'
                        },
                        {
                            data: 'id_kelas'
                        },
                        {
                            data: 'id_prodi'
                        },
                        {
                            data: 'aksi'
                        }
                    ],
                    "dom": "<'row'" +
                        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                        ">" +

                        "<'table-responsive'tr>" +

                        "<'row'" +
                        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                        ">",
                    // make sure td and th white-space no wrap
                    "columnDefs": [{
                            "className": "text-nowrap",
                            "targets": "_all"
                        },
                        {
                            "className": "dt-center",
                            "targets": "_all"
                        },
                        {
                            "orderable": false,
                            "targets": "_all"
                        }
                    ],
                });

                $('#btn-search').click(function() {
                    $('#loading-spinner').removeClass('d-none');
                    $('#loading-spinner').addClass('d-flex');

                    $('#myTable').DataTable().ajax.reload();
                });

                t.on('order.dt search.dt', function() {
                    t.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                    t.columns.adjust();
                }).draw();

                t.on('click', '.btn-edit', function() {
                    $('#loading-spinner').removeClass('d-none');
                    $('#loading-spinner').addClass('d-flex');

                    let nim = $(this).data('nim');

                    $('#editNamaHidden').val('');
                    $('#editKelasHidden').val('');
                    $('#editJenisKelaminHidden').val('');
                    $('#editTanggalLahirHidden').val('');
                    $('#editEmailHidden').val('');
                    $('#editNoTelpHidden').val('');

                    $.ajax({
                        url: '/getDetailMahasiswa',
                        type: 'POST',
                        data: {
                            nim: nim
                        },
                        success: function(response) {
                            json = JSON.parse(response);
                            $('#editNama').val(json.mahasiswa.nama_mahasiswa);
                            $('#editNim').val(json.mahasiswa.nim);
                            $('#editEmail').val(json.mahasiswa.email);
                            $('#editNoTelp').val(json.mahasiswa.no_telp);
                            $('#editKelas').val(json.mahasiswa.id_kelas);
                            $('#editTanggalLahir').val(json.mahasiswa.tanggal_lahir);
                            let jenis_kelamin = json.mahasiswa.jenis_kelamin ==
                                'Laki-laki' ? 1 : 0;
                            $('#editJenisKelamin').val(jenis_kelamin);

                            $('#editNamaHidden').val(json.mahasiswa.nama_mahasiswa);
                            $('#editKelasHidden').val(json.mahasiswa.id_kelas);
                            $('#editJenisKelaminHidden').val(jenis_kelamin);
                            $('#editTanggalLahirHidden').val(json.mahasiswa.tanggal_lahir);
                            $('#editEmailHidden').val(json.mahasiswa.email);
                            $('#editNoTelpHidden').val(json.mahasiswa.no_telp);

                            $('#editModal').modal('show');
                        },
                        complete: function() {
                            $('#loading-spinner').removeClass('d-flex');
                            $('#loading-spinner').addClass('d-none');
                        }
                    });
                });


                $('#addNim, #addNama, #addKelas, #addJenisKelamin, #addTanggalLahir, #addEmail, #addNoTelp').on(
                    'input change',
                    function() {
                        let isEmpty = false;
                        $('#addNim, #addNama, #addKelas, #addJenisKelamin, #addTanggalLahir, #addEmail, #addNoTelp')
                            .each(function() {
                                if ($(this).val() == '') {
                                    isEmpty = true;
                                }
                            });

                        $('#btn-add').prop('disabled', isEmpty);
                    });

                $('#btn-add').on('click', function() {
                    let data = {
                        nim: $('#addNim').val(),
                        nama: $('#addNama').val(),
                        kelas: $('#addKelas').val(),
                        prodi: '',
                        jenis_kelamin: $('#addJenisKelamin').val(),
                        tanggal_lahir: $('#addTanggalLahir').val(),
                        email: $('#addEmail').val(),
                        no_telp: $('#addNoTelp').val()
                    };

                    let prodi = $('#addKelas').val().split('-')[0];
                    data.prodi = prodi;

                    $.ajax({
                        url: '/doInsertMahasiswa',
                        type: 'POST',
                        data: data,
                        success: function(response) {
                            if (response == 'success') {
                                $('#add-result').addClass('d-none');
                                $('#addNim, #addNama, #addKelas, #addProdi, #addJenisKelamin, #addTanggalLahir, #addEmail, #addNoTelp')
                                    .val('');
                                $('#addModal').modal('hide');

                                $('#loading-spinner').removeClass('d-none');
                                $('#loading-spinner').addClass('d-flex');

                                $('#myTable').DataTable().ajax.reload();
                            } else {
                                $('#add-result').removeClass('d-none');
                                $('#add-result').text(response);
                            }
                        }
                    });
                });

                $('#editNama, #editKelas, #editJenisKelamin, #editTanggalLahir, #editEmail, #editNoTelp').on(
                    'input change',
                    function() {
                        let isChange = false;
                        if ($('#editNama').val() != $('#editNamaHidden').val() ||
                            $('#editKelas').val() != $('#editKelasHidden').val() ||
                            $('#editJenisKelamin').val() != $('#editJenisKelaminHidden').val() ||
                            $('#editTanggalLahir').val() != $('#editTanggalLahirHidden').val() ||
                            $('#editEmail').val() != $('#editEmailHidden').val() ||
                            $('#editNoTelp').val() != $('#editNoTelpHidden').val()
                        ) {
                            isChange = true;
                        }

                        let isEmpty = false;
                        $('#editNama, #editKelas, #editJenisKelamin, #editTanggalLahir, #editEmail, #editNoTelp')
                            .each(function() {
                                if ($(this).val() == '') {
                                    isEmpty = true;
                                }
                            });

                        $('#btn-edit').prop('disabled', !(isChange || isEmpty));
                    });

                $('#btn-edit').on('click', function() {
                    let nim = $('#editNim').val();
                    let data = {
                        nim: nim,
                        nama: $('#editNama').val(),
                        kelas: $('#editKelas').val(),
                        prodi: '',
                        jenis_kelamin: $('#editJenisKelamin').val(),
                        tanggal_lahir: $('#editTanggalLahir').val(),
                        email: $('#editEmail').val(),
                        no_telp: $('#editNoTelp').val()
                    };

                    let prodi = $('#editKelas').val().split('-')[0];
                    data.prodi = prodi;

                    $.ajax({
                        url: '/doUpdateMahasiswa',
                        type: 'POST',
                        data: data,
                        success: function(response) {
                            if (response == 'success') {
                                $('#edit-result').addClass('d-none');
                                $('#editNim, #editNama, #editKelas, #editProdi, #editJenisKelamin, #editTanggalLahir, #editEmail, #editNoTelp')
                                    .val('');
                                $('#editModal').modal('hide');

                                $('#loading-spinner').removeClass('d-none');
                                $('#loading-spinner').addClass('d-flex');
                                $('#myTable').DataTable().ajax.reload();
                            } else {
                                $('#edit-result').removeClass('d-none');
                                $('#edit-result').text(response);
                            }
                        }
                    });
                });
            });
            </script>
</body>

</html>