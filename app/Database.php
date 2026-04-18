<?php
// app/Database.php

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        // Adaptive Routing: Checks if running inside Docker App container or Local Windows Host
        $isDocker = file_exists('/.dockerenv');
        $host = $isDocker ? 'mysql' : '127.0.0.1';
        $port = $isDocker ? 3306 : 3307;

        $db   = 'superspeed_cms';
        $user = 'root';
        $pass = 'root'; // From docker-compose
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
