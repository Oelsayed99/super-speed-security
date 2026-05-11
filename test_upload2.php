<?php
$_FILES['file'] = [
    'name' => 'test.png',
    'type' => 'image/png',
    'tmp_name' => __DIR__ . '/public/assets/img/logo.png',
    'error' => 0,
    'size' => 100
];
$_POST['media_id'] = 'about-hero-img';
$_POST['type'] = 'image';
session_start();
$_SESSION['admin_logged_in'] = true;

ob_start();
require 'public/update_media.php';
$output = ob_get_clean();
echo "OUTPUT WAS:\n" . $output;
