<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\pegawai;

class DosenController extends Controller
{
    public function dataDosen()
{
    Helper::dumpToLog("serve dosen");

    // Cek apakah cookie 'user' ada
    if (!isset($_COOKIE['user'])) {
        header("Location: /");
        return;
    }

    // Mengambil data pengguna dari cookie
    $user = json_decode($_COOKIE['user'], true);
    $role = $user['role'] ?? null;

    // Memanggil model pegawai untuk mengambil data dosen
    $model = new pegawai();
    $result = $model->getPegawai(null);  // null berarti ambil semua pegawai

    // Render halaman data dosen berdasarkan role pengguna
    $this->render($role . '/page/dataDosen', [
        'dosenList' => $result, 
        'title' => 'Data Dosen'
    ]);
}


    public function tambahDosen()
    {
        Helper::dumpToLog("serve tambah dosen");

        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            exit;
        }

        // Ambil data dari form
        $nip = $_POST['nip'] ?? null;
        $nama_pegawai = $_POST['nama_pegawai'] ?? null;
        $role = $_POST['role'] ?? null;
        $email = $_POST['email'] ?? null;
        $no_telp = $_POST['no_telp'] ?? null;
        $prodi = $_POST['prodi'] ?? null;
        $password = $_POST['password'] ?? null;
        $is_dpa = isset($_POST['dpa']) ? 1 : 0;
        $is_kps = isset($_POST['kps']) ? 1 : 0;

        // Validasi data
        if ($nip && $nama_pegawai && $role && $email && $no_telp && $prodi && $password) {
            $model = new pegawai();
            $model->nip = $nip;
            $model->nama_pegawai = $nama_pegawai;
            $model->role = $role;
            $model->email = $email;
            $model->no_telp = $no_telp;
            $model->prodi = $prodi;
            $model->password = $password;
            $model->is_dpa = $is_dpa;
            $model->is_kps = $is_kps;

            // Cek apakah dosen sudah ada
            $result = $model->insertPegawai();
            if ($result === true) {
                Helper::dumpToLog("Dosen berhasil ditambahkan!");
                header("Location: /admin/page/dataDosen"); 
                exit;
            } else {
                $error_message = "Gagal menambahkan dosen: $result";
                $this->render('admin/page/dataDosen', [
                    'error_message' => $error_message,
                    'title' => 'Data Dosen'
                ]);
            }
        } else {
            $error_message = "Parameter tidak lengkap!";
            $this->render('admin/page/dataDosen', [
                'error_message' => $error_message,
                'title' => 'Data Dosen'
            ]);
        }
    }
}

?>