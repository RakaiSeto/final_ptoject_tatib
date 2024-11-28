<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Db;

class TestController extends Controller
{
    public function index() {
        $db = Db::getInstance();
    }
}