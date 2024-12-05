<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;

class HomeController extends Controller
{
    public function index()
    {
        Helper::dumpToLog("serve index");
        if (isset($_COOKIE['username'])) {
            header("Location: /home");
            return;
        }
        $this->render('mahasiswa/page/login');
    }

    public function home()
    {
        Helper::dumpToLog("serve home");
//        if (!isset($_COOKIE['username'])) {
//            header("Location: /");
//            return;
//        }
        $this->render('mahasiswa/page/dashboard');
    }
}