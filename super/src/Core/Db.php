<?php
namespace Tatib\Src\Core;

use PDO;
use PDOException;

class Db
{
    private static $instance = null;

    private function __construct() {
        // Prevent direct instantiation
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            $env = parse_ini_file(__DIR__ . '/../../.env');

            $host = $env['DB_HOST'];
            $port = $env['DB_PORT'];
            $user = $env['DB_USER'];
            $pass = $env['DB_PASS'];
            $db = $env['DB_NAME'];

            $dsn = "sqlsrv:Server=$host,$port;Database=$db;Encrypt=yes;TrustServerCertificate=yes;";

            try {
                self::$instance = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
                Helper::dumpToLog("Connected successfully");
            } catch (PDOException $e) {
                Helper::dumpToLog("Failed to connect: " . $e->getMessage());
                throw $e; // Optional: Stop execution if the connection fails
            }
        }

        return self::$instance;
    }
}
