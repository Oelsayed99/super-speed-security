<?php
namespace App;

use PDO;
use Exception;

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        // --- Environment Detection ---
        $isDocker = file_exists('/.dockerenv');
        $isProduction = ($_SERVER['HTTP_HOST'] !== 'localhost' && $_SERVER['HTTP_HOST'] !== '127.0.0.1' && !str_contains($_SERVER['HTTP_HOST'], '.test'));

        // Default settings (Development/Local)
        $host = $isDocker ? 'mysql' : '127.0.0.1';
        $port = $isDocker ? 3306 : 3307;
        $db   = 'superspeed_cms';
        $user = 'root';
        $pass = 'root'; // From docker-compose
        $charset = 'utf8mb4';

        // --- Production Overrides (Plesk/CPanel) ---
        // You can also use environment variables if your hosting supports them
        if ($isProduction) {
            $host = 'localhost'; // Usually localhost on Plesk
            $port = 3306;
            $db   = 'superspeed_cms'; // Update this after creating DB in Plesk
            $user = 'root';           // Update this after creating User in Plesk
            $pass = '';               // Update this after creating User in Plesk
        }

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
            // In production, we don't want to leak credentials in the error message
            $msg = $isProduction ? "Database connection failed." : "Database connection failed: " . $e->getMessage();
            throw new Exception($msg);
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
