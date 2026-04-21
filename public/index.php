<?php
/**
 * CMS Main Entry Point
 * -------------------
 * This file handles routing and dynamic content injection.
 */

// Initialize session and config
session_start();
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Translation.php';
require_once __DIR__ . '/../app/Storage.php';
require_once __DIR__ . '/../app/helpers.php'; // Include the wrapper helpers

use App\Translation;

// Configuration
$lang = $_GET['lang'] ?? 'en';
$page = $_GET['page'] ?? 'home';
$isAdmin = isset($_GET['admin']) && $_GET['admin'] == '1';

// Validate allowed pages
$allowed_pages = ['home', 'services', 'about', 'clients', 'contact'];
if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// Ensure language session consistency if needed
$_SESSION['lang'] = $lang;

// Load Layout
require_once __DIR__ . '/includes/header.php';

// Load Page Content
$page_file = __DIR__ . "/pages/{$page}.php";
if (file_exists($page_file)) {
    include $page_file;
} else {
    echo "<section class='py-24 text-center'><h1 class='text-4xl font-bold'>Page Not Found</h1></section>";
}

// Load Footer
require_once __DIR__ . '/includes/footer.php';
