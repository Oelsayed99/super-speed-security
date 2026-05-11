<?php
echo 'upload_max_filesize: ' . ini_get('upload_max_filesize') . "\n";
echo 'post_max_size: ' . ini_get('post_max_size') . "\n";
echo 'finfo: ' . (function_exists('finfo_open') ? 'yes' : 'no') . "\n";
echo 'is_writable: ' . (is_writable('public') ? 'yes' : 'no') . "\n";
