<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inline Live Editor</title>
    <link rel="stylesheet" href="/assets/css/style.css?v=1.5">
</head>
<body class="admin-body">

    <div class="admin-navbar">
        <h1>CMS Live Editor</h1>
        <div class="admin-nav-actions">
            <div class="lang-switcher">
                <select id="lang-select">
                    <option value="en" selected>English</option>
                    <option value="ar">Arabic</option>
                </select>
            </div>
            <a href="admin_users.php" class="btn-view" style="border-color: #EE2323; color: #EE2323;">Manage Users</a>
            <a href="/index.php" target="_blank" class="btn-view">View Website ↗</a>
            <a href="?logout=1" class="btn-logout">Logout</a>
        </div>
    </div>

    <iframe id="editor-frame" src="/index.php?admin=1&lang=en"></iframe>

    <script src="/assets/js/admin.js"></script>
    <script>
        const iframe = document.getElementById('editor-frame');
        const langSelect = document.getElementById('lang-select');
        
        langSelect.addEventListener('change', () => {
            iframe.src = `/index.php?admin=1&lang=${langSelect.value}`;
        });
    </script>
</body>
</html>
