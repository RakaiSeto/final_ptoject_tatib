<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Model\pegawai;

class AdminController extends Controller
{
    public function admin()
    {
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $admin = new pegawai();
        $result = $admin->getPegawaiByRole('admin');
        $this->render('/page/admin', ['title' => 'Admin', 'admin' => $result]);
    }
}
