</main>

<!-- Footer -->
<footer class="bg-zinc-50 dark:bg-zinc-900 w-full py-10 px-8 mt-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto items-center">
        <!-- Brand Logo Column -->
        <div class="flex justify-start">
            <img <?= getImage('footer-logo') ?> class="h-[18rem] w-auto object-contain" alt="Super Speed Logo">
        </div>
        
        <!-- Info Column -->
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-4">
                <h4 class="text-xs font-bold uppercase text-zinc-400 tracking-widest"><?= translate('nav-header', 'Navigation') ?></h4>
                <div class="space-y-2">
                    <a class="block text-sm text-zinc-500 hover:text-red-500 transition-all font-medium" href="<?= url('home') ?>"><?= translate('nav-home', 'Home') ?></a>
                    <a class="block text-sm text-zinc-500 hover:text-red-500 transition-all font-medium" href="<?= url('about') ?>"><?= translate('nav-about', 'About Us') ?></a>
                    <a class="block text-sm text-zinc-500 hover:text-red-500 transition-all font-medium" href="<?= url('services') ?>"><?= translate('nav-services', 'Services') ?></a>
                    <a class="block text-sm text-zinc-500 hover:text-red-500 transition-all font-medium" href="<?= url('clients') ?>"><?= translate('nav-clients', 'Clients') ?></a>
                    <a class="block text-sm text-zinc-500 hover:text-red-500 transition-all font-medium" href="<?= url('contact') ?>"><?= translate('nav-contact', 'Contact Us') ?></a>
                </div>
            </div>

            <div class="space-y-4">
                <h4 class="text-xs font-bold uppercase text-zinc-400 tracking-widest"><?= translate('hq-header', 'Global Headquarters') ?></h4>
                <p class="text-sm text-zinc-500 leading-relaxed italic">
                    <?= translate('hq-address', '1105 Almas Tower, JLT Dubai, United Arab Emirates') ?>
                </p>
                <div class="pt-2">
                    <a href="https://wa.me/201033722549" target="_blank" class="flex items-center gap-2 text-zinc-400 hover:text-[#25D366] transition-all group">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <span class="text-sm font-bold tracking-wider font-body">+201033722549</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto mt-12 pt-8 border-t border-zinc-200 dark:border-zinc-800 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-sm text-zinc-500 italic">
            &copy; 2024 Super Speed. <?= translate('footer-rights', 'All rights reserved.') ?>
        </p>
        <div class="flex gap-6">
            <a class="text-xs text-zinc-400 hover:text-red-800 transition-colors" href="#"><?= translate('nav-careers', 'Careers') ?></a>
            <a class="text-xs text-zinc-400 hover:text-red-800 transition-colors" href="#"><?= translate('nav-protocol', 'Emergency Protocol') ?></a>
        </div>
    </div>
</footer>

<?php if ($isAdmin): ?>
    <!-- Admin Editor Scripts -->
    <script src="assets/js/admin.js"></script>
<?php endif; ?>

</body>
</html>
