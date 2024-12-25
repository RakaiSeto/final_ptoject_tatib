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

        <!-- spinner -->
        <div class="content px-3 pt-3" style="margin-top: 56px;">
            <div class="text-center position-fixed d-none justify-content-center align-items-center top-50 start-50 translate-middle bg-white bg-opacity-50 w-100 h-100"
                id="loading-spinner" style="z-index: 999; display: none;">
                <img src="/public/img/spinner-svg" alt="Loading..." class="mx-auto d-block"
                    style="width: 15%; height: 15%;">
            </div>

            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
                    </ol>
                </nav>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" role="alert"><?= $_SESSION['error'] ?></div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <!-- Button Tambah Admin -->
            <div class="text-start mb-3">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i
                        class="fas fa-plus"></i>
                    Tambah Admin
                </button>
            </div>


            <div class="bg-white" style="border: 0.5px solid rgba(0, 0, 0, 0.1); ">
                <div class="filter-bar w-100 rounded align-items-center gap-2 mb-3 mt-1">
                    <h5 class="ms-2 mt-1 fw-semibold">Filter</h5>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <label for="prodi" class="form-label ps-2">Kategori</label>
                                <select id="kategori" class="form-select w-100"
                                    style="box-sizing: border-box; max-width: 100%;">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="nip">NIP Admin</option>
                                    <option value="nama_pegawai">Nama Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <label for="prodi" class="form-label ps-2">Keyword</label>
                                <input type="text" id="keyword" class="form-control" placeholder="Cari"
                                    aria-label="Username" aria-describedby="basic-addon1">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="d-flex flex-column">
                                <button type="submit" id="btn-search" class="btn-detail">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="table-responsive" style="overflow-x: auto; min-width: 100%;">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>Prodi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Edit Data Admin -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
                data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="background-color: #F5F5F5;">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="addModalLabel">Edit Data Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="edit-result" class="alert alert-danger d-none" role="alert">sdf</div>
                            <div class="form-group">
                                <!-- NIP -->
                                <div class="row mb-3">
                                    <label for="addNip" class="col-sm-2 col-form-label text-start fw-bold">NIP</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="editNip" readonly class="form-control" placeholder="Masukkan NIP">
                                    </div>
                                </div>
                                <!-- Nama -->
                                <div class="row mb-3">
                                    <label for="addNama" class="col-sm-2 col-form-label text-start fw-bold">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="editNama" class="form-control"
                                            placeholder="Masukkan Nama">
                                    </div>
                                </div>
                                <!-- Jenis Kelamin -->
                                <div class="row mb-3">
                                    <label for="addRole" class="col-sm-2 col-form-label text-start fw-bold">Role</label>
                                    <div class="col-sm-10">
                                        <select id="editRole" class="form-control">
                                            <option value="" selected disabled>Pilih Role</option>
                                            <option value="admin-TI">Admin TI</option>
                                            <option value="admin-SIB">Admin SIB</option>
                                            <option value="super">Superadmin</option>
                                        </select>
                                       </div>
                                </div>
                                <!-- Email -->
                                <div class="row mb-3">
                                    <label for="addEmail" class="col-sm-2 col-form-label text-start fw-bold">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" id="editEmail" class="form-control"
                                            placeholder="Masukkan Email">
                                    </div>
                                </div>
                                <!-- No Telp -->
                                <div class="row mb-3">
                                    <label for="addNoTelp" class="col-sm-2 col-form-label text-start fw-bold">No Telp</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="editNoTelp" class="form-control" placeholder="Masukkan No Telp">
                                    </div>
                                </div>

                                <input type="hidden" name="role" id="editRoleHidden">
                                <input type="hidden" name="nama" id="editNamaHidden">
                                <input type="hidden" name="email" id="editEmailHidden">
                                <input type="hidden" name="no_telp" id="editNoTelpHidden">
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" disabled id="btn-edit">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Data Admin -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true"
                data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="background-color: #F5F5F5;">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="addModalLabel">Tambah Data Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="add-result" class="alert alert-danger d-none" role="alert">sdf</div>
                            <div class="form-group">
                                <!-- NIP -->
                                <div class="row mb-3">
                                    <label for="addNip" class="col-sm-2 col-form-label text-start fw-bold">NIP</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="addNip" class="form-control" placeholder="Masukkan NIP">
                                    </div>
                                </div>
                                <!-- Nama -->
                                <div class="row mb-3">
                                    <label for="addNama" class="col-sm-2 col-form-label text-start fw-bold">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="addNama" class="form-control"
                                            placeholder="Masukkan Nama">
                                    </div>
                                </div>
                                <!-- Jenis Kelamin -->
                                <div class="row mb-3">
                                    <label for="addRole" class="col-sm-2 col-form-label text-start fw-bold">Role</label>
                                    <div class="col-sm-10">
                                        <select id="addRole" class="form-control">
                                            <option value="" selected disabled>Pilih Role</option>
                                            <option value="admin-TI">Admin TI</option>
                                            <option value="admin-SIB">Admin SIB</option>
                                            <option value="super">Superadmin</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="row mb-3">
                                    <label for="addEmail" class="col-sm-2 col-form-label text-start fw-bold">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" id="addEmail" class="form-control"
                                            placeholder="Masukkan Email">
                                    </div>
                                </div>
                                <!-- No Telp -->
                                <div class="row mb-3">
                                    <label for="addNoTelp" class="col-sm-2 col-form-label text-start fw-bold">No Telp</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="addNoTelp" class="form-control" placeholder="Masukkan No Telp">
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" disabled id="btn-add">Tambah</button>
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
        function deleteAdmin(nip) {
            if (confirm('Apakah anda yakin ingin menghapus data admin ini?')) {
                // redirect to /doDeleteAdmin with nip as body as POST  
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/doDeleteAdmin';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'nip';
                input.value = nip;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        }

        $(document).ready(function() {
            // spinner
            $('#loading-spinner').removeClass('d-none');
            $('#loading-spinner').addClass('d-flex');

            $('#myTable').DataTable({
                "lengthMenu": [10, 15, 20],
                "pageLength": 10,
                "paging": true,
                "info": true,
                "searching": false,
                "responsive": true,
                "scrollX": true,
                "order": [
                    [1, 'asc']
                ],
                ajax: {
                    url: '/getDataAdmin',
                    type: 'POST',
                    data: function() {
                        return {
                            kategori: $('#kategori').val(),
                            value: $('#keyword').val()
                        };
                    },
                    dataSrc: function(json) {
                        $('#loading-spinner').removeClass('d-flex');
                        $('#loading-spinner').addClass('d-none');
                        return json;
                    }
                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Nomor urut berdasarkan indeks baris
                        },
                    },
                    {
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
                        data: 'prodi'
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
                        "className": "dt-center",
                        "targets": "_all"
                    },
                    {
                        "orderable": false,
                        "targets": "_all"
                    }
                ],
            });

            $('#btn-search').click(function() {
                $('#loading-spinner').removeClass('d-none');
                $('#loading-spinner').addClass('d-flex');

                $('#myTable').DataTable().ajax.reload();
            });

            $('#myTable').on('click', '.btn-edit', function() {
                $('#loading-spinner').removeClass('d-none');
                $('#loading-spinner').addClass('d-flex');

                $('#editNamaHidden, #editRoleHidden, #editEmailHidden, #editNoTelpHidden').val('');

                let nip = $(this).data('nip');
                $.ajax({
                    url: '/getDetailAdmin',
                    type: 'POST',
                    data: {
                        nip: nip
                    },
                    success: function(response) {
                        json = JSON.parse(response);

                        if (json != null) {
                            $('#editNip').val(json.nip);
                            $('#editNama').val(json.nama_pegawai);
                            let role = json.role;
                            if (role == 'super') {
                                role = 'super';
                            } else {
                                let prodi = json.prodi;
                                role = role.toLowerCase() + '-' + prodi;
                            }
                            $('#editRole').val(role);
                            $('#editEmail').val(json.email);
                            $('#editNoTelp').val(json.no_telp);

                            $('#editNamaHidden').val(json.nama_pegawai);
                            $('#editRoleHidden').val(role);
                            $('#editEmailHidden').val(json.email);
                            $('#editNoTelpHidden').val(json.no_telp);
                        } else {
                            $('#edit-result').removeClass('d-none');
                            $('#edit-result').text('Gagal mengambil data admin');
                        }

                        $('#loading-spinner').removeClass('d-flex');
                        $('#loading-spinner').addClass('d-none');

                        $('#editModal').modal('show');
                    }
                });
            });

            $('#addNip, #addNama, #addRole, #addEmail, #addNoTelp').on('input', function() {
                if ($('#addNip').val() != '' && $('#addNama').val() != '' && $('#addRole').val() != '' && $('#addEmail').val() != '' && $('#addNoTelp').val() != '') {
                    $('#btn-add').prop('disabled', false);
                } else {
                    $('#btn-add').prop('disabled', true);
                }
            });

            $('#btn-add').click(function() {
                let data = {
                    nip: $('#addNip').val(),
                    nama: $('#addNama').val(),
                    role: $('#addRole').val(),
                    email: $('#addEmail').val(),
                    no_telp: $('#addNoTelp').val(),
                    prodi: null
                };
                if ($('#addRole').val() == 'super') {
                    data.prodi = null;
                    data.role = 'super';
                } else {
                    let arrTemp = $('#addRole').val().split('-');
                    data.prodi = arrTemp[1];
                    data.role = arrTemp[0];
                }

                $.ajax({
                    url: '/doInsertAdmin',
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

            $('#editNama, #editRole, #editEmail, #editNoTelp').on('input change', function() {
                let isChanged = false;

                    // Cek apakah ada minimal satu field yang diubah
                if ($('#editNama').val() != $('#editNamaHidden').val() ||
                    $('#editRole').val() != $('#editRoleHidden').val() ||
                    $('#editEmail').val() != $('#editEmailHidden').val() ||
                    $('#editNoTelp').val() != $('#editNoTelpHidden').val()) {
                    isChanged = true;
                }

                // Cek apakah semua field terisi
                let isFilled = $('#editNama').val() != '' &&
                    $('#editRole').val() != '' &&
                    $('#editEmail').val() != '' &&
                    $('#editNoTelp').val() != '';

                $('#btn-edit').prop('disabled', !(isChanged && isFilled));
            });

            $('#btn-edit').click(function() {
                let data = {
                    nip: $('#editNip').val(),
                    nama: $('#editNama').val(),
                    role: $('#editRole').val(),
                    email: $('#editEmail').val(),
                    no_telp: $('#editNoTelp').val(),
                    prodi: null
                };
                if ($('#editRole').val() == 'super') {
                    data.prodi = null;
                    data.role = 'super';
                } else {
                    let arrTemp = $('#editRole').val().split('-');
                    data.prodi = arrTemp[1];
                    data.role = arrTemp[0];
                }

                $.ajax({
                    url: '/doUpdateAdmin',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        if (response == 'success') {
                            $('#edit-result').addClass('d-none');
                            $('#editNip, #editNama, #editRole, #editEmail, #editNoTelp').val('');
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
    </script>
</body>

</html>