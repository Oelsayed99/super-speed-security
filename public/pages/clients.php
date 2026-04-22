<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="mb-24">
            <?php if ($lang === 'en'): ?>
                <h1 class="text-5xl md:text-7xl font-extrabold text-on-surface mb-8">
                    <?= translate('clients-title', 'Fortifying Global Leaders.') ?>
                </h1>
            <?php else: ?>
                <h1 class="text-4xl md:text-6xl font-bold text-on-surface mb-8 font-headline" dir="rtl">
                    <?= translate('clients-title-ar', 'تحصين رواد العالم') ?>
                </h1>
            <?php endif; ?>
            <p class="text-xl text-zinc-600 max-w-2xl leading-relaxed">
                <?= translate('clients-desc', 'Trusted by multinational corporations to provide uncompromising security and lightning-fast tactical responses.') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mb-24">
            <!-- Testimonial 1 -->
            <div class="p-10 bg-white rounded-3xl shadow-sm border border-zinc-50 relative group hover:shadow-xl transition-all">
                <span class="material-symbols-outlined text-red-100 text-6xl absolute top-8 right-8">format_quote</span>
                <p class="text-lg text-zinc-700 leading-relaxed mb-8 relative z-10 italic">
                    <?= translate('test-1-text', '"Fortress provides a level of certainty that is essential for our global operations."') ?>
                </p>
                <div class="relative z-10">
                    <h4 class="font-bold text-on-surface"><?= translate('test-1-name', 'Alexander Sterling') ?></h4>
                    <p class="text-sm text-zinc-400 font-medium uppercase tracking-widest"><?= translate('test-1-pos', 'CSO, Global FinTech') ?></p>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="p-10 bg-zinc-900 text-white rounded-3xl shadow-xl relative group">
                <span class="material-symbols-outlined text-zinc-800 text-6xl absolute top-8 right-8">format_quote</span>
                <p class="text-lg text-zinc-300 leading-relaxed mb-8 relative z-10 italic">
                    <?= translate('test-2-text', '"The transition was seamless. Their tactical response time is unmatched in the Middle East."') ?>
                </p>
                <div class="relative z-10">
                    <h4 class="font-bold text-white"><?= translate('test-2-name', 'Hassan Al-Mansoori') ?></h4>
                    <p class="text-sm text-zinc-500 font-medium uppercase tracking-widest"><?= translate('test-2-pos', 'Director, AD Logistics') ?></p>
                </div>
            </div>
        </div>

        <div class="pt-24 border-t border-zinc-100 dark:border-zinc-900">
            <h3 class="text-sm font-bold text-zinc-400 uppercase tracking-[0.3em] mb-12 text-center"><?= translate('roster-label', 'Strategic Alliances') ?></h3>
            
            <div class="partners-grid-wrapper">
                <div class="partners-grid">
                    <?php if ($isAdmin): ?>
                        <!-- Add Partner Card -->
                        <div class="partner-card group border-dashed border-2 border-red-200 cursor-pointer hover:border-red-500 bg-red-50/10" id="add-partner-trigger">
                            <div class="flex flex-col items-center gap-2 text-red-400 group-hover:text-red-600 transition-all">
                                <span class="material-symbols-outlined text-4xl">add_circle</span>
                                <span class="text-[10px] font-bold uppercase tracking-widest">Add Partner</span>
                            </div>
                            <input type="file" id="partner-upload-input" class="hidden" accept="image/*">
                        </div>
                    <?php endif; ?>

                    <?php 
                        $partnerFolder = 'assets/img/partners/';
                        $partnerImgs = glob($partnerFolder . "*.{jpg,jpeg,png,webp,svg}", GLOB_BRACE);
                        
                        if (!empty($partnerImgs)) {
                            foreach($partnerImgs as $img): 
                                $basename = basename($img);
                    ?>
                        <div class="partner-card group relative">
                            <?php if ($isAdmin): ?>
                                <button class="delete-partner-btn absolute top-2 right-2 p-1 bg-red-600 text-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity z-20 hover:scale-110" data-filename="<?= $basename ?>">
                                    <span class="material-symbols-outlined text-sm">close</span>
                                </button>
                            <?php endif; ?>
                            <img src="<?= $img ?>" class="max-h-full max-w-full object-contain grayscale opacity-30 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500" alt="Partner Logo">
                        </div>
                    <?php 
                            endforeach; 
                        } else if (!$isAdmin) {
                            // Fallback if no images found
                            $allPartners = ['Banque Misr', 'AIB', 'Nestle', 'Pepsi', 'Unilever'];
                            foreach($allPartners as $p): 
                    ?>
                        <div class="partner-card group">
                            <span class="text-xl font-black uppercase tracking-tighter opacity-20"><?= $p ?></span>
                        </div>
                    <?php 
                            endforeach; 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
