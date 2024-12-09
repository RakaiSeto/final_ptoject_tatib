<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php session_start(); echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/public/css/style-css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />

    <style>
    .form-container {
        /* max-width: 600px; */
        /* margin: 50px auto; */
        padding: 20px;
        /* background-color: #f9f9f9; */
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        /* box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.1); */
    }

    .container {
        max-width: 800px;
    }

    .login-box .btn:hover {
        background-color: #df7935;
    }


    .btn-primary {
        background-color: #fd7934;
        border-color: #fd7934;
    }

    .btn-primary:hover {
        background-color: #fd7934;
        border-color: #ff6f00;
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
                        <li class="breadcrumb-item"><a href="#" style="color: #fd7e14;">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>


            <div class="bg-white">
                <!-- <button class="btn btn-success mb-4"><i class="bi bi-plus me-2"></i>Tambah</button> -->
                <!-- <div class="container"> -->
                <div class="form-container">
                    <h4 class="fw-medium" style="color: #fd7934">Ganti Password</h4>
                    <hr>
                    <form action="/doChangePassword" method="POST">
                    <div class="container mb-4 p-3">
                            <div class="mb-3">
                                <label for="passwordLama" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" name="old" id="passwordLama"
                                    placeholder="Masukkan password lama">
                            </div>
                            <div class="mb-3">
                                <label for="passwordBaru" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" name="new" id="passwordBaru"
                                    placeholder="Masukkan password baru">
                            </div>
                            <div class="mb-3">
                                <label for="ulangiPasswordBaru" class="form-label">Ulangi Password Baru</label>
                                <input type="password" class="form-control" name="confirm" id="ulangiPasswordBaru"
                                    placeholder="Ulangi password baru">
                            </div>

                    </div>

                    <?php

                    if (!empty($_SESSION['Error'])) {
                        echo '<div class="alert alert-danger py-2" role="alert">' . $_SESSION['Error'] . '</div>';
                        unset($_SESSION['Error']);
                    }
                    ?>

                    <div class="button-container p-3 "
                        style="background-color: #f9f9f9; border-top: 1px solid rgba(0, 0, 0, 0.1);">
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-outline-secondary"><i
                                    class="bi bi-arrow-left me-2"></i>Kembali</button>
                            <button type="submit" class="btn btn-primary" id="btnSubmit" disabled><i class="bi bi-key-fill me-2"></i>Ganti
                                Password</button>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- </div> -->
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
        $(document).ready(function() {
            function toggleSubmitButton() {
                const oldPassword = $('#passwordLama').val().trim();
                const newPassword = $('#passwordBaru').val().trim();
                const confirmPassword = $('#ulangiPasswordBaru').val().trim();
                const isValid = oldPassword && newPassword && newPassword === confirmPassword;
                document.getElementById('btnSubmit').disabled = !isValid;
            }

            $('#passwordLama').on('input', toggleSubmitButton);
            $('#passwordBaru').on('input', toggleSubmitButton);
            $('#ulangiPasswordBaru').on('input', toggleSubmitButton);
        });
    </script>
</body>

</html>