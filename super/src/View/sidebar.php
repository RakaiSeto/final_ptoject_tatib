<div class="sidebar" id="side_nav">
    <div class="header-box px-5 pt-3 pb-2 d-flex justify-content-between">
        <img alt="Logo E-Tatib" src="/public/img/logo-svg" />
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
        <i class="fas fa-stream"></i>
        </button>
    </div>
    <ul class="list-unstyled px-2 py-1">
        <?php echo $_SERVER["REQUEST_URI"] == 'dashboard.php' ? '<li class="active">' : '<li>' ?>
            <a href="dashboard.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-home"></i> Dashboard</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == 'dosen.php' ? '<li class="active">' : '<li>' ?>
            <a href="dosen.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-book"></i> Kelola Dosen</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == 'mahasiswa.php' ? '<li class="active">' : '<li>' ?>
            <a href="mahasiswa.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-book"></i> Kelola Mahasiswa</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == 'admin.php' ? '<li class="active">' : '<li>' ?>
            <a href="admin.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-book"></i> Kelola Admin</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == 'dataPelanggaran.php' ? '<li class="active">' : '<li>' ?>
            <a href="dataPelanggaran.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-user-shield"></i> Data Pelanggaran</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == 'informasi.php' ? '<li class="active">' : '<li>' ?>
            <a href="informasi.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-info-circle"></i> Informasi</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == 'logAktivitas.php' ? '<li class="active">' : '<li>' ?>
            <a href="logAktivitas.php" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-history"></i> Log Aktivitas</a>
        </li>
    </ul>
</div>