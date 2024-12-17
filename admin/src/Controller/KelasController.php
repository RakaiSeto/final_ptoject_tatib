<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\kelas;
use Tatib\Src\Model\pegawai;


class KelasController extends Controller
{
    public function daftarKelas()
    {
        Helper::dumpToLog("serve kelas");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
    
        // Memanggil model kelas untuk mengambil data kelas
        $model = new kelas();
        $result = $model->getKelas(null);  // null berarti ambil semua kelas
    
        // Mendapatkan role pengguna dari cookie
        $role = json_decode($_COOKIE['user'], true)['role'];
    
        // Ambil data DPA untuk modal
        $dpaList = $model->getAllDpa();
    
        // Render halaman daftar kelas dengan modal
        $this->render($role . '/page/dataKelas', [
            'kelasList' => $result,
            'dpaList' => $dpaList,  // Pastikan data DPA dikirim ke halaman
            'title' => 'Data Kelas'
        ]);
    }
    
 
    public function tambahKelasModal() {
        $model = new kelas();
        $dpaList = $model->getAllDpa();  // Ambil daftar DPA
        
        // Debug untuk memastikan data DPA ada
        Helper::dumpToLog($dpaList);  // Atau gunakan var_dump($dpaList);
        
        // Render halaman modal tambah kelas dengan data DPA
        $this->render($role . '/page/tambahKelasModal', ['dpaList' => $dpaList, 'title' => 'Tambah Kelas']);
    }
    

    
    public function tambahKelas()
    {
        Helper::dumpToLog("serve tambah kelas");
    
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            exit;
        }
    
        // Ambil data dari form
        $id_kelas = $_POST['id_kelas'] ?? null;
        $nama_kelas = $_POST['nama_kelas'] ?? null;
        $nip_dpa = $_POST['nip_dpa'] ?? null;
    
        // Validasi data
        if ($id_kelas && $nama_kelas && $nip_dpa) {
            $model = new kelas();
            $model->id_kelas = $id_kelas;
            $model->nama_kelas = $nama_kelas;
            $model->nip_dpa = $nip_dpa;
    
            // Cek apakah kelas sudah ada
            $result = $model->insertKelas();
            if ($result === true) {
                Helper::dumpToLog("Kelas berhasil ditambahkan!");
                header("Location: /page/dataKelas"); 
                exit;
            } else {
                $error_message = "Gagal menambahkan kelas: $result";
                $this->render('page/dataKelas', [
                    'error_message' => $error_message,
                    'dpaList' => $model->getAllDpa(),
                    'title' => 'Data Kelas'
                ]);
            }
        } else {
            $error_message = "Parameter tidak lengkap!";
            $this->render('page/dataKelas', [
                'error_message' => $error_message,
                'dpaList' => (new kelas())->getAllDpa(),
                'title' => 'Data Kelas'
            ]);
        }
    }

    public function updateKelas()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_kelas = $_POST['id_kelas'] ?? null;
        $nama_kelas = $_POST['nama_kelas'] ?? null;
        $nip_dpa = $_POST['nip_dpa'] ?? null;

        // Validasi data
        if (!$id_kelas || !$nama_kelas || !$nip_dpa) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap!']);
            return;
        }

        $model = new kelas();
        $model->id_kelas = $id_kelas;
        $model->nama_kelas = $nama_kelas;
        $model->nip_dpa = $nip_dpa;

        $result = $model->updateKelas($id_kelas);
        if ($result === true) {
            echo json_encode(['status' => 'success', 'message' => 'Kelas berhasil diperbarui']);
        } else {
            echo json_encode(['status' => 'error', 'message' => "Gagal memperbarui kelas: $result"]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Metode tidak valid']);
    }
}

    public function deleteKelas() {
        // Debug parameter ID
        $id_kelas = $_GET['id'] ?? null;
        Helper::dumpToLog("Parameter ID yang diterima: " . $id_kelas);
    
        if ($id_kelas === null) {
            Helper::dumpToLog("ID kelas tidak valid!");
            $this->render('page/dataKelas', [
                'error_message' => 'ID kelas tidak valid!',
                'title' => 'Data Kelas'
            ]);
            return;
        }
    
        $model = new kelas();
        $result = $model->deleteKelas($id_kelas);
    
        if ($result === true) {
            $_SESSION['flash_message'] = 'Kelas berhasil dihapus!';
            header("Location: /dataKelas");
            exit;
        } else {
            Helper::dumpToLog("Gagal menghapus kelas: $result");
            $this->render('page/dataKelas', [
                'error_message' => "Gagal menghapus kelas: $result",
                'title' => 'Data Kelas'
            ]);
        }
    }
    
    
    
}