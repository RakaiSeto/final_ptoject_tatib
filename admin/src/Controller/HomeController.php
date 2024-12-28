<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\kelas;
use Tatib\Src\Model\mahasiswa;
use Tatib\Src\Model\daftar_pelanggaran;
use Tatib\Src\Model\data_pelanggaran;

class HomeController extends Controller
{
    public function index()
    {
        Helper::dumpToLog("serve index");
        if (isset($_COOKIE['user'])) {
            header("Location: /home");
            return;
        }
        $this->render('dosen/page/login');
    }

    public function home()
    {
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        $user = json_decode($_COOKIE['user'], true);
        $nip = $user['nip']; // Ambil NIP dari cookie
        $namaPegawai = \Tatib\Src\Model\pegawai::getNamaPegawaiByNIP($nip); // Ambil nama pegawai berdasarkan NIP

        $role = $user['role'];
        $this->render($role . '/page/dashboard', [
            'title' => 'Dashboard',
            'namaPegawai' => $namaPegawai, // Kirim nama pegawai ke view
            'role' => $role // Kirim role ke view
        ]);
    }

    // public function home()
    // {
    //     Helper::dumpToLog("serve home");
    //     if (!isset($_COOKIE['user'])) {
    //         header("Location: /");
    //         return;
    //     }
    //     $role = json_decode($_COOKIE['user'], true)['role'];
    //     $this->render($role . '/page/dashboard', [
    //         'title' => 'Dashboard'
    //     ]);
    // }

    // public function informasi(){
    //     Helper::dumpToLog("serve informasi");
    //     if (!isset($_COOKIE['user'])) {
    //         header("Location: /");
    //         return;
    //     }
    //     $this->render('dosen/page/informasi', [
    //         'title' => 'Informasi Tata Tertib'
    //     ]);
    // }

    public function riwayatPelaporan()
    {
        Helper::dumpToLog("serve riwayat pelaporan");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $user = json_decode($_COOKIE['user'], true);
        $nip = $user['nip']; // Ambil NIP dari cookie
        $namaPegawai = \Tatib\Src\Model\pegawai::getNamaPegawaiByNIP($nip); // Ambil nama pegawai berdasarkan NIP
        $role = $user['role'];

        $this->render('dosen/page/riwayatPelaporan', [
            'title' => 'Riwayat Pelaporan',
            'namaPegawai' => $namaPegawai, // Kirim nama pegawai ke view
            'role' => $role // Kirim role ke view
        ]);
    }

    public function dataPelanggaran()
    {
        Helper::dumpToLog("serve data pelanggaran");
        if (
            !isset($_COOKIE['user']) ||
            (
                json_decode($_COOKIE['user'])->is_dpa == 'false' &&
                json_decode($_COOKIE['user'])->is_kps == 'false'
            )
        ) {
            header("Location: /");
            return;
        }

        $role = '';
        if (json_decode($_COOKIE['user'])->is_dpa == 'true') {
            $role = 'dpa';
        } else if (json_decode($_COOKIE['user'])->is_kps == 'true') {
            $role = 'kps';
        } else if (json_decode($_COOKIE['user'])->is_admin == 'true') {
            $role = 'admin';
        }
        $keyword = '';
        if (json_decode($_COOKIE['user'])->is_dpa == 'true') {
            $kelas = new kelas();
            $result = $kelas->getKelasByDpa(json_decode($_COOKIE['user'])->nip);
            $keyword = $result[0]->id_kelas;
        } else if (json_decode($_COOKIE['user'])->is_kps == 'true' || json_decode($_COOKIE['user'])->is_admin == 'true') {
            $keyword = json_decode($_COOKIE['user'])->prodi;
        }

        $model = new data_pelanggaran();
        $result = $model->getDataPelanggaranByRole(
            $role,
            $keyword,
            $_POST['verify'] == 'false'
        );

        $this->render('dosen/page/dataPelanggaran', [
            'title' => 'Data Pelanggaran',
            'data' => $result,
            'role' => $role
        ]);
    }

    public function gantiPassword()
    {
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        $user = json_decode($_COOKIE['user'], true);
        $nip = $user['nip']; // Ambil NIP dari cookie
        $namaPegawai = \Tatib\Src\Model\pegawai::getNamaPegawaiByNIP($nip); // Ambil nama pegawai berdasarkan NIP
        $role = $user['role'];

        $this->render('dosen/page/gantiPassword', [
            'title' => 'Ganti Password',
            'namaPegawai' => $namaPegawai, // Kirim nama pegawai ke view
            'role' => $role // Kirim role ke view  
        ]);
    }

    public function pelanggaranMahasiswa()
    {
        Helper::dumpToLog("serve data pelanggaran");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $user = json_decode($_COOKIE['user'], true);
        $nip = $user['nip']; // Ambil NIP dari cookie
        $namaPegawai = \Tatib\Src\Model\pegawai::getNamaPegawaiByNIP($nip); // Ambil nama pegawai berdasarkan NIP
        $role = $user['role'];

        $this->render('admin/page/pelanggaranMahasiswa', [
            'title' => 'Data Pelanggaran',
            'namaPegawai' => $namaPegawai, // Kirim nama pegawai ke view
            'role' => $role // Kirim role ke view 
        ]);
    }

    public function dataMahasiswa()
    {
        Helper::dumpToLog("serve data pelanggaran");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $user = json_decode($_COOKIE['user'], true);
        $nip = $user['nip']; // Ambil NIP dari cookie
        $namaPegawai = \Tatib\Src\Model\pegawai::getNamaPegawaiByNIP($nip); // Ambil nama pegawai berdasarkan NIP
        $role = $user['role'];

        $this->render('admin/page/dataMahasiswa', [
            'title' => 'Data Mahasiswa',
            'namaPegawai' => $namaPegawai, // Kirim nama pegawai ke view
            'role' => $role // Kirim role ke view  
        ]);
    }

    public function dataDosen()
    {
        Helper::dumpToLog("serve data pelanggaran");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $user = json_decode($_COOKIE['user'], true);
        $nip = $user['nip']; // Ambil NIP dari cookie
        $namaPegawai = \Tatib\Src\Model\pegawai::getNamaPegawaiByNIP($nip); // Ambil nama pegawai berdasarkan NIP
        $role = $user['role'];

        $this->render('admin/page/dataDosen', [
            'title' => 'Data Dosen'
            'title' => 'Data Dosen' ,
            'namaPegawai' => $namaPegawai, // Kirim nama pegawai ke view
        'role' => $role // Kirim role ke view 
        ]);
    }

    public function dataKelas()
    {
        Helper::dumpToLog("serve data pelanggaran");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $user = json_decode($_COOKIE['user'], true);
        $nip = $user['nip']; // Ambil NIP dari cookie
        $namaPegawai = \Tatib\Src\Model\pegawai::getNamaPegawaiByNIP($nip); // Ambil nama pegawai berdasarkan NIP
        $role = $user['role'];

        $this->render('admin/page/dataKelas', [
            'title' => 'Data Kelas'
        ]);
    }
}
