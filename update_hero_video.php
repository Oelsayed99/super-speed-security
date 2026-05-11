<?php
require_once __DIR__ . '/app/Database.php';

try {
    $pdo = App\Database::getInstance()->getConnection();
    $stmt = $pdo->prepare("UPDATE media SET src = ? WHERE media_id = ?");
    $stmt->execute(['/storage/uploads/videos/Security_Operation_Cinematic_Video.mp4', 'hero-video']);
    echo "Successfully updated hero video.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
