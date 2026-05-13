<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="mb-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-end">
                <div class="space-y-8 <?= $lang === 'ar' ? 'text-right' : '' ?>" <?= $lang === 'ar' ? 'dir="rtl"' : '' ?>>
                    <div class="inline-block px-4 py-1 bg-surface-container-high rounded-full">
                        <span class="text-[0.65rem] font-bold tracking-[0.2em] uppercase text-tertiary"><?= translate('clients-ecosystem', 'Our Ecosystem') ?></span>
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-extrabold leading-[1.5] tracking-tighter <?= $lang === 'ar' ? 'font-headline' : '' ?>">
                        <?php if ($lang === 'en'): ?>
                            <?= translate('clients-hero-title', 'The Trust of <br/><span class="text-transparent bg-clip-text brand-gradient">Industry Leaders.</span>') ?>
                        <?php else: ?>
                            <?= translate('clients-hero-title-ar', 'ثقة <br/><span class="text-transparent bg-clip-text brand-gradient">رواد الصناعة.</span>') ?>
                        <?php endif; ?>
                    </h1>
                </div>
                <div class="space-y-6 <?= $lang === 'ar' ? 'border-r pr-8 text-right' : 'border-l pl-8' ?> border-outline-variant/30 pb-2" <?= $lang === 'ar' ? 'dir="rtl"' : '' ?>>
                    <p class="text-lg text-tertiary leading-relaxed font-body">
                        <?php if ($lang === 'en'): ?>
                            <?= translate('clients-hero-desc', 'We build long-term relationships through unwavering integrity and operational excellence. Our clients aren\'t just partners; they are the foundation of our shared security infrastructure.') ?>
                        <?php else: ?>
                            <?= translate('clients-hero-desc-ar', 'نحن نبني علاقات طويلة الأمد من خلال النزاهة الراسخة والتميز التشغيلي. عملاؤنا ليسوا مجرد شركاء؛ بل هم الأساس لبنيتنا التحتية الأمنية المشتركة.') ?>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="pt-24 border-t border-zinc-100 dark:border-zinc-900">
            <h3 class="text-sm font-bold text-zinc-400 uppercase tracking-[0.3em] mb-12 text-center"><?= translate('roster-label', 'Strategic Alliances') ?></h3>
            
            <div class="partners-grid-wrapper">
                <div class="partners-grid" id="partners-grid">
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
                        $orderFile = $partnerFolder . 'order.json';
                        
                        if (!empty($partnerImgs)) {
                            // Sort based on order.json if it exists
                            if (file_exists($orderFile)) {
                                $order = json_decode(file_get_contents($orderFile), true);
                                if (is_array($order)) {
                                    usort($partnerImgs, function($a, $b) use ($order) {
                                        $posA = array_search(basename($a), $order);
                                        $posB = array_search(basename($b), $order);
                                        if ($posA === false) $posA = 999;
                                        if ($posB === false) $posB = 999;
                                        return $posA <=> $posB;
                                    });
                                }
                            }

                            foreach($partnerImgs as $img): 
                                $basename = basename($img);
                    ?>
                        <div class="partner-card group relative" data-filename="<?= $basename ?>">
                            <?php if ($isAdmin): ?>
                                <button class="delete-partner-btn absolute top-2 right-2 p-1 bg-red-600 text-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity z-20 hover:scale-110" data-filename="<?= $basename ?>">
                                    <span class="material-symbols-outlined text-sm">close</span>
                                </button>
                            <?php endif; ?>
                            <img src="<?= $img ?>" class="max-h-full max-w-full object-contain grayscale opacity-30 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 cursor-move" alt="Partner Logo">
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

<?php if ($isAdmin): ?>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var el = document.getElementById('partners-grid');
        if (el) {
            Sortable.create(el, {
                animation: 150,
                draggable: ".partner-card",
                filter: "#add-partner-trigger", // don't make the add button draggable
                onEnd: function (evt) {
                    var items = el.querySelectorAll('.partner-card');
                    var newOrder = [];
                    items.forEach(function(item) {
                        if (item.id !== 'add-partner-trigger') {
                            var filename = item.getAttribute('data-filename');
                            if(filename) newOrder.push(filename);
                        }
                    });

                    fetch('/update_partner_order.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ order: newOrder })
                    }).then(res => res.json()).then(data => {
                        if(!data.success) {
                            console.error('Failed to update order');
                            alert('Could not save the new order.');
                        }
                    }).catch(err => {
                        console.error('Error updating order', err);
                    });
                }
            });
        }
    });
</script>
<?php endif; ?>
