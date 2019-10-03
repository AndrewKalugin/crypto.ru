<?php

namespace Core;

use App\DbConfig;
use \PDO;

abstract class Model
{
    public static function getConnection()
    {
        $sql_db = 'mysql:host=' . DbConfig::DB_HOST . ';dbname=' . DbConfig::DB_NAME;
        $db = new PDO ($sql_db, DbConfig::DB_USER, DbConfig::DB_PASSWORD);
        return $db;
    }
}

?>