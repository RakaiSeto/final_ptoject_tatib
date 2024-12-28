<!-- Sidebar -->
<div class="sidebar" id="side_nav" style="z-index: 1000;">
    <div class="header-box px-5 pt-3 pb-2 d-flex justify-content-between">
        <img alt="Logo E-Tatib" src="/public/img/logo-svg" />
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark">
            <i class="fas fa-stream"></i>
        </button>
    </div>
    <ul class="list-unstyled px-2 py-1">
        <?php echo $_SERVER["REQUEST_URI"] == '/home' ? '<li class="active">' : '<li>' ?>
        <a href="/home" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-home"></i>
            Dashboard</a>
        </li>
        <?= $_SERVER["REQUEST_URI"] == '/laporkan' ? '<li class="active">' : '<li>' ?>
        <a href="/laporkan" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-book"></i>
            Laporkan</a>
        </li>
        <?= $_SERVER["REQUEST_URI"] == '/riwayatPelaporan' ? '<li class="active">' : '<li>' ?>
        <a href="/riwayatPelaporan" class="text-decoration-none px-3 py-3 d-block fw-bold"><i
                class="fas fa-info-circle"></i> Riwayat Pelaporan</a>
        </li>
        <?php if (json_decode($_COOKIE['user'], true)['is_dpa'] == true || json_decode($_COOKIE['user'], true)['is_kps'] == true || strtolower(json_decode($_COOKIE['user'], true)['role']) == 'admin') { ?>
        <?= $_SERVER["REQUEST_URI"] == '/dataPelanggaran' ? '<li class="active">' : '<li>' ?>
        <a href="/dataPelanggaran" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-print"></i>
            Data Pelanggaran</a>
        </li>
        <?php } ?>
        <?= $_SERVER["REQUEST_URI"] == '/informasi' ? '<li class="active">' : '<li>' ?>
        <a href="/informasi" class="text-decoration-none px-3 py-3 d-block fw-bold"><i class="fas fa-info-circle"></i>
            Informasi</a>
        </li>
    </ul>
</div>