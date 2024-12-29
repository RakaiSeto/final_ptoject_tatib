<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/public/css/style-css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables with Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
    /* Custom Scrollbar Style */
    .dataTables_scrollBody {
        overflow-x: auto;
    }

    .dataTables_scrollBody::-webkit-scrollbar {
        height: 12px;
    }

    .dataTables_scrollBody::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .dataTables_scrollBody::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 6px;
    }

    .dataTables_scrollBody::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .dataTables_wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        margin-top: 10px;

    }

    #myTable {
        width: 100% !important;
    }
    </style>
</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>

        <!--Content -->
        <div class="content px-3 pt-3 " style="margin-top: 56px;">
            <div class="text-center position-fixed d-none justify-content-center align-items-center top-50 start-50 translate-middle bg-white bg-opacity-50 w-100 h-100"
                id="loading-spinner" style="z-index: 999; display: none;">
                <img src="/public/img/spinner-svg" alt="Loading..." class="mx-auto d-block"
                    style="width: 15%; height: 15%;">
            </div>

            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
            </div>

            <!-- Button Tambah Dosen -->
            <div class="text-start mb-2">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="fa fa-plus"></i>
                    Tambah Dosen
                </button>
            </div>

            <div class="bg-white" style="border: 0.5px solid rgba(0, 0, 0, 0.1);">
                <div class="filter-bar d-flex align-items-center gap-2">
                    <div class="filter-bar w-100 rounded align-items-center gap-2 mb-3 mt-1">
                        <h5 class="ms-2 mt-1">Filter</h5>
                        <hr class="my-2">
                        <div class="row">
                            <!-- <div class="col-md-4">
                                <div class="d-flex flex-column">
                                    <label for="prodi" class="form-label ps-1">Role</label>
                                    <select id="switchrole" class="form-select w-100"
                                        style="box-sizing: border-box; max-width: 100%;">
                                        <option value="" selected>Semua</option>
                                        <option value="DPA">DPA</option>
                                        <option value="KPS">KPS</option>
                                    </select>
                                    <button type="submit" id="btn-search" class="btn-detail">Search</button>
                                </div>
                            </div> -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prodi" class="form-label ps-1">Role</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <select id="switchrole" class="form-select w-100"
                                            style="box-sizing: border-box; max-width: 100%;">
                                            <option value="" selected>Semua</option>
                                            <option value="DPA">DPA</option>
                                            <option value="KPS">KPS</option>
                                        </select>
                                        <!-- <button type="submit" id="btn-search" class="btn-detail">Search</button> -->
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="d-flex flex-column">
                                    <label for="prodi" class="form-label ps-1">Kategori</label>
                                    <select id="kategori" class="form-select w-100"
                                        style="box-sizing: border-box; max-width: 100%;">
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        <option value="nip">NIP Dosen</option>
                                        <option value="nama_pegawai">Nama Dosen</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="keyword" class="form-label ps-2">Keyword</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="text" id="keyword" class="form-control" placeholder="Cari"
                                            aria-label="Username" aria-describedby="basic-addon1">
                                        <button type="submit" id="btn-search" class="btn-detail">Search</button>
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="col-md-4">
                                <div class="d-flex flex-column">
                                    <label for="prodi" class="form-label ps-2">Keyword</label>
                                    <input type="text" id="keyword" class="form-control" placeholder="Cari"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                    </input>
                                    <button type="submit" id="btn-search" class="btn-detail">Search</button>
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="d-flex flex-column">
                                    <button type="submit" id="btn-search" class="btn-detail">Search</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="table-responsive" style="overflow-x: auto; min-width: 100%;">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>Role</th>
                                <th>DPA</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

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
                                                        <img alt="Profile Picture" src="/public/img/fotoagung-jpeg"
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

                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Data Dosen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <div id="add-result" class="alert alert-danger d-none" role="alert">sdf</div>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">NIP</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="addNip" class="form-control"
                                                placeholder="Masukkan NIP disini">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="addNama" class="form-control"
                                                placeholder="Masukkan Nama disini">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="addEmail" class="form-control"
                                                placeholder="Masukkan Email disini">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="addNoTelp" class="form-control"
                                                placeholder="Masukkan No Telp disini">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="addJabatan">
                                                <option value="" disabled selected>Pilih Jabatan</option>
                                                <option value="DOSEN">Dosen Pengajar</option>
                                                <option value="KPS-TI">KPS-TI</option>
                                                <option value="KPS-SIB">KPS-SIB</option>
                                                <option value="KPS-PPLS">KPS-PPLS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">DPA</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="addDpa">
                                                <option value="false" selected>Bukan DPA</option>
                                                <?php foreach ($kelas as $k) : ?>
                                                <?php if ($k->nip_dpa == '' || $k->nip_dpa == null) : ?>
                                                <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" id="btn-add" class="btn btn-success" disabled>Simpan</button>
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
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit Data Dosen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="edit-result" class="alert alert-danger d-none" role="alert">sdf</div>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">NIP</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="editNip" class="form-control" readonly
                                                placeholder="Masukkan NIP disini">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="editNama" class="form-control"
                                                placeholder="Masukkan Nama disini">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="editEmail" class="form-control"
                                                placeholder="Masukkan Email disini">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="editNoTelp" class="form-control"
                                                placeholder="Masukkan No Telp disini">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="editJabatan">
                                                <option value="" disabled selected>Pilih Jabatan</option>
                                                <option value="DOSEN">Dosen Pengajar</option>
                                                <option value="KPS-TI">KPS-TI</option>
                                                <option value="KPS-SIB">KPS-SIB</option>
                                                <option value="KPS-PPLS">KPS-PPLS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label text-start fw-bold">DPA</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="editDpa">
                                                <option value="false" selected>Bukan DPA</option>
                                                <?php foreach ($kelas as $k) : ?>
                                                <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" id="btn-edit" class="btn btn-primary" disabled>Save
                                        changes</button>
                                </div>

                                <input type="hidden" id="editNamaHidden" name="nama">
                                <input type="hidden" id="editEmailHidden" name="email">
                                <input type="hidden" id="editNoTelpHidden" name="no_telp">
                                <input type="hidden" id="editJabatanHidden" name="jabatan">
                                <input type="hidden" id="editDpaHidden" name="dpa">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal tambah data mahasiswa -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true"
                    data-bs-backdrop="static" style="background-color: rgba(255, 255, 255, 0.20);">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="addModalLabel">Tambah Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-body-tertiary">
                                    <div class="form-group">
                                        <div class="row mb-3">
                                            <label for="addNim"
                                                class="col-sm-3 col-form-label text-end fw-bold">NIM</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="addNim" class="form-control"
                                                    placeholder="Masukkan NIM">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="addNama"
                                                class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="addNama" class="form-control"
                                                    placeholder="Masukkan Nama">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="addKelas"
                                                class="col-sm-3 col-form-label text-end fw-bold">Kelas</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="addKelas" class="form-control"
                                                    placeholder="Masukkan Kelas">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="addProdi"
                                                class="col-sm-3 col-form-label text-end fw-bold">Prodi</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="addProdi" class="form-control"
                                                    placeholder="Masukkan Prodi">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="addJenisKelamin"
                                                class="col-sm-3 col-form-label text-end fw-bold">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <select id="addJenisKelamin" class="form-control">
                                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="addTanggalLahir"
                                                class="col-sm-3 col-form-label text-end fw-bold">Tanggal Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="date" id="addTanggalLahir" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="addEmail"
                                                class="col-sm-3 col-form-label text-end fw-bold">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" id="addEmail" class="form-control"
                                                    placeholder="Masukkan Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="addData()">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scripts -->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <!-- DataTables with Bootstrap 5 JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


        <script>
        function deleteDosen(nip) {
            if (confirm('Apakah anda yakin ingin menghapus data dosen ini?')) {
                // redirect to /doDeleteAdmin with nip as body as POST  
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/doDeleteDosen';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'nip';
                input.value = nip;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        }

        async function getKelasTanpaDPA(kelasDPA) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '/getKelasTanpaDPA',
                    type: 'POST',
                    data: {
                        exception: kelasDPA
                    },
                    success: function(response) {
                        let json = JSON.parse(response);
                        // change option value
                        $('#editDpa').empty();
                        $('#editDpa').append(
                            '<option value="false" selected>Bukan DPA</option>');
                        json.forEach(function(kelas) {
                            $('#editDpa').append('<option value="' + kelas.id_kelas +
                                '">' + kelas.nama_kelas + '</option>');
                        });

                        $('#addDpa').empty();
                        $('#addDpa').append(
                            '<option value="false" selected>Bukan DPA</option>');
                        json.forEach(function(kelas) {
                            $('#addDpa').append('<option value="' + kelas.id_kelas +
                                '">' + kelas.nama_kelas + '</option>');
                        });
                        resolve();
                    },
                    error: function(error) {
                        reject(error);
                    }
                });
            });
        }

        $(document).ready(function() {
            // spinner
            $('#loading-spinner').removeClass('d-none');
            $('#loading-spinner').addClass('d-flex');

            var t = $('#myTable').DataTable({
                "lengthMenu": [10, 15, 20],
                "pageLength": 10,
                "paging": true,
                "info": true,
                "searching": false,
                "responsive": true,
                "scrollX": true,
                "order": [
                    [2, 'asc']
                ],
                ajax: {
                    url: '/getDataDosen',
                    type: 'POST',
                    data: function() {
                        return {
                            kategori: $('#kategori').val(),
                            value: $('#keyword').val(),
                            role: $('#switchrole').val()
                        };
                    },
                    dataSrc: function(json) {
                        $('#loading-spinner').removeClass('d-flex');
                        $('#loading-spinner').addClass('d-none');
                        return json;
                    }
                },
                columns: [{
                        data: 'nip'
                    }, {
                        data: 'nip'
                    },
                    {
                        data: 'nama_pegawai'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'no_telp'
                    },
                    {
                        data: 'role'
                    },
                    {
                        data: 'is_dpa'
                    },
                    {
                        data: 'action'
                    }
                ],
                "dom": "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">",
                // make sure td and th white-space no wrap
                "columnDefs": [{
                        "className": "text-nowrap",
                        "targets": "_all"
                    },
                    {
                        "className": "numbering",
                        "targets": 0
                    },
                    {
                        "className": "dt-center",
                        "targets": "_all"
                    },
                    {
                        "orderable": false,
                        "targets": "_all"
                    }
                ],
            });

            t.on('order.dt search.dt', function() {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
                t.columns.adjust();
            }).draw();


            $('#btn-search').click(function() {
                $('#loading-spinner').removeClass('d-none');
                $('#loading-spinner').addClass('d-flex');

                $('#myTable').DataTable().ajax.reload();
            });

            $('#myTable').on('click', '.btn-edit', async function() {
                $('#loading-spinner').removeClass('d-none');
                $('#loading-spinner').addClass('d-flex');

                $('#editNamaHidden, #editRoleHidden, #editEmailHidden, #editNoTelpHidden').val('');

                let nip = $(this).data('nip');
                $.ajax({
                    url: '/getDetailDosen',
                    type: 'POST',
                    data: {
                        nip: nip
                    },
                    success: async function(response) {
                        let json = JSON.parse(response);

                        if (json != null) {
                            $('#editNip').val(json.pegawai.nip);
                            $('#editNama').val(json.pegawai.nama_pegawai);
                            is_kps = json.pegawai.is_kps;
                            if (is_kps == 1) {
                                prodi = json.pegawai.prodi;
                                $('#editJabatan').val('KPS-' + prodi);
                            } else {
                                $('#editJabatan').val('DOSEN');
                            }
                            if (json.kelas != null) {
                                await getKelasTanpaDPA(json.kelas.id_kelas);
                                $('#editDpa').val(json.kelas.id_kelas);
                            } else {
                                await getKelasTanpaDPA(null);
                                $('#editDpa').val('false');
                            }
                            $('#editEmail').val(json.pegawai.email);
                            $('#editNoTelp').val(json.pegawai.no_telp);

                            $('#editNamaHidden').val(json.pegawai.nama_pegawai);
                            if (is_kps == 1) {
                                prodi = json.pegawai.prodi;
                                $('#editJabatanHidden').val('KPS-' + prodi);
                            } else {
                                $('#editJabatanHidden').val('DOSEN');
                            }
                            if (json.kelas != null) {
                                $('#editDpaHidden').val(json.kelas.id_kelas);
                            } else {
                                $('#editDpaHidden').val('false');
                            }
                            $('#editEmailHidden').val(json.pegawai.email);
                            $('#editNoTelpHidden').val(json.pegawai.no_telp);
                        } else {
                            $('#edit-result').removeClass('d-none');
                            $('#edit-result').text('Gagal mengambil data dosen');
                        }

                        $('#loading-spinner').removeClass('d-flex');
                        $('#loading-spinner').addClass('d-none');

                        $('#editModal').modal('show');
                    }
                });
            });

            $('#addNip, #addNama, #addJabatan, #addDpa, #addEmail, #addNoTelp').on('input change', function() {
                let isFilled = ($('#addNip').val() != '' && $('#addNip').val() != null) &&
                    ($('#addNama').val() != '' && $('#addNama').val() != null) &&
                    ($('#addJabatan').val() != '' && $('#addJabatan').val() != null) &&
                    ($('#addDpa').val() != '' && $('#addDpa').val() != null) &&
                    ($('#addEmail').val() != '' && $('#addEmail').val() != null) &&
                    ($('#addNoTelp').val() != '' && $('#addNoTelp').val() != null);

                $('#btn-add').prop('disabled', !isFilled);
            });

            $('#btn-add').on('click', function() {
                let data = {
                    nip: $('#addNip').val(),
                    nama: $('#addNama').val(),
                    jabatan: $('#addJabatan').val(),
                    dpa: $('#addDpa').val(),
                    email: $('#addEmail').val(),
                    no_telp: $('#addNoTelp').val(),
                    prodi: ''
                };
                if (data.jabatan.includes('KPS-')) {
                    data.prodi = data.jabatan.split('-')[1];
                }

                $.ajax({
                    url: '/doInsertDosen',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        if (response == 'success') {
                            $('#add-result').addClass('d-none');
                            $('#addNip, #addNama, #addRole, #addEmail, #addNoTelp').val('');
                            $('#addModal').modal('hide');

                            $('#loading-spinner').removeClass('d-none');
                            $('#loading-spinner').addClass('d-flex');

                            $('#myTable').DataTable().ajax.reload();
                        } else {
                            $('#add-result').removeClass('d-none');
                            $('#add-result').text(response);
                        }
                    }
                });
            });

            $('#editNama, #editJabatan, #editDpa, #editEmail, #editNoTelp').on('input change', function() {
                let isChanged = false;

                if ($('#editNama').val() != $('#editNamaHidden').val() ||
                    $('#editJabatan').val() != $('#editJabatanHidden').val() ||
                    $('#editDpa').val() != $('#editDpaHidden').val() ||
                    $('#editEmail').val() != $('#editEmailHidden').val() ||
                    $('#editNoTelp').val() != $('#editNoTelpHidden').val()) {
                    isChanged = true;
                }

                let isFilled = $('#editNama').val() != '' &&
                    $('#editJabatan').val() != '' &&
                    $('#editEmail').val() != '' &&
                    $('#editNoTelp').val() != '';

                $('#btn-edit').prop('disabled', !(isChanged && isFilled));
            });

            $('#btn-edit').on('click', function() {
                $('#loading-spinner').removeClass('d-none');
                $('#loading-spinner').addClass('d-flex');

                const nip = $('#editNip').val();
                const nama = $('#editNama').val();
                const jabatan = $('#editJabatan').val();
                const dpa = $('#editDpa').val();
                const email = $('#editEmail').val();
                const no_telp = $('#editNoTelp').val();
                const prodi = '';
                if (jabatan.includes('KPS-')) {
                    prodi = jabatan.split('-')[1];
                }

                $.ajax({
                    url: '/doUpdateDosen',
                    type: 'POST',
                    data: {
                        nip: nip,
                        nama: nama,
                        jabatan: jabatan,
                        dpa: dpa,
                        email: email,
                        no_telp: no_telp,
                        prodi: prodi
                    },
                    success: function(response) {
                        if (response == 'success') {
                            $('#edit-result').addClass('d-none');
                            $('#editNip, #editNama, #editJabatan, #editDpa, #editEmail, #editNoTelp')
                                .val('');
                            $('#editModal').modal('hide');

                            $('#loading-spinner').removeClass('d-none');
                            $('#loading-spinner').addClass('d-flex');
                            $('#myTable').DataTable().ajax.reload();
                        } else {
                            $('#edit-result').removeClass('d-none');
                            $('#edit-result').text(response);
                        }
                    }
                });
            });
        });

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