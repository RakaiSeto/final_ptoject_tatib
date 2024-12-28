<!-- <div class="sidebar" id="side_nav">
    <div class="header-box px-5 pt-3 pb-2 d-flex justify-content-between">
        <img alt="Logo E-Tatib" src="../img/logo.svg" />
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
            <i class="fas fa-stream"></i>
        </button>
    </div>
    <ul class="list-unstyled px-2 py-1">
        <li class="active">
            <a href="dashboard.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-home"></i>
                Dashboard</a>
        </li>
        <li>
            <a href="dataPelanggaran.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                    class="fas fa-book"></i> Data Pelanggaran</a>
        </li>
        <li>
            <a href="dataMahasiswa.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                    class="fas fa-book"></i> Data Mahasiswa</a>
        </li>
        <li>
            <a href="RiwayatPelaporan.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                    class="fas fa-info-circle"></i> Riwayat Pelaporan</a>
        </li>
        <li>
            <a href="cetakSurat.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-print"></i>
                Data Pelanggaran</a>
        </li>
        <li>
            <a href="informasi.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                    class="fas fa-info-circle"></i> Informasi</a>
        </li>
    </ul>
</div> -->

<div class="sidebar" id="side_nav">
    <div class="header-box px-5 pt-3 pb-2 d-flex justify-content-between">
        <img alt="Logo E-Tatib" src="/public/img/logo-svg" />
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
            <i class="fas fa-stream"></i>
        </button>
    </div>
    <ul class="list-unstyled px-2 py-1">
        <?php echo $_SERVER["REQUEST_URI"] == '/home' ? '<li class="active">' : '<li>' ?>
        <a href="/home" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/pelanggaranMahasiswa' ? '<li class="active">' : '<li>' ?>
        <a href="/pelanggaranMahasiswa" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-book"></i>
            Pelanggaran Mahasiswa</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/dataDosen' ? '<li class="active">' : '<li>' ?>
        <a href="/dataDosen" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-book"></i> Data
            Dosen</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/mahasiswa' ? '<li class="active">' : '<li>' ?>
        <a href="/mahasiswa" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-book"></i> Data
            Mahasiswa</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/dataKelas' ? '<li class="active">' : '<li>' ?>
        <a href="/dataKelas" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-book"></i> Data
            Kelas</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/informasi' ? '<li class="active">' : '<li>' ?>
        <a href="/informasi" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-info-circle"></i>
            Informasi</a>
        </li>
    </ul>
</div>