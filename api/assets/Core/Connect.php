<?php

namespace Src\Core;

use PDO;
use PDOException;

class Connect
{

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];  

    private static $instance;

    public static function getInstace(): PDO {
        if (empty($instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=". CONF_DB_HOSTNAME . ";dbname=" . CONF_DB_DBNAME,
                    CONF_DB_USERNAME,
                    CONF_DB_PASSWORD,
                    self::OPTIONS
                );
            } catch (PDOException $e) {
                echo $e;
            }
        }

        return self::$instance;
    }

    function __construct()
    {
    }

    function __clone()
    {
    }
}