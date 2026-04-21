<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

require_once __DIR__ . '/../app/Storage.php';

use App\Storage;
use Exception;

header('Content-Type: application/json');

try {
    $msgid = $_POST['msgid'] ?? null;
    $lang = $_POST['lang'] ?? 'en';
    $content = $_POST['content'] ?? null;

    if (!$msgid || $content === null) {
        throw new Exception("Missing parameters.");
    }

    $success = Storage::updateText($msgid, $lang, $content);

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        throw new Exception("Database update failed.");
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
