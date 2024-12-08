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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />

    <style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0 !important;
        left: 100% !important;
        margin-top: 0;
        margin-left: 0;
        display: none;
    }

    .dropdown-submenu:hover .dropdown-menu {
        display: block;
        /* Tampilkan submenu saat hover */
    }

    .dropdown-menu {
        position: absolute;
        /* Pastikan posisinya absolut untuk submenu */
    }

    .hidden {
        display: none;
    }

    #identityCard {
        border: 1px solid #FFA500;
        padding: 20px;
        background-color: rgba(253, 126, 20, 0.04);
        /* margin-top: 20px; */
    }


    .container-fluid {
        display: flex;
        justify-content: center;
    }

    .card {
        max-width: 500px;
        /* Atur lebar maksimal untuk memastikan tata letak rapi */
        width: 100%;
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

            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" style="color: #fd7e14;">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="bg-white p-3 my-3">
                        <p class="fw-medium mb-3 fw-bold" style="font-size: 20px">Pilih Mahasiswa</p>

                        <div class="d-flex py-2 gap-1">
                            <!-- Dropdown Prodi -->
                            <div class="dropdown">
                                <button
                                    class="btn btn-light dropdown-toggle border d-flex justify-content-between align-items-center"
                                    type="button" id="dropdownButton" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="width: 200px;">
                                    Pilih Prodi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-value="Teknik Informatika"
                                            onclick="updateProdiDropdown(this)">Teknik Informatika</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="Sistem Informasi Bisnis"
                                            onclick="updateProdiDropdown(this)">Sistem Informasi Bisnis</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="D2 PPLS"
                                            onclick="updateProdiDropdown(this)">D2
                                            PPLS</a></li>
                                </ul>
                            </div>

                            <!-- Dropdown Tingkat -->
                            <div class="dropdown">
                                <button
                                    class="btn btn-light dropdown-toggle border d-flex justify-content-between align-items-center"
                                    type="button" id="dropdownTingkat" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="width: 200px;">
                                    Pilih Tingkat
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">1</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateTingkatDropdown(this)">A</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateTingkatDropdown(this)">B</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateTingkatDropdown(this)">C</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">2</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateTingkatDropdown(this)">A</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateTingkatDropdown(this)">B</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateTingkatDropdown(this)">C</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">3</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateTingkatDropdown(this)">A</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateTingkatDropdown(this)">B</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateTingkatDropdown(this)">C</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn-detail" id="filterBtn">Filter </button>
                        </div>

                        <!-- Tabel Mahasiswa -->
                        <div class="table-responsive mb-2 mt-4 hidden" id="filterTable">
                            <table class="table table-bordered table-hover" id="mahasiswaTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="mahasiswaRow" data-nama="Ahmad Rizky Maulana" data-nim="23417720001"
                                        data-kelas="TI-1A">
                                        <td>Ahmad Rizky Maulana</td>
                                        <td>23417720001</td>
                                        <td>TI-1A</td>
                                    </tr>
                                    <tr class="mahasiswaRow" data-nama="Agung Fradiansyah" data-nim="23417729999"
                                        data-kelas="TI-1A">
                                        <td>Agung Fradiansyah</td>
                                        <td>23417729999</td>
                                        <td>TI-1A</td>
                                    </tr>
                                    <!-- Tambahkan baris lain sesuai data mahasiswa -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Laporan Pelanggaran -->
            <!-- <div class="row">
  <div class="col-md-12"> -->

            <div id="reportCard" class=" hidden">
                <div class="bg-white p-3">
                    <div id="identityCard">
                        <h6>Laporkan pelanggaran untuk:</h6>
                        <p style="font-size: 20px" class="fw-bold" id="studentInfo"></p>
                    </div>
                    <div>
                        <!-- Tanggal -->
                        <div class="form-group row mt-3">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control w-25" id="tanggal" />
                            </div>
                        </div>

                        <!-- Jenis Pelanggaran -->
                        <div class="form-group row mt-3">
                            <label for="jenisPelanggaran" class="col-sm-2 col-form-label">Jenis Pelanggaran</label>
                            <div class="col-sm-10">
                                <button class="btn btn-secondary w-25" id="jenisPelanggaran">Pilih Pelanggaran</button>
                            </div>
                        </div>

                        <!-- Bukti -->
                        <div class="form-group row mt-3">
                            <label for="bukti" class="col-sm-2 col-form-label">Bukti</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file w-25" id="bukti" />
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div class="form-group row mt-3">
                            <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control w-25" id="catatan" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="form-group row mt-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-danger mr-2" id="batal">Batal</button>
                                <button class="btn btn-success" id="kirim">Kirim</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </div>
</div> -->



            <!-- Scripts -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->





            <script>
            document.querySelectorAll(".mahasiswaRow").forEach((row) => {
                row.addEventListener("click", function() {
                    const nama = row.dataset.nama;
                    const nim = row.dataset.nim;
                    const kelas = row.dataset.kelas;

                    // Isi data pada card
                    document.getElementById("studentInfo").innerText = `${nama}/ NIM: ${nim}/ ${kelas}`;
                    document.getElementById("reportCard").classList.remove("hidden");
                    document.getElementById("mahasiswaTable").classList.add("hidden");
                });
            });

            // Tambahkan fungsi batal
            document.getElementById("batal").addEventListener("click", function() {
                document.getElementById("reportCard").classList.add("hidden");
            });


            document.querySelectorAll('.dropdown-submenu').forEach(function(submenu) {
                submenu.addEventListener('mouseenter', function() {
                    const submenuMenu = submenu.querySelector('.dropdown-menu');
                    if (submenuMenu) submenuMenu.classList.add('show');
                });

                submenu.addEventListener('mouseleave', function() {
                    const submenuMenu = submenu.querySelector('.dropdown-menu');
                    if (submenuMenu) submenuMenu.classList.remove('show');
                });
            });

            function updateTingkatDropdown(element) {
                const dropdownButton = document.getElementById("dropdownTingkat");
                const parentMenu = element.closest(".dropdown-submenu").querySelector(".dropdown-toggle").textContent;
                dropdownButton.textContent = `${parentMenu} - ${element.textContent}`;
            }


            function updateProdiDropdown(element) {
                const dropdownButton = document.getElementById("dropdownButton");
                dropdownButton.textContent = element.textContent;
            }


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

            //dropdown
            $(document).ready(function() {
                $('.dropdown-submenu a.test').on("click", function(e) {
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                });
            });

            //
            document.querySelectorAll('#prodiOptions .dropdown-item').forEach(item => {
                item.addEventListener('click', function() {
                    const selectedValue = this.getAttribute('data-value'); // Ambil data-value dari item
                    document.getElementById('prodiInput').value =
                        selectedValue; // Isi input dengan nilai yang dipilih
                });
            });


            //tombol filter
            document.getElementById('filterBtn').addEventListener('click', function() {
                const table = document.getElementById('filterTable')
                table.classList.toggle('hidden');
            });
            </script>
</body>

</html>