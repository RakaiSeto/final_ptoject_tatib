<nav class="navbar navbar-expand-md navbar-light py-2 position-fixed">
    <div class="container-fluid">
        <div class="d-flex align-items-center w-100">
            <button class="btn px-0 py-0 open-btn">
                <i class="fas fa-stream me-2 d-md-none"></i>
            </button>
            <span class="fw-medium" style="font-size: 28px"><?php echo $title; ?></span>
            <div class="d-flex ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="ms-2"><?php echo json_decode($_COOKIE['user'])->nama_pegawai; ?></span> <!-- Nama Pegawai -->
                        <span class="ms-2 me-2 text-muted">/ <?php echo \Tatib\Src\Core\Helper::getRole(); ?></span> <!-- Role Pengguna -->

                        <img src="<?php echo \Tatib\Src\Core\Helper::getProfilePicture(); ?>" alt="User Profile Picture"
                            class="rounded-circle" width="50" height="50" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="/gantiPassword">Ganti Password</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>