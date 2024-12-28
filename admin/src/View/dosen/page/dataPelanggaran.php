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

    <div class="modal fade" id="modalTinjau" data-bs-backdrop="static"
        style="background-color: rgba(255, 255, 255, 0.20);" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tinjau Pelanggaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-body-tertiary">
                        <div class="form-group">
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="2541987544" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="No Name" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Kelas</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="2E" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Jenis
                                    Pelanggaran</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="Terlambat" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Tingkat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="Ringan" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="28 Februari 2024" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Catatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="Datang terlambat lebih dari 15 menit"
                                        readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Bukti
                                    Pelanggaran</label>
                                <div class="col-sm-9">
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#buktiModal">Lihat Bukti Pelanggaran</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- berikan sanksi -->
                <hr class="mt-1 mb-2">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Berikan Sanksi</label>
                            <div class="col-sm-9">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-light dropdown-toggle border d-flex justify-content-between align-items-center col-sm-12"
                                        type="button" id="dropdownButton" data-bs-toggle="dropdown"
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
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Detail Sanksi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control dynamic-width" id="catatanSanksi" rows="3"
                                    placeholder="Tambahkan catatan detail sanksi yang diberikan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn-detail" style="padding: 6.5px 12px">Kirim</button>
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
            $(document).ready(function() {
                console.log('Struktur tabel:', $('#tabel-awal').html());
                console.log('Struktur tabel:', $('#tabel-verifikasi').html());

                var tabelAwal = $('#tabel-awal').DataTable({
                    "lengthMenu": [10, 15, 20],
                    "pageLength": 10,
                    "paging": true,
                    "info": true,
                    "searching": false,
                    "responsive": true,
                    "scrollX": true,
                    // "order": [
                    //     [2, 'asc']
                    // ],
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
                            } else {
                                tabelVerifikasi.ajax.reload();
                                tabelVerifikasi.columns.adjust();
                            }
                        } else {
                            console.error('Elemen tabel tidak valid atau struktur tidak lengkap');
                        }
                    }, 100); // Tunggu 100ms untuk memastikan tab benar-benar terlihat
                });

                $('#pills-home-tab').on('shown.bs.tab', function(e) {
                    $('#loading-spinner').addClass('d-flex');
                    $('#loading-spinner').removeClass('d-none');
                    tabelAwal.ajax.reload();
                    tabelAwal.columns.adjust();
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

                tabelVerifikasi.on('order.dt search.dt', function() {
                    tabelVerifikasi.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                    tabelVerifikasi.columns.adjust();
                }).draw();
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
                const dropdownButton = document.getElementById("dropdownButton");
                const newText = element.textContent;
                dropdownButton.textContent = newText; // Perbarui teks tombol
                dropdownButton.setAttribute("title", newText); // Tooltip untuk teks lengkap
            }
        </script>
</body>

</html>