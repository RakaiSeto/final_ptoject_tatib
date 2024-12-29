<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/public/css/style-css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />

    <style>
        .nav-tabs .nav-link.active {
            /* background-color: #fd7e14 !important; */
            /* border-color: #fd7e14 !important; */
            font-weight: bold;
            color: #fd7e14 !important;
        }

        /* Ubah warna tab biasa */
        .nav-tabs .nav-link {
            color: rgba(253, 126, 20, 0.5);
        }

        /* Warna saat di-hover */
        .nav-tabs .nav-link:hover {
            background-color: rgba(253, 126, 20, 0.1);
            color: #fd7e14;
        }

        /* CSS untuk Button Tambah Informasi Tata Tertib */
        .tambah-informasi-btn {
            margin-top: 20px;
            /* Memberikan jarak bawah pada tombol */
            /* padding: 10px 20px; Ukuran padding tombol */
            border-radius: 5px;
            /* Membulatkan sudut tombol */
            /* background-color: #28a745; Warna tombol hijau */
            color: white;
            /* Warna teks pada tombol */
            font-size: 16px;
            /* Ukuran font tombol */
            transition: background-color 0.3s ease;
            /* Efek transisi saat hover */
        }

        .tambah-informasi-btn:hover {
            background-color: #218838;
            /* Warna tombol saat hover */
        }

        /* CSS untuk mengatur lebar kolom aksi pada tabel informasi tata tertib */
        .table th,
        .table td {
            vertical-align: middle;
            /* Menyelaraskan teks ke tengah vertikal */
        }

        /* Lebar kolom aksi */
        .table th:last-child,
        .table td:last-child {
            width: 120px;
            /* Mengatur lebar kolom aksi */
            text-align: center;
            /* Menyelaraskan tombol ke tengah secara horizontal */
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
        <div class="content px-3 pt-3" style="margin-top: 56px;">

            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" style="color: #fd7e14;">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
            </div>

            <div class="bg-white">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="informasi-tab" data-bs-toggle="tab"
                            data-bs-target="#informasi" type="button" role="tab" aria-controls="informasi"
                            aria-selected="true"> Informasi Tata
                            Tertib</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="klasifikasi-tab" data-bs-toggle="tab" data-bs-target="#klasifikasi"
                            type="button" role="tab" aria-controls="klasifikasi" aria-selected="false">klasifikasi
                            Pelanggaran</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="informasi" role="tabpanel"
                        aria-labelledby="informasi-tab">
                        <div class="table table-responsive mt-3">
                            <table class="table table-bordered table-hover" id="tabel-awal">
                                <thead>
                                    <!-- Button Tambah Informasi Tata Tertib -->
                                    <div class="text-start mb-3">
                                        <button class="btn btn-success tambah-informasi-btn" data-bs-toggle="modal"
                                            data-bs-target="#addModal">
                                            Tambah Informasi Tata Tertib
                                        </button>
                                    </div>
                                    <tr>
                                        <th>Tingkat Pelanggaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Berikut adalah tingkat pelanggaran yang ditentukan sebagai berikut:
                                            <ol type="1">
                                                <li style=" list-style-type: decimal">Tingkat I, yaitu pelanggaran
                                                    sangat berat
                                                </li>
                                                <li style=" list-style-type: decimal">Tingkat II, yaitu pelanggaran
                                                    berat
                                                </li>
                                                <li style=" list-style-type: decimal">Tingkat III, yaitu pelanggaran
                                                    cukup berat
                                                </li>
                                                <li style=" list-style-type: decimal">Tingkat IV, yaitu pelanggaran
                                                    sedang
                                                </li>
                                                <li style=" list-style-type: decimal">Tingkat V, yaitu pelanggaran
                                                    Ringan
                                                </li>
                                            </ol>
                                        </td>
                                        <!-- Tombol Edit dan Lihat -->
                                        <td class="text-center">
                                            <!-- Tombol Edit -->
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#lihatModal">
                                                <i class="fas fa-pencil-alt"></i> <!-- Ikon Edit -->
                                            </button>

                                            <!-- Tombol Hapus -->
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                                <i class="fas fa-trash-alt"></i> <!-- Ikon Hapus -->
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered table-hover" id="tabel-awal">
                                <thead>
                                    <tr>
                                        <th>Akumulasi Sanksi Pelanggaran</th>
                                        <th>Aksi</th> <!-- Menambahkan kolom untuk aksi tombol Edit dan Lihat -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Perbuatan / tindakan pelanggaran Tata Tertib Kehidupan Kampus akan
                                            diakumulasikan<br> untuk setiap kategori pelanggaran dan berlaku sepanjang
                                            mahasiswa
                                            masih tercatat sebagai mahasiswa di Polinema.<br>

                                            <ol type="1">
                                                <li style=" list-style-type: decimal">Apabila pelanggaran tingkat V
                                                    dilakukan 3 (tiga) kali maka
                                                    klasifikasi
                                                    pelanggaran tersebut ditingkatkan menjadi pelanggaran tingkat IV.
                                                </li>
                                                <li style=" list-style-type: decimal">Apabila pelanggaran tingkat IV
                                                    dilakukan 3 (tiga) kali maka
                                                    klasifikasi
                                                    pelanggaran tersebut ditingkatkan menjadi pelanggaran tingkat III.
                                                </li>
                                                <li style=" list-style-type: decimal"> Apabila pelanggaran tingkat III
                                                    dilakukan 3 (tiga) kali maka
                                                    klasifikasi
                                                    pelanggaran tersebut ditingkatkan menjadi pelanggaran tingkat II.
                                                </li>
                                                <li style=" list-style-type: decimal">Apabila pelanggaran tingkat II
                                                    dilakukan 3 (tiga) kali maka
                                                    klasifikasi
                                                    pelanggaran tersebut ditingkatkan menjadi pelanggaran tingkat I</li>
                                            </ol>
                                        </td>
                                        <!-- Tombol Edit dan Lihat -->
                                        <td class="text-center">
                                            <!-- Tombol Edit -->
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                                <i class="fas fa-pencil-alt"></i> <!-- Ikon Edit -->
                                            </button>

                                            <!-- Tombol Hapus -->
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#hapusModal">
                                                <i class="fas fa-trash-alt"></i> <!-- Ikon Hapus -->
                                            </button>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered table-hover" id="tabel-awal">
                                <thead>
                                    <tr>
                                        <th>Sanksi Pelanggaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Berikut adalah sanksi yang diberikan berdasarkan
                                            tingkat
                                            pelanggarannya:
                                            <ul>
                                                <li style=" list-style-type: decimal">Sanksi
                                                    atas
                                                    pelanggaran Tingkat V
                                                    yang dilakukan oleh mahasiswa
                                                    berupa Teguran lisan disertai dengan surat
                                                    pernyataan tidak
                                                    mengulangi perbuatanvtersebut, dibubuhi
                                                    materai,
                                                    ditandatangani
                                                    mahasiswa yang
                                                    bersangkutan dan DPA;
                                                </li>
                                                <li style=" list-style-type: decimal">Sanksi
                                                    atas
                                                    pelanggaran Tingkat IV
                                                    yang dilakukan oleh mahasiswa
                                                    berupa:
                                                    Teguran tertulis disertai dengan surat
                                                    pernyataan
                                                    tidak mengulangi
                                                    perbuatan
                                                    tersebut, dibubuhi materai, ditandatangani
                                                    mahasiswa
                                                    yang
                                                    bersangkutan dan
                                                    DPA;
                                                </li>
                                                <li style=" list-style-type: decimal">Sanksi
                                                    atas
                                                    pelanggaran Tingkat
                                                    III yang dilakukan oleh mahasiswa
                                                    berupa:
                                                    <ol>
                                                        <li style=" list-style-type: lower-alpha">
                                                            Membuat surat pernyataan tidak
                                                            mengulangi
                                                            perbuatan
                                                            tersebut, dibubuhi
                                                            materai, ditandatangani mahasiswa
                                                            yang
                                                            bersangkutan dan DPA;
                                                        </li>
                                                        <li style=" list-style-type: lower-alpha">
                                                            Melakukan tugas khusus, misalnya
                                                            bertanggungjawab untuk
                                                            memperbaiki
                                                            atau membersihkan kembali, dan
                                                            tugas-tugas
                                                            lainnya.
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li style=" list-style-type: decimal">Sanksi
                                                    atas
                                                    pelanggaran Tingkat II
                                                    yang dilakukan oleh mahasiswa
                                                    berupa:
                                                    <ol>
                                                        <li style=" list-style-type: lower-alpha">
                                                            Dikenakan penggantian kerugian atau
                                                            penggantian benda/barang
                                                            semacamnya dan/atau;
                                                        </li>
                                                        <li style=" list-style-type: lower-alpha">
                                                            Melakukan tugas layanan sosial dalam
                                                            jangka
                                                            waktu tertentu
                                                            dan/atau;
                                                        </li>
                                                        <li style=" list-style-type: lower-alpha">
                                                            Diberikan nilai D pada mata kuliah
                                                            terkait saat melakukan
                                                            pelanggaran.
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li style=" list-style-type: decimal">
                                                    Sanksi atas pelanggaran tingkat I yang
                                                    dilakukan
                                                    oleh mahasiswa
                                                    berupa:
                                                    <ol>
                                                        <li style=" list-style-type: lower-alpha">
                                                            Dinonaktifkan (Cuti Akademik/
                                                            Terminal)
                                                            selama dua semester
                                                            dan/atau;
                                                        </li>
                                                        <li style=" list-style-type: lower-alpha">
                                                            Diberhentikan sebagai mahasiswa.
                                                        </li>
                                                    </ol>
                                                </li>
                                            </ul>
                                        </td>
                                        <!-- Tombol Edit dan Lihat -->
                                        <td class="text-center">
                                            <!-- Tombol Edit -->
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#lihatModal">
                                                <i class="fas fa-pencil-alt"></i> <!-- Ikon Edit -->
                                            </button>

                                            <!-- Tombol Hapus -->
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                                <i class="fas fa-trash-alt"></i> <!-- Ikon Hapus -->
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <!-- Modal Edit Tata Tertib -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content" style="background-color: #F5F5F5;">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="editModalLabel">Edit Informasi Tata Tertib</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm">
                                        <!-- Input Field untuk Judul -->
                                        <div class="mb-3">
                                            <label for="editJudul" class="form-label fw-bold">Judul Tata Tertib</label>
                                            <input type="text" id="editJudul" class="form-control"
                                                placeholder="Masukkan Judul Tata Tertib"
                                                value="Akumulasi Sanksi Pelanggaran">
                                        </div>

                                        <!-- Textarea untuk Deskripsi Tata Tertib -->
                                        <div class="mb-3">
                                            <label for="editDeskripsi" class="form-label fw-bold">Deskripsi Tata
                                                Tertib</label>
                                            <textarea id="editDeskripsi" class="form-control" rows="5">
Perbuatan / tindakan pelanggaran Tata Tertib Kehidupan Kampus akan diakumulasikan untuk setiap kategori pelanggaran dan berlaku sepanjang mahasiswa masih tercatat sebagai mahasiswa di Polinema.
                            
    1. Apabila pelanggaran tingkat V dilakukan 3 (tiga) kali maka klasifikasi pelanggaran tersebut ditingkatkan menjadi pelanggaran tingkat IV.
    2. Apabila pelanggaran tingkat IV dilakukan 3 (tiga) kali maka klasifikasi pelanggaran tersebut ditingkatkan menjadi pelanggaran tingkat III.
    3. Apabila pelanggaran tingkat III dilakukan 3 (tiga) kali maka klasifikasi pelanggaran tersebut ditingkatkan menjadi pelanggaran tingkat II.
    4. Apabila pelanggaran tingkat II dilakukan 3 (tiga) kali maka klasifikasi pelanggaran tersebut ditingkatkan menjadi pelanggaran tingkat I.
                            
                        </textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success"
                                        onclick="saveEditData()">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Informasi Tertib -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content" style="background-color: #F5F5F5;">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="addModalLabel">Tambah Informasi Tata Tertib</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addForm">
                                        <!-- Input Field untuk Judul -->
                                        <div class="mb-3">
                                            <label for="addJudul" class="form-label fw-bold">Judul Tata Tertib</label>
                                            <input type="text" id="addJudul" class="form-control"
                                                placeholder="Masukkan Judul Tata Tertib">
                                        </div>

                                        <!-- Textarea untuk Deskripsi Tata Tertib -->
                                        <div class="mb-3">
                                            <label for="addDeskripsi" class="form-label fw-bold">Deskripsi Tata
                                                Tertib</label>
                                            <textarea id="addDeskripsi" class="form-control" rows="5"
                                                placeholder="Masukkan Deskripsi Tata Tertib"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success"
                                        onclick="saveAddData()">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="klasifikasi" role="tabpanel" aria-labelledby="klasifikasi-tab">
                        <div class="table-responsive my-4">
                            <table class="table table-bordered table-hover" id="tabel-awal">
                                <thead>
                                    <!-- Button Tambah tata tertib -->
                                    <div class="text-start mb-3">
                                        <button class="btn btn-success tambah-informasi-btn" data-bs-toggle="modal"
                                            data-bs-target="#tambahTataTertib">
                                            Tambah Tata Tertib
                                        </button>   
                                    </div>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggaran</th>
                                        <th>Deskripsi</th>
                                        <th>Tingkat Pelanggaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    // Menampilkan data dari database ke tabel
                                    foreach ($informasi as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . htmlspecialchars($row->nama_pelanggaran) . "</td>";
                                        echo "<td>" . htmlspecialchars($row->deskripsi) . "</td>";
                                        echo "<td>" . htmlspecialchars($row->tingkat_pelanggaran) . "</td>";
                                        echo "</tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Tambah List Tata Tertib -->
                    <div class="modal fade" id="tambahTataTertib" tabindex="-1" aria-labelledby="addModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content" style="background-color: #F5F5F5;">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="addModalLabel">Tambah Informasi Tata Tertib</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addForm">
                                        <!-- Input Field untuk Nama -->
                                        <div class="mb-3">
                                            <label for="addNama" class="form-label fw-bold">Nama Pelanggaran</label>
                                            <input type="text" id="addNama" class="form-control"
                                                placeholder="Masukkan nama pelanggaran">
                                        </div>
                                        <!-- Textarea untuk Deskripsi Tata Tertib -->
                                        <div class="mb-3">
                                            <label for="addDeskripsi" class="form-label fw-bold">Deskripsi</label>
                                            <textarea id="addDeskripsi" class="form-control" rows="3"
                                                placeholder="Masukkan deskripsi pelanggaran"></textarea>
                                        </div>
                                        <!-- Input Field untuk Tingkat -->
                                        <div class="mb-3">
                                            <label for="addTingkat" class="form-label fw-bold">Tingkat Pelanggaran</label>
                                            <input type="text" id="addTingkat" class="form-control"
                                                placeholder="Masukkan tingkat pelanggaran (1-5)"></input>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success"
                                        onclick="saveAddData()">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- tutup bg-white -->
        </div> <!-- tutup container -->

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

            // modal edit
            function saveEditData() {
                const judul = document.getElementById('editJudul').value;
                const deskripsi = document.getElementById('editDeskripsi').value;

                if (!judul || !deskripsi) {
                    alert('Judul dan Deskripsi Tata Tertib wajib diisi!');
                    return;
                }

                // Lakukan logika penyimpanan data (bisa menggunakan AJAX atau langsung ditambahkan ke tabel)
                console.log("Judul yang diedit:", judul);
                console.log("Deskripsi yang diedit:", deskripsi);

                // Tutup modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                modal.hide();

                // Anda bisa menambahkan kode untuk memperbarui tabel atau menyimpan perubahan di database di sini.
            }

            function saveAddData() {
                const judul = document.getElementById('addJudul').value;
                const deskripsi = document.getElementById('addDeskripsi').value;

                if (!judul || !deskripsi) {
                    alert('Judul dan Deskripsi Tata Tertib wajib diisi!');
                    return;
                }

                // Lakukan logika penyimpanan data (bisa menggunakan AJAX atau langsung ditambahkan ke tabel)
                console.log("Judul yang ditambahkan:", judul);
                console.log("Deskripsi yang ditambahkan:", deskripsi);

                // Tutup modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
                modal.hide();

                // Reset form setelah disimpan
                document.getElementById('addForm').reset();

                // Anda bisa menambahkan kode untuk memperbarui tabel atau menyimpan data di database di sini.
            }
        </script>
</body>

</html>