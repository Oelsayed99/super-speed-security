<?php
ini_set('display_errors', '0');
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Storage.php';

use App\Storage;

header('Content-Type: application/json');

try {
    $mediaId = $_POST['media_id'] ?? null;
    $type = $_POST['type'] ?? 'image';
    $file = $_FILES['file'] ?? null;

    if (!$mediaId || !$file) {
        throw new Exception("Missing parameters.");
    }

    // 1. Handle file upload and physical storage
    $src = Storage::handleUpload($file, $type);
    
    // 2. Update database and cleanup old file
    $success = Storage::updateMedia($mediaId, $src);

    if ($success) {
        echo json_encode(['success' => true, 'src' => $src]);
    } else {
        throw new Exception("Database update failed.");
    }
} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
