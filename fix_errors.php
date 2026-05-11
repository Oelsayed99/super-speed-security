<?php
$files = [
    'public/update_media.php',
    'public/update_text.php',
    'public/upload_partner.php',
    'public/upload_financial.php'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        if (strpos($content, "ini_set('display_errors', '0');") === false) {
            $content = preg_replace('/<\?php\s+/', "<?php\nini_set('display_errors', '0');\n", $content, 1);
            file_put_contents($file, $content);
        }
    }
}
echo "Done.";
