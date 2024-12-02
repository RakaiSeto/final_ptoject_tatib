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
          <li class="active">
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



        <div class="content px-3 pt-3 position-relative">
          <h2 class="h3 mb-3" style="font-size: 24px">Pelanggaran Terbaru</h2>
          <div class="table-responsive mb-4">
            <table class="table table-bordered table-hover" id="tabel-awal">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Pelanggaran</th>
                  <th>Tingkat</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Merokok di kawasan kampus</td>
                  <td>3</td>
                  <td>19/11/2024</td>
                  <td><button class="btn-detail" data-bs-toggle="modal" data-bs-target="#exampleModal">Lihat Detail</button></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Merusak sarana dan prasarana</td>
                  <td>2</td>
                  <td>19/11/2024</td>
                  <td><button class="btn btn-detail">Lihat Detail</button></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Makan atau minum di dalam ruang...</td>
                  <td>3</td>
                  <td>19/11/2024</td>
                  <td><button class="btn btn-detail">Lihat Detail</button></td>
                </tr>
              </tbody>
            </table>
          </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
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
    <label for="" class="col-sm-3 col-form-label text-end fw-bold">Jenis Pelanggaran</label>
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
      <input type="text" class="form-control" value="Datang terlambat lebih dari 15 menit" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label text-end fw-bold">Bukti Pelanggaran</label>
    <div class="col-sm-9">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#buktiModal">Lihat Bukti Pelanggaran</button>
    </div>
  </div>
</div>
<div class="d-flex justify-content-end mt-2">
    <button class="btn-detail me-2 p-2 px-3" style="background-color: #fff; color: #fd7e14; border: 1px solid #fd7e14" data-bs-toggle="modal" data-bs-target="#bandingModal">Ajukan Banding</button>
    <button class="btn-detail p-2 px-3">Cetak Berita Acara</button>
  </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="buktiModal" tabindex="-1" aria-labelledby="buktiModalLabel" aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="buktiModalLabel">Bukti Pelanggaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <!-- Gambar bukti pelanggaran -->
        <img src="https://via.placeholder.com/600x400" class="img-fluid" alt="Bukti Pelanggaran">
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="bandingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="background-color: #F5F7FA">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Pelanggaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="bg-body-tertiary p-3" style="background-color: #b1b">
              
        <form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="tanggapan" class="form-label fw-bold">Tulis Tanggapan</label>
    <textarea class="form-control" id="tanggapan" rows="5" name="tanggapan" placeholder="Tulis tanggapan disini"></textarea>
  </div>
  
  <div class="mb-3">
    <label for="foto" class="form-label fw-bold">Bukti Foto (Jika ada)</label>
    <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
  </div>
  
  <div class="d-flex justify-content-end mt-2">
  <button type="button" class="btn btn-primary me-2">Cancel</button>
  <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

        </div>
      </div>
    </div>
  </div>
</div>


          <div class="mb-4">
            <select class="form-select" id="periode-select">
              <option selected="" value="awal">2023/2024 Ganjil</option>
              <option value="baru">2023/2024 Genap</option>
            </select>
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

//modal foro

// const mainModal = document.getElementById('exampleModal');
// mainModal.addEventListener('hidden.bs.modal', function () {
//   // Redirect ke halaman utama setelah modal utama ditutup
//   window.location.href = 'dataPelanggaran.php'; // Ganti dengan URL yang sesuai
// });


const buktiModal = document.getElementById('buktiModal');
buktiModal.addEventListener('hidden.bs.modal', function () {
  // Setelah buktiModal tertutup, tampilkan kembali exampleModal
  const firstModal = new bootstrap.Modal(document.getElementById('exampleModal'));
  firstModal.show();
  
  
});




    </script>
  </body>
</html>
