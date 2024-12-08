<nav class="navbar navbar-expand-md navbar-light py-2 position-fixed">
    <div class="container-fluid">
        <div class="d-flex align-items-center w-100">
            <button class="btn px-0 py-0 open-btn">
                <i class="fas fa-stream me-2 d-md-none"></i>
            </button>
            <span class="fw-medium" style="font-size: 28px"><?=  $title; ?></span>
            <div class="d-flex ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/public/img/fotoagung-jpeg" alt="User Profile Picture" class="rounded-circle"
                            width="50" height="50" />
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