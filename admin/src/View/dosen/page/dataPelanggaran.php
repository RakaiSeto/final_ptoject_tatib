<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pelanggaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/public/css/style-css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />


    <style>
        /* Ubah warna tab aktif */
        .nav-pills .nav-link.active {
            background-color: #fd7e14 !important;
            border-color: #fd7e14 !important;
            color: #fff !important;
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
    </style>
</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar" id="side_nav">
            <div class="header-box px-5 pt-3 pb-2 d-flex justify-content-between">
                <img alt="Logo E-Tatib" src="/public/img/logo-svg" />
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
                    <i class="fas fa-stream"></i>
                </button>
            </div>
            <ul class="list-unstyled px-2 py-1">
                <li>
                    <a href="dashboard.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                            class="fas fa-home"></i>
                        Dashboard</a>
                </li>
                <li>
                    <a href="laporkan.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                            class="fas fa-book"></i>
                        Laporkan</a>
                </li>
                <li>
                    <a href="RiwayatPelaporan.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                            class="fas fa-info-circle"></i> Riwayat Pelaporan</a>
                </li>
                <li class="active">
                    <a href="dataPelanggaran.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                            class="fas fa-print"></i>
                        Data Pelanggaran</a>
                </li>
                <li>
                    <a href="informasi.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                            class="fas fa-info-circle"></i> Informasi</a>
                </li>
            </ul>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light py-2 position-fixed">
            <div class="container-fluid">
                <div class="d-flex align-items-center w-100">
                    <button class="btn px-0 py-0 open-btn">
                        <i class="fas fa-stream me-2 d-md-none"></i>
                    </button>
                    <span class="fw-medium" style="font-size: 28px">Pelanggaran Mahasiswa</span>
                    <div class="d-flex ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/public/img/fotoagung-jpeg" alt="User Profile Picture" class="rounded-circle"
                                    width="50" height="50" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#change-password">Ganti Password</a></li>
                                <li><a class="dropdown-item" href="#logout">Logout</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="content px-3 pt-3" style="margin-top: 68px;">

            <div class="card mb-4">
                <div class="card-body py-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">E-Tatib</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelanggaran Mahasiswa Gue</li>
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
                            <table class="table table-hover" id="tabel-awal">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01-08-2023</td>
                                        <td>2341720001</td>
                                        <td>Dedi Gunawan Saputra</td>
                                        <td>Tidak menjaga nama baik Polinema</td>
                                        <td>
                                            <button type="button" class="btn"
                                                style="background-color: #fd7e14; color: #fff;">
                                                <i class="bi bi-eye-fill"></i> Tinjau
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tab Pane: Verifikasi Sanksi Mahasiswa -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="table-responsive my-4">
                            <table class="table table-hover" id="tabel-verifikasi">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01-08-2023</td>
                                        <td>2341720001</td>
                                        <td>Dedi Gunawan Saputra</td>
                                        <td>Tidak menjaga nama baik Polinema</td>
                                        <td>
                                            <button type="button" class="btn btn-success">
                                                <i class="bi bi-check"></i> Selesai
                                            </button>
                                        </td>
                                    </tr>
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



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $(".sidebar ul li").on("click", function () {
            $(".sidebar ul li.active").removeClass("active");
            $(this).addClass("active");
        });

        $(".open-btn").on("click", function () {
            $(".sidebar").addClass("active");
        });

        $(".close-btn").on("click", function () {
            $(".sidebar").removeClass("active");
        });
    </script>
</body>

</html>