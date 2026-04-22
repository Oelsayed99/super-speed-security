<?php
namespace App;

use App\Database;
use Exception;

class Storage {
    public static function updateText($msgid, $lang, $value) {
        $pdo = Database::getInstance()->getConnection();
        
        $col = $lang === 'ar' ? 'value_ar' : 'value_en';
        
        $stmt = $pdo->prepare("INSERT INTO translations (msgid, $col) VALUES (:id, :val_insert) ON DUPLICATE KEY UPDATE $col = :val_update");
        return $stmt->execute([
            'id' => $msgid, 
            'val_insert' => $value,
            'val_update' => $value
        ]);
    }

    public static function updateMedia($mediaId, $src) {
        $pdo = Database::getInstance()->getConnection();

        // 1. Determine media type from ID (convention: img- or vid-)
        $type = strpos($mediaId, 'vid-') === 0 ? 'video' : 'image';

        // 2. Retrieve old src first for unlinking
        $stmt = $pdo->prepare("SELECT src FROM media WHERE media_id = :id");
        $stmt->execute(['id' => $mediaId]);
        $old = $stmt->fetchColumn();

        if ($old && strpos($old, '/storage/uploads/') === 0) {
            $oldFile = __DIR__ . '/../public' . $old;
            if (file_exists($oldFile)) {
                @unlink($oldFile);
            }
        }

        // 3. Update or Insert
        $stmt = $pdo->prepare("INSERT INTO media (media_id, type, src) VALUES (:id, :type, :src_insert) ON DUPLICATE KEY UPDATE src = :src_update");
        return $stmt->execute([
            'id' => $mediaId, 
            'type' => $type,
            'src_insert' => $src,
            'src_update' => $src
        ]);
    }

    public static function handleUpload($file, $type) {
        // Size Limits
        $maxSize = ($type === 'image') ? 5 * 1024 * 1024 : 50 * 1024 * 1024; // 5MB / 50MB
        if ($file['size'] > $maxSize) {
            throw new Exception("File too large. Maximum " . ($maxSize / 1024 / 1024) . "MB allowed.");
        }

        $targetDir = __DIR__ . '/../public/storage/uploads/' . $type . 's/'; // images/ or videos/
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // MIME Validation
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        $allowedContent = ($type === 'image') ? (strpos($mime, 'image/') === 0) : (strpos($mime, 'video/') === 0);
        if (!$allowedContent) {
            throw new Exception("Invalid file type. " . ucfirst($type) . " expected.");
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!$ext) $ext = ($type === 'image') ? 'png' : 'mp4';
        
        $filename = uniqid('media_') . '.' . $ext;
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return '/storage/uploads/' . $type . 's/' . $filename;
        }
        
        throw new Exception("Failed to move uploaded file.");
    }

    public static function savePartner($file) {
        $maxSize = 2 * 1024 * 1024; // 2MB
        if ($file['size'] > $maxSize) {
            throw new Exception("Logo file too large. Maximum 2MB allowed.");
        }

        $targetDir = __DIR__ . '/../public/assets/img/partners/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (strpos($mime, 'image/') !== 0) {
            throw new Exception("Invalid file type. Image expected.");
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!$ext) $ext = 'png';
        
        $filename = 'partner_' . uniqid() . '.' . $ext;
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return 'assets/img/partners/' . $filename;
        }
        
        throw new Exception("Failed to move uploaded logo.");
    }

    public static function deletePartner($filename) {
        $filename = basename($filename);
        $targetFile = __DIR__ . '/../public/assets/img/partners/' . $filename;
        
        if (file_exists($targetFile)) {
            return unlink($targetFile);
        }
        return false;
    }
}
