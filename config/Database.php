<?php

namespace Config;

use PDO;
use PDOException;

class Database {
    private static ?PDO $instance = null;

    private const HOST = 'localhost';
    private const DBNAME = 'car_service_db';
    private const USER = 'root';
    private const PASS = '';

    private function __construct() {
        // Private constructor to prevent direct instantiation
    }

    private function __clone() {
        // Private clone method to prevent cloning
    }

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DBNAME . ';charset=utf8mb4';

            try {
            self::$instance = new PDO($dsn, self::USER, self::PASS);
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}