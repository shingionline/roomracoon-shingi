<?php

namespace Core;

use PDO;
use App\Config;
use PDOException;

/**
 * Base Model
 */

abstract class Model
{
    public static function getDB()
    {
        static $db = null;

        if ($db === null) {

            try {

                $db = new PDO('mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME.';charset=utf8', Config::DB_USER, Config::DB_PASSWORD);

                // Throw an Exception when an error occurs
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;
    }
}
