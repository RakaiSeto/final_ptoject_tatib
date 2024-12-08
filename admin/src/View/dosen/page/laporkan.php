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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />



</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <!-- Dashboard Content -->
        <div class="content px-3 pt-3" style="margin-top: 57px;">

            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
            <!-- 
        <div class="row">
            <div class="col-md-12"> -->
            <div class="bg-white p-3">

                <p class="fw-medium mb-3 fw-bold" style="font-size: 20px">Pilih Mahasiswa</p>
                <div>
                    <button class="btn btn-success me-2 gap-2" style="font-size: 16px">Cari Manual</button>
                    <button class="btn btn-primary btn-detail" style="font-size: 16px">Scan QR</button>
                </div>

            </div>

            <button class="btn btn-light dropdown-toggle border" type="button" data-bs-toggle="dropdown"
                data-bs-auto-close="true" aria-expanded="false">
                Pilih Prodi
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Teknik Informatika</a></li>
                <li><a class="dropdown-item" href="#">Sistem Informsi Bisnis</a></li>
                <li><a class="dropdown-item" href="#">D2 PPLS</a></li>
            </ul>
        </div>

        <div class="btn-group">
            <button class="btn btn-light dropdown-toggle border" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Pilih Kelas
            </button>
            <ul class="dropdown-menu dropend">
                <li class="dropdown">
                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Tingkat 1</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                        <li><a class="dropdown-item" href="#">A</a></li>
                        <li><a class="dropdown-item" href="#">B</a></li>
                        <li><a class="dropdown-item" href="#">C</a></li>
                        <li><a class="dropdown-item" href="#">D</a></li>
                        <li><a class="dropdown-item" href="#">E</a></li>
                        <li><a class="dropdown-item" href="#">F</a></li>
                        <li><a class="dropdown-item" href="#">G</a></li>
                        <li><a class="dropdown-item" href="#">H</a></li>
                        <li><a class="dropdown-item" href="#">I</a></li>
                    </ul>
                </li>
                <li class="dropdown dropend">
                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Tingkat 2</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                        <li><a class="dropdown-item" href="#">A</a></li>
                        <li><a class="dropdown-item" href="#">B</a></li>
                        <li><a class="dropdown-item" href="#">C</a></li>
                        <li><a class="dropdown-item" href="#">D</a></li>
                        <li><a class="dropdown-item" href="#">E</a></li>
                        <li><a class="dropdown-item" href="#">F</a></li>
                        <li><a class="dropdown-item" href="#">G</a></li>
                        <li><a class="dropdown-item" href="#">H</a></li>
                        <li><a class="dropdown-item" href="#">I</a></li>
                    </ul>
                </li>
                <li class="dropdown dropend">
                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Tingkat 3</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                        <li><a class="dropdown-item" href="#">A</a></li>
                        <li><a class="dropdown-item" href="#">B</a></li>
                        <li><a class="dropdown-item" href="#">C</a></li>
                        <li><a class="dropdown-item" href="#">D</a></li>
                        <li><a class="dropdown-item" href="#">E</a></li>
                        <li><a class="dropdown-item" href="#">F</a></li>
                        <li><a class="dropdown-item" href="#">G</a></li>
                        <li><a class="dropdown-item" href="#">H</a></li>
                        <li><a class="dropdown-item" href="#">I</a></li>
                    </ul>
                </li>
                <li class="dropdown dropend">
                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Tingkat 4</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                        <li><a class="dropdown-item" href="#">A</a></li>
                        <li><a class="dropdown-item" href="#">B</a></li>
                        <li><a class="dropdown-item" href="#">C</a></li>
                        <li><a class="dropdown-item" href="#">D</a></li>
                        <li><a class="dropdown-item" href="#">E</a></li>
                        <li><a class="dropdown-item" href="#">F</a></li>
                        <li><a class="dropdown-item" href="#">G</a></li>
                        <li><a class="dropdown-item" href="#">H</a></li>
                        <li><a class="dropdown-item" href="#">I</a></li>
                    </ul>
                </li>
            </ul>
        </div>


        <button class="btn btn-success" id="filterBtn">Filter </button>
        <div class="table-responsive mb-2 mt-4 d-none" id="filterTable">
            <table class="table table-bordered table-hover">
                <colgroup>
                    <col style="width: 5%;"> <!-- Kolom No -->
                    <col style="width: 25%;"> <!-- Kolom NIM -->
                    <col style="width: 50%;"> <!-- Kolom NAMA -->
                    <col style="width: 20%;"> <!-- Kolom Aksi -->
                </colgroup>
                <thead>
                    <tr>
                        <th class="px-3">No</th>
                        <th class="px-3">NIM</th>
                        <th class="px-3">NAMA</th>
                        <th class="px-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-3">1</td>
                        <td class="px-3">2341720045</td>
                        <td class="px-3">Agung Fradiansyah</td>
                        <td class="px-3"><button class="btn-detail" data-bs-toggle="modal"
                                data-bs-target="#pilihMhsModal">Pilih</button></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="modal fade" id="pilihMhsModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="background-color: #F5F5F5">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Pelanggaran</h5>
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
                                        <input type="text" class="form-control"
                                            value="Datang terlambat lebih dari 15 menit" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-3 col-form-label text-end fw-bold">Bukti
                                        Pelanggaran</label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#buktiModal">Lihat Bukti
                                            Pelanggaran</button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <button class="btn-detail me-2 p-2 px-3"
                                    style="background-color: #fff; color: #fd7e14; border: 1px solid #fd7e14"
                                    data-bs-toggle="modal" data-bs-target="#bandingModal">Ajukan Banding</button>
                                <button class="btn-detail p-2 px-3">Cetak Berita Acara</button>
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

    //dropdown
    $(document).ready(function() {
        $('.dropdown-submenu a.test').on("click", function(e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });


    //tombol filter
    document.getElementById('filterBtn').addEventListener('click', function() {
        const table = document.getElementById('filterTable');
        table.classList.toggle('d-none'); // Sembunyikan/tampilkan tabel
        table.classList.toggle('d-block');
    });
    </script>
</body>

</html>