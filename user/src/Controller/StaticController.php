<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;

class StaticController extends Controller
{
    public function serveFile($file) {
        $lastHyphenPos = strrpos($file, '-');
        if ($lastHyphenPos !== false) {
            $file = substr_replace($file, '.', $lastHyphenPos, 1);
        }
        $filePath = __DIR__ . '/../public/' . $file;
        Helper::dumpToLog("serving file: $filePath");

        if (file_exists($filePath)) {
            header('Content-Type: ' . mime_content_type($filePath));
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
        } else {
            header('HTTP/1.1 404 Not Found');
        }
        exit;
    }
}