<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Model\mahasiswa;

class MahasiswaController extends Controller
{
    public function mahasiswa()
    {
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $model = new mahasiswa();
        $result = $model->getMahasiswa();
        $this->render('/page/mahasiswa', ['title' => 'Mahasiswa', 'mahasiswa' => $result]);
    }
}
