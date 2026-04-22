<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

require_once __DIR__ . '/../app/Storage.php';
use App\Storage;

header('Content-Type: application/json');

try {
    // Get payload
    $data = json_decode(file_get_contents('php://input'), true);
    $filename = $data['filename'] ?? null;

    if (!$filename) {
        throw new Exception("Missing filename.");
    }

    $success = Storage::deletePartner($filename);
    
    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        throw new Exception("File not found or already deleted.");
    }

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
