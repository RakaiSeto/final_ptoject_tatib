<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;
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
        $kelas = new kelas();
        $resultKelas = $kelas->getKelas();
        $this->render('/page/dosen', ['title' => 'Dosen', 'dosen' => $result, 'kelas' => $resultKelas]);
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

            $row->action = '<button class="btn-edit btn btn-warning" data-nip="' . $row->nip . '">Edit</button> <button class="btn-delete btn btn-danger" onclick="deleteDosen(' . $row->nip . ')">Delete</button>';
        }

        echo json_encode($result);
    }

    public function getDetailDosen()
    {
        $result = [];
        $model = new pegawai();
        $resultDosen = $model->getPegawaiByRole('dosen', $_POST['nip']);
        $kelas = new kelas();
        $resultKelas = $kelas->getKelasByDpa($resultDosen[0]->nip);
        if ($resultKelas == null) {
            $result['kelas'] = null;
        } else {
            $result['kelas'] = $resultKelas[0];
        }
        $result['pegawai'] = $resultDosen[0];
        echo json_encode($result);
    }

    public function getKelasTanpaDPA()
    {
        $kelasDPA = $_POST['exception'] ?? null;
        $result = [];
        $kelas = new kelas();
        $kelasResult = $kelas->getKelas();
        foreach ($kelasResult as $row) {
            if (($row->nip_dpa == null && $row->nip_dpa == '') || $row->id_kelas == $kelasDPA) {
                $result[] = $row;
            }
        }
        echo json_encode($result);
    }

    public function doInsertDosen()
    {
        $kelasPost = $_POST['dpa'];
        if ($kelasPost != 'false') {
            $kelas = new kelas();
            $kelas->nip_dpa = $_POST['nip'];
            $kelas->nama_kelas = $kelasPost;
            $kelas->updateKelas($kelasPost);
        }

        $model = new pegawai();
        $model->nip = $_POST['nip'];
        $model->nama_pegawai = $_POST['nama'];
        $model->role = $_POST['jabatan'];
        $model->email = $_POST['email'];
        $model->no_telp = $_POST['no_telp'];
        $model->prodi = $_POST['prodi'] == '' ? '' : $_POST['prodi'];
        $model->is_dpa = $kelasPost == 'false' ? 0 : 1;
        $model->is_kps = $_POST['jabatan'] == 'DOSEN' ? 0 : 1;

        $arrName = explode(' ', $_POST['nama']);
        $passwordRaw = $_POST['nip'] . end($arrName);
        $model->password = Helper::encrypt($passwordRaw);

        $result = $model->insertPegawai();
        if ($result == true) {
            echo 'success';
        } else {
            echo $result;
        }
    }

    public function doUpdateDosen()
    {
        $kelasPost = $_POST['dpa'];
        if ($kelasPost != 'false') {
            $kelas = new kelas();
            $kelas->nip_dpa = $_POST['nip'];
            $kelas->nama_kelas = $kelasPost;
            $kelas->updateKelas($kelasPost);
        }

        $model = new pegawai();
        $model->nama_pegawai = $_POST['nama'];
        $model->role = 'dosen';
        $model->email = $_POST['email'];
        $model->no_telp = $_POST['no_telp'];
        $model->prodi = $_POST['prodi'] == '' ? '' : $_POST['prodi'];
        $model->is_dpa = $kelasPost == 'false' ? 0 : 1;
        $model->is_kps = $_POST['jabatan'] == 'DOSEN' ? 0 : 1;
        $result = $model->updatePegawai($_POST['nip']);
        if ($result == true) {
            echo 'success';
        } else {
            echo $result;
        }
    }

    public function doDeleteDosen()
    {
        $model = new pegawai();

        $db = Db::getInstance();
        $query = $db->prepare("UPDATE kelas SET nip_dpa = NULL WHERE nip_dpa = ?");
        $result = $query->execute([$_POST['nip']]);
        if ($result == false) {
            session_start();
            $_SESSION['error'] = "Gagal menghapus data dpa";
        }

        $result = $model->deletePegawai($_POST['nip']);
        if ($result != true) {
            session_start();
            $_SESSION['error'] = $result;
        }


        header("Location: /dataDosen");
    }
}
