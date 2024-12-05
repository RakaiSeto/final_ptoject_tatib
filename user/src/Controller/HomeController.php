<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;

class HomeController extends Controller
{
    public function index()
    {
        Helper::dumpToLog("serve index");
        if (!isset($_COOKIE['username'])) {
            $this->render('mahasiswa/page/login');
        } else {
            header("Location: /home");
        }
    }

    public function home()
    {
        $this->render('mahasiswa/page/dashboard');
    }
}