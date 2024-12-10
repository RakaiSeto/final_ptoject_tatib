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
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />


</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>

        <!--Content -->
        <div class="content px-3 pt-3 " style="margin-top: 56px;    ">
            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
                    </ol>
                </nav>
            </div>

            <div class="bg-white">
                <!-- Button Tambah Mahasiswa -->
                <div class="text-start mb-3">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah Mahasiswa
                    </button>
                </div>
                <div class="filter-bar d-flex align-items-center gap-2">

                    <!-- <span><i class="fas fa-filter"></i> Filter</span> -->

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
                    <div class="ms-auto d-flex align-items-center">
                        <div class="d-flex justify-content-between align-items-center mt-3 mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <label for="rowsPerPage" class="form-label mb-0">Baris per halaman:</label>
                                <select id="rowsPerPage" class="form-select" style="width: auto;">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>



                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>
                                NIM
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Jenis Kelamin
                            </th>
                            <th>
                                Kelas
                            </th>
                            <th>
                                Prodi
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                2341720015
                            </td>
                            <td>
                                Yudi Setiawan
                            </td>
                            <td>
                                Laki-laki
                            </td>
                            <td>
                                2C
                            </td>
                            <td>
                                TI
                            </td>
                            <td>
                                Pasuruan
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fas fa-eye">
                                    </i>
                                </button>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    <i class="fas fa-edit">
                                    </i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash">
                                    </i>
                                </button>
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

                <!-- Modal lihat biodata-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-body-tertiary">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 mb-4 mb-md-0">
                                            <div class="bg-white">

                                                <h5 class="modal-title fw-bold mb-4" id="exampleModalLabel">Data
                                                    Mahasiswa
                                                </h5>
                                                <div class="row g-3 flex-column flex-md-row align-items-center p-2"
                                                    style="border-radius: 4px; border: 1px solid rgba(0, 0, 0, 0.1);">
                                                    <!-- Gambar dan Tombol -->
                                                    <div class="col-12 col-md-3">
                                                        <img alt="Profile Picture" src="../img/fotoagung.jpeg"
                                                            class="img-fluid rounded mb-2"
                                                            style="max-width: 100%; height: auto;" />
                                                        <!-- <button class="btn-generate mt-2" data-bs-toggle="modal"
                                                            data-bs-target="#QRCodeModal">Generate QR
                                                            Code</button> -->
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <table class="ml-3 table table-responsive table-hover">
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

                                                <h5 class="modal-title fw-bold my-4" id="exampleModalLabel">Pelanggaran
                                                    Terbaru
                                                </h5>
                                                <div class="row g-3 flex-column flex-md-row align-items-center p-2"
                                                    style="border-radius: 4px; border: 1px solid rgba(0, 0, 0, 0.1);">
                                                    <table class="table table-responsive table-hover table-bordered">
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>Jenis Pelanggaran</th>
                                                            <th>Tingkat</th>
                                                            <th>Tanggal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Merokok di kawasan kampus</td>
                                                            <td>4</td>
                                                            <td>19/11/2024</td>
                                                            <td><button class="btn-detail" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal">Lihat</button></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <h5 class="modal-title fw-bold my-4" id="exampleModalLabel">Riwayat
                                                    Pelanggaran
                                                </h5>
                                                <div class="row g-3 flex-column flex-md-row align-items-center p-2"
                                                    style="border-radius: 4px; border: 1px solid rgba(0, 0, 0, 0.1);">
                                                    <table class="table table-responsive table-hover table-bordered">
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>Jenis Pelanggaran</th>
                                                            <th>Tingkat</th>
                                                            <th>Tanggal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Merokok di kawasan kampus</td>
                                                            <td>4</td>
                                                            <td>19/11/2024</td>
                                                            <td><button class="btn-detail" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal">Lihat</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Merokok di kawasan kampus</td>
                                                            <td>4</td>
                                                            <td>19/11/2024</td>
                                                            <td><button class="btn-detail" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal">Lihat</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Merokok di kawasan kampus</td>
                                                            <td>4</td>
                                                            <td>19/11/2024</td>
                                                            <td><button class="btn-detail" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal">Lihat</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Merokok di kawasan kampus</td>
                                                            <td>4</td>
                                                            <td>19/11/2024</td>
                                                            <td><button class="btn-detail" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal">Lihat</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Merokok di kawasan kampus</td>
                                                            <td>4</td>
                                                            <td>19/11/2024</td>
                                                            <td><button class="btn-detail" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal">Lihat</button></td>
                                                        </tr>
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

                <!-- Modal edit data mahasiswa -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-body-tertiary">

                                    <div class="form-group">
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="2541987544" readonly disabled>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="aseppppppp">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Kelas</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="2E">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Prodi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="Teknik Informatika">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Jenis
                                                Kelamin</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="Laki-laki">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Tanggal
                                                Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="28 Februari 2024"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="naed@example.com"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn-detail" onclick="confirmSave()">Save
                                            changes</button>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal tambah data mahasiswa -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content" style="background-color: #F5F5F5">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="addModalLabel">Tambah Data Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="bg-body-tertiary">
                                        <div class="form-group">
                                            <div class="row mb-3">
                                                <label for="addNim" class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="addNim" class="form-control" placeholder="Masukkan NIM">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="addNama" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="addNama" class="form-control" placeholder="Masukkan Nama">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="addKelas" class="col-sm-3 col-form-label text-end fw-bold">Kelas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="addKelas" class="form-control" placeholder="Masukkan Kelas">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="addProdi" class="col-sm-3 col-form-label text-end fw-bold">Prodi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="addProdi" class="form-control" placeholder="Masukkan Prodi">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="addJenisKelamin" class="col-sm-3 col-form-label text-end fw-bold">Jenis Kelamin</label>
                                                <div class="col-sm-9">
                                                    <select id="addJenisKelamin" class="form-control">
                                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="addTanggalLahir" class="col-sm-3 col-form-label text-end fw-bold">Tanggal Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="date" id="addTanggalLahir" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="addEmail" class="col-sm-3 col-form-label text-end fw-bold">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" id="addEmail" class="form-control" placeholder="Masukkan Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="addData()">Tambah</button>
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

        //js for modal edit
        function confirmSave() {
            const userConfirmed = confirm("Apakah anda yakin ingin mengubah data Mahasiswa?");
            if (userConfirmed) {
                alert("Data telah berhasil disimpan!"); // Lakukan aksi penyimpanan data di sini

                // Menutup modal menggunakan Bootstrap instance
                const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                modal.hide();

                // Hapus backdrop secara manual jika masih ada
                const backdrops = document.querySelectorAll('.modal-backdrop');
                backdrops.forEach((backdrop) => backdrop.remove()); // Hapus semua elemen backdrop
            } else {
                alert("Perubahan data dibatalkan.");
            }
        }

        // tambah data mahasiswa
        function addData() {
            // Ambil nilai dari input field
            const nim = document.getElementById('addNim').value;
            const nama = document.getElementById('addNama').value;
            const kelas = document.getElementById('addKelas').value;
            const prodi = document.getElementById('addProdi').value;
            const jenisKelamin = document.getElementById('addJenisKelamin').value;
            const tanggalLahir = document.getElementById('addTanggalLahir').value;
            const email = document.getElementById('addEmail').value;

            // Validasi sederhana
            if (!nim || !nama || !kelas || !prodi || !jenisKelamin || !tanggalLahir || !email) {
                alert('Semua data wajib diisi!');
                return;
            }

            // Lakukan logika penyimpanan data (bisa menggunakan AJAX atau langsung ditambahkan ke tabel)
            console.log({
                nim,
                nama,
                kelas,
                prodi,
                jenisKelamin,
                tanggalLahir,
                email
            });

            // Tutup modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
            modal.hide();

            // Reset form
            document.getElementById('addModal').querySelectorAll('input, select').forEach(input => input.value = '');
        }
        </script>
</body>

</html>