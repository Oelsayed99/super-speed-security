<section class="py-24 bg-surface min-h-[80vh] flex flex-col justify-center">
    <div class="max-w-7xl mx-auto px-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <div>
                <?php if ($lang === 'en'): ?>
                    <h1 class="text-6xl md:text-8xl font-extrabold text-on-surface mb-8 tracking-tighter">
                        <?= translate('contact-title', 'Secure Your Perimeter.') ?>
                    </h1>
                <?php else: ?>
                    <h1 class="text-4xl md:text-6xl font-bold text-on-surface mb-8 font-headline" dir="rtl">
                        <?= translate('contact-title-ar', 'اتصل بنا للحصول على الأمان') ?>
                    </h1>
                <?php endif; ?>
                <p class="text-xl text-zinc-600 mb-12 leading-relaxed">
                    <?= translate('contact-desc', 'Our elite tactical response teams are standing by 24/7.') ?>
                </p>

                <div class="space-y-8">
                    <div class="flex items-start gap-6">
                        <div class="w-12 h-12 rounded-xl bg-red-600/5 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">location_on</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm uppercase tracking-widest text-zinc-400 mb-1"><?= translate('contact-hq-label', 'Global Headquarters') ?></h4>
                            <p class="text-zinc-700"><?= translate('contact-hq-val', '1104 Almas Tower, JLT Dubai') ?></p>
                        </div>
                    </div>
                    <div class="flex items-start gap-6">
                        <div class="w-12 h-12 rounded-xl bg-red-600/5 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">phone</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm uppercase tracking-widest text-zinc-400 mb-1"><?= translate('contact-tel-label', 'Tactical Support') ?></h4>
                            <p class="text-zinc-700 font-bold"><?= translate('contact-tel-val', '+971 4 555 0199') ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-12 rounded-[2.5rem] shadow-2xl border border-zinc-50 flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 brand-gradient opacity-10 blur-3xl"></div>
                <div class="relative z-10 space-y-8">
                    <h3 class="text-3xl font-bold text-on-surface italic">
                        <?= $lang === 'en' ? translate('contact-form-title', 'Initiate Inquiry') : translate('contact-form-ar', 'ارسل لنا رسالة وسنقوم بالرد فوراً') ?>
                    </h3>
                    
                    <div class="p-8 bg-zinc-50 rounded-2xl border border-dashed border-zinc-200 text-center">
                        <span class="material-symbols-outlined text-zinc-300 text-6xl mb-4">mail</span>
                        <p class="text-zinc-400 text-sm italic"><?= translate('contact-form-placeholder', 'Secure messaging portal encrypted. Please contact ops directly for tactical emergencies.') ?></p>
                    </div>

                    <a href="mailto:ops@fortress.editorial" class="brand-gradient w-full py-5 rounded-2xl text-white font-bold text-center block shadow-lg hover:scale-105 transition-all">
                        <?= translate('btn-send-inquiry', 'SEND SECURE MESSAGE') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
