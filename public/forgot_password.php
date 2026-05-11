<?php
session_start();
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);

    if (empty($email)) {
        $error = "Please enter your email address.";
    } else {
        try {
            $pdo = Database::getInstance()->getConnection();
            $stmt = $pdo->prepare("SELECT id, username FROM users WHERE email = :e");
            $stmt->execute(['e' => $email]);
            $user = $stmt->fetch();

            if ($user) {
                // Generate secure token
                $token = bin2hex(random_bytes(32));
                $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

                $stmt = $pdo->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE id = ?");
                $stmt->execute([$token, $expires, $user['id']]);

                // Send Email
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'sss.ct.info@gmail.com';
                $mail->Password   = 'ninedliklskbqkbt';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('sss.ct.info@gmail.com', 'Super Speed Security CMS');
                $mail->addAddress($email);

                $resetLink = "http://" . $_SERVER['HTTP_HOST'] . "/reset_password.php?token=" . $token;

                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request - Super Speed Security';
                $mail->Body    = "
                    <div style='font-family: sans-serif; padding: 20px; color: #333;'>
                        <h2>Password Reset Request</h2>
                        <p>Hello {$user['username']},</p>
                        <p>We received a request to reset your password. Click the button below to set a new password:</p>
                        <a href='{$resetLink}' style='display: inline-block; padding: 12px 24px; background: #EE2323; color: #fff; text-decoration: none; border-radius: 8px; font-weight: bold;'>Reset Password</a>
                        <p>This link will expire in 1 hour.</p>
                        <p>If you didn't request this, you can safely ignore this email.</p>
                    </div>
                ";

                $mail->send();
                $success = "A password reset link has been sent to your email.";
            } else {
                // For security, don't reveal if email exists
                $success = "If that email is in our system, you will receive a reset link shortly.";
            }
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
    <title>Forgot Password - FORTRESS CMS</title>
    <link rel="stylesheet" href="/assets/css/style.css?v=2.2">
</head>
<body class="login-body">
    <div class="login-card">
        <h2>Reset Password</h2>
        <p style="color:#888; font-size:13px; margin-bottom:25px;">Enter your email and we'll send you a recovery link.</p>
        
        <?php if ($error): ?><div class="error-msg"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <?php if ($success): ?><div style="color: #10b981; margin-bottom: 20px; font-size: 14px;"><?= htmlspecialchars($success) ?></div><?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required placeholder="name@example.com">
            </div>
            <button type="submit" class="save-btn">Send Reset Link</button>
            <a href="login.php" class="back-link">← Back to Login</a>
        </form>
    </div>
</body>
</html>
