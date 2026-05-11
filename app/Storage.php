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
        if (!isset($file['error']) || is_array($file['error'])) {
            throw new Exception("Invalid parameters.");
        }
        
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $uploadErrors = [
                UPLOAD_ERR_INI_SIZE => "File exceeds upload_max_filesize directive in php.ini",
                UPLOAD_ERR_FORM_SIZE => "File exceeds MAX_FILE_SIZE directive in form",
                UPLOAD_ERR_PARTIAL => "File was only partially uploaded",
                UPLOAD_ERR_NO_FILE => "No file was uploaded",
                UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
                UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
                UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload",
            ];
            $err = $uploadErrors[$file['error']] ?? "Unknown upload error";
            throw new Exception("Upload error: " . $err);
        }

        // Size Limits
        $maxSize = ($type === 'image') ? 10 * 1024 * 1024 : 500 * 1024 * 1024; // 10MB / 500MB
        if ($file['size'] > $maxSize) {
            throw new Exception("File too large. Maximum " . ($maxSize / 1024 / 1024) . "MB allowed.");
        }

        $targetDir = __DIR__ . '/../public/storage/uploads/' . $type . 's/'; // images/ or videos/
        if (!is_dir($targetDir)) {
            if (!@mkdir($targetDir, 0755, true)) {
                throw new Exception("Failed to create upload directory.");
            }
        }

        // MIME Validation
        $finfo = @finfo_open(FILEINFO_MIME_TYPE);
        if ($finfo === false) {
            throw new Exception("Failed to open finfo.");
        }
        $mime = @finfo_file($finfo, $file['tmp_name']);
        @finfo_close($finfo);

        if (!$mime) {
            throw new Exception("Failed to determine file MIME type.");
        }

        $allowedContent = ($type === 'image') ? (strpos($mime, 'image/') === 0) : (strpos($mime, 'video/') === 0);
        if (!$allowedContent) {
            throw new Exception("Invalid file type. " . ucfirst($type) . " expected.");
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!$ext) $ext = ($type === 'image') ? 'png' : 'mp4';
        
        $filename = uniqid('media_') . '.' . $ext;
        $targetFile = $targetDir . $filename;

        if (@move_uploaded_file($file['tmp_name'], $targetFile)) {
            return '/storage/uploads/' . $type . 's/' . $filename;
        }
        
        throw new Exception("Failed to move uploaded file. Check folder permissions.");
    }

    public static function savePartner($file) {
        if (!isset($file['error']) || is_array($file['error'])) {
            throw new Exception("Invalid parameters.");
        }
        
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Upload error code: " . $file['error']);
        }

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

    public static function saveFinancial($file) {
        $maxSize = 2 * 1024 * 1024; // 2MB
        if ($file['size'] > $maxSize) {
            throw new Exception("Logo file too large. Maximum 2MB allowed.");
        }

        $targetDir = __DIR__ . '/../public/assets/img/financial/';
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
        
        $filename = 'financial_' . uniqid() . '.' . $ext;
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return 'assets/img/financial/' . $filename;
        }
        
        throw new Exception("Failed to move uploaded logo.");
    }

    public static function deleteFinancial($filename) {
        $filename = basename($filename);
        $targetFile = __DIR__ . '/../public/assets/img/financial/' . $filename;
        
        if (file_exists($targetFile)) {
            return unlink($targetFile);
        }
        return false;
    }
}
