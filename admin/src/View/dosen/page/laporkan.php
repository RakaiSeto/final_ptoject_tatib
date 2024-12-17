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
         <div class="content px-3 pt-3" style="margin-top: 68px;">


             <div class="alert alert-danger hidden" role="alert" id="alert-ajax"></div>

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
                             <div class="dropdown me-1">
                                 <select class="form-select bg-light" id="prodi_select"
                                     aria-label="Default select example">
                                     <option selected disabled>Pilih Prodi</option>
                                     <option id="prodi-ti" value="ti">Teknik Informatika</option>
                                     <option id="prodi-sib" value="sib">Sistem Informasi Bisnis</option>
                                     <option id="prodi-ppls" value="ppls">PPLS</option>
                                 </select>
                             </div>

                             <!-- Dropdown Tingkat -->
                             <div class="dropdown d-none" id="dropdownTI">
                                 <button
                                     class="btn btn-light dropdown-toggle border d-flex justify-content-between align-items-center"
                                     type="button" id="dropdownTIButton" data-selected="" data-bs-toggle="dropdown"
                                     aria-expanded="false" style="width: 200px;">
                                     Pilih Tingkat
                                 </button>
                                 <ul class="dropdown-menu">
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">1</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($ti['1'] as $tingkat) {
                                            echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat->nama_kelas . '</a></li>';
                                        }?>
                                             <?= empty($ti['1']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
                                         </ul>
                                     </li>
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">2</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($ti['2'] as $tingkat) {
                                            echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat->nama_kelas . '</a></li>';
                                        }?>
                                             <?= empty($ti['2']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
                                         </ul>
                                     </li>
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">3</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($ti['3'] as $tingkat) {
                                            echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat->nama_kelas . '</a></li>';
                                        }?>
                                             <?= empty($ti['3']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
                                         </ul>
                                     </li>
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">4</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($ti['4'] as $tingkat) {
                                            echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat->nama_kelas . '</a></li>';
                                        }?>
                                             <?= empty($ti['4']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
                                         </ul>
                                     </li>
                                 </ul>
                             </div>
                             <div class="dropdown d-none" id="dropdownSIB">

                                 <button
                                     class="btn btn-light dropdown-toggle border d-flex justify-content-between align-items-center"
                                     type="button" id="dropdownSIBButton" data-selected="" data-bs-toggle="dropdown"
                                     aria-expanded="false" style="width: 200px;">
                                     Pilih Tingkat
                                 </button>
                                 <ul class="dropdown-menu">
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">1</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($sib['1'] as $tingkat) {
                                                echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat->nama_kelas . '</a></li>';
                                            }?>
                                             <?= empty($sib['1']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
                                         </ul>
                                     </li>
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">2</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($sib['2'] as $tingkat) {
                                                echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat->nama_kelas . '</a></li>';
                                            }?>
                                             <?= empty($sib['2']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
                                         </ul>
                                     </li>
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">3</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($sib['3'] as $tingkat) {
                                                echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat->nama_kelas . '</a></li>';
                                            }?>
                                             <?= empty($sib['3']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
                                         </ul>
                                     </li>
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">4</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($sib['4'] as $tingkat) {
                                                echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat->nama_kelas . '</a></li>';
                                            }?>
                                             <?= empty($sib['4']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
                                         </ul>
                                     </li>
                                 </ul>
                             </div>
                             <div class="dropdown d-none" id="dropdownPPLS">
                                 <button
                                     class="btn btn-light dropdown-toggle border d-flex justify-content-between align-items-center"
                                     type="button" id="dropdownPPLSButton" data-selected="" data-bs-toggle="dropdown"
                                     aria-expanded="false" style="width: 200px;">
                                     Pilih Tingkat
                                 </button>
                                 <ul class="dropdown-menu">
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">1</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($ppls['1'] as $tingkat) {
                                                echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat->nama_kelas . '</a></li>';
                                            }?>
                                             <?= empty($ppls['1']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
                                         </ul>
                                     </li>
                                     <li class="dropdown-submenu">
                                         <a class="dropdown-item dropdown-toggle" href="#">2</a>
                                         <ul class="dropdown-menu">
                                             <?php foreach ($ppls['2'] as $tingkat) {
                                                echo '<li><a class="dropdown-item" data-kelas="' . $tingkat->id_kelas . '" href="#" onclick="updateTingkatDropdown(this)">' . $tingkat . '</a></li>';
                                            }?>
                                             <?= empty($ppls['2']) ? '<li><a class="dropdown-item disabled" href="#">Belum ada data</a></li>' : '' ?>
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
                                 <tbody id="filterTableBody">
                                     <tr class="mahasiswaRow" role="button" data-nama="Ahmad Rizky Maulana"
                                         data-nim="23417720001" data-kelas="TI-1A">
                                         <td>Ahmad Rizky Maulana</td>
                                         <td>23417720001</td>
                                         <td>TI-1A</td>
                                     </tr>
                                     <!-- Tambahkan baris lain sesuai data mahasiswa -->
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>


             <div id="reportCard" class=" hidden">
                 <div class="bg-white p-3">
                     <div id="identityCard">
                         <h6>Laporkan pelanggaran untuk:</h6>
                         <p style="font-size: 20px" class="fw-bold" id="studentInfo" data-nim=""></p>
                     </div>
                     <div>

                         <!-- Tanggal -->
                         <div class="form-group row mt-3">
                             <label for="tanggal" class="col-sm-2 col-form-label fw-semibold">Tanggal</label>
                             <div class="col-sm-10">
                                 <input type="date" class="form-control dynamic-width" id="tanggal" />
                             </div>
                         </div>

                         <!-- Jenis Pelanggaran -->
                         <div class="form-group row mt-3">
                             <label for="jenisPelanggaran" class="col-sm-2 col-form-label fw-semibold">Jenis
                                 Pelanggaran</label>
                             <div class="col-sm-10">
                                 <input type="text" id="inputPelanggaran" class="form-control dynamic-width hidden"
                                     readonly data-bs-toggle="modal" data-bs-target="#modalPilihPelanggaran"
                                     placeholder="Klik untuk memilih pelanggaran">
                                 <button type="button" id="btnTriggerModal" class="btn-detail w-25"
                                     data-bs-toggle="modal" data-bs-target="#modalPilihPelanggaran">
                                     Pilih Pelanggaran
                                 </button>
                             </div>
                         </div>


                         <!-- Bukti -->
                         <div class="form-group row mt-3">
                             <label for="bukti" class="col-sm-2 col-form-label fw-semibold">Bukti</label>
                             <div class="col-sm-10">
                                 <input type="file" class="form-control-file w-25" id="bukti" />
                             </div>
                         </div>

                         <!-- Catatan -->
                         <div class="form-group row mt-3">
                             <label for="catatan" class="col-sm-2 col-form-label fw-semibold">Catatan</label>
                             <div class="col-sm-10">
                                 <textarea class="form-control dynamic-width" id="catatan" rows="3"
                                     placeholder="Ceritakan kronologi secara lengkap"></textarea>
                             </div>
                         </div>

                         <!-- Tombol -->
                         <div class="form-group row mt-3">
                             <div class="col-sm-10 offset-sm-2">
                                 <button class="btn btn-danger mr-2" id="batal">Batal</button>
                                 <button class="btn btn-success" disabled id="kirim">Kirim</button>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>

             <!-- Modal -->
             <div class="modal fade" id="modalPilihPelanggaran" data-selected-pelanggaran="" data-bs-backdrop="static"
                 data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                 <div class="modal-dialog modal-xl modal-dialog-centered" style="height: 10vh">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Pelanggaran</h1>
                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <div class="bg-white">
                                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                                     <li class="nav-item" role="presentation">
                                         <button class="nav-link active" id="tingkat-1-tab" data-bs-toggle="tab"
                                             data-bs-target="#tingkat-1" type="button" role="tab"
                                             aria-controls="informasi" aria-selected="true">Tingkat 1</button>
                                     </li>
                                     <li class="nav-item" role="presentation">
                                         <button class="nav-link" id="tingkat-2-tab" data-bs-toggle="tab"
                                             data-bs-target="#tingkat-2" type="button" role="tab"
                                             aria-controls="klasifikasi" aria-selected="false">Tingkat 2</button>
                                     </li>
                                     <li class="nav-item" role="presentation">
                                         <button class="nav-link" id="tingkat-3-tab" data-bs-toggle="tab"
                                             data-bs-target="#tingkat-3" type="button" role="tab"
                                             aria-controls="klasifikasi" aria-selected="false">Tingkat 3</button>
                                     </li>
                                     <li class="nav-item" role="presentation">
                                         <button class="nav-link" id="tingkat-4-tab" data-bs-toggle="tab"
                                             data-bs-target="#tingkat-4" type="button" role="tab"
                                             aria-controls="klasifikasi" aria-selected="false">Tingkat 4</button>
                                     </li>
                                     <li class="nav-item" role="presentation">
                                         <button class="nav-link" id="tingkat-5-tab" data-bs-toggle="tab"
                                             data-bs-target="#tingkat-5" type="button" role="tab"
                                             aria-controls="klasifikasi" aria-selected="false">Tingkat 5</button>
                                     </li>
                                 </ul>

                                 <div class="tab-content" id="myTabContent">
                                     <div class="tab-pane fade show active" id="tingkat-1" role="tabpanel"
                                         aria-labelledby="tingkat-1-tab">
                                         <div class="table table-responsive mt-3">
                                             <table class="table table-bordered table-hover" id="tabel-awal">
                                                 <thead>
                                                     <tr>
                                                         <th>Pelanggaran</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($peraturan['1'] as $row) {
                                                        echo "<tr class=\"tingkat-row\" data-pelanggaran=\"" . $row->kode_pelanggaran . "\"><td>" . $row->nama_pelanggaran . "</td></tr>";
                                                    }?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="tingkat-2" role="tabpanel"
                                         aria-labelledby="tingkat-2-tab">
                                         <div class="table table-responsive mt-3">
                                             <table class="table table-bordered table-hover" id="tabel-awal">
                                                 <thead>
                                                     <tr>
                                                         <th>Pelanggaran</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($peraturan['2'] as $row) {
                                                    echo "<tr class=\"tingkat-row\" data-pelanggaran=\"" . $row->kode_pelanggaran . "\"><td>" . $row->nama_pelanggaran . "</td></tr>";
                                                }?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="tingkat-3" role="tabpanel"
                                         aria-labelledby="tingkat-3-tab">
                                         <div class="table table-responsive mt-3">
                                             <table class="table table-bordered table-hover" id="tabel-awal">
                                                 <thead>
                                                     <tr>
                                                         <th>Pelanggaran</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($peraturan['3'] as $row) {
                                                    echo "<tr class=\"tingkat-row\" data-pelanggaran=\"" . $row->kode_pelanggaran . "\"><td>" . $row->nama_pelanggaran . "</td></tr>";
                                                }?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="tingkat-4" role="tabpanel"
                                         aria-labelledby="tingkat-4-tab">
                                         <div class="table table-responsive mt-3">
                                             <table class="table table-bordered table-hover" id="tabel-awal">
                                                 <thead>
                                                     <tr>
                                                         <th>Pelanggaran</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($peraturan['4'] as $row) {
                                                    echo "<tr class=\"tingkat-row\" data-pelanggaran=\"" . $row->kode_pelanggaran . "\"><td>" . $row->nama_pelanggaran . "</td></tr>";
                                                }?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="tingkat-5" role="tabpanel"
                                         aria-labelledby="tingkat-5-tab">
                                         <div class="table table-responsive mt-3">
                                             <table class="table table-bordered table-hover" id="tabel-awal">
                                                 <thead>
                                                     <tr>
                                                         <th>Pelanggaran</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($peraturan['5'] as $row) {
                                                    echo "<tr class=\"tingkat-row\" data-pelanggaran=\"" . $row->kode_pelanggaran . "\"><td>" . $row->nama_pelanggaran . "</td></tr>";
                                                }?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                     <!-- Tambahkan tab-pane lain sesuai kebutuhan -->
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Scripts -->
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
             <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
             <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
             <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->

             <script>
             function checkInput() {
                 console.log("masuk checkInput");
                 const nim = document.getElementById("studentInfo").attributes["data-nim"].value;
                 const pelanggaran = document.getElementById("modalPilihPelanggaran").attributes[
                     "data-selected-pelanggaran"].value;
                 const keterangan = document.getElementById("catatan").value;
                 const tgl = document.getElementById("tanggal").value;
                 const bukti = document.getElementById("bukti").files[0];

                 document.getElementById('kirim').disabled = !(nim && pelanggaran && keterangan && tgl && bukti);
             }

             function debounce(func, wait, immediate) {
                 var timeout;
                 return function() {
                     var context = this,
                         args = arguments;
                     var later = function() {
                         timeout = null;
                         if (!immediate) func.apply(context, args);
                     };
                     var callNow = immediate && !timeout;
                     clearTimeout(timeout);
                     timeout = setTimeout(later, wait);
                     if (callNow) func.apply(context, args);
                 };
             };

             var debounceAjax = debounce(function() {
                 const nim = document.getElementById("studentInfo").attributes["data-nim"].value;
                 const pelanggaran = document.getElementById("modalPilihPelanggaran").attributes[
                     "data-selected-pelanggaran"].value;
                 const keterangan = document.getElementById("catatan").value;
                 const tgl = document.getElementById("tanggal").value;

                 var formData = new FormData();
                 formData.append('nim', nim);
                 formData.append('pelanggaran', pelanggaran);
                 formData.append('kronologi', keterangan);
                 formData.append('date', tgl);
                 formData.append('bukti', $('#bukti')[0].files[0]);

                 $.ajax({
                     url: '/doLaporkan',
                     method: 'POST',
                     contentType: false,
                     processData: false,
                     data: formData,
                     success: function(response) {
                         location.reload()
                     },
                     error: function(xhr, status, error) {
                         let alert = document.getElementById('alert-ajax');
                         let decodedResponse = JSON.parse(xhr.responseText);
                         alert.innerText = 'Error: ' + decodedResponse.message;
                         alert.classList.remove('hidden')
                     }
                 })
             }, 500, false)

             document.addEventListener('DOMContentLoaded', function() {
                 // Event handler untuk memilih pelanggaran di dalam modal
                 document.querySelectorAll('.tingkat-row').forEach(function(row) {
                     row.addEventListener('click', function() {
                         // Ambil elemen input dan tombol
                         const inputField = document.getElementById('inputPelanggaran');
                         const buttonTrigger = document.getElementById('btnTriggerModal');

                         // Set value input dengan jenis pelanggaran yang dipilih
                         const tingkat = document.querySelector('.nav-tabs .nav-link.active')
                             .innerText; // Ambil tingkat
                         document.getElementById("modalPilihPelanggaran").attributes[
                             "data-selected-pelanggaran"].value = row.attributes[
                             'data-pelanggaran'].value;
                         inputField.value = `${row.innerText} (${tingkat})`;
                         inputField.classList.remove('hidden'); // Tampilkan input field

                         // Sembunyikan tombol trigger modal
                         buttonTrigger.classList.add('hidden');

                         // Tutup modal
                         const modalElement = document.getElementById('modalPilihPelanggaran');
                         const modalInstance = bootstrap.Modal.getInstance(modalElement);
                         modalInstance.hide();
                         checkInput();
                     });

                     $('#kirim').on('click', debounceAjax)
                 });

                 $('#catatan').on('input', checkInput)
                 $('#tanggal').on('change', checkInput)
                 $('#bukti').on('input', checkInput)
             });

             function clickMahasiswa(e) {
                 const nama = e.getAttribute('data-nama')
                 const nim = e.getAttribute('data-nim')
                 const kelas = e.getAttribute('data-kelas')

                 // Isi data pada card
                 document.getElementById("studentInfo").innerText = `${nama}/ NIM: ${nim}/ ${kelas}`;
                 document.getElementById("studentInfo").attributes["data-nim"].value = nim;
                 document.getElementById("reportCard").classList.remove("hidden");
                 document.getElementById("filterTable").classList.add("hidden");
             };

             // Tambahkan fungsi batal
             document.getElementById("batal").addEventListener("click", function() {
                 document.getElementById("reportCard").classList.add("hidden");
             });


             document.querySelectorAll('.dropdown-submenu').forEach(function(submenu) {
                 submenu.addEventListener('mouseenter', function() {
                     const submenuMenu = submenu.querySelector('.dropdown-menu');
                     if (submenuMenu) submenuMenu.classList.add('show');
                 })

                 submenu.addEventListener('mouseclick', function(e) {
                     const submenuMenu = submenu.querySelector('.dropdown-menu');
                     if (submenuMenu) submenuMenu.classList.add('show');
                 });

                 submenu.addEventListener('mouseleave', function() {
                     const submenuMenu = submenu.querySelector('.dropdown-menu');
                     if (submenuMenu) submenuMenu.classList.remove('show');
                 });
             });

             function updateTingkatDropdown(element) {
                 const kelas = element.getAttribute('data-kelas');
                 if (kelas.startsWith('TI')) {
                     var dropdownButton = document.getElementById("dropdownTIButton");
                 } else if (kelas.startsWith('SIB')) {
                     var dropdownButton = document.getElementById("dropdownSIBButton");
                 } else {
                     var dropdownButton = document.getElementById("dropdownPPLSButton");
                 }

                 dropdownButton.attributes['data-selected'].value = kelas;
                 dropdownButton.textContent = element.textContent;
             }

             $(document).ready(function() {
                 $('#prodi_select').on('change', function() {
                     console.log($(this).val())
                     const selectedValue = $(this).val();
                     if (selectedValue === 'ti') {
                         $('#dropdownTI').removeClass('d-none');
                         $('#dropdownSIB').addClass('d-none');
                         $('#dropdownPPLS').addClass('d-none');
                     } else if (selectedValue === 'sib') {
                         $('#dropdownTI').addClass('d-none');
                         $('#dropdownSIB').removeClass('d-none');
                         $('#dropdownPPLS').addClass('d-none');
                     } else {
                         $('#dropdownTI').addClass('d-none');
                         $('#dropdownSIB').addClass('d-none');
                         $('#dropdownPPLS').removeClass('d-none');
                     }

                 })
             })

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
                     const selectedValue = this.getAttribute(
                         'data-value'); // Ambil data-value dari item
                     document.getElementById('prodiInput').value =
                         selectedValue; // Isi input dengan nilai yang dipilih
                 });
             });


             //tombol filter
             document.getElementById('filterBtn').addEventListener('click', function() {
                 let selectedProdi = document.getElementById('prodi_select').value;
                 if (selectedProdi === 'ti') {
                     var selectedKelas = document.getElementById('dropdownTIButton').getAttribute(
                         'data-selected');
                 } else if (selectedProdi === 'sib') {
                     var selectedKelas = document.getElementById('dropdownSIBButton').getAttribute(
                         'data-selected');
                 } else {
                     var selectedKelas = document.getElementById('dropdownPPLSButton').getAttribute(
                         'data-selected');
                 }

                 $.ajax({
                     url: '/getMahasiswaKelas',
                     method: 'POST',
                     data: {
                         kelas: selectedKelas,
                     },
                     success: function(response) {
                         document.getElementById('alert-ajax').classList.add('hidden');
                         let decodedResponse = JSON.parse(response);
                         const table = document.getElementById('filterTableBody');
                         table.innerHTML = '';
                         decodedResponse.forEach(item => {
                             const row = document.createElement('tr');
                             row.innerHTML = `
                                    <td>${item.nim}</td>
                                    <td>${item.nama_mahasiswa}</td>
                                    <td>${item.id_kelas}</td>
                                `;
                             row.onclick = function() {
                                 clickMahasiswa(row)
                             };
                             row.classList.add('mahasiswaRow');
                             row.role = 'button';
                             row.setAttribute('data-nim', item.nim);
                             row.setAttribute('data-nama', item.nama_mahasiswa);
                             row.setAttribute('data-kelas', item.id_kelas);
                             table.appendChild(row);
                         });
                         document.getElementById('filterTable').classList.remove('hidden');
                     },
                     error: function(xhr, status, error) {
                         let alert = document.getElementById('alert-ajax');
                         let decodedResponse = JSON.parse(xhr.responseText);
                         alert.innerText = 'Error: ' + decodedResponse.message;
                         alert.classList.remove('hidden')
                     }
                 })

                 // const table = document.getElementById('filterTable')
                 // table.classList.toggle('hidden');
             });
             </script>
 </body>

 </html>