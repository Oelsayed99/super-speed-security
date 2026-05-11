<?php
require_once __DIR__ . '/../app/Database.php';

use App\Database;

$translations = [
    ['msgid' => 'contact-hero-badge', 'value_en' => 'Connect with Experts', 'value_ar' => 'تواصل مع الخبراء'],
    ['msgid' => 'contact-hero-title', 'value_en' => 'Contact us to discuss your security needs.', 'value_ar' => 'تواصل معنا لمناقشة احتياجاتك الأمنية.'],
    ['msgid' => 'contact-hero-desc', 'value_en' => 'From cash-in-transit to high-stakes facility protection, our architectural vault of security solutions is at your disposal. Reach out for a specialized consultation.', 'value_ar' => 'من نقل الأموال إلى حماية المرافق عالية المخاطر، فإن خزينتنا المعمارية للحلول الأمنية تحت تصرفك. تواصل معنا للحصول على استشارة متخصصة.'],
    ['msgid' => 'contact-lbl-name', 'value_en' => 'Name', 'value_ar' => 'الاسم'],
    ['msgid' => 'contact-pl-name', 'value_en' => 'Your full name', 'value_ar' => 'اسمك الكامل'],
    ['msgid' => 'contact-lbl-email', 'value_en' => 'Email', 'value_ar' => 'البريد الإلكتروني'],
    ['msgid' => 'contact-pl-email', 'value_en' => 'email@example.com', 'value_ar' => 'email@example.com'],
    ['msgid' => 'contact-lbl-phone', 'value_en' => 'Phone', 'value_ar' => 'رقم الهاتف'],
    ['msgid' => 'contact-pl-phone', 'value_en' => '+966 00 000 0000', 'value_ar' => '+966 00 000 0000'],
    ['msgid' => 'contact-lbl-message', 'value_en' => 'Message', 'value_ar' => 'الرسالة'],
    ['msgid' => 'contact-pl-message', 'value_en' => 'Tell us about your security requirements...', 'value_ar' => 'أخبرنا عن متطلباتك الأمنية...'],
    ['msgid' => 'contact-btn-send', 'value_en' => 'Send Inquiry', 'value_ar' => 'إرسال استفسار'],
    ['msgid' => 'contact-hq-title', 'value_en' => 'Headquarters', 'value_ar' => 'المقر الرئيسي'],
    ['msgid' => 'contact-hq-office', 'value_en' => 'Office Location', 'value_ar' => 'موقع المكتب'],
    ['msgid' => 'contact-hq-office-desc', 'value_en' => 'Financial District, Tower 7, Level 14<br/>Riyadh, Saudi Arabia', 'value_ar' => 'الحي المالي، البرج 7، المستوى 14<br/>الرياض، المملكة العربية السعودية'],
    ['msgid' => 'contact-hq-direct', 'value_en' => 'Direct Line', 'value_ar' => 'الخط المباشر'],
    ['msgid' => 'contact-hq-direct-desc', 'value_en' => '800-SUPER-SPEED<br/>+966 11 234 5678', 'value_ar' => '800-SUPER-SPEED<br/>+966 11 234 5678'],
    ['msgid' => 'contact-hq-email', 'value_en' => 'Email Support', 'value_ar' => 'دعم البريد الإلكتروني'],
    ['msgid' => 'contact-hq-email-desc', 'value_en' => 'operations@superspeed-sec.com<br/>info@superspeed-sec.com', 'value_ar' => 'operations@superspeed-sec.com<br/>info@superspeed-sec.com'],
    ['msgid' => 'contact-map-badge', 'value_en' => 'HQ Verified Secure', 'value_ar' => 'المقر آمن وموثق']
];

$media = [
    ['media_id' => 'contact-map-img', 'type' => 'image', 'src' => 'assets/img/contact_map.jpg']
];

try {
    $pdo = Database::getInstance()->getConnection();
    
    // Insert Translations
    $stmtT = $pdo->prepare("
        INSERT INTO translations (msgid, value_en, value_ar) 
        VALUES (:msgid, :value_en, :value_ar)
        ON DUPLICATE KEY UPDATE 
        value_en = VALUES(value_en), 
        value_ar = VALUES(value_ar)
    ");
    
    foreach ($translations as $t) {
        $stmtT->execute($t);
    }
    
    // Insert Media
    $stmtM = $pdo->prepare("
        INSERT INTO media (media_id, type, src) 
        VALUES (:media_id, :type, :src)
        ON DUPLICATE KEY UPDATE 
        src = VALUES(src)
    ");
    
    foreach ($media as $m) {
        $stmtM->execute($m);
    }
    
    echo "SUCCESS";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
