<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/public/css/style-css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />

</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!--Content -->
        <div class="content px-3 pt-3 " style="margin-top: 56px;    ">
            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>

            <div class="bg-white">
                <h5 class="fw-bold">Laporan Pelanggaran</h5>
                <div class="filter-bar d-flex align-items-center gap-2">

                    <form class="form-inline">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Cari" aria-label="Username"
                                aria-describedby="basic-addon1">
                            <div class="btn-group">
                                <button type="button" class=" btn dropdown-toggle border" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="bi bi-sliders me-1"></i>
                                    Filter
                                </button>
                                <div class="dropdown-menu dropdown-menu-right p-4" style="min-width: 300px;">
                                    <form id="filterForm">
                                        <!-- Filter by Date -->
                                        <div class="mb-3">
                                            <label for="fromDate" class="form-label">Dari</label>
                                            <input type="date" id="fromDate" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="toDate" class="form-label">Sampai</label>
                                            <input type="date" id="toDate" class="form-control">
                                        </div>

                                        <!-- Filter by Tingkat -->
                                        <div class="mb-3">
                                            <label for="tingkat" class="form-label">Tingkat Pelanggaran</label>
                                            <select id="tingkat" class="form-select">
                                                <option value="" selected disabled>Pilih Tingkat</option>
                                                <option value="1">Pelanggaran Tingkat 1</option>
                                                <option value="2">Pelanggaran Tingkat 2</option>
                                                <option value="3">Pelanggaran Tingkat 3</option>
                                                <option value="4">Pelanggaran Tingkat 4</option>
                                                <option value="4">Pelanggaran Tingkat 5</option>
                                            </select>
                                        </div>

                                        <!-- Filter by Prodi -->
                                        <div class="mb-3">
                                            <label for="prodi" class="form-label">Prodi</label>
                                            <select id="prodi" class="form-select">
                                                <option value="" selected disabled>Pilih Prodi</option>
                                                <option value="TI">Teknik Informatika</option>
                                                <option value="SI">Sistem Informasi Bisnis</option>
                                                <option value="TK">PPLS</option>
                                            </select>
                                        </div>

                                        <!-- Filter by Kelas -->
                                        <div class="mb-3">
                                            <label for="kelas" class="form-label">Tingkat Kelas</label>
                                            <select id="kelas" class="form-select">
                                                <option value="" selected disabled>Pilih Tingkat Kelas</option>
                                                <option value="Kelas1">Tingkat 1</option>
                                                <option value="Kelas2">Tingkat 2</option>
                                                <option value="Kelas3">Tingkat 3</option>
                                                <option value="Kelas4">Tingkat 4</option>
                                            </select>
                                        </div>

                                        <!-- Filter by Kelas -->
                                        <div class="mb-3">
                                            <label for="kelas" class="form-label">Kelas</label>
                                            <select id="kelas" class="form-select">
                                                <option value="" selected disabled>Pilih Kelas</option>
                                                <option value="A">Kelas A</option>
                                                <option value="B">Kelas B</option>
                                                <option value="C">Kelas C</option>
                                            </select>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="d-flex justify-content-between">
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                            <button type="submit" class="btn-detail">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="ms-auto d-flex align-items-center">
                        <div class="d-flex justify-content-between align-items-center mt-3 mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <label for="rowsPerPage" class="form-label mb-0">Baris per halaman:</label>
                                <select id="rowsPerPage" class="form-select" style="width: auto;">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>




                <table class="table table-responsive table-hover table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Tanggal</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Dosen Pelapor</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Ambil data kelas dari model
                        // Misal: $kelasList adalah hasil query ke database untuk mengambil data kelas
                        foreach ($pelanggaranList as $index => $PelanggaranMahasiswa) { ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $PelanggaranMahasiswa->nim ?></td>
                            <td><?= $PelanggaranMahasiswa->nama_mahasiswa ?></td>
                            <td><?= date('l, d M Y', strtotime($PelanggaranMahasiswa->datetime)) ?></td>
                            <td><?= $PelanggaranMahasiswa->jenis_pelanggaran ?></td>
                            <td><?= $PelanggaranMahasiswa->nama_pegawai?></td>
                            <td>
                                <button class="btn-detail btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">lihat detail
                                </button>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>

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
                                            <label for=""
                                                class="col-sm-3 col-form-label text-end fw-bold">Tingkat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="Ringan" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for=""
                                                class="col-sm-3 col-form-label text-end fw-bold">Tanggal</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="28 Februari 2024"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for=""
                                                class="col-sm-3 col-form-label text-end fw-bold">Catatan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    value="Datang terlambat lebih dari 15 menit" readonly>
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
                                <img src="https://via.placeholder.com/600x400" class="img-fluid"
                                    alt="Bukti Pelanggaran">
                            </div>
                        </div>
                    </div>
                </div>

                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">‹</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">›</a>
                        </li>
                    </ul>
                </nav>

            </div>

        </div>

    </div>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
    // Pastikan modal pertama ditutup sebelum modal kedua dibuka
    document.getElementById('buktiModal').addEventListener('show.bs.modal', function() {
        let modal1 = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
        if (modal1) {
            modal1.hide(); // Tutup modal pertama
        }
    });

    // Buka kembali modal pertama saat modal kedua ditutup
    document.getElementById('buktiModal').addEventListener('hide.bs.modal', function() {
        let modal1 = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal1.show(); // Buka modal pertama kembali
    });

    // Hapus backdrop jika semua modal ditutup
    document.getElementById('exampleModal').addEventListener('hide.bs.modal', function() {
        const backdrops = document.querySelectorAll('.modal-backdrop');
        backdrops.forEach((backdrop) => backdrop.remove()); // Hapus semua backdrop
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
    </script>
</body>

</html>