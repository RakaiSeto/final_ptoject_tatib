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
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>

            <button class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#tambahModal"><i
                    class="fas fa-plus me-2"></i>Tambah Data Kelas</button>

            <div class="bg-white" style="border: 1px solid rgba(0, 0, 0, 0.1);">
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
                                No
                            </th>
                            <th>
                                Nama Kelas
                            </th>
                            <th>
                                DPA
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Ambil data kelas dari model
                        // Misal: $kelasList adalah hasil query ke database untuk mengambil data kelas
                        foreach ($kelasList as $index => $kelas) { ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $kelas->nama_kelas ?></td>
                            <td><?= $kelas->nama_dpa ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal" onclick="editKelas('<?= $kelas->id_kelas ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
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

                <!-- Modal untuk tambah kelas -->
                <!-- Modal untuk tambah kelas -->
                <div class="modal fade" id="tambahKelasModal" tabindex="-1" aria-labelledby="tambahKelasModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahKelasModalLabel">Tambah Kelas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="tambahKelasForm">
                                    <div class="form-group">
                                        <label for="id_kelas">ID Kelas</label>
                                        <input type="text" name="id_kelas" id="id_kelas" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kelas">Nama Kelas</label>
                                        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nip_dpa">NIP DPA</label>
                                        <input type="text" name="nip_dpa" id="nip_dpa" class="form-control" required>
                                    </div>
                                    <div id="error-message" class="text-danger" style="display:none;"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- Modal edit data mahasiswa -->
                <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-body-tertiary">

                                    <div class="form-group">
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">ID
                                                Kelas</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Program Studi">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama
                                                Kelas</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Nama Kelas">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">DPA</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option value="" selected disabled>Pilih DPA</option>
                                                    <option value="1234567">Dr. Arif Budiman - Teknik Informatika
                                                    </option>
                                                    <option value="2345678">Prof. Anita Sari - Sistem Informasi</option>
                                                    <option value="3456789">Dr. Bambang Hartono - Teknik Komputer
                                                    </option>
                                                    <option value="4567890">Dr. Cahyo Wibowo - Teknik Informatika
                                                    </option>
                                                    <option value="5678901">Dr. Dita Maharani - Sistem Informasi
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn-detail">Tambah</button>
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
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">ID
                                                Kelas</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="Teknik Informatika">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama
                                                Kelas</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="1">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">DPA</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option value="" selected disabled>Pilih DPA</option>
                                                    <option value="1234567">Dr. Arif Budiman - Teknik Informatika
                                                    </option>
                                                    <option value="2345678">Prof. Anita Sari - Sistem Informasi</option>
                                                    <option value="3456789">Dr. Bambang Hartono - Teknik Komputer
                                                    </option>
                                                    <option value="4567890">Dr. Cahyo Wibowo - Teknik Informatika
                                                    </option>
                                                    <option value="5678901">Dr. Dita Maharani - Sistem Informasi
                                                    </option>
                                                </select>
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
            </script>
</body>

</html>