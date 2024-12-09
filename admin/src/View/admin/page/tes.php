<html>

<head>
    <title>
        Data Mahasiswa
    </title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .sidebar {
        background-color: #f8f9fa;
        height: 100vh;
        padding: 20px;
    }

    .sidebar a {
        text-decoration: none;
        color: #333;
        display: block;
        padding: 10px 0;
    }

    .sidebar a:hover {
        background-color: #e9ecef;
    }

    .sidebar .active {
        color: #ff6600;
    }

    .content {
        padding: 20px;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .table th {
        background-color: #f8f9fa;
    }

    .pagination .page-item.active .page-link {
        background-color: #ff6600;
        border-color: #ff6600;
    }

    .pagination .page-link {
        color: #ff6600;
    }

    .pagination .page-link:hover {
        color: #ff6600;
    }

    .filter-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .filter-bar .btn {
        background-color: #ff6600;
        color: white;
    }

    .filter-bar .btn:hover {
        background-color: #e65c00;
    }

    .filter-bar .form-select,
    .filter-bar .form-control {
        max-width: 200px;
    }

    .user-profile img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
    }
    </style>
</head>

<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="text-center mb-4">
                <img alt="E-Tatib Logo" height="100"
                    src="https://storage.googleapis.com/a1aa/image/eUCFkAghpoVbI68RfnVPIRj09wfGKkFCvuOgQmHZ7GRDwWwnA.jpg"
                    width="100" />
                <h4 class="mt-2">
                    E-Tatib
                </h4>
            </div>
            <a class="active" href="#">
                <i class="fas fa-home">
                </i>
                Dashboard
            </a>
            <a href="#">
                <i class="fas fa-users">
                </i>
                Data Pelanggan
            </a>
            <a href="#">
                <i class="fas fa-book">
                </i>
                Kelola Data
            </a>
            <div class="ms-3">
                <a class="active" href="#">
                    <i class="fas fa-user-graduate">
                    </i>
                    Mahasiswa
                </a>
                <a href="#">
                    <i class="fas fa-chalkboard-teacher">
                    </i>
                    Dosen
                </a>
                <a href="#">
                    <i class="fas fa-info-circle">
                    </i>
                    Informasi
                </a>
            </div>
        </div>
        <div class="content flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    Data Mahasiswa
                </h2>
                <div class="user-profile">
                    <img alt="User Profile" height="40"
                        src="https://storage.googleapis.com/a1aa/image/m4LgdkB4fbVzZaVBnQeMfpVRE6x8kFF8apWRpWxMMW4BwWwnA.jpg"
                        width="40" />
                </div>
            </div>
            <div class="filter-bar">
                <button class="btn">
                    <i class="fas fa-filter">
                    </i>
                    Filter
                </button>
                <select class="form-select">
                    <option>
                        Prodi
                    </option>
                </select>
                <select class="form-select">
                    <option>
                        Kelas
                    </option>
                </select>
                <button class="btn">
                    <i class="fas fa-redo">
                    </i>
                    Reset Filter
                </button>
                <input class="form-control" placeholder="Cari" type="text" />
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            NIM
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Jenis Kelamin
                        </th>
                        <th>
                            Kelas
                        </th>
                        <th>
                            Prodi
                        </th>
                        <th>
                            Alamat
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            2341720001
                        </td>
                        <td>
                            Dedi Gunawan Saputra
                        </td>
                        <td>
                            Laki-laki
                        </td>
                        <td>
                            2A
                        </td>
                        <td>
                            TI
                        </td>
                        <td>
                            Pasuruan
                        </td>
                        <td>
                            <button class="btn btn-info btn-sm">
                                <i class="fas fa-eye">
                                </i>
                            </button>
                            <button class="btn btn-warning btn-sm">
                                <i class="fas fa-edit">
                                </i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            2341720015
                        </td>
                        <td>
                            Yudi Setiawan
                        </td>
                        <td>
                            Laki-laki
                        </td>
                        <td>
                            2C
                        </td>
                        <td>
                            TI
                        </td>
                        <td>
                            Pasuruan
                        </td>
                        <td>
                            <button class="btn btn-info btn-sm">
                                <i class="fas fa-eye">
                                </i>
                            </button>
                            <button class="btn btn-warning btn-sm">
                                <i class="fas fa-edit">
                                </i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            1
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">
                            2
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            3
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            4
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>