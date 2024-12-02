<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <div class="main-container">
      <!-- Sidebar -->
      <div class="sidebar" id="side_nav">
        <div class="header-box px-5 pt-3 pb-2 d-flex justify-content-between">
          <img alt="Logo E-Tatib" src="../img/logo.svg" />
          <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
            <i class="fas fa-stream"></i>
          </button>
        </div>
        <ul class="list-unstyled px-2 py-1">
          <li class="active">
            <a href="dashboard.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-home"></i> Dashboard</a>
          </li>
          <li>
            <a href="dataPelanggaran.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-book"></i> Data Pelanggaran</a>
          </li>
          <li>
            <a href="cetakSurat.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-print"></i> Cetak Surat</a>
          </li>
          <li>
            <a href="informasi.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-info-circle"></i> Informasi</a>
          </li>
        </ul>
      </div>

      <!-- Navbar -->
      <nav class="navbar navbar-expand-md navbar-light py-2">
        <div class="container-fluid">
          <div class="d-flex align-items-center w-100">
            <button class="btn px-0 py-0 open-btn">
              <i class="fas fa-stream me-2 d-md-none"></i>
            </button>
            <span class="fw-medium" style="font-size: 28px">Dashboard</span>
            <div class="d-flex ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../img/fotoagung.jpeg" alt="User Profile Picture" class="rounded-circle" width="50" height="50" />
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

      <!-- Content -->
      <div class="content px-3 pt-3 " style="margin-top : 56px; ">
        <div class="alert alert-success mt-3" role="alert">
          Selamat datang <strong>Agung Fradiansyah.</strong> Ayo patuhi peraturan kampus demi menciptakan lingkungan belajar yang aman, nyaman, dan kondusif.
        </div>

  <div class="row">
        <div class="col-12 col-lg-7 mb-4 mb-md-0">
    <div class="biodata p-3 rounded">
      <div class="row g-3 flex-column flex-md-row align-items-center">
        <!-- Gambar dan Tombol -->
        <div class="col-12 col-md-3 text-center">
          <img 
            alt="Profile Picture" 
            src="../img/fotoagung.jpeg" 
            class="img-fluid rounded mb-2" 
            style="max-width: 100%; height: auto;"
          />
                  <button class="btn-generate mt-2" data-bs-toggle="modal" data-bs-target="#QRCodeModal">Generate QR Code</button>
                </div>
                <div class="col-12 col-md-9">
                  <table class="mt-3 ml-3 table table-responsive table-hover">
                    <tr>
                      <td>Nama</td>
                      <td>: Agung Fradiansyah</td>
                    </tr>
                    <tr>
                      <td>NIM</td>
                      <td>: 2341720025</td>
                    </tr>
                    <tr>
                      <td>Kelas</td>
                      <td>: 2E</td>
                    </tr>
                    <tr>
                      <td>Prodi</td>
                      <td>: Teknik Informatika</td>
                    </tr>
                    <tr>
                      <td>Jurusan</td>
                      <td>: Teknologi Informasi</td>
                    </tr>
                    <tr>
                      <td>TTL</td>
                      <td>: 28, Februari 2024</td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>: Laki-laki</td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>: Pasuruan</td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>: agungfradiansyah@gmail.com</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

        

          <div class="col-lg-5">
            <div class="bg-white p-3 position-relative">
              <h5 class="fw-bold mb-3 text-dark">Pemberitahuan</h5>
              <hr >
              <div class="alert alert-danger">
                <p class="fw-semibold">Anda mendapatkan laporan Pelanggaran baru, segera periksa di data pelanggaran</p>
                <a href="dataPelanggaran.php" class="btn btn-danger mt-2 mb-1"><i class="bi bi-info-circle me-2"></i>Lihat Pelanggaran</a>
                <!-- <button class="btn btn-danger mt-2 mb-1"><a href="pelanggaran.php"></a></button> -->
              </div>
              
              
            </div>
          </div>
        </div>

        <div class="modal fade" id="QRCodeModal" tabindex="-1" aria-labelledby="buktiModalLabel" aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="buktiModalLabel">Profil QR Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <!-- Gambar bukti pelanggaran -->
        <img src="../img/QRCode.png" class="img-fluid" alt="Bukti Pelanggaran">
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
document.querySelector(".open-btn").addEventListener("click", function () {
  document.getElementById("side_nav").classList.add("active");
  document.querySelector(".content").classList.add("sidebar-open");
});

document.querySelector(".close-btn").addEventListener("click", function () {
  document.getElementById("side_nav").classList.remove("active");
  document.querySelector(".content").classList.remove("sidebar-open");
});


      
    </script>
  </body>
</html>
