<?php
session_start();
require_once __DIR__ . '/../app/Database.php';
use App\Database;

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

$error = '';
$success = '';

$pdo = Database::getInstance()->getConnection();

// Handle User Creation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])) {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hash]);
            $success = "User created successfully.";
        } catch (\Exception $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}

// Handle User Deletion
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND username != 'admin'"); // Protect main admin if exists
        $stmt->execute([$id]);
        $success = "User deleted.";
    } catch (\Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
}

// Fetch all users
$users = $pdo->query("SELECT id, username, email, created_at FROM users ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - FORTRESS CMS</title>
    <link rel="stylesheet" href="/assets/css/style.css?v=2.2">
    <style>
        .admin-container { max-width: 1000px; margin: 40px auto; padding: 0 20px; }
        .user-table { width: 100%; border-collapse: collapse; margin-top: 30px; background: #111; border-radius: 15px; overflow: hidden; }
        .user-table th, .user-table td { padding: 15px; text-align: left; border-bottom: 1px solid #222; color: #eee; }
        .user-table th { background: #1a1c1c; color: #EE2323; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; }
        .btn-delete { color: #EE2323; text-decoration: none; font-size: 11px; font-weight: 800; text-transform: uppercase; }
        .create-form { background: #111; padding: 30px; border-radius: 20px; border: 1px solid #222; margin-bottom: 40px; }
        .form-row { display: grid; grid-template-cols: 1fr 1fr 1fr auto; gap: 15px; align-items: flex-end; }
        .success-msg { color: #10b981; font-size: 13px; margin-bottom: 20px; font-weight: 800; }
    </style>
</head>
<body class="admin-body">
    <div class="admin-navbar">
        <h1>User Management</h1>
        <div class="admin-nav-actions">
            <a href="admin.php" class="btn-view">← Back to Editor</a>
            <a href="?logout=1" class="btn-logout">Logout</a>
        </div>
    </div>

    <div class="admin-container">
        <?php if ($error): ?><div class="error-msg"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <?php if ($success): ?><div class="success-msg"><?= htmlspecialchars($success) ?></div><?php endif; ?>

        <div class="create-form">
            <h3 style="margin-top:0; margin-bottom:20px; color:#EE2323; font-size:14px; text-transform:uppercase;">Create New Admin User</h3>
            <form method="POST" class="form-row">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="johndoe" required style="margin-bottom:0">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="john@example.com" required style="margin-bottom:0">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required style="margin-bottom:0">
                </div>
                <button type="submit" name="create_user" class="save-btn" style="padding: 15px 30px; width:auto;">Create User</button>
            </form>
        </div>

        <h3 style="color:#EE2323; font-size:14px; text-transform:uppercase;">Active Users</h3>
        <table class="user-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['username']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= date('Y-m-d H:i', strtotime($u['created_at'])) ?></td>
                    <td>
                        <?php if ($u['username'] !== 'admin'): ?>
                            <a href="?delete=<?= $u['id'] ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                        <?php else: ?>
                            <span style="color:#444; font-size:10px;">SYSTEM</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
