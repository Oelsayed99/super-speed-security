SET NAMES utf8mb4;
CREATE DATABASE IF NOT EXISTS `superspeed_cms` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `superspeed_cms`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password_hash` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `translations` (
    `msgid` VARCHAR(100) PRIMARY KEY,
    `value_en` TEXT NULL,
    `value_ar` TEXT NULL,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `media` (
    `media_id` VARCHAR(100) PRIMARY KEY,
    `type` ENUM('image', 'video') NOT NULL,
    `src` TEXT NULL,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default admin user (password is 'password')
INSERT IGNORE INTO `users` (`username`, `password_hash`) VALUES ('admin', '$2y$10$GZ6wZThIKdHFrCO3q9E0ruwadm/VpzNiIaKan1Ff2n1mxnP7ox2QW');

-- Initial Translations
INSERT INTO translations (msgid, value_en, value_ar) VALUES 
('hero-title', 'Next-Generation Security, Lightning Fast.', 'حماية الجيل القادم بسرعة فائقة'),
('hero-desc', 'A custom CMS that prioritizes extreme performance and ironclad security. Monitor content natively with pure execution speed.', 'نظام إدارة محتوى مخصص يعطي الأولوية للأداء الفائق والأمان الحديدي.'),
('footer-text', 'Super Speed Security CMS. All rights reserved.', 'نظام حماية بسرعة فائقة. جميع الحقوق محفوظة.'),
('nav-home', 'Home', 'الرئيسية'),
('nav-features', 'Features', 'المميزات'),
('site-logo', 'Super Speed Security', 'نظام الحماية الفائق'),
('btn-login', 'Admin Login', 'دخول المشرف'),
('btn-hero', 'Start Managing', 'ابدأ الآن'),
('feature-1-title', 'Secure by Default', 'آمن افتراضياً'),
('feature-1-desc', 'Ironclad PDO-based protection against all modern threats.', 'حماية حديدية مبنية على PDO ضد جميع التهديدات الحديثة.'),
('feature-2-title', 'Lightning Fast', 'سرعة البرق'),
('feature-2-desc', 'Zero framework overhead for maximum pure PHP speed.', 'بدون أعباء أطر العمل للحصول على أقصى سرعة PHP نقية.'),
('feature-3-title', 'Live Editing', 'تحرير مباشر'),
('feature-3-desc', 'What you see is what you get, updated in real-time.', 'ما تراه هو ما تحصل عليه، يتم تحديثه في الوقت الفعلي.');

-- Initial Media
INSERT INTO media (media_id, type, src) VALUES 
('img-hero', 'image', '/storage/uploads/images/media_69e2b3d7085e7.jpeg'),
('vid-intro', 'video', '');
