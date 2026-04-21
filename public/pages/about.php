<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="max-w-3xl mb-16">
            <span class="text-sm font-bold uppercase tracking-[0.2em] text-red-600 mb-4 block"><?= translate('about-badge', 'Established Excellence') ?></span>
            <?php if ($lang === 'en'): ?>
                <h1 class="text-5xl md:text-7xl font-extrabold text-on-surface leading-tight mb-8">
                    <?= translate('about-title', 'Redefining Protection.') ?>
                </h1>
            <?php else: ?>
                <h1 class="text-4xl md:text-6xl font-bold text-on-surface mb-8 font-headline" dir="rtl">
                    <?= translate('about-title-ar', 'نحن نعيد تعريف الحماية') ?>
                </h1>
            <?php endif; ?>
            <p class="text-2xl text-zinc-600 leading-relaxed italic">
                <?= translate('about-quote', '"In an era of evolving threats, FORTRESS stands as a monolithic guardian."') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="space-y-12">
                <div class="space-y-6">
                    <h3 class="text-sm font-bold uppercase tracking-widest text-zinc-400"><?= translate('about-ov-label', 'Company Overview') ?></h3>
                    <p class="text-lg text-zinc-600 leading-relaxed">
                        <?= translate('about-ov-desc', 'FORTRESS is a premier editorial-level security firm headquartered in the financial district.') ?>
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="p-8 bg-zinc-50 rounded-2xl border border-zinc-100">
                        <span class="material-symbols-outlined text-primary mb-4">gavel</span>
                        <h4 class="font-bold text-lg mb-2"><?= translate('value-1-title', 'Uncompromising Integrity') ?></h4>
                        <p class="text-sm text-zinc-500"><?= translate('value-1-desc', 'Deeply embedded in our tactical DNA.') ?></p>
                    </div>
                    <div class="p-8 bg-zinc-50 rounded-2xl border border-zinc-100">
                        <span class="material-symbols-outlined text-primary mb-4">bolt</span>
                        <h4 class="font-bold text-lg mb-2"><?= translate('value-2-title', 'Rapid Response') ?></h4>
                        <p class="text-sm text-zinc-500"><?= translate('value-2-desc', 'Kinetic deployment at scale.') ?></p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="aspect-[4/5] rounded-[3rem] overflow-hidden shadow-2xl">
                    <img <?= getImage('about-img') ?> class="w-full h-full object-cover" alt="Headquarters">
                </div>
                <div class="absolute -top-10 -right-10 w-40 h-40 brand-gradient rounded-full opacity-10 blur-3xl"></div>
            </div>
        </div>
    </div>
</section>

<!-- Directives -->
<section class="py-24 bg-zinc-900 text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-8 relative">
        <div class="mb-20">
            <h2 class="text-4xl font-extrabold mb-4">
                <?= $lang === 'en' ? translate('directives-title', 'Our Core Directives') : translate('directives-title-ar', 'توجهاتنا الأساسية') ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="space-y-6">
                <div class="w-12 h-1 brand-gradient"></div>
                <h4 class="text-xl font-bold uppercase tracking-widest"><?= translate('dir-1-title', 'Our Mission') ?></h4>
                <p class="text-zinc-400 leading-relaxed italic"><?= translate('dir-1-desc', 'To create invisible layers of absolute security.') ?></p>
            </div>
            <div class="space-y-6">
                <div class="w-12 h-1 bg-zinc-700"></div>
                <h4 class="text-xl font-bold uppercase tracking-widest"><?= translate('dir-2-title', 'Strategic Precision') ?></h4>
                <p class="text-zinc-400 leading-relaxed"><?= translate('dir-2-desc', 'Anticipating threats before they manifest.') ?></p>
            </div>
            <div class="space-y-6">
                <div class="w-12 h-1 bg-zinc-700"></div>
                <h4 class="text-xl font-bold uppercase tracking-widest"><?= translate('dir-3-title', 'Technological Superiority') ?></h4>
                <p class="text-zinc-400 leading-relaxed"><?= translate('dir-3-desc', 'Integrating neural-network defense systems.') ?></p>
            </div>
        </div>
    </div>
</section>
