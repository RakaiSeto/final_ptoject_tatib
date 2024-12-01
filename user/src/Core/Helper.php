<?php

namespace Tatib\Src\Core;

class Helper
{
    public static function dumpToLog($data)
    {
        $log_file_path = __DIR__ . '/../../log/log.txt';
        $fh = fopen($log_file_path, 'a'); // 'a' for append to the file
        fwrite($fh, '[' . date('Y-m-d H:i:s') . '] ');
        fwrite($fh, $data);
        fwrite($fh, "\n");
        fclose($fh);
    }

    public static function randomAlphaNum($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
