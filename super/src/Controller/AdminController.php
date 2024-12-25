<?php

namespace Tatib\Src\Controller;

use Stringable;
use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
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
        $result2 = $admin->getPegawaiByRole('super', null, $kategori, value: $value);
        if ($result2 != null || $result2 != false) {
            if (is_string($result) || $result == null || $result == false) {
                $result = $result2;
            } else {
                $result = array_merge($result, $result2);
            }
        }
        if ($result == null || $result == false) {
            echo json_encode([]);
            return;
        }


        foreach ($result as $row) {
            if (strtolower($row->role) == 'admin') {
                $row->action = '<button class="btn btn-warning btn-edit" data-nip="' . $row->nip . '">Edit</button> <button class="btn-delete btn btn-danger" onclick="deleteAdmin(\'' . $row->nip . '\')">Delete</button>';
            } else {
                $row->prodi = 'SUPER';
                $row->action = '<button class="btn btn-warning disabled">Edit</button> <button class="btn btn-danger" disabled>Delete</button>';
            }
        }

        echo json_encode($result);
    }

    public function getDetailAdmin()
    {
        $admin = new pegawai();
        $result = $admin->getPegawai($_POST['nip']);
        if ($result == null || $result == false || is_string($result)) {
            echo json_encode([]);
            return;
        }
        echo json_encode($result[0]);
    }

    public function doInsertAdmin()
    {
        $admin = new pegawai();

        $admin->nip = $_POST['nip'];
        $admin->nama_pegawai = $_POST['nama'];
        $admin->role = $_POST['role'];
        $admin->email = $_POST['email'];
        $admin->no_telp = $_POST['no_telp'];
        $admin->prodi = $_POST['prodi'];
        $admin->is_dpa = false;
        $admin->is_kps = false;

        $arrName = explode(' ', $_POST['nama']);
        $passwordRaw = $_POST['nip'] . end($arrName);
        $admin->password = Helper::encrypt($passwordRaw);

        $result = $admin->insertPegawai();
        if ($result == true) {
            echo 'success';
        } else {
            echo $result;
        }
    }

    public function doUpdateAdmin()
    {
        $admin = new pegawai();
        $admin->nama_pegawai = $_POST['nama'];
        $admin->role = $_POST['role'];
        $admin->email = $_POST['email'];
        $admin->no_telp = $_POST['no_telp'];
        $admin->prodi = $_POST['prodi'];
        $admin->is_dpa = false;
        $admin->is_kps = false;
        $result = $admin->updatePegawai($_POST['nip']);
        if ($result == true) {
            echo 'success';
        } else {
            echo $result;
        }
    }

    public function doDeleteAdmin()
    {
        $admin = new pegawai();
        Helper::dumpToLog(json_encode($_POST));
        $result = $admin->deletePegawai($_POST['nip']);
        if ($result != true) {
            session_start();
            $_SESSION['error'] = $result;
        }

        header("Location: /dataAdmin");
    }
}
