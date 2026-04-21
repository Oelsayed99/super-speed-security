<?php
session_start();
require_once __DIR__ . '/../app/Database.php';

use App\Database;

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT password_hash FROM users WHERE username = :u");
        $stmt->execute(['u' => $username]);
        $hash = $stmt->fetchColumn();

        if ($hash && password_verify($password, $hash)) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } catch (\Exception $e) {
        $error = "Database Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FORTRESS CMS</title>
    <link rel="stylesheet" href="/assets/css/style.css?v=2.1">
</head>
<body class="login-body">
    <div class="login-card">
        <h2>Admin Login</h2>
        <?php if ($error): ?>
            <div class="error-msg"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required autocomplete="username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required autocomplete="current-password">
            </div>
            <button type="submit" class="save-btn">Login</button>
            <a href="/" class="back-link">← Back to Website</a>
        </form>
    </div>
</body>
</html>
