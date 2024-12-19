<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;

class StaticController extends Controller
{
    public function serveFile($file) {
        $filePath = __DIR__ . '/../../../public/' . $file;
        Helper::dumpToLog("serving file: $filePath");

        if (file_exists($filePath)) {
            $mime = mime_content_type($filePath);
            if (pathinfo($filePath, PATHINFO_EXTENSION) == 'css') {
                $mime = 'text/css';
            }
            header('Content-Type: ' . $mime);
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
        } else {
            header('HTTP/1.1 404 Not Found');
        }
        exit;
    }
}