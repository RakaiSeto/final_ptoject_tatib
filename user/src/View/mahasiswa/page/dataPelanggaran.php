<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/public/css/style-css" />

    <style>
        .btn-detail-transparan {
            background-color: #FFE5D0;
            color: #fd7e14;
        }

        .btn-detail-transparan:hover {
            background-color: #fd7e14;
            color: #FFE5D0;
        }
    </style>


</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>
        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>



        <div class="content px-3 pt-3" style="margin-top: 56px">


            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" style="color: #fd7e14;">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pelanggaran</li>
                    </ol>
                </nav>
            </div>
            <div class="bg-white">
                <h2 class="h3 mb-3" style="font-size: 24px">Pelanggaran Terbaru</h2>
                <div class="table-responsive mb-2" style="overflow-x: auto;">
                    <table class="table table-bordered table-hover" id="tabel-awal" style="min-width: 1500px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="width: 1000px;">Jenis Pelanggaran</th>
                                <th>Tingkat</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Cek apakah ada data pelanggaran
                            if (empty($data)) {
                                echo '<tr><td colspan="5" class="text-center">Tidak ada pelanggaran</td></tr>';
                            } else {
                                // Jika ada pelanggaran, tampilkan data
                                foreach ($data as $index => $pelanggaran) {
                                    echo '<tr>';
                                    echo '<td>' . ($index + 1) . '</td>';
                                    echo '<td>' . $pelanggaran->deskripsi . '</td>';
                                    echo '<td>' . $pelanggaran->tingkat_pelanggaran . '</td>';
                                    echo '<td>' . $pelanggaran->datetime . '</td>';
                                    if ($pelanggaran->is_done == 1) {
                                        echo '<td><span class="badge bg-success">Selesai</span></td>';
                                    } else if ($pelanggaran->is_banding == 1 && $pelanggaran->is_verified == 0) {
                                        echo '<td><span class="badge bg-info">Menunggu Banding</span></td>';
                                    } else if ($pelanggaran->is_verified == 1 && $pelanggaran->is_done == 0) {
                                        echo '<td><span class="badge bg-warning">Belum Selesai</span></td>';
                                    } else {
                                        echo '<td><span class="badge bg-info">Menunggu Banding</span></td>';
                                    }
                                    echo '<td><button class="btn-detail btn-detail-pelanggaran" onclick="openModal(\'' . $pelanggaran->kode_pelanggaran . '\')">Lihat Detail</button></td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Pelanggaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-body-tertiary">

                                    <div class="form-group">
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="detail-nim" value="2541987544" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="detail-nama" value="No Name" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Kelas</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="detail-kelas" value="2E" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Jenis
                                                Pelanggaran</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="detail-jenis-pelanggaran" value="Terlambat" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for=""
                                                class="col-sm-3 col-form-label text-end fw-bold">Tingkat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="detail-tingkat-pelanggaran" value="Ringan" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for=""
                                                class="col-sm-3 col-form-label text-end fw-bold">Tanggal</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="detail-tanggal" value="28 Februari 2024"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for=""
                                                class="col-sm-3 col-form-label text-end fw-bold">Sanksi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="detail-sanksi" value="Beli gorengan" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for=""
                                                class="col-sm-3 col-form-label text-end fw-bold">Catatan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="detail-catatan" value="Datang terlambat lebih dari 15 menit" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-3 col-form-label text-end fw-bold">Bukti
                                                Pelanggaran</label>
                                            <div class="col-sm-9">
                                                <button class="btn btn-success" id="detail-bukti-pelanggaran" onclick="openModalBukti()">Lihat Bukti Pelanggaran</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="kode_pelanggaran" value="">
                                    <div class="d-flex justify-content-end mt-4">
                                        <button class="btn-detail me-2 p-2 px-3"
                                            style="background-color: #fff; color: #fd7e14; border: 1px solid #fd7e14"
                                            data-bs-toggle="modal" data-bs-target="#bandingModal" id="ajukan-banding">Ajukan
                                            Banding</button>

                                        <a href="/public/assets/BeritaAcara-pdf" target="_blank">
                                            <button class="btn-detail p-2 px-3 me-2"><i
                                                    class=" bi bi-download me-2"></i>Cetak Berita Acara</button>
                                        </a>

                                        <a href="/public/assets/BeritaAcara-pdf" target="_blank">
                                            <button class="btn-detail p-2 px-3"><i
                                                    class=" bi bi-download me-2"></i>Cetak Surat Pernyataan</button>
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="buktiModal" tabindex="-1" aria-labelledby="buktiModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="buktiModalLabel">Bukti Pelanggaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <!-- Gambar bukti pelanggaran -->
                                <img id="bukti-pelanggaran" src="https://via.placeholder.com/600x400" class="img-fluid"
                                    alt="Bukti Pelanggaran">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="bandingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #Fff">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Aju Banding</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-body-tertiary p-3" style="background-color: #b1b">

                                    <div class="mb-3">
                                        <label for="tanggapan" class="form-label fw-bold">Tulis Tanggapan</label>
                                        <textarea class="form-control" id="tanggapanBanding" rows="5" name="tanggapan"
                                            placeholder="Tulis tanggapan disini"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto" class="form-label fw-bold">Bukti Foto (Jika ada)</label>
                                        <input class="form-control" type="file" id="fotoBanding" name="foto"
                                            accept="image/*">
                                    </div>

                                    <div class="d-flex justify-content-end mt-2">
                                        <button type="button" class="btn btn-primary me-2" data-bs-dismiss="modal">Cancel</button>
                                        <button class="btn btn-success disabled" id="submit-banding">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mb-3 d-none">
                    <h2 class="h3 mb-3" style="font-size: 20px">Riwayat Pelaporan</h2>
                    <!-- <h5 class="modal-title mb-2" id="exampleModalLabel">Riwayat Pelaporan</h5> -->
                    <select class="form-select" id="periode-select">
                        <option selected value="ganjil">2023/2024 Ganjil</option>
                        <option value="genap">2023/2024 Genap</option>
                    </select>
                </div>

                <!-- Tabel Ganjil -->
                <div id="tabel-ganjil" class="table-container" style="display: none;">
                    <table class="table table-bordered">
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
                                <td>rok mini</td>
                                <td>3</td>
                                <td>19/11/2024</td>
                                <td><button class="btn-detail btn-detail-transparan" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Lihat Detail</button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- Tabel Genap -->
                <div id="tabel-genap" class="table-container" style="display: none;">
                    <table class="table table-bordered">
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
                                <td><button class="btn-detail btn-detail-transparan" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Lihat Detail</button></td>
                            </tr>

                        </tbody>
                    </table>
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
        function openModal(kode_pelanggaran) {
            $.ajax({
                url: '/detailPelanggaran',
                type: 'POST',
                data: {
                    kode_pelanggaran: kode_pelanggaran
                },
                success: function(response) {
                    json = JSON.parse(response);


                    if (json.data != null) {
                        $('#kode_pelanggaran').val(json.data.kode_pelanggaran);
                        $('#detail-nim').val(json.data.nim_terlapor);
                        $('#detail-jenis-pelanggaran').val(json.data.nama_pelanggaran);
                        $('#detail-tingkat-pelanggaran').val(json.data.tingkat_pelanggaran);
                        $('#detail-tanggal').val(json.data.datetime);
                        $('#detail-catatan').val(json.data.kronologi);
                        if (json.data.is_banding == 1) {
                            $('#ajukan-banding').prop('disabled', true);
                            $('#ajukan-banding').addClass('opacity-50');
                        } else {
                            $('#ajukan-banding').prop('disabled', false);
                            $('#ajukan-banding').removeClass('opacity-50');
                        }
                        if (json.data.tautan_bukti != '-') {
                            $('#detail-bukti-pelanggaran').removeClass('disabled');
                            $('#detail-bukti-pelanggaran').attr('onclick', 'openModalBukti(\'' + json.data.tautan_bukti + '\')');
                        } else {
                            $('#detail-bukti-pelanggaran').addClass('disabled');
                        }
                    }
                    if (json.mahasiswa != null) {
                        $('#detail-nama').val(json.mahasiswa.nama_mahasiswa);
                        $('#detail-kelas').val(json.mahasiswa.id_kelas);
                    }
                    if (json.sanksi != null) {
                        $('#detail-sanksi').val(json.sanksi.nama_sanksi);
                    }
                    $('#exampleModal').modal('show');
                }
            });
        }

        function openModalBukti(tautan_bukti) {
            $('#buktiModal').modal('show');
            $('#bukti-pelanggaran').attr('src', tautan_bukti);
        }

        $(document).ready(function() {
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            $('#tanggapanBanding').on('input', function() {
                if ($(this).val().length > 0) {
                    $('#submit-banding').removeClass('disabled');
                } else {
                    $('#submit-banding').addClass('disabled');
                }
            });

            $('#submit-banding').on('click', function() {
                // use multipart/form-data
                var formData = new FormData();
                formData.append('tanggapan', $('#tanggapanBanding').val());
                formData.append('foto', $('#fotoBanding')[0].files[0]);
                formData.append('kode_pelanggaran', $('#kode_pelanggaran').val());
                $.ajax({
                    url: '/ajuBanding',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        location.reload();
                    }
                });
            });
        });

        //table
        const selectPeriode = document.getElementById('periode-select');
        const tabelGanjil = document.getElementById('tabel-ganjil');
        const tabelGenap = document.getElementById('tabel-genap');

        selectPeriode.addEventListener('change', function() {
            const selectedValue = this.value;

            // Sembunyikan semua tabel saat opsi berubah
            tabelGanjil.style.display = 'none';
            tabelGenap.style.display = 'none';

            // Tampilkan tabel berdasarkan pilihan
            if (selectedValue === 'ganjil') {
                tabelGanjil.style.display = 'block';
            } else if (selectedValue === 'genap') {
                tabelGenap.style.display = 'block';
            }
        });

        //sidebar
        document.querySelector(".open-btn").addEventListener("click", function() {
            document.getElementById("side_nav").classList.add("active");
            document.querySelector(".content").classList.add("sidebar-open");
        });

        document.querySelector(".close-btn").addEventListener("click", function() {
            document.getElementById("side_nav").classList.remove("active");
            document.querySelector(".content").classList.remove("sidebar-open");
        });

        //modal foro

        // const mainModal = document.getElementById('exampleModal');
        // mainModal.addEventListener('hidden.bs.modal', function () {
        //   // Redirect ke halaman utama setelah modal utama ditutup
        //   window.location.href = 'dataPelanggaran.php'; // Ganti dengan URL yang sesuai
        // });


        document.getElementById('buktiModal').addEventListener('show.bs.modal', function() {
            let modal1 = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
            if (modal1) {
                modal1.hide(); // Tutup modal pertama
            }
        });

        // Buka kembali modal pertama saat modal kedua ditutup
        document.getElementById('buktiModal').addEventListener('hide.bs.modal', function() {
            let modal1 = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal1.show(); // Buka modal pertama kembali
        });

        // Hapus backdrop jika semua modal ditutup
        document.getElementById('exampleModal').addEventListener('hide.bs.modal', function() {
            const backdrops = document.querySelectorAll('.modal-backdrop');
            backdrops.forEach((backdrop) => backdrop.remove()); // Hapus semua backdrop
        });
    </script>
</body>

</html>