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
                                    <tr>
                                        <th>Tingkat Pelanggaran</th>
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
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered table-hover" id="tabel-awal">
                                <thead>
                                    <tr>
                                        <th>Akumulasi Sanksi Pelanggaran</th>
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

                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered table-hover" id="tabel-awal">
                                <thead>
                                    <tr>
                                        <th>Sanksi Pelanggaran</th>
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

                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="klasifikasi" role="tabpanel" aria-labelledby="klasifikasi-tab">
                        <div class="table-responsive my-4">
                            <table class="table table-bordered table-hover" id="tabel-awal">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggaran</th>
                                        <th>Deskripsi</th>
                                        <th>Tingkat Pelanggaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $no=1;
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

                </div>


            </div><!-- tutup bg-white -->
        </div> <!-- tutup container -->

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


        <script>
        document.querySelector(".open-btn").addEventListener("click", function() {
            document.getElementById("side_nav").classList.add("active");
            document.querySelector(".content").classList.add("sidebar-open");
        });

        document.querySelector(".close-btn").addEventListener("click", function() {
            document.getElementById("side_nav").classList.remove("active");
            document.querySelector(".content").classList.remove("sidebar-open");
        });
        </script>
</body>

</html>