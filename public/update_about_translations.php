<?php
require_once __DIR__ . '/../app/Database.php';

use App\Database;

$translations = [
    ['msgid' => 'about-hero-badge', 'value_en' => 'Established Authority', 'value_ar' => 'سلطة راسخة'],
    ['msgid' => 'about-hero-title', 'value_en' => 'Architects of <br/><span class="text-primary-container">Absolute Security.</span>', 'value_ar' => 'مهندسو <br/><span class="text-primary-container">الأمن المطلق.</span>'],
    ['msgid' => 'about-hero-desc', 'value_en' => 'Specialized logistics and security services engineered for the most demanding high-stakes environments. Precision in movement, integrity in protection.', 'value_ar' => 'خدمات لوجستية وأمنية متخصصة مصممة لأكثر البيئات عالية المخاطر تطلباً. دقة في الحركة، نزاهة في الحماية.'],
    ['msgid' => 'about-overview-title', 'value_en' => 'Company Overview', 'value_ar' => 'نظرة عامة على الشركة'],
    ['msgid' => 'about-overview-p1', 'value_en' => 'Superspeed is a firm specialized in security and logistics, offering bespoke solutions that integrate cutting-edge technology with rigorous operational protocols. We pride ourselves on our architectural approach to security—building systems that are both resilient and adaptable.', 'value_ar' => 'سوبر سبيد هي شركة متخصصة في الأمن والخدمات اللوجستية، وتقدم حلولاً مخصصة تدمج أحدث التقنيات مع بروتوكولات التشغيل الصارمة. نحن نفخر بنهجنا المعماري للأمن - بناء أنظمة مرنة وقابلة للتكيف.'],
    ['msgid' => 'about-overview-p2', 'value_en' => 'Our expertise spans Cash-In-Transit (CIT) services, secure facility management, and executive protection, ensuring that every asset entrusted to us is moved and managed with "Super Speed" and surgical precision.', 'value_ar' => 'تشمل خبرتنا خدمات نقل الأموال، وإدارة المرافق الآمنة، وحماية التنفيذيين، مما يضمن نقل وإدارة كل أصل مؤتمن لدينا بـ "سرعة فائقة" ودقة جراحية.'],
    ['msgid' => 'about-mission-title', 'value_en' => 'Our Mission', 'value_ar' => 'مهمتنا'],
    ['msgid' => 'about-mission-desc', 'value_en' => '"To provide reliable security solutions and build strong client relationships through unwavering integrity and superior operational excellence."', 'value_ar' => '"تقديم حلول أمنية موثوقة وبناء علاقات قوية مع العملاء من خلال النزاهة التي لا تتزعزع والتميز التشغيلي الفائق."'],
    ['msgid' => 'about-goals-title', 'value_en' => 'Strategic Goals', 'value_ar' => 'الأهداف الاستراتيجية'],
    ['msgid' => 'about-goals-subtitle', 'value_en' => 'Guided by precision, fueled by trust.', 'value_ar' => 'مسترشدين بالدقة، مدعومين بالثقة.'],
    ['msgid' => 'goal-1-title', 'value_en' => 'Long-term partnerships', 'value_ar' => 'شراكات طويلة الأمد'],
    ['msgid' => 'goal-1-desc', 'value_en' => 'Building enduring bonds with our stakeholders.', 'value_ar' => 'بناء روابط دائمة مع أصحاب المصلحة لدينا.'],
    ['msgid' => 'goal-2-title', 'value_en' => 'High-quality service', 'value_ar' => 'خدمة عالية الجودة'],
    ['msgid' => 'goal-2-desc', 'value_en' => 'Maintaining gold-standard operational rigor.', 'value_ar' => 'الحفاظ على الصرامة التشغيلية ذات المعيار الذهبي.'],
    ['msgid' => 'goal-3-title', 'value_en' => 'Customer satisfaction', 'value_ar' => 'رضا العملاء'],
    ['msgid' => 'goal-3-desc', 'value_en' => 'Exceeding expectations in every mission.', 'value_ar' => 'تجاوز التوقعات في كل مهمة.'],
    ['msgid' => 'goal-4-title', 'value_en' => 'Trust and reliability', 'value_ar' => 'الثقة والموثوقية'],
    ['msgid' => 'goal-4-desc', 'value_en' => 'The cornerstone of our professional identity.', 'value_ar' => 'حجر الزاوية لهويتنا المهنية.'],
    ['msgid' => 'about-cta-title', 'value_en' => 'Ready to secure your operations with Super Speed?', 'value_ar' => 'هل أنت مستعد لتأمين عملياتك مع سوبر سبيد؟'],
    ['msgid' => 'about-cta-btn-1', 'value_en' => 'Our Services', 'value_ar' => 'خدماتنا'],
    ['msgid' => 'about-cta-btn-2', 'value_en' => 'Contact Us', 'value_ar' => 'اتصل بنا']
];

try {
    $pdo = Database::getInstance()->getConnection();
    
    $stmt = $pdo->prepare("
        INSERT INTO translations (msgid, value_en, value_ar) 
        VALUES (:msgid, :value_en, :value_ar)
        ON DUPLICATE KEY UPDATE 
        value_en = VALUES(value_en), 
        value_ar = VALUES(value_ar)
    ");
    
    foreach ($translations as $t) {
        $stmt->execute($t);
    }
    
    echo "SUCCESS";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
