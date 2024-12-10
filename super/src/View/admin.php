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
<div class="content px-3 pt-3" style="margin-top: 56px;">
    <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
            </ol>
        </nav>
    </div>

    <div class="bg-white">
        <!-- Button Tambah Admin -->
        <div class="text-start mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                Tambah Admin
            </button>
        </div>

        <!-- Table -->
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1234652783726</td>
                    <td>Yudi Setiawan</td>
                    <td>Laki-laki</td>
                    <td>Yudisetiawan@gmail.com</td>
                    <td>Malang, 28 Februari 1899</td>
                    <td>Pasuruan</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

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

                <!-- Modal Edit Data Admin -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5;">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="editModalLabel">Edit Data Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <!-- NIP -->
                                    <div class="row mb-3">
                                        <label for="editNip" class="col-sm-3 col-form-label text-end fw-bold">NIP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="editNip" value="1234652783726" readonly disabled>
                                        </div>
                                    </div>
                                    <!-- Nama -->
                                    <div class="row mb-3">
                                        <label for="editNama" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="editNama" value="Yudi Setiawan">
                                        </div>
                                    </div>
                                    <!-- Jenis Kelamin -->
                                    <div class="row mb-3">
                                        <label for="editJenisKelamin" class="col-sm-3 col-form-label text-end fw-bold">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="editJenisKelamin">
                                                <option value="Laki-laki" selected>Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="row mb-3">
                                        <label for="editEmail" class="col-sm-3 col-form-label text-end fw-bold">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="editEmail" value="Yudisetiawan@gmail.com">
                                        </div>
                                    </div>
                                    <!-- Tempat, Tanggal Lahir -->
                                    <div class="row mb-3">
                                        <label for="editTtl" class="col-sm-3 col-form-label text-end fw-bold">Tempat, Tanggal Lahir</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="editTempat" value="Malang" placeholder="Tempat">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="editTanggal" value="1899-02-28">
                                        </div>
                                    </div>
                                    <!-- Alamat -->
                                    <div class="row mb-3">
                                        <label for="editAlamat" class="col-sm-3 col-form-label text-end fw-bold">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="editAlamat" rows="3">Pasuruan</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="saveAdminChanges()">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Tambah Data Admin -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background-color: #F5F5F5;">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="addModalLabel">Tambah Data Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <!-- NIP -->
                                    <div class="row mb-3">
                                        <label for="addNip" class="col-sm-3 col-form-label text-end fw-bold">NIP</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="addNip" class="form-control" placeholder="Masukkan NIP">
                                        </div>
                                    </div>
                                    <!-- Nama -->
                                    <div class="row mb-3">
                                        <label for="addNama" class="col-sm-3 col-form-label text-end fw-bold">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="addNama" class="form-control" placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                    <!-- Jenis Kelamin -->
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
                                    <!-- Email -->
                                    <div class="row mb-3">
                                        <label for="addEmail" class="col-sm-3 col-form-label text-end fw-bold">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" id="addEmail" class="form-control" placeholder="Masukkan Email">
                                        </div>
                                    </div>
                                    <!-- Tempat, Tanggal Lahir -->
                                    <div class="row mb-3">
                                        <label for="addTtl" class="col-sm-3 col-form-label text-end fw-bold">Tempat, Tanggal Lahir</label>
                                        <div class="col-sm-5">
                                            <input type="text" id="addTempat" class="form-control" placeholder="Masukkan Tempat Lahir">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="date" id="addTanggal" class="form-control">
                                        </div>
                                    </div>
                                    <!-- Alamat -->
                                    <div class="row mb-3">
                                        <label for="addAlamat" class="col-sm-3 col-form-label text-end fw-bold">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea id="addAlamat" class="form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Footer -->
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

        function addData() {
            // Ambil nilai dari input field
            const nip = document.getElementById('addNip').value;
            const nama = document.getElementById('addNama').value;
            const jenisKelamin = document.getElementById('addJenisKelamin').value;
            const email = document.getElementById('addEmail').value;
            const tempatLahir = document.getElementById('addTempat').value;
            const tanggalLahir = document.getElementById('addTanggal').value;
            const alamat = document.getElementById('addAlamat').value;

            // Validasi sederhana untuk memastikan semua data diisi
            if (!nip || !nama || !jenisKelamin || !email || !tempatLahir || !tanggalLahir || !alamat) {
                alert('Semua data wajib diisi!');
                return;
            }

            // Simulasi penyimpanan data (misalnya menambahkannya ke tabel admin)
            console.log({
                nip,
                nama,
                jenisKelamin,
                email,
                tempatLahir,
                tanggalLahir,
                alamat
            });

            // Menambahkan data ke tabel admin secara dinamis
            const table = document.querySelector('table tbody');
            const newRow = table.insertRow();

            // Menambahkan data ke kolom tabel
            newRow.innerHTML = `
                <td>${nip}</td>
                <td>${nama}</td>
                <td>${jenisKelamin}</td>
                <td>${email}</td>
                <td>${tempatLahir}, ${tanggalLahir}</td>
                <td>${alamat}</td>
                <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;

            // Tutup modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
            modal.hide();

            // Reset form setelah data ditambahkan
            document.getElementById('addModal').querySelectorAll('input, select, textarea').forEach(input => input.value = '');
        }

        </script>
</body>

</html>