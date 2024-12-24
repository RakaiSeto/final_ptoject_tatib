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
                $row->aksi = '<button class="btn btn-primary btn-detail" onclick="getDetailMahasiswa(' . $row->nim . ')">Detail</button>';
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
}
