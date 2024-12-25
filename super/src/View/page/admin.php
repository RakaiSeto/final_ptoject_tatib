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

        <!-- spinner -->
        <div class="content px-3 pt-3" style="margin-top: 56px;">
            <div class="text-center position-fixed d-none justify-content-center align-items-center top-50 start-50 translate-middle bg-white bg-opacity-50 w-100 h-100"
                id="loading-spinner" style="z-index: 999; display: none;">
                <img src="/public/img/spinner-svg" alt="Loading..." class="mx-auto d-block"
                    style="width: 15%; height: 15%;">
            </div>

            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
                    </ol>
                </nav>
            </div>

            <!-- Button Tambah Admin -->
            <div class="text-start mb-3">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i
                        class="fas fa-plus"></i>
                    Tambah Admin
                </button>
            </div>


            <div class="bg-white" style="border: 0.5px solid rgba(0, 0, 0, 0.1); ">
                <div class="filter-bar w-100 rounded align-items-center gap-2 mb-3 mt-1">
                    <h5 class="ms-2 mt-1 fw-semibold">Filter</h5>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <label for="prodi" class="form-label ps-2">Kategori</label>
                                <select id="kategori" class="form-select w-100"
                                    style="box-sizing: border-box; max-width: 100%;">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="nip">NIP Admin</option>
                                    <option value="nama_pegawai">Nama Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>Prodi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Edit Data Admin -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
                data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="background-color: #F5F5F5;">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="editModalLabel">Edit Data Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <!-- NIP -->
                                <div class="row mb-3">
                                    <label for="editNip" class="col-sm-3 col-form-label text-end fw-bold">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="editNip" value="1234652783726"
                                            readonly disabled>
                                    </div>
                                </div>
                                <!-- Nama -->
                                <div class="row mb-3">
                                    <label for="editNama" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="editNama" value="Yudi Setiawan">
                                    </div>
                                </div>
                                <!-- Jenis Kelamin -->
                                <div class="row mb-3">
                                    <label for="editJenisKelamin" class="col-sm-3 col-form-label text-end fw-bold">Jenis
                                        Kelamin</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="editJenisKelamin">
                                            <option value="Laki-laki" selected>Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="row mb-3">
                                    <label for="editEmail"
                                        class="col-sm-3 col-form-label text-end fw-bold">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="editEmail"
                                            value="Yudisetiawan@gmail.com">
                                    </div>
                                </div>
                                <!-- Tempat, Tanggal Lahir -->
                                <div class="row mb-3">
                                    <label for="editTtl" class="col-sm-3 col-form-label text-end fw-bold">Tempat,
                                        Tanggal Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="editTempat" value="Malang"
                                            placeholder="Tempat">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="editTanggal" value="1899-02-28">
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="row mb-3">
                                    <label for="editAlamat"
                                        class="col-sm-3 col-form-label text-end fw-bold">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="editAlamat" rows="3">Pasuruan</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="saveAdminChanges()">Save
                                Changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Data Admin -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true"
                data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="background-color: #F5F5F5;">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="addModalLabel">Tambah Data Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <!-- NIP -->
                                <div class="row mb-3">
                                    <label for="addNip" class="col-sm-3 col-form-label text-end fw-bold">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="addNip" class="form-control" placeholder="Masukkan NIP">
                                    </div>
                                </div>
                                <!-- Nama -->
                                <div class="row mb-3">
                                    <label for="addNama" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="addNama" class="form-control"
                                            placeholder="Masukkan Nama">
                                    </div>
                                </div>
                                <!-- Jenis Kelamin -->
                                <div class="row mb-3">
                                    <label for="addJenisKelamin" class="col-sm-3 col-form-label text-end fw-bold">Jenis
                                        Kelamin</label>
                                    <div class="col-sm-9">
                                        <select id="addJenisKelamin" class="form-control">
                                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="row mb-3">
                                    <label for="addEmail" class="col-sm-3 col-form-label text-end fw-bold">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" id="addEmail" class="form-control"
                                            placeholder="Masukkan Email">
                                    </div>
                                </div>
                                <!-- Tempat, Tanggal Lahir -->
                                <div class="row mb-3">
                                    <label for="addTtl" class="col-sm-3 col-form-label text-end fw-bold">Tempat, Tanggal
                                        Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" id="addTempat" class="form-control"
                                            placeholder="Masukkan Tempat Lahir">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" id="addTanggal" class="form-control">
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="row mb-3">
                                    <label for="addAlamat"
                                        class="col-sm-3 col-form-label text-end fw-bold">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea id="addAlamat" class="form-control" rows="3"
                                            placeholder="Masukkan Alamat"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="addData()">Tambah</button>
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
                [1, 'asc']
            ],
            ajax: {
                url: '/getDataAdmin',
                type: 'POST',
                data: function() {
                    return {
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
                    data: 'nip'
                },
                {
                    data: 'nama_pegawai'
                },
                {
                    data: 'email'
                },
                {
                    data: 'no_telp'
                },
                {
                    data: 'prodi'
                },
                {
                    data: 'action'
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

    //js for modal edit
    function confirmSave() {
        const userConfirmed = confirm("Apakah anda yakin ingin mengubah data Mahasiswa?");
        if (userConfirmed) {
            alert("Data telah berhasil disimpan!"); // Lakukan aksi penyimpanan data di sini

            // Menutup modal menggunakan Bootstrap instance
            const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
            modal.hide();

            // Hapus backdrop secara manual jika masih ada
            const backdrops = document.querySelectorAll('.modal-backdrop');
            backdrops.forEach((backdrop) => backdrop.remove()); // Hapus semua elemen backdrop
        } else {
            alert("Perubahan data dibatalkan.");
        }
    }

    function addData() {
        // Ambil nilai dari input field
        const nip = document.getElementById('addNip').value;
        const nama = document.getElementById('addNama').value;
        const jenisKelamin = document.getElementById('addJenisKelamin').value;
        const email = document.getElementById('addEmail').value;
        const tempatLahir = document.getElementById('addTempat').value;
        const tanggalLahir = document.getElementById('addTanggal').value;
        const alamat = document.getElementById('addAlamat').value;

        // Validasi sederhana untuk memastikan semua data diisi
        if (!nip || !nama || !jenisKelamin || !email || !tempatLahir || !tanggalLahir || !alamat) {
            alert('Semua data wajib diisi!');
            return;
        }

        // Simulasi penyimpanan data (misalnya menambahkannya ke tabel admin)
        console.log({
            nip,
            nama,
            jenisKelamin,
            email,
            tempatLahir,
            tanggalLahir,
            alamat
        });

        // Menambahkan data ke tabel admin secara dinamis
        const table = document.querySelector('table tbody');
        const newRow = table.insertRow();

        // Menambahkan data ke kolom tabel
        newRow.innerHTML = `
                <td>${nip}</td>
                <td>${nama}</td>
                <td>${jenisKelamin}</td>
                <td>${email}</td>
                <td>${tempatLahir}, ${tanggalLahir}</td>
                <td>${alamat}</td>
                <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;

        // Tutup modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
        modal.hide();

        // Reset form setelah data ditambahkan
        document.getElementById('addModal').querySelectorAll('input, select, textarea').forEach(input => input.value =
            '');
    }
    </script>
</body>

</html>