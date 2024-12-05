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
    <div class="sidebar" id="side_nav">
      <div class="header-box px-5 pt-3 pb-2 d-flex justify-content-between">
        <img alt="Logo E-Tatib" src="/public/img/logo-svg" />
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
          <i class="fas fa-stream"></i>
        </button>
      </div>
      <ul class="list-unstyled px-2 py-1">
        <li>
          <a href="dashboard.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-home"></i>
            Dashboard</a>
        </li>
        <li>
          <a href="laporkan.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-book"></i>
            Laporkan</a>
        </li>
        <li class="active">
          <a href="RiwayatPelaporan.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
              class="fas fa-info-circle"></i> Riwayat Pelaporan</a>
        </li>
        <li>
          <a href="dataPelanggaran.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-print"></i>
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
          <span class="fw-medium" style="font-size: 28px">Riwayat Pelanggaran</span>
          <div class="d-flex ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="/public/img/fotoagung-jpeg" alt="User Profile Picture" class="rounded-circle" width="50"
                  height="50" />
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
              <li class="breadcrumb-item active" aria-current="page">Riwayat Pelaporan</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="bg-white border">
        <div class="input-group">
          <div class="form-outline" data-mdb-input-init>
            <input type="search" id="form1" class="form-control" placeholder="Cari apa kak? klik disini ya" />
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
                <td style="width: 520px;"> Tidak menjaga nama baik Polinema di masyarakat dan atau mencemarkan nama baik
                  Polinema melalui media apapun</td>
                  <td><span class="btn btn-warning fw-semibold" style="background-color: rgba(252, 192, 12, 0.25); color: rgb(252, 192, 12); 
                  border: 0; border-radius: 0; width: 114px; text-align: center;  padding: 10px 0;">Dalam proses</span></td>
                <td>
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
                </td>
              </tr>
              <tr>
                <td>11-10-2023</td>
                <td>2341720001</td>
                <td>Indah Cahya Ramadhani</td>
                <td>Tidak menjaga nama baik Polinema di masyarakat dan ...</td>
                <td><span class="btn btn-warning fw-semibold" style="background-color: rgba(252, 192, 12, 0.25); color: rgb(252, 192, 12); 
                  border: 0; border-radius: 0; width: 114px; text-align: center; padding: 10px 0;">Dalam proses</span></td>
                <td>
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
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
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
                </td>
              </tr>
              <tr>
                <td>07-11-2023</td>
                <td>2341720001</td>
                <td>Budi Santoso Putra</td>
                <td>Tidak menjaga nama baik Polinema di masyarakat dan ...</td>
                <td><span class="btn btn-danger fw-semibold" style="background-color: rgba(220, 53, 69, 0.25); color: rgb(220, 53, 69); 
                  border: 0; border-radius: 0; width: 114px; text-align: center; padding: 10px 0;">Dibatalkan</span></td>
                <td>
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
                </td>
              </tr>
              <tr>
                <td>23-12-2023</td>
                <td>2341720001</td>
                <td>Hendra Wijaya Kusuma</td>
                <td>Tidak menjaga nama baik Polinema di masyarakat dan ...</td>
                <td><span class="btn btn-success fw-semibold" style="background-color: rgba(40, 167, 69, 0.25); color: rgb(40, 167, 69); 
                  border: 0; border-radius: 0; width: 114px; text-align: center; padding: 10px 0;">Selesai</span></td>
                <td>
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
                </td>
              </tr>
              <tr>
                <td>01-08-2023</td>
                <td>2341720001</td>
                <td>Dedi Gunawan Saputra</td>
                <td style="width: 520px;"> Tidak menjaga nama baik Polinema di masyarakat dan atau mencemarkan nama baik
                  Polinema melalui media apapun</td>
                  <td><span class="btn btn-warning fw-semibold" style="background-color: rgba(252, 192, 12, 0.25); color: rgb(252, 192, 12); 
                  border: 0; border-radius: 0; width: 114px; text-align: center;  padding: 10px 0;">Dalam proses</span></td>
                <td>
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
                </td>
              </tr>
              <tr>
                <td>11-10-2023</td>
                <td>2341720001</td>
                <td>Indah Cahya Ramadhani</td>
                <td>Tidak menjaga nama baik Polinema di masyarakat dan ...</td>
                <td><span class="btn btn-warning fw-semibold" style="background-color: rgba(252, 192, 12, 0.25); color: rgb(252, 192, 12); 
                  border: 0; border-radius: 0; width: 114px; text-align: center; padding: 10px 0;">Dalam proses</span></td>
                <td>
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
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
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
                </td>
              </tr>
              <tr>
                <td>07-11-2023</td>
                <td>2341720001</td>
                <td>Budi Santoso Putra</td>
                <td>Tidak menjaga nama baik Polinema di masyarakat dan ...</td>
                <td><span class="btn btn-danger fw-semibold" style="background-color: rgba(220, 53, 69, 0.25); color: rgb(220, 53, 69); 
                  border: 0; border-radius: 0; width: 114px; text-align: center; padding: 10px 0;">Dibatalkan</span></td>
                <td>
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
                </td>
              </tr>
              <tr>
                <td>23-12-2023</td>
                <td>2341720001</td>
                <td>Hendra Wijaya Kusuma</td>
                <td>Tidak menjaga nama baik Polinema di masyarakat dan ...</td>
                <td><span class="btn btn-success fw-semibold" style="background-color: rgba(40, 167, 69, 0.25); color: rgb(40, 167, 69); 
                  border: 0; border-radius: 0; width: 114px; text-align: center; padding: 10px 0;">Selesai</span></td>
                <td>
                  <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
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