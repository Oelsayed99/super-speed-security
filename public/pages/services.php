<!-- Hero Section -->
<section class="relative h-[614px] flex items-center overflow-hidden bg-zinc-900">
    <img <?= getImage('services-hero-img') ?> class="absolute inset-0 w-full h-full object-cover opacity-40" alt="Security Hero">
    <div class="absolute inset-0 bg-gradient-to-r from-zinc-900 via-zinc-900/60 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-8 w-full">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-1.5 rounded-full bg-red-600/10 border border-red-600/20 text-red-500 font-bold text-xs tracking-widest uppercase mb-6">
                <?= translate('services-badge', 'Elite Protection Services') ?>
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-[1.1] mb-6 tracking-tighter">
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
                    <h3 class="text-xl font-extrabold text-on-surface"><?= $lang === 'en' ? translate('svc-1-title', 'Trained Personnel') : translate('svc-1-ar', 'كوادر مدربة') ?></h3>
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
                    <h3 class="text-sm font-bold opacity-30 font-headline mb-4" dir="rtl"><?= translate('svc-2-ar', 'حراس أمن مسلحين') ?></h3>
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
                    <h3 class="text-sm font-bold opacity-30 font-headline mb-4" dir="rtl"><?= translate('svc-3-ar', 'حماية كبار الشخصيات') ?></h3>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('svc-3-desc', 'Discreet protection for executives and diplomats.') ?></p>
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
            <div class="flex bg-white rounded-xl overflow-hidden shadow-sm border border-zinc-100">
                <div class="p-10 flex-1">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="material-symbols-outlined text-primary">local_shipping</span>
                        <h3 class="text-lg font-extrabold"><?= translate('cash-svc-1', 'Secure Transport') ?></h3>
                    </div>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('cash-svc-1-desc', 'GPS tracking and biometric authorization.') ?></p>
                </div>
            </div>
            <div class="flex bg-white rounded-xl overflow-hidden shadow-sm border border-zinc-100">
                <div class="p-10 flex-1">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="material-symbols-outlined text-primary">atm</span>
                        <h3 class="text-lg font-extrabold"><?= translate('cash-svc-2', 'Asset Management') ?></h3>
                    </div>
                    <p class="text-tertiary text-sm leading-relaxed mb-6"><?= translate('cash-svc-2-desc', 'Full-cycle ATM and vault management.') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
