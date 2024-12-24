<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Model\pegawai;
use Tatib\Src\Model\kelas;

class DosenController extends Controller
{
    public function dosen()
    {
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $model = new pegawai();
        $result = $model->getPegawaiByRole('dosen');
        $this->render('/page/dosen', ['title' => 'Dosen', 'dosen' => $result]);
    }

    public function getDataDosen()
    {
        $model = new pegawai();
        $kategori = $_POST['kategori'] ?? null;
        $value = $_POST['value'] ?? null;
        $switchrole = $_POST['role'] ?? null;
        $result = $model->getPegawaiByRole('dosen', null, $kategori, $value, $switchrole);
    
        if ($result == null) {
            echo json_encode([]);
            return;
        }
        if ($result == null || $result == false) {
            echo json_encode([]);
            return;
        }

        foreach ($result as $row) {
            if ($row->is_dpa == 1) {
                $kelas = new kelas();
                $resultKelas = $kelas->getKelasByDpa($row->nip);
                if ($resultKelas == null) {
                    $row->is_dpa = 'DPA -';
                } else {
                    $row->is_dpa = 'DPA ' . $resultKelas[0]->nama_kelas;
                }
            } else {
                $row->is_dpa = '-';
            }

            if ($row->is_kps == 1) {
                $row->role = 'KPS ' . $row->prodi;
            } else {
                $row->role = 'Dosen Pengajar';
            }

            $row->action = '<button class="btn-detail btn btn-warning" data-nip="' . $row->nip . '">Edit</button> <button class="btn-delete btn btn-danger" data-nip="' . $row->nip . '">Delete</button>';
        }

        echo json_encode($result);
    }
}
