<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Model\pegawai;

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
}
