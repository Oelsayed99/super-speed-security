<?php
$files = [
    'public/update_media.php',
    'public/update_text.php',
    'public/upload_partner.php',
    'public/upload_financial.php',
    'public/delete_partner.php',
    'public/delete_financial.php'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        if (strpos($content, "require_once __DIR__ . '/../app/Database.php';") === false) {
            $content = str_replace(
                "require_once __DIR__ . '/../app/Storage.php';",
                "require_once __DIR__ . '/../app/Database.php';\nrequire_once __DIR__ . '/../app/Storage.php';",
                $content
            );
            file_put_contents($file, $content);
        }
    }
}
echo "Dependencies injected.";
