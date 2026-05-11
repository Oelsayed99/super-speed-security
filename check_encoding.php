<?php
require_once __DIR__ . '/app/Database.php';

use App\Database;

try {
    $pdo = Database::getInstance()->getConnection();
    
    $stmt = $pdo->query("SELECT msgid, value_ar FROM translations WHERE msgid = 'svc-4-desc'");
    $row = $stmt->fetch();
    echo "DB Value: " . $row['value_ar'] . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
