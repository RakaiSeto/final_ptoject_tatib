<div class="sidebar" id="side_nav">
    <div class="header-box px-5 pt-3 pb-2 d-flex justify-content-between">
        <img alt="Logo E-Tatib" src="/public/img/logo-svg" />
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
        <i class="fas fa-stream"></i>
        </button>
    </div>
    <ul class="list-unstyled px-2 py-1">
        <?php echo $_SERVER["REQUEST_URI"] == '/home' ? '<li class="active">' : '<li>' ?>
            <a href="/home" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-home"></i> Dashboard</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/dataDosen' ? '<li class="active">' : '<li>' ?>
            <a href="/dataDosen" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-book"></i> Kelola Dosen</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/dataMahasiswa' ? '<li class="active">' : '<li>' ?>
            <a href="/dataMahasiswa" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-book"></i> Kelola Mahasiswa</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/dataAdmin' ? '<li class="active">' : '<li>' ?>
            <a href="/dataAdmin" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-book"></i> Kelola Admin</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/dataPelanggaran' ? '<li class="active">' : '<li>' ?>
            <a href="/dataPelanggaran" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-user-shield"></i> Data Pelanggaran</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/informasi' ? '<li class="active">' : '<li>' ?>
            <a href="/informasi" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-info-circle"></i> Informasi</a>
        </li>
        <?php echo $_SERVER["REQUEST_URI"] == '/logAktivitas' ? '<li class="active">' : '<li>' ?>
                <a href="/logAktivitas" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-history"></i> Log Aktivitas</a>
        </li>
    </ul>
</div>