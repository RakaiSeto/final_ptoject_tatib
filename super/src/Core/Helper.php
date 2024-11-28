<?php

namespace Tatib\Src\Core;

class Helper
{
    public static function dumpToLog($data)
    {
        $log_file_path = __DIR__ . '/../../log/log.txt';
        $fh = fopen($log_file_path, 'a'); // 'a' for append to the file

        fwrite($fh, $data);
        fclose($fh);
    }
}
