<?php

namespace Tatib\Src\Core;

use Tatib\Src\Model\mahasiswa;
use Tatib\Src\Model\pegawai;

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

    public static function encrypt($string) {
        $env = parse_ini_file(__DIR__ . '/../../.env');

        $encrypt_method = "AES-256-CBC";
        $secret_key = $env['SECRET_KEY'];
        $secret_iv = $env['SECRET_IV'];
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);

        return $output;
    }

    public static function decrypt($string) {
        $env = parse_ini_file(__DIR__ . '/../../.env');

        $encrypt_method = "AES-256-CBC";
        $secret_key = $env['SECRET_KEY'];
        $secret_iv = $env['SECRET_IV'];
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }

    public static function getProfilePicture() {
        return Helper::lastFullstopToHyphen('/public/img/default-pp.png');
    }

    public static function checkFileExist($path) {
        return file_exists(__DIR__ . '/../../../' . $path);
    } // check file exist

    public static function lastFullstopToHyphen($string) {
        return preg_replace('/.([^.]+)$/', '-$1', $string); // outputs "logo-svg"
    }

    public static function lastHyphenToFullstop($string) {
        return preg_replace('/-([^-]+)$/', '.-$1', $string); // outputs "logo.svg"
    }
}