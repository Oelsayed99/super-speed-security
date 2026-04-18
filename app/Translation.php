<?php
// app/Translation.php

// Return a functional closure directly when included
return function($objId, $type = 'text', $lang = 'en') {
    static $textData = null;
    static $mediaData = null;

    if ($textData === null || $mediaData === null) {
        require_once __DIR__ . '/Database.php';
        try {
            $pdo = Database::getInstance()->getConnection();
            
            // Load all translations
            $stmt = $pdo->query("SELECT * FROM translations");
            $textData = [];
            while ($row = $stmt->fetch()) {
                $textData[$row['msgid']] = [
                    'en' => $row['value_en'],
                    'ar' => $row['value_ar']
                ];
            }

            // Load all media
            $stmt = $pdo->query("SELECT * FROM media");
            $mediaData = [];
            while ($row = $stmt->fetch()) {
                $mediaData[$row['media_id']] = [
                    'src' => $row['src'],
                    'type' => $row['type']
                ];
            }
        } catch (\Throwable $e) {
            $textData = [];
            $mediaData = [];
        }
    }

    $isAdmin = isset($_GET['admin']) && $_GET['admin'] == '1';
    
    if ($type === 'text') {
        $val = isset($textData[$objId][$lang]) && !empty($textData[$objId][$lang]) ? $textData[$objId][$lang] : $objId;
        if ($isAdmin) {
            return "<span msgid=\"$objId\">" . htmlspecialchars($val) . "</span>";
        }
        return htmlspecialchars($val);
    } 
    elseif ($type === 'image') {
        $src = isset($mediaData[$objId]['src']) && !empty($mediaData[$objId]['src']) 
                ? $mediaData[$objId]['src'] 
                : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAwIiBoZWlnaHQ9IjQwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZpbGw9IiM2NjYiIGZvbnQtc2l6ZT0iMjAiIHRleHQtYW5jaG9yPSJtaWRkbGUiPm1pc3NpbmcgaW1hZ2U8L3RleHQ+PC9zdmc+'; // gray placeholder
        
        if ($isAdmin) {
            return "src=\"" . htmlspecialchars($src) . "\" imgid=\"$objId\"";
        }
        return "src=\"" . htmlspecialchars($src) . "\"";
    }
    elseif ($type === 'video') {
        $src = isset($mediaData[$objId]['src']) ? $mediaData[$objId]['src'] : '';
        
        if ($isAdmin) {
            return "src=\"" . htmlspecialchars($src) . "\" vidid=\"$objId\"";
        }
        return "src=\"" . htmlspecialchars($src) . "\"";
    }
    
    return '';
};
