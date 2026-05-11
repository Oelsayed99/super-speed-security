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
    $file = $_FILES['file'] ?? null;
    if (!$file) {
        throw new Exception("No file uploaded.");
    }

    $src = Storage::savePartner($file);
    echo json_encode(['success' => true, 'src' => $src]);

} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
