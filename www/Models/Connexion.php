<?php

namespace App\Models;

use PDO;
use PDOException;

class Connexion
{
    protected const DBHOST = "localhost";
    protected const DBUSER = "root";
    protected const DBPASS = "";
    protected const DBNAME = "db_cpu";
    private static  $connexion = null;


    private function __construct()
    {
    }

    public static function getInstance(): PDO
    {
        $dsn = "mysql:host=" . self::DBHOST . ";dbname=" . self::DBNAME . ";charset=UTF8";
        if (is_null(self::$connexion)) {

            try {
                self::$connexion = new PDO(
                    $dsn,
                    self::DBUSER,
                    self::DBPASS,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                    ]
                );
            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
            }

        }
        return self::$connexion;
    }
}
