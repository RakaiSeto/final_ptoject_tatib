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
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style-css" />
</head>

<body>
    <div class="main-container">

        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>


        <!-- Content -->
        <div class="content px-3 pt-3 " style="margin-top : 56px;">

            <!-- breadcrumb -->
            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>

            <!-- alert -->
            <div class="alert alert-success mt-3" role="alert">
                Selamat datang <strong><?= $profile->nama_mahasiswa ?>.</strong> Ayo patuhi peraturan kampus demi
                menciptakan lingkungan
                belajar yang aman, nyaman, dan kondusif.
            </div>

            <div class="row">
                <div class="col-12 col-lg-7 mb-4 mb-md-0">
                    <div class="biodata">

                        <div class="row g-3 flex-column flex-md-row align-items-center">
                            <!-- Gambar dan Tombol -->
                            <div class="col-12 col-md-3 text-center">
                                <img alt="Profile Picture" src="<?= $profile->foto_mahasiswa ?>"
                                    class="img-fluid rounded mb-2" style="max-width: 100%; height: auto;" />
                                <button class="btn-generate mt-2" data-bs-toggle="modal"
                                    data-bs-target="#QRCodeModal">Generate QR
                                    Code</button>
                            </div>
                            <div class="col-12 col-md-9">
                                <table class="mt-3 ml-3 table table-responsive table-hover">
                                    <tr>
                                        <td>Nama</td>
                                        <td>: <?= $profile->nama_mahasiswa ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIM</td>
                                        <td>: <?= $profile->nim ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>: <?= $profile->id_kelas ?></td>
                                    </tr>
                                    <tr>
                                        <td>Prodi</td>
                                        <td>: <?= $profile->id_prodi ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>: <?= $profile->tanggal_lahir ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>: <?php echo $profile->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>: <?= $profile->email ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="bg-white p-3 position-relative">
                        <h5 class="fw-bold mb-3 text-dark">Pemberitahuan</h5>
                        <hr>
                        <div class="alert alert-danger">
                            <p class="fw-semibold">Anda masih memiliki pelanggaran yang belum terselesaikan!</p>
                            <a href="dataPelanggaran.php" class="btn btn-danger mt-2 mb-1"><i
                                    class="bi bi-info-circle me-2"></i>Lihat
                                Pelanggaran</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="QRCodeModal" tabindex="-1" aria-labelledby="buktiModalLabel" aria-hidden="true"
                data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="buktiModalLabel">Profil QR Code</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <!-- Gambar bukti pelanggaran -->
                            <img src="/public/img/QRCode-png" class="img-fluid" alt="Bukti Pelanggaran">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // JavaScript untuk toggle sidebar
    document.querySelector(".open-btn").addEventListener("click", function() {
        document.getElementById("side_nav").classList.add("active");
        document.querySelector(".content").classList.add("sidebar-open");
    });

    document.querySelector(".close-btn").addEventListener("click", function() {
        document.getElementById("side_nav").classList.remove("active");
        document.querySelector(".content").classList.remove("sidebar-open");
    });
    </script>
</body>

</html>