<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$formSuccess = false;
$formError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact'])) {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        // IMPORTANT: Replace with your Gmail address and App Password
        $mail->Username   = 'sss.ct.info@gmail.com';
        $mail->Password   = 'ninedliklskbqkbt'; // DO NOT use your normal password, use an App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('sss.ct.info@gmail.com', 'Super Speed Security Website');
        $mail->addAddress('sss.ct.info@gmail.com'); // Send TO this email
        $mail->addReplyTo($email, $name); // Reply goes to the person who filled the form

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Inquiry - Super Speed Security';
        $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";

        $mail->send();
        $formSuccess = true;
    } catch (Exception $e) {
        $formError = translate('contact-form-error', 'Failed to send message. Mailer Error: ' . $mail->ErrorInfo);
    }
}
?>
<!-- Hero / Headline Section -->
<section class="bg-surface-container-low py-24">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid md:grid-cols-2 gap-12 items-end">
            <div class="space-y-6">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-widest"><?= translate('contact-hero-badge', 'Connect with Experts') ?></span>
                <h1 class="text-5xl md:text-6xl font-extrabold font-headline tracking-tighter leading-tight text-zinc-900 dark:text-white">
                    <?= translate('contact-hero-title', 'Contact us to discuss your security needs.') ?>
                </h1>
            </div>
            <div class="hidden md:block">
                <div class="h-[1px] w-full bg-outline-variant opacity-30 mb-8"></div>
                <p class="text-zinc-500 text-lg leading-relaxed max-w-md">
                    <?= translate('contact-hero-desc', 'From cash-in-transit to high-stakes facility protection, our architectural vault of security solutions is at your disposal. Reach out for a specialized consultation.') ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section: Form & Details -->
<section class="py-24 max-w-7xl mx-auto px-8">
    <div class="grid lg:grid-cols-12 gap-16">
        <!-- Contact Form Card -->
        <div class="lg:col-span-7 bg-surface-container-lowest rounded-xl p-10 shadow-sm border border-outline-variant/10">
            <?php if ($formSuccess): ?>
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-8 flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span>
                    <p class="font-bold"><?= translate('contact-form-success', 'Your message has been sent successfully. We will get back to you shortly.') ?></p>
                </div>
            <?php elseif ($formError): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-8 flex items-center gap-3">
                    <span class="material-symbols-outlined">error</span>
                    <p class="font-bold"><?= $formError ?></p>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="space-y-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-zinc-700 uppercase tracking-wider ml-1"><?= translate('contact-lbl-name', 'Name') ?></label>
                        <input name="name" required class="w-full bg-surface-container-high border-0 border-b-2 border-outline-variant/30 focus:border-primary focus:ring-0 px-4 py-3 rounded-t-lg transition-all placeholder:text-zinc-400" placeholder="<?= strip_tags(translate('contact-pl-name', 'Your full name')) ?>" type="text"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-zinc-700 uppercase tracking-wider ml-1"><?= translate('contact-lbl-email', 'Email') ?></label>
                        <input name="email" required class="w-full bg-surface-container-high border-0 border-b-2 border-outline-variant/30 focus:border-primary focus:ring-0 px-4 py-3 rounded-t-lg transition-all placeholder:text-zinc-400" placeholder="<?= strip_tags(translate('contact-pl-email', 'email@example.com')) ?>" type="email"/>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-zinc-700 uppercase tracking-wider ml-1"><?= translate('contact-lbl-phone', 'Phone') ?></label>
                    <input name="phone" class="w-full bg-surface-container-high border-0 border-b-2 border-outline-variant/30 focus:border-primary focus:ring-0 px-4 py-3 rounded-t-lg transition-all placeholder:text-zinc-400" placeholder="<?= strip_tags(translate('contact-pl-phone', '+966 00 000 0000')) ?>" type="tel"/>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-zinc-700 uppercase tracking-wider ml-1"><?= translate('contact-lbl-message', 'Message') ?></label>
                    <textarea name="message" required class="w-full bg-surface-container-high border-0 border-b-2 border-outline-variant/30 focus:border-primary focus:ring-0 px-4 py-3 rounded-t-lg transition-all placeholder:text-zinc-400 resize-none" placeholder="<?= strip_tags(translate('contact-pl-message', 'Tell us about your security requirements...')) ?>" rows="5"></textarea>
                </div>
                <button name="submit_contact" class="brand-gradient text-white w-full md:w-auto px-10 py-4 rounded-xl font-bold tracking-tight text-lg flex items-center justify-center gap-3 hover:scale-[1.02] active:scale-[0.98] transition-all shadow-xl shadow-primary/20" type="submit">
                    <?= translate('contact-btn-send', 'Send Inquiry') ?>
                    <span class="material-symbols-outlined" data-icon="send">send</span>
                </button>
            </form>
        </div>
        <!-- Contact Details & Map -->
        <div class="lg:col-span-5 space-y-12">
            <div class="space-y-8">
                <h3 class="text-2xl font-bold font-headline tracking-tight"><?= translate('contact-hq-title', 'Headquarters') ?></h3>
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 flex-shrink-0 bg-primary/10 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary" data-icon="location_on">location_on</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-1"><?= translate('contact-hq-office', 'Office Location') ?></h4>
                        <p class="text-zinc-500 leading-relaxed"><?= translate('contact-hq-office-desc', 'Financial District, Tower 7, Level 14<br/>Riyadh, Saudi Arabia') ?></p>
                    </div>
                </div>
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 flex-shrink-0 bg-primary/10 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary" data-icon="call">call</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-1"><?= translate('contact-hq-direct', 'Direct Line') ?></h4>
                        <p class="text-zinc-500"><?= translate('contact-hq-direct-desc', '800-SUPER-SPEED<br/>+966 11 234 5678') ?></p>
                    </div>
                </div>
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 flex-shrink-0 bg-primary/10 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary" data-icon="mail">mail</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-1"><?= translate('contact-hq-email', 'Email Support') ?></h4>
                        <p class="text-zinc-500"><?= translate('contact-hq-email-desc', 'operations@superspeed-sec.com<br/>info@superspeed-sec.com') ?></p>
                    </div>
                </div>
            </div>
            <!-- Map Integration -->
            <div class="space-y-4">
                <div class="rounded-xl overflow-hidden h-72 shadow-lg">
                    <iframe src="https://maps.google.com/maps?q=29.9617319,31.3057941&hl=en&z=14&output=embed" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="bg-surface-container-lowest border border-outline-variant/20 px-4 py-3 rounded-lg shadow-sm flex items-center gap-3 w-fit">
                    <span class="w-2.5 h-2.5 rounded-full bg-red-600 animate-pulse"></span>
                    <span class="text-xs font-bold text-zinc-900 uppercase tracking-widest"><?= translate('contact-map-badge', 'HQ Verified Secure') ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
