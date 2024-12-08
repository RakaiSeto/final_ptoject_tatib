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