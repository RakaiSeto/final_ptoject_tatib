<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pelanggaran Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/public/css/style-css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables with Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">


    <style>
        /* Ubah warna tab aktif */
        .nav-pills .nav-link.active {
            background-color: #fd7e14 !important;
            border-color: #fd7e14 !important;
            color: #fff !important;
            font-weight: bold;
        }

        /* Ubah warna tab biasa */
        .nav-pills .nav-link {
            color: #fd7e14;
        }

        /* Warna saat di-hover */
        .nav-pills .nav-link:hover {
            background-color: rgba(253, 126, 20, 0.1);
            color: #fd7e14;
        }

        #dropdownButton {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
            display: inline-block;
        }

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

        #tabel-awal,
        #tabel-verifikasi {
            width: 100% !important;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Dashboard Content -->
        <div class="content px-3 pt-3" style="margin-top: 68px;">
            <div class="text-center position-fixed d-flex justify-content-center align-items-center top-50 start-50 translate-middle bg-white bg-opacity-50 w-100 h-100"
                id="loading-spinner" style="z-index: 999;">
                <img src="/public/img/spinner-svg" alt="Loading..." class="mx-auto d-block"
                    style="width: 15%; height: 15%;">
            </div>

            <div class="card mb-4">
                <div class="card-body py-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">E-Tatib</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="bg-white border">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Pelanggaran Terbaru</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Verifikasi Sanksi Mahasiswa</button>
                    </li>
                </ul>


                <div class="tab-content" id="pills-tabContent">
                    <!-- Tab Pane: Pelanggaran Terbaru -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="table-responsive my-4">
                            <div class="table-responsive" style="overflow-x: auto; min-width: 100%;">
                                <table id="tabel-awal" class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Jenis Pelanggaran</th>
                                            <th>Status</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Pane: Verifikasi Sanksi Mahasiswa -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="table-responsive my-4">
                            <div class="table-responsive" style="overflow-x: auto; min-width: 100%;">
                                <table id="tabel-verifikasi" class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Jenis Pelanggaran</th>
                                            <th>Status</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <div class="modal fade" id="modalVerifikasi" data-bs-backdrop="static"
        style="background-color: rgba(255, 255, 255, 0.20);" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Verifikasi Pelanggaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-body-tertiary p-3">
                        <div class="form-group">
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" id="verifikasiNIM" class="form-control" value="2541987544" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" id="verifikasiNama" class="form-control" value="No Name" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" id="verifikasiKelas" class="form-control" value="2E" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Jenis
                                    Pelanggaran</label>
                                <div class="col-sm-10">
                                    <input type="text" id="verifikasiJenisPelanggaran" class="form-control" value="Terlambat" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Tingkat</label>
                                <div class="col-sm-10">
                                    <input type="text" id="verifikasiTingkat" class="form-control" value="Ringan" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" id="verifikasiTanggal" class="form-control" value="28 Februari 2024" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Catatan</label>
                                <div class="col-sm-10">
                                    <input type="text" id="verifikasiCatatan" class="form-control" value="Datang terlambat lebih dari 15 menit"
                                        readonly>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Bukti
                                    Pelanggaran</label>
                                <div class="col-sm-9">
                                    <button class="btn btn-warning btn-bukti" data-url="" data-bs-toggle="modal" data-bs-target="#buktiModal" id="verifikasiBukti">Lihat Bukti Pelanggaran</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- berikan sanksi -->
                <hr class="mt-1 mb-2">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label text-end fw-bold">Berikan Sanksi</label>
                            <div class="col-sm-10">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-light dropdown-toggle border d-flex justify-content-between align-items-center col-sm-12 overflow-hidden"
                                        type="button" id="verifikasiSanksi" data-bs-toggle="dropdown"
                                        aria-expanded="false" style=""> Pilih Sanksi
                                    </button>
                                    <ul class="dropdown-menu col-sm-12">
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Surat pernyataan tidak mengulangi perbuatan tersebut, dibubuhi materai, ditandatangani mahasiswa yang bersangkutan dan DPA"
                                                onclick="updateProdiDropdown(this)">Surat pernyataan tidak mengulangi
                                                perbuatan tersebut, dibubuhi materai, ditandatangani mahasiswa yang
                                                bersangkutan dan DPA</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Melakukan tugas khusus, misalnya bertanggungjawab untuk memperbaiki atau membersihkan kembali, dan tugas-tugas lainnya"
                                                onclick="updateProdiDropdown(this)">Melakukan tugas khusus, misalnya
                                                bertanggungjawab untuk memperbaiki atau membersihkan kembali, dan
                                                tugas-tugas lainnya</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Dikenakan penggantian kerugian atau penggantian benda/barang semacamnya"
                                                onclick="updateProdiDropdown(this)">Dikenakan penggantian kerugian atau
                                                penggantian benda/barang semacamnya</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Melakukan tugas layanan sosial dalam jangka waktu tertentu"
                                                onclick="updateProdiDropdown(this)">Melakukan tugas layanan sosial dalam
                                                jangka waktu tertentu</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Diberikan nilai D pada mata kuliah terkait saat melakukan pelanggaran."
                                                onclick="updateProdiDropdown(this)">Diberikan nilai D pada mata kuliah
                                                terkait saat melakukan pelanggaran.</a></li>
                                    </ul>
                                    <input type="hidden" id="verifikasiKodePelanggaran" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label text-end fw-bold">Detail Sanksi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control dynamic-width" id="catatanSanksi" rows="3"
                                    placeholder="Tambahkan catatan detail sanksi yang diberikan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn-detail opacity-50" id="btn-do-verifikasi" disabled style="padding: 6.5px 12px">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetailDone" data-bs-backdrop="static"
        style="background-color: rgba(255, 255, 255, 0.20);" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pelanggaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-body-tertiary p-3">
                        <div class="form-group">
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" id="doneNIM" class="form-control" value="2541987544" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" id="doneNama" class="form-control" value="No Name" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" id="doneKelas" class="form-control" value="2E" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Jenis
                                    Pelanggaran</label>
                                <div class="col-sm-10">
                                    <input type="text" id="doneJenisPelanggaran" class="form-control" value="Terlambat" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Tingkat</label>
                                <div class="col-sm-10">
                                    <input type="text" id="doneTingkat" class="form-control" value="Ringan" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" id="doneTanggal" class="form-control" value="28 Februari 2024" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label text-end fw-bold">Catatan</label>
                                <div class="col-sm-10">
                                    <input type="text" id="doneCatatan" class="form-control" value="Datang terlambat lebih dari 15 menit"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                        <div class="bg-body-tertiary">
                            <div class="form-group">
                                <h5>Banding</h5>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label text-end fw-bold">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="doneTanggalBanding"
                                            readonly placeholder="Tanggal banding"></input>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label text-end fw-bold">Catatan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control dynamic-width" id="doneCatatanBanding" rows="3"
                                            readonly placeholder="Tambahkan catatan detail banding yang diberikan"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label text-end fw-bold">Status</label>
                                    <div class="col-sm-10 pt-2">
                                        <span id="doneStatusBanding" class="badge bg-success">Diterima</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-1 mb-2">
                        <div class="bg-body-tertiary">
                            <div class="form-group">
                                <h5>Sanksi</h5>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label text-end fw-bold">Tanggal Sanksi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="doneTanggalSanksi"
                                            readonly placeholder="Tanggal Sanksi"></input>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label text-end fw-bold">Sanksi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="doneSanksi"
                                            readonly placeholder="Sanksi"></input>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label text-end fw-bold">Tautan</label>
                                    <div class="col-sm-10">
                                        <a href="" id="doneTautanSanksi" class="btn btn-primary" target="_blank">Lihat Sanksi</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label text-end fw-bold">Status</label>
                                    <div class="col-sm-10 pt-2">
                                        <span id="doneStatusSanksi" class="badge bg-success">Diterima</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal bukti pelanggaran -->
        <div class="modal fade" id="buktiModal" tabindex="-1" aria-labelledby="buktiModalLabel"
            aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buktiModalLabel">Bukti Pelanggaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <!-- Gambar bukti pelanggaran -->
                        <img src="https://via.placeholder.com/600x400" id="img-bukti" class="img-fluid"
                            alt="Bukti Pelanggaran">
                    </div>
                </div>
            </div>
        </div>



        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <!-- DataTables with Bootstrap 5 JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


        <script>
            function tolakPelanggaran(kode_pelanggaran) {
                if (confirm('Apakah Anda yakin ingin menolak pelanggaran ini?')) {
                    $('#loading-spinner').addClass('d-flex');
                    $('#loading-spinner').removeClass('d-none');
                    $.ajax({
                        url: '/tolakPelanggaran',
                        type: 'POST',
                        data: {
                            kode_pelanggaran: kode_pelanggaran
                        },
                        success: function(response) {
                            $('#loading-spinner').removeClass('d-flex');
                            $('#loading-spinner').addClass('d-none');
                            // reload page
                            location.reload();
                        }
                    });
                }
            }

            function verifikasiPelanggaran(kode_pelanggaran) {
                $('#loading-spinner').addClass('d-flex');
                $('#loading-spinner').removeClass('d-none');
                $.ajax({
                    url: '/detailPelanggaran',
                    type: 'POST',
                    data: {
                        kode_pelanggaran: kode_pelanggaran
                    },
                    success: function(response) {
                        json = JSON.parse(response);
                        $('#verifikasiNIM').val(json[0].nim_terlapor);
                        $('#verifikasiNama').val(json[0].nama_terlapor);
                        $('#verifikasiKelas').val(json[0].kelas);
                        $('#verifikasiJenisPelanggaran').val(json[0].jenis_pelanggaran);
                        $('#verifikasiTingkat').val(json[0].tingkat_pelanggaran);
                        $('#verifikasiTanggal').val(json[0].datetime);
                        $('#verifikasiCatatan').val(json[0].kronologi);

                        $('#btn-do-verifikasi').addClass('opacity-50');
                        $('#btn-do-verifikasi').prop('disabled', true);
                        $('#verifikasiSanksi').attr('title', '');
                        $('#verifikasiSanksi').text('Pilih Sanksi');

                        $('#verifikasiKodePelanggaran').val(kode_pelanggaran);

                        $('#loading-spinner').addClass('d-none');
                        $('#loading-spinner').removeClass('d-flex');
                        $('#modalVerifikasi').modal('show');
                    }
                });
            };

            function detailDone(kode_pelanggaran) {
                $('#loading-spinner').addClass('d-flex');
                $('#loading-spinner').removeClass('d-none');

                $.ajax({
                    url: '/detailDone',
                    type: 'POST',
                    data: {
                        kode_pelanggaran: kode_pelanggaran
                    },
                    success: function(response) {
                        json = JSON.parse(response);

                        $('#doneNIM').val(json.pelanggaran.nim_terlapor);
                        $('#doneNama').val(json.pelanggaran.nama_terlapor);
                        $('#doneKelas').val(json.pelanggaran.kelas);
                        $('#doneJenisPelanggaran').val(json.pelanggaran.jenis_pelanggaran);
                        $('#doneTingkat').val(json.pelanggaran.tingkat_pelanggaran);
                        $('#doneTanggal').val(json.pelanggaran.datetime);
                        $('#doneCatatan').val(json.pelanggaran.kronologi);

                        if (json.banding == null) {
                            $('#doneTanggalBanding').val('-');
                            $('#doneCatatanBanding').val('-');
                            $('#doneStatusBanding').removeClass('badge bg-success bg-danger');
                            $('#doneStatusBanding').addClass('badge bg-warning');
                            $('#doneStatusBanding').text('Tidak diajukan');
                        } else {
                            $('#doneTanggalBanding').val(new Date(json.banding.tanggal_banding).toISOString().split('T')[0]);
                            $('#doneCatatanBanding').val(json.banding.catatan_banding);
                            if (json.banding.is_diterima == 1) {
                                $('#doneStatusBanding').removeClass('badge bg-warning bg-danger');
                                $('#doneStatusBanding').addClass('badge bg-success');
                                $('#doneStatusBanding').text('Diterima');
                            } else {
                                $('#doneStatusBanding').removeClass('badge bg-success bg-warning');
                                $('#doneStatusBanding').addClass('badge bg-danger');
                                $('#doneStatusBanding').text('Ditolak');
                            }
                        }

                        if (json.sanksi == null) {
                            $('#doneTanggalSanksi').val('-');
                            $('#doneSanksi').val('-');
                            $('#doneTautanSanksi').attr('href', '');
                            $('#doneTautanSanksi').addClass('disabled');
                            $('#doneStatusSanksi').removeClass('badge bg-success bg-danger');
                            $('#doneStatusSanksi').addClass('badge bg-warning');
                            $('#doneStatusSanksi').text('Tidak ada sanksi');
                        } else {
                            $('#doneSanksi').val(json.sanksi.nama_sanksi);
                            $('#doneTanggalSanksi').val(new Date(json.sanksi.datetime).toISOString().split('T')[0]);
                            if (json.sanksi.tautan_sanksi != null && json.sanksi.tautan_sanksi != '') {
                                $('#doneTautanSanksi').attr('href', json.sanksi.tautan_sanksi);
                                $('#doneTautanSanksi').removeClass('disabled');
                            } else {
                                $('#doneTautanSanksi').attr('href', '');
                                $('#doneTautanSanksi').addClass('disabled');
                            }
                            if (json.sanksi.is_done == 1) {
                                $('#doneStatusSanksi').removeClass('badge bg-success bg-warning');
                                $('#doneStatusSanksi').addClass('badge bg-success');
                                $('#doneStatusSanksi').text('Selesai');
                            } else {
                                $('#doneStatusSanksi').removeClass('badge bg-success bg-warning');
                                $('#doneStatusSanksi').addClass('badge bg-danger');
                                $('#doneStatusSanksi').text('Belum selesai');
                            }
                        }

                        $('#modalDetailDone').modal('show');

                        $('#loading-spinner').removeClass('d-flex');
                        $('#loading-spinner').addClass('d-none');

                    }
                });
            }

            $(document).ready(function() {
                var tabelAwal = $('#tabel-awal').DataTable({
                    "lengthMenu": [10, 15, 20],
                    "pageLength": 10,
                    "paging": true,
                    "info": true,
                    "searching": false,
                    "responsive": true,
                    "scrollX": true,
                    "ordering": false,
                    ajax: {
                        url: '/getDataPelanggaran',
                        type: 'POST',
                        data: function() {
                            return {
                                // verify: 'false'
                            };
                        },
                        dataSrc: function(json) {
                            $('#loading-spinner').removeClass('d-flex');
                            $('#loading-spinner').addClass('d-none');
                            return json;
                        },
                    },
                    columns: [{
                            data: 'nim'
                        },
                        {
                            data: 'datetime'
                        },
                        {
                            data: 'nim'
                        },
                        {
                            data: 'nama_mahasiswa'
                        },
                        {
                            data: 'deskripsi'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'tautan_bukti'
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

                tabelAwal.on('order.dt search.dt', function() {
                    tabelAwal.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                    tabelAwal.columns.adjust();
                }).draw();

                var tabelVerifikasi = null;

                $('#pills-profile-tab').on('shown.bs.tab', function(e) {
                    // Tunggu hingga tab benar-benar terlihat
                    setTimeout(function() {
                        // Pastikan elemen tabel ada dan valid
                        var tableElement = $('#tabel-verifikasi');
                        if (tableElement.length && tableElement.find('thead').length && tableElement.find('tbody').length) {
                            $('#loading-spinner').addClass('d-flex');
                            $('#loading-spinner').removeClass('d-none');
                            if (!tabelVerifikasi) {
                                tabelVerifikasi = tableElement.DataTable({
                                    "lengthMenu": [10, 15, 20],
                                    "pageLength": 10,
                                    "paging": true,
                                    "info": true,
                                    "searching": false,
                                    "responsive": true,
                                    "scrollX": true,
                                    "autoWidth": false, // Tambahkan ini
                                    "deferRender": true, // Tambahkan ini
                                    ajax: {
                                        url: '/getDataPelanggaran',
                                        type: 'POST',
                                        data: {
                                            verify: 'true'
                                        },
                                        dataSrc: function(json) {
                                            $('#loading-spinner').removeClass('d-flex');
                                            $('#loading-spinner').addClass('d-none');
                                            return json;
                                        }
                                    },
                                    "columns": [{
                                            data: 'nim'
                                        },
                                        {
                                            "data": "datetime"
                                        },
                                        {
                                            "data": "nim"
                                        },
                                        {
                                            "data": "nama_mahasiswa"
                                        },
                                        {
                                            "data": "deskripsi"
                                        },
                                        {
                                            "data": "status"
                                        },
                                        {
                                            "data": "tautan_bukti"
                                        },
                                        {
                                            "data": "aksi"
                                        }
                                    ],
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
                                    ]
                                });

                                // Pindahkan event handler ke sini, setelah tabelVerifikasi diinisialisasi
                                tabelVerifikasi.on('order.dt search.dt', function() {
                                    tabelVerifikasi.column(0, {
                                        search: 'applied',
                                        order: 'applied'
                                    }).nodes().each(function(cell, i) {
                                        cell.innerHTML = i + 1;
                                    });
                                    tabelVerifikasi.columns.adjust();
                                }).draw();
                            } else {
                                tabelVerifikasi.ajax.reload();
                                tabelVerifikasi.columns.adjust();
                            }
                        } else {
                            console.error('Elemen tabel tidak valid atau struktur tidak lengkap');
                        }
                    }, 100);
                });

                $('#pills-home-tab').on('shown.bs.tab', function(e) {
                    $('#loading-spinner').addClass('d-flex');
                    $('#loading-spinner').removeClass('d-none');
                    tabelAwal.ajax.reload();
                    tabelAwal.columns.adjust();
                });

                $('#tabel-awal, #tabel-verifikasi').on('click', '.btn-bukti', function(e) {
                    $('#img-bukti').attr('src', $(this).attr('data-url'));
                });

                $('#verifikasiSanksi').off('change');

                $('#btn-do-verifikasi').on('click', function(e) {
                    let deskripsi = $('#verifikasiDeskripsi').val();
                    let sanksi = $('#verifikasiSanksi').attr('title');
                    let kode_pelanggaran = $('#verifikasiKodePelanggaran').val();

                    $.ajax({
                        url: '/doVerifikasi',
                        type: 'POST',
                        data: {
                            deskripsi: deskripsi ?? "",
                            sanksi: sanksi,
                            kode_pelanggaran: kode_pelanggaran ?? ""
                        },
                        success: function(response) {
                            location.reload();
                        }
                    });
                });
            });

            $(".sidebar ul li").on("click", function() {
                $(".sidebar ul li.active").removeClass("active");
                $(this).addClass("active");
            });

            $(".open-btn").on("click", function() {
                $(".sidebar").addClass("active");
            });

            $(".close-btn").on("click", function() {
                $(".sidebar").removeClass("active");
            });

            document.querySelectorAll('.dropdown-submenu').forEach(function(submenu) {
                submenu.addEventListener('mouseenter', function() {
                    const submenuMenu = submenu.querySelector('.dropdown-menu');
                    if (submenuMenu) submenuMenu.classList.add('show');
                });

                submenu.addEventListener('mouseleave', function() {
                    const submenuMenu = submenu.querySelector('.dropdown-menu');
                    if (submenuMenu) submenuMenu.classList.remove('show');
                });
            });

            function updateProdiDropdown(element) {
                let dropdownButton = document.getElementById("verifikasiSanksi");
                let newText = element.textContent
                    .replace(/<br>/g, '')
                    .replace(/\s+/g, ' ')
                    .trim();

                dropdownButton.textContent = newText;
                dropdownButton.setAttribute("title", newText);

                // Enable the verify button
                $('#btn-do-verifikasi').prop('disabled', false);
                $('#btn-do-verifikasi').removeClass('opacity-50');
            }

            // Update the dropdown item click handler
            $('.dropdown-item').on('click', function(e) {
                updateProdiDropdown(this);
            });
        </script>
</body>

</html>