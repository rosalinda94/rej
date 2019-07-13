<?php

// Singleton

class DB extends PDO
{
    public static $HOST = '127.0.0.1';

    public static $DBNAME = null;

    public static $USER = null;

    public static $PASS = null;

    private static $instance;

    private function __construct() {}

    public static function getInstance()
    {
        if (!self::$instance) {
            try {
                self::$instance = new parent(
                    'mysql:host='. self::$HOST .';dbname='. self::$DBNAME,
                    self::$USER,
                    self::$PASS
                );
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        return self::$instance;
    }
}

DB::$HOST = 'localhost';
DB::$DBNAME = 'movies_db';
DB::$USER = 'root';
DB::$PASS = '';

$pdo = DB::getInstance();

var_dump($pdo);
