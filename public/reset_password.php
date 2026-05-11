<?php
session_start();
require_once __DIR__ . '/../app/Database.php';
use App\Database;

$error = '';
$success = '';
$token = $_GET['token'] ?? '';
$isValidToken = false;
$userId = null;

if (empty($token)) {
    $error = "Invalid reset token.";
} else {
    try {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT id, reset_expires FROM users WHERE reset_token = :t");
        $stmt->execute(['t' => $token]);
        $user = $stmt->fetch();

        if ($user && strtotime($user['reset_expires']) > time()) {
            $isValidToken = true;
            $userId = $user['id'];
        } else {
            $error = "Link expired or invalid. Please request a new one.";
        }
    } catch (\Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isValidToken) {
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if (strlen($password) < 8) {
        $error = "Password must be at least 8 characters.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET password_hash = ?, reset_token = NULL, reset_expires = NULL WHERE id = ?");
            $stmt->execute([$hash, $userId]);
            $success = "Password updated! You can now log in.";
            $isValidToken = false; // Hide form
        } catch (\Exception $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password - FORTRESS CMS</title>
    <link rel="stylesheet" href="/assets/css/style.css?v=2.2">
</head>
<body class="login-body">
    <div class="login-card">
        <h2>New Password</h2>
        
        <?php if ($error): ?><div class="error-msg"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <?php if ($success): ?>
            <div style="color: #10b981; margin-bottom: 25px; font-size: 14px;"><?= htmlspecialchars($success) ?></div>
            <a href="login.php" class="save-btn" style="text-decoration:none; display:block; text-align:center;">Login Now</a>
        <?php endif; ?>

        <?php if ($isValidToken): ?>
        <form method="POST">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" class="form-control" required minlength="8">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required minlength="8">
            </div>
            <button type="submit" class="save-btn">Update Password</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
