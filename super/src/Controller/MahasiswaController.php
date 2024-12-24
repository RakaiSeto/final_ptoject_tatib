<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Model\kelas;
use Tatib\Src\Model\mahasiswa;

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
                $row->aksi = '<button class="btn btn-primary btn-detail" data-nim="' . $row->nim . '">Detail</button>';
                $row->jenis_kelamin = $row->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';
            }

            echo json_encode($result);
        }
    }
}
