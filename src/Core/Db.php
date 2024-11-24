<?php
namespace Tatib\Src\Core;

use PDO;
use PDOException;

class Db
{
    function getDB()
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
            echo "Connected successfully";
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

}

