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
        $this->render('/page/admin', ['title' => 'Admin']);
    }

    public function getDataAdmin()
    {
        $admin = new pegawai();
        $kategori = $_POST['kategori'] ?? null;
        $value = $_POST['value'] ?? null;
 
        $result = $admin->getPegawaiByRole('admin', null, $kategori, $value);
        if ($result == null) {
            echo json_encode([]);
            return;
        }
        if ($result == null || $result == false) {
            echo json_encode([]);
            return;
        }

        foreach ($result as $row) {
            $row->action = '<button class="btn-detail btn btn-warning" data-nip="' . $row->nip . '">Edit</button> <button class="btn-delete btn btn-danger" data-nip="' . $row->nip . '">Delete</button>';
        }

        echo json_encode($result);
    }
}
