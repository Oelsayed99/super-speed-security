<!-- Section 0: Full-Width Hero Video Section -->
<section class="relative h-screen w-full overflow-hidden flex items-center justify-center text-center">
    <!-- Background Video -->
    <div class="absolute inset-0 z-0">
        <video <?= getVideo('hero-video') ?> autoplay class="w-full h-full object-cover" loop muted playsinline>
            <!-- Fallback image if video fails is handled by CMS via attributes -->
        </video>
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>
    </div>
    
    <!-- Content Overlay -->
    <div class="relative z-10 max-w-4xl px-8 text-white space-y-8 animate-fade-in-up">
        <div class="space-y-4">
            <?php if ($lang === 'en'): ?>
                <h1 class="font-headline font-extrabold text-5xl md:text-7xl leading-tight tracking-tight">
                    <?= translate('hero-title', 'Your Safety. Our Mission.') ?>
                </h1>
            <?php else: ?>
                <h1 class="font-headline font-bold text-4xl md:text-6xl text-white/90" dir="rtl">
                    <?= translate('hero-title-ar', 'أمانكم... مهمتنا') ?>
                </h1>
            <?php endif; ?>
        </div>
        <div class="space-y-4">
            <?php if ($lang === 'en'): ?>
                <p class="text-xl md:text-2xl font-medium text-white/80">
                    <?= translate('hero-desc', 'Professional Security & Cash in Transit Services') ?>
                </p>
            <?php else: ?>
                <p class="text-xl md:text-2xl font-medium text-white/80 italic" dir="rtl">
                    <?= translate('hero-desc-ar', 'خدمات أمن ونقل أموال باحترافية عالية') ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="flex flex-wrap justify-center gap-6 pt-4">
            <a href="index.php?page=services" class="brand-gradient px-10 py-5 rounded-xl font-bold text-lg hover:scale-105 transition-all shadow-2xl flex items-center gap-2">
                <?php if ($lang === 'en'): ?>
                    <span><?= translate('btn-services', 'Our Services') ?></span>
                <?php else: ?>
                    <span dir="rtl"><?= translate('btn-services-ar', 'خدماتنا') ?></span>
                <?php endif; ?>
            </a>
            <a href="index.php?page=contact" class="bg-white/10 backdrop-blur-md border border-white/30 px-10 py-5 rounded-xl font-bold text-lg hover:bg-white/20 transition-all flex items-center gap-2">
                <?php if ($lang === 'en'): ?>
                    <span><?= translate('btn-contact', 'Contact Us') ?></span>
                <?php else: ?>
                    <span dir="rtl"><?= translate('btn-contact-ar', 'تواصل معنا') ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce text-white/50">
        <span class="material-symbols-outlined text-4xl">keyboard_double_arrow_down</span>
    </div>
</section>

<!-- Section 1: Intro Section -->
<section class="relative py-24 flex items-center overflow-hidden bg-surface">
    <div class="max-w-7xl mx-auto px-8 w-full relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-8">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 text-red-900 text-xs font-bold uppercase tracking-widest">
                <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                <?= translate('badge-elite', 'Elite Security') ?>
            </div>
            <div>
                <h2 class="font-headline font-extrabold text-4xl md:text-5xl leading-tight tracking-tight text-on-surface mb-2">
                    <?= translate('home-intro-title', 'The Standard of <span class="text-primary">Excellence.</span>') ?>
                </h2>
                <p class="text-lg text-zinc-600">
                    <?= translate('home-intro-desc', 'We redefine the security landscape with precision, integrity, and unparalleled rapid response capabilities.') ?>
                </p>
            </div>
            <div class="flex flex-wrap gap-4">
                <a href="index.php?page=about" class="brand-gradient text-white px-8 py-4 rounded-xl font-bold flex items-center gap-2 shadow-lg hover:translate-y-[-2px] transition-all">
                    <?= translate('btn-learn-more', 'Learn More') ?>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>
        </div>
        <div class="hidden lg:block relative">
            <div class="aspect-square bg-surface-container-high rounded-[2rem] overflow-hidden rotate-3 shadow-2xl">
                <img <?= getImage('home-intro-img') ?> class="w-full h-full object-cover" alt="Security Personnel">
            </div>
            <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl max-w-[200px] -rotate-3 border border-surface-container-highest">
                <span class="material-symbols-outlined text-primary text-4xl mb-2" style="font-variation-settings: 'FILL' 1;">speed</span>
                <p class="text-sm font-bold text-on-surface"><?= translate('home-floating-text', 'Super Speed response in critical moments.') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Precision Section -->
<section class="py-24 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 space-y-6">
                <h2 class="font-headline font-bold text-3xl md:text-4xl text-on-surface"><?= translate('precision-title', 'Precision in Protection') ?></h2>
                <div class="w-20 h-1.5 brand-gradient rounded-full"></div>
            </div>
            <div class="lg:col-span-7 space-y-8">
                <div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm">
                <p class="text-xl leading-relaxed font-medium <?= $lang === 'ar' ? 'italic' : 'text-zinc-700' ?>" <?= $lang === 'ar' ? 'dir="rtl"' : '' ?>>
                    <?= $lang === 'en' ? translate('precision-desc', 'Superspeed is a company specialized in providing comprehensive security solutions and secure logistics.') : translate('precision-desc-ar', 'سوبر سبيد هي شركة متخصصة في تقديم الحلول الأمنية المتكاملة والخدمات اللوجستية الآمنة.') ?>
                </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Why Choose Us (Bento) -->
<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16 space-y-4">
            <h2 class="font-headline font-bold text-4xl"><?= translate('bento-title', 'The Sovereign Standard') ?></h2>
            <p class="text-zinc-500 font-medium"><?= translate('bento-subtitle', 'Why industry leaders choose FORTRESS') ?></p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Point 1 -->
            <div class="md:col-span-2 lg:col-span-2 bg-surface-container-lowest p-8 rounded-[1.5rem] flex flex-col justify-between hover:bg-white transition-all group shadow-sm">
                <div class="space-y-4">
                    <span class="material-symbols-outlined text-primary text-4xl group-hover:scale-110 transition-transform">military_tech</span>
                    <h3 class="text-2xl font-bold font-headline"><?= translate('point-1-title', 'Professional Trained Staff') ?></h3>
                    <p class="text-zinc-600"><?= translate('point-1-desc', 'Our personnel undergo rigorous tactical and psychological training.') ?></p>
                </div>
                <?php if ($lang === 'ar'): ?>
                    <p class="mt-8 text-black font-bold" dir="rtl"><?= translate('point-1-ar', 'طاقم مدرب باحترافية عالية') ?></p>
                <?php endif; ?>
            </div>
            <!-- Point 2 -->
            <div class="bg-zinc-900 p-8 rounded-[1.5rem] flex flex-col justify-between text-white group shadow-xl">
                <div class="space-y-4">
                    <span class="material-symbols-outlined text-red-500 text-4xl group-hover:rotate-12 transition-transform">emergency_share</span>
                    <h3 class="text-xl font-bold font-headline"><?= translate('point-2-title', 'Rapid Response') ?></h3>
                    <p class="text-sm text-zinc-400"><?= translate('point-2-desc', 'Emergency units ready 24/7 with rapid deployment.') ?></p>
                </div>
                <p class="mt-8 text-zinc-500 font-bold text-xs" dir="rtl"><?= translate('point-2-ar', 'استجابة سريعة للطوارئ') ?></p>
            </div>
            <!-- Point 3 -->
            <div class="lg:col-span-1 bg-surface-container-low p-8 rounded-[1.5rem] flex flex-col justify-between group border border-outline-variant/10">
                <div class="space-y-4">
                    <span class="material-symbols-outlined text-primary text-4xl group-hover:translate-x-2 transition-transform">handshake</span>
                    <h3 class="text-xl font-bold font-headline"><?= translate('point-3-title', 'Reliable & Consistent') ?></h3>
                    <p class="text-sm text-zinc-600"><?= translate('point-3-desc', 'Consistency is the foundation of trust.') ?></p>
                </div>
                <p class="mt-8 text-zinc-400 font-bold text-xs" dir="rtl"><?= translate('point-3-ar', 'خدمة موثوقة ومستمرة') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Clients Preview -->
<section class="py-20 bg-surface-container-lowest">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="max-w-xs">
                <h2 class="text-sm font-bold uppercase tracking-widest text-zinc-400 mb-2"><?= translate('trusted-by-label', 'Trusted By') ?></h2>
                <p class="text-2xl font-headline font-bold text-on-surface"><?= translate('trusted-by-title', 'The Financial Backbone of the Region') ?></p>
            </div>
            <div class="flex-1 grid grid-cols-2 md:grid-cols-4 gap-12 items-center opacity-30 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-700">
                <div class="flex justify-center text-zinc-800 font-black text-2xl uppercase italic">Global Bank</div>
                <div class="flex justify-center text-zinc-800 font-black text-2xl uppercase italic">Secure Asset</div>
                <div class="flex justify-center text-zinc-800 font-black text-2xl uppercase italic">Prime Logic</div>
                <div class="flex justify-center text-zinc-800 font-black text-2xl uppercase italic">Vault Co.</div>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Partners Marquee -->
<section class="py-12 bg-white dark:bg-zinc-950 border-y border-zinc-100 dark:border-zinc-900">
    <div class="partners-marquee">
        <div class="marquee-content">
            <?php 
                // Dynamically scan for partner images
                $partnerFolder = 'assets/img/partners/';
                $partnerImgs = glob($partnerFolder . "*.{jpg,jpeg,png,webp,svg}", GLOB_BRACE);
                
                if (!empty($partnerImgs)) {
                    // Double them for the infinite loop effect
                    $displayImgs = array_merge($partnerImgs, $partnerImgs);
                    foreach($displayImgs as $img): 
            ?>
                <div class="marquee-item px-8">
                    <img src="<?= $img ?>" class="h-16 w-auto grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all duration-500 object-contain" alt="Partner Logo">
                </div>
            <?php 
                    endforeach; 
                } else {
                    // Fallback to text if folder is empty
                    $partners = ['Banque Misr', 'AIB', 'Nestle', 'Pepsi', 'Unilever', 'Telecom Egypt'];
                    foreach(array_merge($partners, $partners) as $p):
            ?>
                <div class="marquee-item px-8">
                    <span class="text-2xl font-black uppercase tracking-tighter opacity-20"><?= $p ?></span>
                </div>
            <?php 
                    endforeach;
                }
            ?>
        </div>
    </div>
</section>

<!-- Section 6: CTA -->
<section class="py-24 px-8 mb-20">
    <div class="max-w-7xl mx-auto brand-gradient rounded-[2.5rem] p-12 md:p-20 text-center text-white relative overflow-hidden shadow-2xl">
        <div class="absolute top-0 right-0 p-12 opacity-10">
            <span class="material-symbols-outlined text-[15rem]" style="font-variation-settings: 'FILL' 1;">shield</span>
        </div>
        <div class="relative z-10 space-y-8">
            <h2 class="text-4xl md:text-6xl font-headline font-extrabold tracking-tight"><?= translate('cta-title', 'Secure Your Business Today') ?></h2>
            <p class="text-xl text-white/80 max-w-2xl mx-auto"><?= translate('cta-desc', 'Partner with FORTRESS Security for the ultimate peace of mind.') ?></p>
            <div class="flex flex-wrap justify-center gap-6 pt-4">
                <a href="index.php?page=contact" class="bg-white text-red-600 px-10 py-5 rounded-xl font-bold text-lg hover:bg-zinc-100 transition-colors shadow-xl">
                    <?= translate('btn-consult', 'Request a Consultation') ?>
                </a>
            </div>
        </div>
    </div>
</section>
