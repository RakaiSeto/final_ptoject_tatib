<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="/public/css/style-css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
  <div class="main-container">
    <!-- Sidebar -->
    <?php require_once 'sidebar.php'; ?>
    
    <!-- Navbar -->
    <?php require_once 'navbar.php'; ?>
    
    <!-- Dashboard Content -->
    <div class="content px-3 pt-3" style="margin-top: 60px;">
    <?php
      // session_start();
      if (!empty($_SESSION['Error'])) {
          echo '<div class="alert alert-danger" role="alert">' . $_SESSION['Error'] . '</div>';
      }
      unset($_SESSION['Error'])
    ?>
      <!-- Cards -->
      <div class="row mb-3">
        <!-- Card 1 -->
        <div class="col-md-3">
          <div class="card py-2">
            <div class="card-body">
              <div class="row">
                <div class="col-4 text-end align-self-center">
                  <i class="fas fa-arrow-up" style="color: #17A2B8; background-color: rgba(23, 162, 184, 0.25); border-radius: 50%; width: 50px; height: 50px; display: inline-flex; justify-content: center; align-items: center; font-size: 24px;"></i>
                </div>
                <div class="col-8">
                  <h5 class="card-title fw-semibold" style="font-size: 28px">234</h5>
                  <p class="card-text fw-semibold" style="font-size: 16px; color: #b1b1b1">Total Pelanggaran</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
            <div class="card py-2">
              <div class="card-body">
                <div class="row">
                  <div class="col-4 text-end align-self-center">
                    <i class="bi bi-arrow-repeat" STYLE="color: #FFC107;  background-color: rgba(255, 193, 7, 0.25) ; border-radius: 50%; width: 50px; height: 50px; display: inline-flex; justify-content: center; align-items: center; font-size: 24px;"></i>
                  </div>
                  <div class="col-8">
                    <h5 class="card-title fw-semibold" style="font-size: 28px">234</h5>
                    <p class="card-text fw-semibold" style="font-size: 16px; color: #b1b1b1">Pelanggaran Proses</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
          <div class="card py-2">
            <div class="card-body">
              <div class="row">
                <div class="col-4 text-end align-self-center">
                  <i class="fas fa-plus" style="color: #28A745; background-color: rgba(40, 167, 69, 0.25); border-radius: 50%; width: 50px; height: 50px; display: inline-flex; justify-content: center; align-items: center; font-size: 24px;"></i>
                </div>
                <div class="col-8">
                  <h5 class="card-title fw-semibold" style="font-size: 28px">234</h5>
                  <p class="card-text fw-semibold" style="font-size: 16px; color: #b1b1b1">Pelanggaran Terbaru</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
            <div class="card py-2">
              <div class="card-body">
                <div class="row">
                  <div class="col-4 text-end align-self-center">
                    <i class="bi bi-flag-fill" STYLE="color: #FD7E14;  background-color: rgba(253, 126, 20, 0.25) ; border-radius: 50%; width: 50px; height: 50px; display: inline-flex; justify-content: center; align-items: center; font-size: 24px;"></i>
                  </div>
                  <div class="col-8">
                    <h5 class="card-title fw-semibold" style="font-size: 28px">234</h5>
                    <p class="card-text fw-semibold" style="font-size: 16px; color: #b1b1b1">Pelanggaran Selesai</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- Duplicate Cards Example (Remove if Necessary) -->
        <!-- Repeat structure for other cards -->

      </div>

      <!-- <div id="myPlot" style="width:100%;max-width:700px"></div> -->


      <!-- Graphs -->
      <div class="row">
        <div class="col-md-8 col-12">
          <div class="biodata">
            <p class="fw-medium mb-3" style="font-size: 20px">Statistik Data Pelanggaran </p>
            <div id="myPlot" style="width:100%;max-width:100%"></div>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <div class="biodata">
            <p class="fw-medium mb-3" style="font-size: 20px">Total Pelanggaran</p>
            <div id="myPlot1" style="width:100%;max-width:100%"></div>
          </div>
        </div>
      </div>

      <div class="bg-white mt-3 p-3">
      <h2 class="h3 mb-3 mt-3 fw-semibold" style="font-size: 24px">Pelanggaran Terbaru</h2>
      <div class="input-group mb-3 gap-2" >
        <!-- <div class="form-outline" data-mdb-input-init>
              <input type="search" id="form1" class="form-control" placeholder="Search" />
            </div> -->
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
            </div>
          </div>
      
          <div class="table-responsive mb-2">
            <table class="table table-bordered table-hover" id="tabel-awal">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Tanggal</th>
                  <th>Jenis Pelanggaran</th>
                  <th>Tingkat</th>
                  <th>Catatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>12345678</td>
                  <td>Oriza Sativa</td>
                  <td>19/11/2024</td>
                  <td>Melakukan tindakan asusila</td>
                  <td>1</td>
                  <td>menghina rektor</td>
                  <td>
                  <button type="button" id="btnTriggerModal" class="btn-detail"
                          data-bs-toggle="modal" data-bs-target="#modalTinjau"><i
                          class="bi bi-eye-fill"></i>
                          Tinjau
                  </button>                            
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
    </div>
  </div>

  <div class="modal fade" id="modalTinjau" data-bs-backdrop="static"
        style="background-color: rgba(255, 255, 255, 0.20);" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tinjau Pelanggaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-body-tertiary">
                        <div class="form-group">
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="12345678" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="Oriza Sativa" readonly>
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
                                    <input type="text" class="form-control" value="Tingkat 1" readonly>
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
                                    <input type="text" class="form-control" value="Datang terlambat lebih dari 15 menit"
                                        readonly>
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
                <!-- berikan sanksi -->
                <hr class="mt-1 mb-2">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Berikan Sanksi</label>
                            <div class="col-sm-9">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-light dropdown-toggle border d-flex justify-content-between align-items-center col-sm-12"
                                        type="button" id="dropdownButton" data-bs-toggle="dropdown"
                                        aria-expanded="false"> Pilih Sanksi
                                    </button>
                                    <ul class="dropdown-menu col-sm-12">
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Mencuri dalam bentuk apapun"
                                                onclick="updateProdiDropdown(this)">penggantian kerugian atau penggantian benda/barang semacamnya</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Melakukan kecurangan dalam bidang akademik, administratif,dan keuangan"
                                                onclick="updateProdiDropdown(this)">Melakukan tugas layanan sosial dalam jangka waktu tertentu</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Melakukan pemerasan dan/atau penipuan"
                                                onclick="updateProdiDropdown(this)">Diberikan nilai D pada mata kuliah terkait saat melakukan pelanggaran.</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Melakukan pelecehan dan/atau tindakan asusila dalam segala bentuk di dalam dan luar lingkungan kampus polinema"
                                                onclick="updateProdiDropdown(this)">Dinonaktifkan (Cuti Akademik/ Terminal) selama dua semester</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Mengikuti organisasi dan atau menyebarkan faham-faham yangdilarang oleh Pemerintah"
                                                onclick="updateProdiDropdown(this)">Diberhentikan sebagai mahasiswa.</a></li>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Detail Sanksi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control dynamic-width" id="catatanSanksi" rows="3"
                                    placeholder="Tambahkan catatan detail sanksi yang diberikan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn-detail" style="padding: 6.5px 12px" data-bs-dismiss="modal" onclick="submitSanksi()" >Kirim</button>
            </div>
        </div>
    </div>
</div>
                                </div>
                            </div>
                        </div>
                    </form>
<script>
    function submitSanksi() {
        alert("Sanksi berhasil dikirim!");
    }
</script>

  

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>

    //Grafik
    const xArray = ["January<br>2024 ", "February<br>2024", "March<br>2024", "April<br>2024", "May<br>2024", "June<br>2024"];
const yArray = [8, 10, 15, 8, 9, 10]; // Sesuaikan jumlah data dengan xArray

const data = [{
  x: xArray,
  y: yArray,
  mode: "lines", 
  line: { shape: "spline", color: "#fd7e14", width: 2 }, 
}];

const layout = {
  xaxis: {title: "Months"},
  yaxis: {range: [5, 16], title: "Total Pelanggar"},  
  // title: "House Prices vs. Month"  
};

Plotly.newPlot("myPlot", data, layout);

//pie

// Array yang berisi kategori untuk diagram pie
const xArray1 = ["D2 PPLS", "D4 TI", "D4 SIB"];

// Array yang berisi nilai untuk setiap kategori
const yArray1 = [20, 45, 35];

// Menghitung total dari semua nilai dalam yArray1
const total = yArray1.reduce((acc, value) => acc + value, 0);

// Menghitung persentase dari setiap nilai
const percentageArray = yArray1.map(value => (value / total * 100).toFixed(2)); // Menghitung persentase dan membatasi dua angka desimal

// Memperbarui label dengan menambahkan persentase pada setiap kategori
const updatedLabels = xArray1.map((label, index) => `${label}<br>${percentageArray[index]}%`);

// Layout pengaturan untuk diagram pie
const layout1 = {
  title: "From Jan to Okt 2024", // Judul diagram
  legend: {
    orientation: "h", // Menjadikan legend horizontal
    x: 0.5, // Posisi horizontal legend
    xanchor: "center", // Menyelaraskan legend secara horizontal di tengah
    y: -0.2, // Posisi vertikal legend di bawah chart
    yanchor: "bottom" // Menyelaraskan legend secara vertikal
  }
};

// Data untuk diagram pie, menggunakan label yang telah diperbarui dengan persentase
const data1 = [{
  labels: updatedLabels, // Menggunakan label yang telah diperbarui dengan persentase
  values: yArray1, // Nilai-nilai yang digunakan untuk diagram pie
  hole: .6, // Membuat diagram pie menjadi diagram cincin (hole = 0.6)
  type: "pie", // Menentukan jenis chart (pie chart)
  marker: {
    colors: ["#5A6ACF", "#8593ED", "#FD7E14"] // Warna untuk tiap segmen diagram
  },
  textinfo: "none", // Tidak menampilkan teks di dalam diagram
  hovertemplate: "%{label}<br>%{percent}",
}];

// Membuat diagram pie dengan Plotly menggunakan data dan layout yang telah disiapkan
Plotly.newPlot("myPlot1", data1, layout1);


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
