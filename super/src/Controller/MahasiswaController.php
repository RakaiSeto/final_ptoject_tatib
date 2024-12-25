<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Model\kelas;
use Tatib\Src\Model\mahasiswa;
use Tatib\Src\Model\data_pelanggaran;
use Tatib\Src\Core\Helper;

class MahasiswaController extends Controller
{
    public function mahasiswa()
    {
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $model = new kelas();
        $result = $model->getKelas();
        $this->render('/page/mahasiswa', ['title' => 'Mahasiswa', 'kelas' => $result]);
    }

    public function getDataMahasiswa()
    {
        $model = new mahasiswa();
        $kategori = $_POST['kategori'] ?? null;
        $value = $_POST['value'] ?? null;
        $kelas = $_POST['kelas'] ?? null;
        $result = $model->getMahasiswa(null, $kategori, $value, $kelas);

        if ($result == null || $result == []) {
            echo json_encode([]);
        } else {
            foreach ($result as $row) {
                $row->aksi = '<button class="btn btn-primary btn-detail me-1" onclick="getDetailMahasiswa(' . $row->nim . ')">Detail</button><button class="btn btn-warning btn-edit me-1" data-nim="' . $row->nim . '">Edit</button><button class="btn btn-danger btn-delete" onclick="deleteMahasiswa(' . $row->nim . ')">Delete</button>';
                $row->jenis_kelamin = $row->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';
            }

            echo json_encode($result);
        }
    }

    public function getDetailMahasiswa()
    {
        $result = [];
        $model = new mahasiswa();
        $modelPelanggaran = new data_pelanggaran();
        $mahasiswa = $model->getMahasiswa($_POST['nim']);
        $pelanggaran = $modelPelanggaran->getDataPelanggaran(null, 'nim_terlapor', $_POST['nim']);
        $result['mahasiswa'] = $mahasiswa[0];
        if (!Helper::checkFileExist($result['mahasiswa']->foto_mahasiswa)) {
            $result['mahasiswa']->foto_mahasiswa = "/public/img/default-pp.png";
        }
        $result['mahasiswa']->foto_mahasiswa = Helper::lastFullstopToHyphen($result['mahasiswa']->foto_mahasiswa);
        $result['pelanggaran'] = $pelanggaran;
        $result['mahasiswa']->jenis_kelamin = $result['mahasiswa']->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';
        if ($result['pelanggaran'] != null) {
            foreach ($result['pelanggaran'] as $row) {
                $row->datetime = date('d/m/Y', strtotime($row->datetime));
            }
        }  
        echo json_encode($result);
    }

    public function doInsertMahasiswa()
    {
        $model = new mahasiswa();
        $model->nim = $_POST['nim'];
        $model->nama_mahasiswa = strtoupper($_POST['nama']);
        $model->id_kelas = $_POST['kelas'];
        $model->id_prodi = $_POST['prodi'];
        $model->jenis_kelamin = $_POST['jenis_kelamin'] == '1' ? 1 : 0;
        $model->tanggal_lahir = $_POST['tanggal_lahir'];
        $model->email = $_POST['email'];
        $model->no_telp = $_POST['no_telp'];
        $model->foto_mahasiswa = 'public/img/' . $_POST['nim'] . '.jpg';
        $array_nama = explode(' ', $_POST['nama']);
        $model->password = Helper::encrypt($_POST['nim'] . end($array_nama));
        $model->is_active = 1;
        $model->secret = '';
        $result = $model->insertMahasiswa();
        if ($result != true) {
            echo $result;
        } else {
            echo 'success';
        }
    }

    public function doUpdateMahasiswa()
    {
        $model = new mahasiswa();
        $mahasiswa = $model->getMahasiswa($_POST['nim'])[0];
        $mahasiswa->nama_mahasiswa = $_POST['nama'];
        $mahasiswa->id_kelas = $_POST['kelas'];
        $mahasiswa->id_prodi = $_POST['prodi'];
        $mahasiswa->jenis_kelamin = $_POST['jenis_kelamin'] == '1' ? 1 : 0;
        $mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
        $mahasiswa->email = $_POST['email'];
        $mahasiswa->no_telp = $_POST['no_telp'];
        $result = $mahasiswa->updateMahasiswa($_POST['nim']);
        if ($result != true) {
            echo $result;
        } else {
            echo 'success';
        }
    }

    public function doDeleteMahasiswa()
    {
        $model = new mahasiswa();
        $result = $model->deleteMahasiswa($_POST['nim']);
        if ($result != true) {
            session_start();
            $_SESSION['error'] = $result;
        }

        header("Location: /dataMahasiswa");
    }
}
