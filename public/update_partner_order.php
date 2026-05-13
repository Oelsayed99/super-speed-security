<?php
session_start();

// Ensure only admins can access this endpoint
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

// Get the raw POST data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['order']) && is_array($data['order'])) {
    $order = $data['order'];
    $orderFile = __DIR__ . '/assets/img/partners/order.json';
    
    // Validate that the array only contains strings (filenames)
    $cleanOrder = array_map(function($item) {
        return basename((string)$item); // Security: ensure it's just a filename
    }, $order);

    if (file_put_contents($orderFile, json_encode($cleanOrder))) {
        echo json_encode(['success' => true]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Failed to save order']);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid request data']);
}
