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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
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

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        margin-top: 10px;

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

            <div class="bg-white">
                <div class="filter-bar w-100 rounded align-items-center gap-2 mb-3 mt-1">
                    <h5 class="mt-1 fw-semibold">Filter</h5>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-flex flex-column">
                                <label for="tanggal" class="form-label">Tanggal Mulai</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="tanggal_mulai"
                                        placeholder="Pilih Tanggal" aria-label="Tanggal"
                                        aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex flex-column">
                                <label for="tanggal" class="form-label">Tanggal Akhir</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="tanggal_akhir"
                                        placeholder="Pilih Tanggal" aria-label="Tanggal"
                                        aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="d-flex flex-column">
                                <label for="prodi" class="form-label">Kategori</label>
                                <select id="kategori" class="form-select w-100"
                                    style="box-sizing: border-box; max-width: 100%;">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="dat.kode_pelanggaran">Kode Pelanggaran</option>
                                    <option value="dat.nip_pelapor">NIP Dosen</option>
                                    <option value="dat.nim_terlapor">NIM Mahasiswa</option>
                                    <option value="daf.tingkat_pelanggaran">Tingkat Pelanggaran</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="d-flex flex-column">
                                <label for="prodi" class="form-label">Keyword</label>
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

                <div class="table-responsive" style="overflow-x: auto; width: 100%; min-width: 720px;">
                    <table id="myTable" class="table table-striped table-bordered" style="width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Kode Pelanggaran</th>
                                <th>Mahasiswa</th>
                                <th>Dosen Pelapor</th>
                                <th>Tanggal</th>
                                <th>Jenis Pelanggaran</th>
                                <th>Tingkat</th>
                                <th>Bukti</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>Kode Pelanggaran</th>
                                <th>Mahasiswa</th>
                                <th>Dosen Pelapor</th>
                                <th>Tanggal</th>
                                <th>Jenis Pelanggaran</th>
                                <th>Tingkat</th>
                                <th>Bukti</th>
                                <th>Detail</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Pelanggaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-body-tertiary">

                                    <div class="form-group">
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Kode
                                                Pelanggaran</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="detail_kode_pelanggaran" class="form-control"
                                                    value="2541987544" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="detail_nim_terlapor" class="form-control"
                                                    value="No Name" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="detail_nama_terlapor" class="form-control"
                                                    value="2E" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Kelas</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="detail_kelas" class="form-control"
                                                    value="Terlambat" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama
                                                Pelanggaran</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="detail_jenis_pelanggaran" class="form-control"
                                                    value="Ringan" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">NIP
                                                Dosen</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="detail_nip_pelapor" class="form-control"
                                                    value="28 Februari 2024" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama
                                                Dosen</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="detail_nama_pelapor" class="form-control"
                                                    value="28 Februari 2024" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for=""
                                                class="col-sm-3 col-form-label text-end fw-bold">Kronologi</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="detail_kronologi" class="form-control"
                                                    value="Datang terlambat lebih dari 15 menit" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for=""
                                                class="col-sm-3 col-form-label text-end fw-bold">Status</label>
                                            <div class="col-sm-9">
                                                <span id="detail_status"></span>
                                            </div>
                                        </div>
                                    </div>
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
    $(document).ready(function() {

        // spinner
        $('#loading-spinner').removeClass('d-none');
        $('#loading-spinner').addClass('d-flex');

        $('#myTable').DataTable({
            "lengthMenu": [10, 15, 20],
            "pageLength": 10,
            "paging": true,
            "info": true,
            "searching": false,
            "responsive": true,
            "scrollX": true,
            "order": [
                [0, 'asc']
            ],
            ajax: {
                url: '/getDataPelanggaran',
                type: 'POST',
                data: function() {
                    return {
                        tanggal_mulai: $('#tanggal_mulai').val(),
                        tanggal_akhir: $('#tanggal_akhir').val(),
                        kategori: $('#kategori').val(),
                        value: $('#keyword').val()
                    };
                },
                dataSrc: function(json) {
                    $('#loading-spinner').removeClass('d-flex');
                    $('#loading-spinner').addClass('d-none');
                    return json;
                }
            },
            columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Nomor urut berdasarkan indeks baris
                    },
                },
                {
                    data: 'kode_pelanggaran'
                },
                {
                    data: 'nama_terlapor'
                },
                {
                    data: 'nama_pelapor'
                },
                {
                    data: 'datetime'
                },
                {
                    data: 'jenis_pelanggaran'
                },
                {
                    data: 'tingkat_pelanggaran'
                },
                {
                    data: 'tautan_bukti'
                },
                {
                    data: 'detail'
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
            $('#myTable').DataTable().ajax.reload();
        });
    });

    $('#myTable').on('click', '.btn-bukti', function() {
        let url = $(this).data('url');
        $('#img-bukti').attr('src', url);
    });

    $('#myTable').on('click', '.btn-detail', function() {
        $('#loading-spinner').removeClass('d-none');
        $('#loading-spinner').addClass('d-flex');
        let kode = $(this).data('kode');
        $.ajax({
            url: '/detailPelanggaran',
            type: 'POST',
            data: {
                kode_pelanggaran: kode
            },
            success: function(response) {
                response = JSON.parse(response);
                $('#detail_kode_pelanggaran').prop('value', response[0].kode_pelanggaran);
                $('#detail_nim_terlapor').prop('value', response[0].nim_terlapor);
                $('#detail_nama_terlapor').prop('value', response[0].nama_terlapor);
                $('#detail_kelas').prop('value', response[0].kelas);
                $('#detail_jenis_pelanggaran').prop('value', response[0].jenis_pelanggaran);
                $('#detail_nip_pelapor').prop('value', response[0].nip_pelapor);
                $('#detail_nama_pelapor').prop('value', response[0].nama_pelapor);
                $('#detail_kronologi').prop('value', response[0].kronologi);
                $('#detail_status').html(response[0].status);

                $('#loading-spinner').removeClass('d-flex');
                $('#loading-spinner').addClass('d-none');

                $('#exampleModal').modal('show');
            }
        });
        // $('#exampleModal').modal('show');
    });
    </script>
</body>

</html>