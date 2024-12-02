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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />

    
  </head>
  <body>
  <div class="main-container">
      <!-- Sidebar -->
      <div class="sidebar" id="side_nav">
        <div class="header-box px-xl-5 pt-3 pb-2 d-flex justify-content-between">
          <img alt="Logo E-Tatib" src="../img/logo.svg" />
          <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
            <i class="fas fa-stream"></i>
          </button>
        </div>
        <ul class="list-unstyled px-2 py-1">
          <li>
            <a href="dashboard.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-home"></i> Dashboard</a>
          </li>
          <li>
            <a href="dataPelanggaran.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-book"></i> Data Pelanggaran</a>
          </li>
          <li  class="active">
            <a href="cetakSurat.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-print"></i> Cetak Surat</a>
          </li>
          <li>
            <a href="informasi.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-info-circle"></i> Informasi</a>
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
            <span class="fw-medium" style="font-size: 28px">Data Pelanggaran</span>
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


        <!-- Dashboard Content -->
        <div class="content px-3 pt-3" style="margin-top: 56px">
        <!-- <button class="btn btn-success mb-4"><i class="bi bi-plus me-2"></i>Tambah</button> -->
          <div class="table-responsive mb-4">
            <table class="table table-bordered table-hover" id="tabel-awal">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pelanggaran</th>
                  <th>Status</th>
                  <th>File</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Merokok di kawasan kampus</td>
                  <td>Menunggu</td>
                  <td><button class="btn-generate btn btn-primary">Download</button></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Merusak sarana dan prasarana</td>
                  <td>Selesai</td>
                  <td><button class="btn-generate btn btn-primary">Download</button></td>
                </tr>
              </tbody>
            </table>
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

