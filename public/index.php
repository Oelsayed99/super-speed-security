<?php
// public/index.php
// Directly load our translation engine
$t = require __DIR__ . '/../app/Translation.php';

// Check intended language, fallback to en
$lang = $_GET['lang'] ?? 'en';

// Admin flag for inline editing
$isAdmin = isset($_GET['admin']) && $_GET['admin'] == 1;

// CSS Versioning to force cache refresh
$cssVer = "1.5";
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>" dir="<?= $lang === 'ar' ? 'rtl' : 'ltr' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Speed Security - Home</title>
    <link rel="stylesheet" href="/assets/css/style.css?v=<?= $cssVer ?>">
</head>
<body class="frontend-body">
    <header class="frontend-header">
        <div class="container">
            <nav>
                <a href="/" class="logo"><?= $t('site-logo', 'text', $lang) ?></a>
                <div class="nav-links">
                    <a href="/"><?= $t('nav-home', 'text', $lang) ?></a>
                    <a href="#features"><?= $t('nav-features', 'text', $lang) ?></a>
                    <?php if ($isAdmin): ?>
                        <span class="edit-mode-badge">EDIT MODE</span>
                    <?php else: ?>
                        <a href="/login.php" class="btn"><?= $t('btn-login', 'text', $lang) ?></a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>

    <main class="frontend-main">
        <div class="container hero">
            <h1><?= $t('hero-title', 'text', $lang) ?></h1>
            <p><?= $t('hero-desc', 'text', $lang) ?></p>
            
            <div class="hero-spacer">
                <a href="/login.php" class="btn hero-large-btn"><?= $t('btn-hero', 'text', $lang) ?></a>
            </div>

            <div class="hero-media-wrapper">
                <img <?= $t('img-hero', 'image') ?> class="hero-img-full">
            </div>
            
            <div class="card-grid" id="features">
                <div class="card">
                    <div class="card-icon">🛡️</div>
                    <h3><?= $t('feature-1-title', 'text', $lang) ?></h3>
                    <p><?= $t('feature-1-desc', 'text', $lang) ?></p>
                </div>
                <div class="card">
                    <div class="card-icon">⚡</div>
                    <h3><?= $t('feature-2-title', 'text', $lang) ?></h3>
                    <p><?= $t('feature-2-desc', 'text', $lang) ?></p>
                </div>
                <div class="card">
                    <div class="card-icon">🎨</div>
                    <h3><?= $t('feature-3-title', 'text', $lang) ?></h3>
                    <p><?= $t('feature-3-desc', 'text', $lang) ?></p>
                </div>
            </div>
        </div>
    </main>

    <footer class="frontend-footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> <?= $t('footer-text', 'text', $lang) ?></p>
        </div>
    </footer>
</body>
</html>
