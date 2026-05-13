<!-- Hero Section -->
<section class="relative h-[614px] flex items-center overflow-hidden bg-zinc-900">
    <?php if ($isAdmin): ?>
        <button class="absolute top-24 right-8 z-50 bg-black/50 backdrop-blur border border-white/20 text-white px-4 py-2 rounded-xl flex items-center gap-2 hover:bg-black/70 transition-all cursor-pointer" onclick="(function(e){ e.preventDefault(); e.stopPropagation(); document.querySelector('[imgid=\'services-hero-img\']').dispatchEvent(new MouseEvent('contextmenu', {bubbles: true, clientX: e.clientX, clientY: e.clientY})); })(event)">
            <span class="material-symbols-outlined text-sm">image</span> Edit Image Background
        </button>
    <?php endif; ?>
    <img <?= getImage('services-hero-img') ?> class="absolute inset-0 w-full h-full object-cover opacity-40" alt="Security Hero">
    <div class="absolute inset-0 bg-gradient-to-r from-zinc-900 via-zinc-900/60 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-8 w-full">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-1.5 rounded-full bg-red-600/10 border border-red-600/20 text-red-500 font-bold text-xs tracking-widest uppercase mb-6">
                <?= translate('services-badge', 'Elite Protection Services') ?>
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-[1.3] mb-6 tracking-tighter">
                <?= translate('services-hero-title', 'Architectural <br/><span class="text-transparent bg-clip-text brand-gradient">Vault of Security</span>') ?>
            </h1>
            <p class="text-zinc-300 text-lg leading-relaxed max-w-xl">
                <?= translate('services-hero-desc', 'Merging high-stakes security precision with elite logistical fluidity.') ?>
            </p>
        </div>
    </div>
</section>

<!-- Security Services Section -->
<section class="py-24 bg-surface-container-lowest">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8 border-b border-zinc-100 pb-12">
            <?php if ($lang === 'en'): ?>
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-5xl font-extrabold text-on-surface mb-6"><?= translate('sec-services-title', 'Security Services') ?></h2>
                    <p class="text-tertiary text-lg leading-relaxed"><?= translate('sec-services-desc', 'Advanced protection frameworks managed by elite personnel.') ?></p>
                </div>
            <?php else: ?>
                <div class="w-full text-right" dir="rtl">
                    <h2 class="text-3xl md:text-5xl font-extrabold text-on-surface mb-6 font-headline"><?= translate('sec-services-title-ar', 'خدمات الأمن') ?></h2>
                    <p class="text-tertiary text-lg leading-relaxed"><?= translate('sec-services-desc-ar', 'نخبة الكوادر الأمنية لحماية المنشآت والشخصيات الهامة.') ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Service 1 -->
            <div class="group overflow-hidden rounded-2xl bg-white border border-zinc-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="h-64 relative overflow-hidden">
                    <img <?= getImage('svc-personnel-img') ?> class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Guard">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm p-2 rounded-lg">
                        <span class="material-symbols-outlined text-primary">shield_person</span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-extrabold text-on-surface"><?= translate('svc-1-title', 'Trained Personnel') ?></h3>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('svc-1-desc', 'Our agents undergo rigorous tactical training.') ?></p>
                    <div class="h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
                        <div class="h-full brand-gradient w-12 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>
            </div>
            <!-- Service 2 -->
            <div class="group overflow-hidden rounded-2xl bg-white border border-zinc-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="h-64 relative overflow-hidden">
                    <img <?= getImage('svc-guards-img') ?> class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Guards">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm p-2 rounded-lg">
                        <span class="material-symbols-outlined text-primary">security</span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-extrabold text-on-surface"><?= translate('svc-2-title', 'Armed/Unarmed Guards') ?></h3>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('svc-2-desc', 'Strategic deployment of protection units.') ?></p>
                    <div class="h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
                        <div class="h-full brand-gradient w-12 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>
            </div>
            <!-- Service 3 -->
            <div class="group overflow-hidden rounded-2xl bg-white border border-zinc-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="h-64 relative overflow-hidden">
                    <img <?= getImage('svc-vip-img') ?> class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="VIP">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm p-2 rounded-lg">
                        <span class="material-symbols-outlined text-primary">admin_panel_settings</span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-extrabold text-on-surface"><?= translate('svc-3-title', 'VIP Protection') ?></h3>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('svc-3-desc', 'Discreet protection for executives and diplomats.') ?></p>
                    <div class="h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
                        <div class="h-full brand-gradient w-12 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>
            </div>
            <!-- Service 4 -->
            <div class="group overflow-hidden rounded-2xl bg-white border border-zinc-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="h-64 relative overflow-hidden">
                    <img src="assets/img/services/security_guards.png" <?= getImage('svc-sec-guards-img') ?> class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Security Guards">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm p-2 rounded-lg">
                        <span class="material-symbols-outlined text-primary">security</span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-extrabold text-on-surface"><?= translate('svc-4-title', 'Security Guards') ?></h3>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('svc-4-desc', 'Strategic deployment of static and patrolling units.') ?></p>
                    <div class="h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
                        <div class="h-full brand-gradient w-12 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>
            </div>
            <!-- Service 5 -->
            <div class="group overflow-hidden rounded-2xl bg-white border border-zinc-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="h-64 relative overflow-hidden">
                    <img src="assets/img/services/securing_facilities.png" <?= getImage('svc-facilities-img') ?> class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Securing Facilities">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm p-2 rounded-lg">
                        <span class="material-symbols-outlined text-primary">domain</span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-extrabold text-on-surface"><?= translate('svc-5-title', 'Securing Facilities') ?></h3>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('svc-5-desc', 'Comprehensive perimeter and interior security management.') ?></p>
                    <div class="h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
                        <div class="h-full brand-gradient w-12 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>
            </div>
            <!-- Service 6 -->
            <div class="group overflow-hidden rounded-2xl bg-white border border-zinc-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="h-64 relative overflow-hidden">
                    <img src="assets/img/services/event_security.png" <?= getImage('svc-events-img') ?> class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Event Security">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm p-2 rounded-lg">
                        <span class="material-symbols-outlined text-primary">groups</span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-extrabold text-on-surface"><?= translate('svc-6-title', 'Event Security') ?></h3>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('svc-6-desc', 'Crowd management and access control protocols.') ?></p>
                    <div class="h-1 w-full bg-zinc-100 rounded-full overflow-hidden">
                        <div class="h-full brand-gradient w-12 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cash Section -->
<section class="py-24 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
            <?php if ($lang === 'en'): ?>
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-on-surface mb-4"><?= translate('cash-transit-title', 'Cash in Transit') ?></h2>
                    <p class="text-tertiary text-lg leading-relaxed"><?= translate('cash-transit-desc', 'Secure logistics for high-value assets.') ?></p>
                </div>
            <?php else: ?>
                <div class="w-full text-right" dir="rtl">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-on-surface mb-4 font-headline"><?= translate('cash-transit-title-ar', 'نقل الأموال') ?></h2>
                    <p class="text-tertiary text-lg leading-relaxed"><?= translate('cash-transit-desc-ar', 'حلول لوجستية آمنة لنقل الأصول والمبالغ النقدية.') ?></p>
                </div>
            <?php endif; ?>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Secure Transport -->
            <div class="flex bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-zinc-100">
                <div class="w-1/3 min-h-[240px] relative overflow-hidden hidden sm:block">
                    <img src="assets/img/services/secure_transport.jpg" <?= getImage('cash-svc-1-img') ?> class="absolute inset-0 w-full h-full object-cover" alt="Secure Transport">
                    <div class="absolute inset-0 bg-primary/20 pointer-events-none"></div>
                </div>
                <div class="p-8 flex-1">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="material-symbols-outlined text-primary text-4xl">local_shipping</span>
                        <div>
                            <h3 class="text-xl font-extrabold"><?= translate('cash-svc-1', 'Secure Transport') ?></h3>
                        </div>
                    </div>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('cash-svc-1-desc', 'Armored fleet logistics featuring GPS tracking and biometric authorization.') ?></p>
                </div>
            </div>
            <!-- ATM Services -->
            <div class="flex bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-zinc-100">
                <div class="w-1/3 min-h-[240px] relative overflow-hidden hidden sm:block">
                    <img src="assets/img/services/atm_services.jpg" <?= getImage('cash-svc-2-img') ?> class="absolute inset-0 w-full h-full object-cover" alt="ATM Services">
                    <div class="absolute inset-0 bg-primary/20 pointer-events-none"></div>
                </div>
                <div class="p-8 flex-1">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="material-symbols-outlined text-primary text-4xl">atm</span>
                        <div>
                            <h3 class="text-xl font-extrabold"><?= translate('atm-services', 'ATM Services') ?></h3>
                        </div>
                    </div>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('cash-svc-2-desc', 'Full-cycle ATM management including replenishment and maintenance.') ?></p>
                </div>
            </div>
            <!-- Vault Storage -->
            <div class="flex bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-zinc-100">
                <div class="w-1/3 min-h-[240px] relative overflow-hidden hidden sm:block">
                    <img src="assets/img/services/vault_storage.jpg" <?= getImage('cash-svc-3-img') ?> class="absolute inset-0 w-full h-full object-cover" alt="Vault Storage">
                    <div class="absolute inset-0 bg-primary/20 pointer-events-none"></div>
                </div>
                <div class="p-8 flex-1">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="material-symbols-outlined text-primary text-4xl">lock</span>
                        <div>
                            <h3 class="text-xl font-extrabold"><?= translate('cash-svc-3', 'Vault Storage') ?></h3>
                        </div>
                    </div>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('cash-svc-3-desc', 'Class-leading vaulting facilities with multi-layer monitoring systems.') ?></p>
                </div>
            </div>
            <!-- Cash Handling -->
            <div class="flex bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-zinc-100">
                <div class="w-1/3 min-h-[240px] relative overflow-hidden hidden sm:block">
                    <img src="assets/img/services/cash_handling.jpg" <?= getImage('cash-svc-4-img') ?> class="absolute inset-0 w-full h-full object-cover" alt="Cash Handling">
                    <div class="absolute inset-0 bg-primary/20 pointer-events-none"></div>
                </div>
                <div class="p-8 flex-1">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="material-symbols-outlined text-primary text-4xl">payments</span>
                        <div>
                            <h3 class="text-xl font-extrabold"><?= translate('cash-svc-4', 'Cash Handling') ?></h3>
                        </div>
                    </div>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('cash-svc-4-desc', 'Precision counting, counterfeit detection, and high-speed processing.') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-24 brand-gradient text-white overflow-hidden relative">
    <div class="absolute inset-0 opacity-10">
        <svg height="100%" preserveAspectRatio="none" viewBox="0 0 100 100" width="100%">
            <path d="M0 100 L100 0 L100 100 Z" fill="white"></path>
        </svg>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-8 tracking-tight"><?= translate('services-cta-title', 'Ready to Secure Your Transactions?') ?></h2>
        <p class="text-white/80 text-lg mb-12 max-w-2xl mx-auto"><?= translate('services-cta-desc', 'Contact our strategic advisors to develop a custom security and cash management framework tailored to your risk profile.') ?></p>
        <div class="flex flex-wrap justify-center gap-6">
            <button class="bg-white text-primary px-10 py-4 rounded-xl font-bold shadow-2xl hover:scale-105 transition-transform">
                <?= translate('cta-btn-1', 'REQUEST STRATEGY SESSION') ?>
            </button>
            <button class="border border-white/40 hover:bg-white/10 px-10 py-4 rounded-xl font-bold transition-all">
                <?= translate('cta-btn-2', 'DOWNLOAD SERVICE CATALOG') ?>
            </button>
        </div>
    </div>
</section>
