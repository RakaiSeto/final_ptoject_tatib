<?php
namespace Tatib\Src\Core;

use PDO;
use PDOException;

class Db
{
    private static $instance = null;

    function __construct()
    {
        $env = parse_ini_file(__DIR__ . '/../../.env');

        $host = $env['DB_HOST'];
        $port = $env['DB_PORT'];
        $user = $env['DB_USER'];
        $pass = $env['DB_PASS'];
        $db = $env['DB_NAME'];

        $dsn = 'sqlsrv:Server=' . $host . ',' . $port . ';Database=' . $db . ";Encrypt=yes;TrustServerCertificate=yes;";
        $username = $user;
        $password = $pass;


        try {
            $conn = new PDO($dsn, $username, $password);
            Helper::dumpToLog("Connected successfully");
            return $conn;
        } catch (PDOException $e) {
            Helper::dumpToLog("Failed to connect : " . $e->getMessage());
            return null;
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DB();
        }

        return self::$instance;
    }

}

