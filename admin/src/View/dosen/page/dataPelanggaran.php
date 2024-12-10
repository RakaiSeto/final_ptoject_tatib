<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pelanggaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/public/css/style-css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />


    <style>
        /* Ubah warna tab aktif */
        .nav-pills .nav-link.active {
            background-color: #fd7e14 !important;
            border-color: #fd7e14 !important;
            color: #fff !important;
            font-weight: bold;
        }

        /* Ubah warna tab biasa */
        .nav-pills .nav-link {
            color: #fd7e14;
        }

        /* Warna saat di-hover */
        .nav-pills .nav-link:hover {
            background-color: rgba(253, 126, 20, 0.1);
            color: #fd7e14;
        }

        #dropdownButton {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Dashboard Content -->
        <div class="content px-3 pt-3" style="margin-top: 68px;">

            <div class="card mb-4">
                <div class="card-body py-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">E-Tatib</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelanggaran Mahasiswa</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="bg-white border">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Pelanggaran Terbaru</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Verifikasi Sanksi Mahasiswa</button>
                    </li>
                </ul>


                <div class="tab-content" id="pills-tabContent">
                    <!-- Tab Pane: Pelanggaran Terbaru -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="table-responsive my-4">
                            <table class="table table-hover" id="tabel-awal">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01-08-2023</td>
                                        <td>2341720001</td>
                                        <td>Dedi Gunawan Saputra</td>
                                        <td>Tidak menjaga nama baik Polinema</td>
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

                    <!-- Tab Pane: Verifikasi Sanksi Mahasiswa -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="table-responsive my-4">
                            <table class="table table-hover" id="tabel-verifikasi">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01-08-2023</td>
                                        <td>2341720001</td>
                                        <td>Dedi Gunawan Saputra</td>
                                        <td>Tidak menjaga nama baik Polinema</td>
                                        <td>
                                            <button type="button" class="btn btn-success">
                                                <i class="bi bi-check"></i> Selesai
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                    <input type="text" class="form-control" value="2541987544" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="No Name" readonly>
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
                                        aria-expanded="false" style=""> Pilih Sanksi
                                    </button>
                                    <ul class="dropdown-menu col-sm-12">
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Surat pernyataan tidak mengulangi perbuatan tersebut, dibubuhi materai, ditandatangani mahasiswa yang bersangkutan dan DPA"
                                                onclick="updateProdiDropdown(this)">Surat pernyataan tidak mengulangi perbuatan tersebut, dibubuhi materai, ditandatangani mahasiswa yang bersangkutan dan DPA</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Melakukan tugas khusus, misalnya bertanggungjawab untuk memperbaiki atau membersihkan kembali, dan tugas-tugas lainnya"
                                                onclick="updateProdiDropdown(this)">Melakukan tugas khusus, misalnya bertanggungjawab untuk memperbaiki atau membersihkan kembali, dan tugas-tugas lainnya</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Dikenakan penggantian kerugian atau penggantian benda/barang semacamnya"
                                                onclick="updateProdiDropdown(this)">Dikenakan penggantian kerugian atau penggantian benda/barang semacamnya</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Melakukan tugas layanan sosial dalam jangka waktu tertentu"
                                                onclick="updateProdiDropdown(this)">Melakukan tugas layanan sosial dalam jangka waktu tertentu</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                data-value="Diberikan nilai D pada mata kuliah terkait saat melakukan pelanggaran."
                                                onclick="updateProdiDropdown(this)">Diberikan nilai D pada mata kuliah terkait saat melakukan pelanggaran.</a></li>
                                    </ul>
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
                    <button type="button" class="btn-detail" style="padding: 6.5px 12px">Kirim</button>
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

            document.querySelectorAll('.dropdown-submenu').forEach(function (submenu) {
                submenu.addEventListener('mouseenter', function () {
                    const submenuMenu = submenu.querySelector('.dropdown-menu');
                    if (submenuMenu) submenuMenu.classList.add('show');
                });

                submenu.addEventListener('mouseleave', function () {
                    const submenuMenu = submenu.querySelector('.dropdown-menu');
                    if (submenuMenu) submenuMenu.classList.remove('show');
                });
            });

            function updateProdiDropdown(element) {
                const dropdownButton = document.getElementById("dropdownButton");
                const newText = element.textContent;
                dropdownButton.textContent = newText; // Perbarui teks tombol
                dropdownButton.setAttribute("title", newText); // Tooltip untuk teks lengkap
            }
        </script>
</body>

</html>