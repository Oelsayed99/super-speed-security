<!-- Hero Section -->
<section class="relative min-h-[614px] flex items-center overflow-hidden bg-zinc-950">
    <?php if ($isAdmin): ?>
        <button class="absolute top-24 right-8 z-50 bg-black/50 backdrop-blur border border-white/20 text-white px-4 py-2 rounded-xl flex items-center gap-2 hover:bg-black/70 transition-all cursor-pointer" onclick="(function(e){ e.preventDefault(); e.stopPropagation(); document.querySelector('[imgid=\'about-hero-img\']').dispatchEvent(new MouseEvent('contextmenu', {bubbles: true, clientX: e.clientX, clientY: e.clientY})); })(event)">
            <span class="material-symbols-outlined text-sm">image</span> Edit Image Background
        </button>
    <?php endif; ?>
    <div class="absolute inset-0 opacity-40">
        <img alt="Security Detail" class="w-full h-full object-cover" <?= getImage('about-hero-img') ?>/>
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-zinc-950 via-zinc-950/60 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-8 w-full py-20">
        <div class="max-w-2xl">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary-container text-xs font-bold uppercase tracking-widest mb-6"><?= translate('about-hero-badge', 'Established Authority') ?></span>
            <h1 class="font-headline text-5xl md:text-7xl font-extrabold text-white leading-tight tracking-tighter mb-6">
                <?= translate('about-hero-title', 'Architects of <br/><span class="text-primary-container">Absolute Security.</span>') ?>
            </h1>
            <p class="text-zinc-400 text-lg md:text-xl leading-relaxed font-light">
                <?= translate('about-hero-desc', 'Specialized logistics and security services engineered for the most demanding high-stakes environments. Precision in movement, integrity in protection.') ?>
            </p>
        </div>
    </div>
</section>

<!-- Company Overview Bento Grid -->
<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="bg-surface-container-lowest p-12 rounded-xl shadow-sm">
            <h2 class="font-headline text-3xl font-bold text-on-surface mb-8"><?= translate('about-overview-title', 'Company Overview') ?></h2>
            <div class="space-y-6 text-on-surface/80 leading-relaxed text-lg">
                <p><?= translate('about-overview-p1', 'Superspeed is a firm specialized in security and logistics, offering bespoke solutions that integrate cutting-edge technology with rigorous operational protocols. We pride ourselves on our architectural approach to security—building systems that are both resilient and adaptable.') ?></p>
                <p><?= translate('about-overview-p2', 'Our expertise spans Cash-In-Transit (CIT) services, secure facility management, and executive protection, ensuring that every asset entrusted to us is moved and managed with "Super Speed" and surgical precision.') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Mission Statement -->
<section class="py-24 bg-surface-container-low overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-8 relative z-10">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2">
                <div class="brand-gradient p-[1px] rounded-xl overflow-hidden">
                    <div class="bg-surface-container-lowest p-12 rounded-[calc(0.75rem-1px)]">
                        <span class="material-symbols-outlined text-primary text-5xl mb-6" data-icon="shield_with_heart">shield_with_heart</span>
                        <h3 class="font-headline text-4xl font-bold text-on-surface mb-6"><?= translate('about-mission-title', 'Our Mission') ?></h3>
                        <p class="text-xl text-on-surface/70 leading-relaxed italic">
                            <?= translate('about-mission-desc', '"To provide reliable security solutions and build strong client relationships through unwavering integrity and superior operational excellence."') ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <img alt="Mission Focus" class="rounded-xl shadow-2xl grayscale hover:grayscale-0 transition-all duration-700" <?= getImage('about-mission-img') ?>/>
            </div>
        </div>
    </div>
</section>

<!-- Goals Grid -->
<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="mb-16 text-center max-w-3xl mx-auto">
            <h2 class="font-headline text-4xl font-extrabold text-on-surface mb-4"><?= translate('about-goals-title', 'Strategic Goals') ?></h2>
            <p class="text-on-surface/60"><?= translate('about-goals-subtitle', 'Guided by precision, fueled by trust.') ?></p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Goal 1 -->
            <div class="group p-8 rounded-xl bg-surface-container-lowest border-b-4 border-transparent hover:border-primary transition-all duration-300">
                <div class="w-12 h-12 flex items-center justify-center bg-surface-container-high rounded-lg mb-6 group-hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined text-primary" data-icon="handshake">handshake</span>
                </div>
                <h4 class="font-headline font-bold text-xl mb-2"><?= translate('goal-1-title', 'Long-term partnerships') ?></h4>
                <p class="text-sm text-on-surface/60 mb-4"><?= translate('goal-1-desc', 'Building enduring bonds with our stakeholders.') ?></p>
            </div>
            <!-- Goal 2 -->
            <div class="group p-8 rounded-xl bg-surface-container-lowest border-b-4 border-transparent hover:border-primary transition-all duration-300">
                <div class="w-12 h-12 flex items-center justify-center bg-surface-container-high rounded-lg mb-6 group-hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined text-primary" data-icon="verified">verified</span>
                </div>
                <h4 class="font-headline font-bold text-xl mb-2"><?= translate('goal-2-title', 'High-quality service') ?></h4>
                <p class="text-sm text-on-surface/60 mb-4"><?= translate('goal-2-desc', 'Maintaining gold-standard operational rigor.') ?></p>
            </div>
            <!-- Goal 3 -->
            <div class="group p-8 rounded-xl bg-surface-container-lowest border-b-4 border-transparent hover:border-primary transition-all duration-300">
                <div class="w-12 h-12 flex items-center justify-center bg-surface-container-high rounded-lg mb-6 group-hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined text-primary" data-icon="mood">mood</span>
                </div>
                <h4 class="font-headline font-bold text-xl mb-2"><?= translate('goal-3-title', 'Customer satisfaction') ?></h4>
                <p class="text-sm text-on-surface/60 mb-4"><?= translate('goal-3-desc', 'Exceeding expectations in every mission.') ?></p>
            </div>
            <!-- Goal 4 -->
            <div class="group p-8 rounded-xl bg-surface-container-lowest border-b-4 border-transparent hover:border-primary transition-all duration-300">
                <div class="w-12 h-12 flex items-center justify-center bg-surface-container-high rounded-lg mb-6 group-hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined text-primary" data-icon="lock">lock</span>
                </div>
                <h4 class="font-headline font-bold text-xl mb-2"><?= translate('goal-4-title', 'Trust and reliability') ?></h4>
                <p class="text-sm text-on-surface/60 mb-4"><?= translate('goal-4-desc', 'The cornerstone of our professional identity.') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-zinc-950 relative overflow-hidden">
    <div class="absolute right-0 top-0 w-1/3 h-full opacity-10">
        <span class="material-symbols-outlined text-[30rem] text-white select-none" data-icon="security" style="font-variation-settings: 'FILL' 1;">security</span>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10">
        <div class="max-w-3xl">
            <h2 class="font-headline text-4xl font-bold text-white mb-8"><?= translate('about-cta-title', 'Ready to secure your operations with Super Speed?') ?></h2>
            <div class="flex flex-wrap gap-4">
                <a href="<?= url('services') ?>" class="brand-gradient px-8 py-4 rounded-md text-white font-bold text-sm tracking-wide uppercase hover:scale-105 transition-transform flex items-center gap-2">
                    <?= translate('about-cta-btn-1', 'Our Services') ?> <span class="material-symbols-outlined text-sm" data-icon="arrow_forward">arrow_forward</span>
                </a>
                <a href="<?= url('contact') ?>" class="border border-white/20 px-8 py-4 rounded-md text-white font-bold text-sm tracking-wide uppercase hover:bg-white/10 transition-colors">
                    <?= translate('about-cta-btn-2', 'Contact Us') ?>
                </a>
            </div>
        </div>
    </div>
</section>
