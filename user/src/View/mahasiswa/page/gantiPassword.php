<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php session_start(); ?>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/public/css/style-css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />

    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-secondary {
            background-color: #e9ecef;
            color: #212529;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #d6d8db;
        }
    </style>

</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>


        <!-- Dashboard Content -->
        <div class="content px-3 pt-3" style="margin-top: 56px">

            <div class="bg-white p-2 my-2" style="color: #b1b1b1; border-radius: 5px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>


            <div class="bg-white">
                <!-- <button class="btn btn-success mb-4"><i class="bi bi-plus me-2"></i>Tambah</button> -->
                <div class="container">
                    <div class="form-container">
                        <h3 class="text-center mb-4">Ganti Password</h3>
                        <?php
                        if (!empty($_SESSION['Error'])) { echo '<div class="alert alert-danger py-2" role="alert">' . $_SESSION['Error'] . '</div>';
                            unset($_SESSION['Error']);
                        } ?>
                        <form action="/doGantiPassword" method="post">
                            <div class="mb-3">
                                <label for="passwordLama" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" name="old" id="passwordLama" placeholder="Masukkan password lama">
                            </div>
                            <div class="mb-3">
                                <label for="passwordBaru" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" name="new" id="passwordBaru" placeholder="Masukkan password baru">
                            </div>
                            <div class="mb-3">
                                <label for="ulangiPasswordBaru" class="form-label">Ulangi Password Baru</label>
                                <input type="password" class="form-control" name="confirm" id="ulangiPasswordBaru" placeholder="Ulangi password baru">
                            </div>


                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary" id="btnSubmit" disabled>Ganti Password</button>
                                <a href="/" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
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
    document.querySelector(".open-btn").addEventListener("click", function() {
        document.getElementById("side_nav").classList.add("active");
        document.querySelector(".content").classList.add("sidebar-open");
    });

    document.querySelector(".close-btn").addEventListener("click", function() {
        document.getElementById("side_nav").classList.remove("active");
        document.querySelector(".content").classList.remove("sidebar-open");
    });

    $(document).ready(function() {
        $('#ulangiPasswordBaru').on('input', function(event) {
            if ($('#ulangiPasswordBaru').val() !== '' && $('#passwordLama').val() !== '') {
                if ($('#passwordBaru').val() !== $('#ulangiPasswordBaru').val()) {
                    $('#btnSubmit').prop('disabled', true);
                } else {
                    $('#btnSubmit').prop('disabled', false);
                }
            }
        })

        $('#passwordBaru').on('input', function (event) {
            if ($('#passwordBaru').val() !== '' && $('#passwordLama').val() !== '') {
                if ($('#passwordBaru').val() !== $('#ulangiPasswordBaru').val()) {
                    $('#btnSubmit').prop('disabled', true);
                } else {
                    $('#btnSubmit').prop('disabled', false);
                }
            }
        })

        $('#passwordLama').on('input', function (event) {
            if ($('#passwordLama').val() === '') {
                $('#btnSubmit').prop('disabled', true);
            } else {
                $('#passwordBaru').trigger('input');
            }
        })
    })
    </script>
</body>

</html>