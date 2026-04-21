<?php
/**
 * CMS Helper Functions
 * -------------------
 * These functions wrap the core Translation logic to provide a clean API 
 * for frontend templates.
 */

use App\Translation;

/**
 * Translates a text string based on current language.
 * In admin mode, returns a span wrapper for inline editing.
 * 
 * @param string $msgid The unique identifier for the translation
 * @param string $default Fallback text if not found
 * @return string
 */
function translate($msgid, $default = '') {
    global $lang, $isAdmin;
    
    // Ensure default is msgid if empty
    if (empty($default)) $default = $msgid;
    
    // If translation closure is already defined in Translation.php, we use it
    // But since we want a global function as requested by the user:
    return Translation::get($msgid, $lang, $isAdmin, $default);
}

/**
 * Returns attributes for an image element.
 * In admin mode, includes imgid for inline replacement.
 * 
 * @param string $imgid The unique identifier for the image
 * @return string e.g. 'src="..." imgid="..."'
 */
function getImage($imgid) {
    global $isAdmin;
    return Translation::getMedia($imgid, 'image', $isAdmin);
}

/**
 * Returns attributes for a video element.
 * In admin mode, includes vidid for inline replacement.
 * 
 * @param string $vidid The unique identifier for the video
 * @return string e.g. 'src="..." vidid="..."'
 */
function getVideo($vidid) {
    global $isAdmin;
    return Translation::getMedia($vidid, 'video', $isAdmin);
}
/**
 * Generates a URL for internal navigation, preserving lang and admin state.
 * 
 * @param string $page The target page identifier
 * @return string
 */
function url($page) {
    global $lang, $isAdmin;
    $url = "index.php?page=$page&lang=$lang";
    if ($isAdmin) {
        $url .= "&admin=1";
    }
    return $url;
}
