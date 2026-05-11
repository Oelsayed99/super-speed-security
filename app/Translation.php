<?php
namespace App;

use App\Database;
use Throwable;

class Translation {
    private static $textData = null;
    private static $mediaData = null;

    /**
     * Initializes data by fetching all translations and media from database.
     */
    private static function init() {
        if (self::$textData !== null && self::$mediaData !== null) {
            return;
        }

        try {
            $pdo = Database::getInstance()->getConnection();
            
            // Load all translations
            $stmt = $pdo->query("SELECT msgid, value_en, value_ar FROM translations");
            self::$textData = [];
            while ($row = $stmt->fetch()) {
                self::$textData[$row['msgid']] = [
                    'en' => $row['value_en'],
                    'ar' => $row['value_ar']
                ];
            }

            // Load all media
            $stmt = $pdo->query("SELECT media_id, type, src FROM media");
            self::$mediaData = [];
            while ($row = $stmt->fetch()) {
                self::$mediaData[$row['media_id']] = [
                    'src' => $row['src'],
                    'type' => $row['type']
                ];
            }
        } catch (Throwable $e) {
            self::$textData = [];
            self::$mediaData = [];
        }
    }

    /**
     * Get translated text (Allows raw HTML)
     */
    public static function get($msgid, $lang = 'en', $isAdmin = false, $default = '') {
        self::init();
        
        $val = isset(self::$textData[$msgid][$lang]) && !empty(self::$textData[$msgid][$lang]) 
               ? self::$textData[$msgid][$lang] 
               : (!empty($default) ? $default : $msgid);
        
        if ($isAdmin) {
            // Content ($val) is kept raw to allow HTML tags like <span>
            // Attributes (msgid) are escaped for security
            return "<span msgid=\"" . htmlspecialchars($msgid) . "\">" . $val . "</span>";
        }
        return $val;
    }

    /**
     * Get media attributes (src and id)
     */
    public static function getMedia($mediaId, $type = 'image', $isAdmin = false) {
        self::init();
        
        $src = isset(self::$mediaData[$mediaId]['src']) && !empty(self::$mediaData[$mediaId]['src']) 
                ? self::$mediaData[$mediaId]['src'] 
                : ($type === 'image' 
                    ? 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAwIiBoZWlnaHQ9IjQwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZpbGw9IiM2NjYiIGZvbnQtc2l6ZT0iMjAiIHRleHQtYW5jaG9yPSJtaWRkbGUiPm1pc3NpbmcgaW1hZ2U8L3RleHQ+PC9zdmc+' 
                    : '');
        
        $safeMediaId = htmlspecialchars($mediaId);
        $idAttr = ($type === 'video') ? "vidid=\"$safeMediaId\"" : "imgid=\"$safeMediaId\"";
        
        if ($isAdmin) {
            return "src=\"" . htmlspecialchars($src) . "\" " . $idAttr;
        }
        return "src=\"" . htmlspecialchars($src) . "\"";
    }
}
