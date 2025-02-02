<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Riwayat Pelaporan</title>
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

        <!-- Dashboard Content -->
        <div class="content px-3 pt-3" style="margin-top: 68px;">
            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" style="color: #fd7e14;">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
            </div>


            <div class="bg-white border">
                <div class="input-group">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="search" id="form1" class="form-control" placeholder="Cari" />
                    </div>
                    <button type="button" class="btn btn-detail" data-mdb-ripple-init>
                        <i class="fas fa-search"></i>
                    </button>


                    <div style="margin-left: auto;">
                        <label for="rowsPerPage" class="me-2">Baris per halaman</label>
                        <select id="rowsPerPage" class="form-select w-auto d-inline">
                            <option value="10" selected>10</option>
                            <option value="25">20</option>
                            <option value="50">30</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive my-4">
                    <table class="table table-hover" id="tabel-awal">

                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Pelanggaran</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01-08-2023</td>
                                <td>2341720001</td>
                                <td>Dedi Gunawan Saputra</td>
                                <td style="width: 520px;"> Tidak menjaga nama baik Polinema di masyarakat dan atau
                                    mencemarkan nama baik
                                    Polinema melalui media apapun</td>
                                <td><span class="btn btn-warning fw-semibold" style="background-color: rgba(252, 192, 12, 0.25); color: rgb(252, 192, 12); 
                  border: 0; border-radius: 0; width: 114px; text-align: center;  padding: 10px 0;">Dalam proses</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#lihatDetailModal">Lihat
                                                    Detail</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modifikasiModal">Modifikasi</a>
                                            </li>
                                            <li><a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#batalkanModal">Batalkan</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>11-10-2023</td>
                                <td>2341720001</td>
                                <td>Indah Cahya Ramadhani</td>
                                <td>Tidak menjaga nama baik Polinema di masyarakat dan ...</td>
                                <td><span class="btn btn-warning fw-semibold" style="background-color: rgba(252, 192, 12, 0.25); color: rgb(252, 192, 12); 
                  border: 0; border-radius: 0; width: 114px; text-align: center; padding: 10px 0;">Dalam proses</span>
                                </td>
                                <td>
                                <div class="dropdown">
                                        <button class="btn btn-sm btn-light" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#lihatDetailModal">Lihat
                                                    Detail</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modifikasiModal">Modifikasi</a>
                                            </li>
                                            <li><a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#batalkanModal">Batalkan</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>21-10-2023</td>
                                <td>2341720001</td>
                                <td>Ahmad Rizky Maulana</td>
                                <td>Tidak menjaga nama baik Polinema di masyarakat dan ...</td>
                                <td><span class="btn btn-success fw-semibold" style="background-color: rgba(40, 167, 69, 0.25); color: rgb(40, 167, 69); 
                  border: 0; border-radius: 0; width: 114px; text-align: center; padding: 10px 0;">Selesai</span></td>
                                <td>
                                <div class="dropdown">
                                        <button class="btn btn-sm btn-light" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#lihatDetailModal">Lihat
                                                    Detail</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modifikasiModal">Modifikasi</a>
                                            </li>
                                            <li><a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#batalkanModal">Batalkan</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>07-11-2023</td>
                                <td>2341720001</td>
                                <td>Budi Santoso Putra</td>
                                <td>Tidak menjaga nama baik Polinema di masyarakat dan ...</td>
                                <td><span class="btn btn-danger fw-semibold" style="background-color: rgba(220, 53, 69, 0.25); color: rgb(220, 53, 69); 
                  border: 0; border-radius: 0; width: 114px; text-align: center; padding: 10px 0;">Dibatalkan</span>
                                </td>
                                <td>
                                <div class="dropdown">
                                        <button class="btn btn-sm btn-light" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#lihatDetailModal">Lihat
                                                    Detail</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modifikasiModal">Modifikasi</a>
                                            </li>
                                            <li><a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#batalkanModal">Batalkan</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
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

                    <!-- lihat detail modal -->
                    <div class="modal fade" id="lihatDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" data-bs-backdrop="static"
                        style="background-color: rgba(255, 255, 255, 0.20);">
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
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="2541987544" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="No Name" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">Kelas</label>
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
                                                    class="col-sm-3 col-form-label text-end fw-bold">Sanksi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="Beli gorengan"
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger">Batalkan
                                                Laporan</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modifikasiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" data-bs-backdrop="static"
                        style="background-color: rgba(255, 255, 255, 0.20);">
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
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="2541987544">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="No Name">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">Kelas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="2E">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Jenis
                                                    Pelanggaran</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="Terlambat">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">Tingkat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="Ringan">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">Tanggal</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="28 Februari 2024">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">Catatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        value="Datang terlambat lebih dari 15 menit">
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batalkan
                                                Laporan</button>
                                            <button type="button" class="btn btn-success">Ubah</button>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="lihatDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" data-bs-backdrop="static"
                        style="background-color: rgba(255, 255, 255, 0.20);">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content" style="background-color: #F5F5F5">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Modifikasi Laporan
                                        Pelanggaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="bg-body-tertiary">

                                        <div class="form-group">
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="2541987544" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="No Name" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-end fw-bold">Kelas</label>
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
                                                    class="col-sm-3 col-form-label text-end fw-bold">Sanksi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="Beli gorengan"
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger">Batalkan
                                                Laporan</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
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
    </div>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
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