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
        <div class="header-box px-5 pt-3 pb-2 d-flex justify-content-between">
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
          <a href="laporkan.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-book"></i> Laporkan</a>
        </li>
        <li>
          <a href="RiwayatPelaporan.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-info-circle"></i> Riwayat Pelaporan</a>
        </li>
        <li>
          <a href="dataPelanggaran.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-print"></i> Data Pelanggaran</a>
        </li>
        <li class="active"  >
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

        <!--Content -->
        <div class="content px-3 pt-3">
        <div class="input-group">
            <div class="form-outline" data-mdb-input-init>
              <input type="search" id="form1" class="form-control" placeholder="Search" />
            </div>
            <button type="button" class="btn btn-detail" data-mdb-ripple-init>
              <i class="fas fa-search"></i>
            </button>
          </div>

          <div class="table-responsive my-4">
            <table class="table table-bordered table-hover" id="tabel-awal">
              <thead>
              <tr>
                  <th>No</th>
                  <th>Pelanggaran</th>
                  <th>Tingkat</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
                <td>Berkomunikasi dengan tidak sopan, baik tertulis atau tidak tertulis kepada mahasiswa, dosen, karyawan, atau orang lain</td>
                <td>V</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Berbusana tidak sopan dan tidak rapi, seperti pakaian ketat, transparan, t-shirt tidak berkerah, tank top, hipster, rok mini, celana pendek, celana tiga per empat, legging, model celana atau baju koyak, sandal, sepatu sandal di lingkungan kampus</td>
                <td>IV</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Mahasiswa laki-laki berambut tidak rapi, gondrong, atau panjang rambutnya melewati batas alis mata di bagian depan, telinga di bagian samping atau menyentuh kerah baju di bagian leher</td>
                <td>IV</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Mahasiswa berambut dengan model punk, dicat selain hitam dan/atau skinned</td>
                <td>IV</td>
              </tr>
              <tr>
                <td>5</td>
                <td>Makan atau minum di dalam ruang kuliah/laboratorium/bengkel</td>
                <td>IV</td>
              </tr>
              <tr>
                <td>6</td>
                <td>Melanggar peraturan/ketentuan yang berlaku di Polinema baik di Jurusan/Program Studi</td>
                <td>III</td>
              </tr>
              <tr>
                <td>7</td>
                <td>Tidak menjaga kebersihan di seluruh area Polinema</td>
                <td>III</td>
              </tr>
              <tr>
                <td>8</td>
                <td>Membuat kegaduhan yang mengganggu pelaksanaan perkuliahan atau praktikum yang sedang berlangsung</td>
                <td>III</td>
              </tr>
              <tr>
                <td>9</td>
                <td>Merokok di luar area kawasan merokok</td>
                <td>III</td>
              </tr>
              <tr>
                <td>10</td>
                <td>Bermain kartu, game online di area kampus</td>
                <td>III</td>
              </tr>
              <tr>
                <td>11</td>
                <td>Mengotori atau mencoret-coret meja, kursi, tembok, dan lain-lain di lingkungan Polinema</td>
                <td>III</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Bertingkah laku kasar atau tidak sopan kepada mahasiswa, dosen, dan/atau karyawan</td>
                <td>III</td>
              </tr>
              <tr>
                <td>13</td>
                <td>Merusak sarana dan prasarana yang ada di area Polinema</td>
                <td>II</td>
              </tr>
              <tr>
                <td>14</td>
                <td>Tidak menjaga ketertiban dan keamanan di seluruh area Polinema (misalnya: parkir tidak pada tempatnya, konvoi selebrasi wisuda dll)</td>
                <td>II</td>
              </tr>
              <tr>
                <td>15</td>
                <td>Melakukan pengotoran/pengrusakan barang milik orang lain termasuk milik Politeknik Negeri Malang</td>
                <td>II</td>
              </tr>
              <tr>
                <td>16</td>
                <td>Mengakses materi pornografi di kelas atau area kampus</td>
                <td>II</td>
              </tr>
              <tr>
                <td>17</td>
                <td>Membawa dan/atau menggunakan senjata tajam dan/atau senjata api untuk hal kriminal</td>
                <td>II</td>
              </tr>
              <tr>
                <td>18</td>
                <td>Melakukan perkelahian, serta membentuk geng/kelompok yang bertujuan negatif</td>
                <td>II</td>
              </tr>
              <tr>
                <td>19</td>
                <td>Melakukan kegiatan politik praktis di dalam kampus</td>
                <td>II</td>
              </tr>
              <tr>
                <td>20</td>
                <td>Melakukan tindakan kekerasan atau perkelahian di dalam kampus</td>
                <td>II</td>
              </tr>
              <tr>
                <td>21</td>
                <td>Melakukan penyalahgunaan identitas untuk perbuatan negatif</td>
                <td>II</td>
              </tr>
              <tr>
                <td>22</td>
                <td>Mengancam, baik tertulis atau tidak tertulis kepada mahasiswa, dosen, dan/atau karyawan</td>
                <td>II</td>
              </tr>
              <tr>
                <td>23</td>
                <td>Mencuri dalam bentuk apapun</td>
                <td>II</td>
              </tr>
              <tr>
                <td>24</td>
                <td>Melakukan kecurangan dalam bidang akademik, administratif, dan keuangan</td>
                <td>II</td>
              </tr>
              <tr>
                <td>25</td>
                <td>Melakukan pemerasan dan/atau penipuan</td>
                <td>II</td>
              </tr>
              <tr>
                <td>26</td>
                <td>Melakukan pelecehan dan/atau tindakan asusila dalam segala bentuk di dalam dan di luar kampus</td>
                <td>II</td>
              </tr>
              <tr>
                <td>27</td>
                <td>Berjudi, mengkonsumsi minuman keras, dan/atau bermabuk-mabukan di lingkungan dan di luar lingkungan Kampus Polinema</td>
                <td>I</td>
              </tr>
              <tr>
                <td>28</td>
                <td>Mengikuti organisasi dan atau menyebarkan faham-faham yang dilarang oleh Pemerintah</td>
                <td>I</td>
              </tr>
              <tr>
                <td>29</td>
                <td>Melakukan pemalsuan data/dokumen/tanda tangan</td>
                <td>I</td>
              </tr>
              <tr>
                <td>30</td>
                <td>Melakukan plagiasi (copy paste) dalam tugas-tugas atau karya ilmiah</td>
                <td>I</td>
              </tr>
              <tr>
                <td>31</td>
                <td>Tidak menjaga nama baik Polinema di masyarakat dan/atau mencemarkan nama baik Polinema melalui media apapun</td>
                <td>I</td>
              </tr>
              <tr>
                <td>32</td>
                <td>Melakukan kegiatan atau sejenisnya yang dapat menurunkan kehormatan atau martabat Negara, Bangsa dan Polinema</td>
                <td>I</td>
              </tr>
              <tr>
                <td>33</td>
                <td>Menggunakan barang-barang psikotropika dan/atau zat-zat Adiktif lainnya</td>
                <td>I</td>
              </tr>
              <tr>
                <td>34</td>
                <td>Mengedarkan serta menjual barang-barang psikotropika dan/atau zat-zat Adiktif lainnya</td>
                <td>I</td>
              </tr>
              <tr>
                <td>35</td>
                <td>Terlibat dalam tindakan kriminal dan dinyatakan bersalah oleh Pengadilan</td>
                <td>I</td>
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

