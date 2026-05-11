<!DOCTYPE html>
<html class="light" lang="<?= $lang ?>" dir="<?= $lang === 'ar' ? 'rtl' : 'ltr' ?>">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= translate('site-title', 'Super Speed | Security & Logistics') ?></title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&family=Noto+Kufi+Arabic:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Tailwind CSS (via CDN) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-background": "#1a1c1c",
                        "surface-tint": "#c0000f",
                        "tertiary": "#5c5c5c",
                        "primary-fixed-dim": "#ffb4aa",
                        "surface-container-lowest": "#ffffff",
                        "secondary-container": "#ff8937",
                        "on-tertiary-container": "#fefcfb",
                        "primary": "#bb000f",
                        "surface-container-high": "#e8e8e8",
                        "on-primary-container": "#fffbff",
                        "outline": "#926e6a",
                        "on-error": "#ffffff",
                        "secondary-fixed-dim": "#ffb68b",
                        "inverse-primary": "#ffb4aa",
                        "on-secondary-container": "#672d00",
                        "surface-container-highest": "#e2e2e2",
                        "tertiary-fixed-dim": "#c8c6c6",
                        "on-secondary": "#ffffff",
                        "on-secondary-fixed-variant": "#753400",
                        "on-tertiary-fixed-variant": "#474747",
                        "surface-dim": "#dadada",
                        "surface": "#f9f9f9",
                        "surface-bright": "#f9f9f9",
                        "error": "#ba1a1a",
                        "error-container": "#ffdad6",
                        "on-surface": "#1a1c1c",
                        "on-tertiary-fixed": "#1b1c1c",
                        "secondary": "#994600",
                        "on-secondary-fixed": "#321200",
                        "surface-container-low": "#f3f3f3",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#757474",
                        "on-primary-fixed": "#410002",
                        "surface-container": "#eeeeee",
                        "tertiary-fixed": "#e4e2e1",
                        "inverse-surface": "#2f3131",
                        "secondary-fixed": "#ffdbc9",
                        "inverse-on-surface": "#f1f1f1",
                        "on-surface-variant": "#5e3f3b",
                        "primary-fixed": "#ffdad5",
                        "background": "#f9f9f9",
                        "primary-container": "#e51b1e",
                        "on-error-container": "#93000a",
                        "on-primary": "#ffffff",
                        "outline-variant": "#e8bcb7",
                        "on-primary-fixed-variant": "#930009",
                        "surface-variant": "#e2e2e2"
                    },
                    "fontFamily": {
                        "headline": <?= $lang === 'ar' ? '["Noto Kufi Arabic", "sans-serif"]' : '["Manrope", "sans-serif"]' ?>,
                        "body": <?= $lang === 'ar' ? '["Noto Kufi Arabic", "sans-serif"]' : '["Inter", "sans-serif"]' ?>
                    }
                },
            },
        }
    </script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css?v=2.2">
</head>
<body class="bg-surface font-body text-on-surface antialiased">

<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-white/95 dark:bg-zinc-950/95 backdrop-blur-md shadow-sm border-b border-zinc-100">
    <div class="flex justify-between items-center max-w-7xl mx-auto px-8 h-[6rem]">
        <div class="flex items-center">
            <img <?= getImage('site-logo') ?> class="h-[10rem] w-auto object-contain" alt="Super Speed Logo">
        </div>
        
        <div class="hidden md:flex items-center gap-12">
            <a class="<?= $page === 'home' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('home') ?>"><?= translate('nav-home', 'Home') ?></a>
            <a class="<?= $page === 'about' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('about') ?>"><?= translate('nav-about', 'About Us') ?></a>
            <a class="<?= $page === 'services' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('services') ?>"><?= translate('nav-services', 'Services') ?></a>
            <a class="<?= $page === 'clients' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('clients') ?>"><?= translate('nav-clients', 'Clients') ?></a>
            <a class="<?= $page === 'contact' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('contact') ?>"><?= translate('nav-contact', 'Contact Us') ?></a>
        </div>
        
        <div class="flex items-center gap-6">
            <div class="flex gap-2 text-xs font-bold uppercase tracking-widest bg-zinc-100 p-1 px-3 rounded-full">
                <a href="?page=<?= $page ?>&lang=en<?= $isAdmin ? '&admin=1' : '' ?>" class="<?= $lang === 'en' ? 'text-red-600' : 'text-zinc-400 hover:text-zinc-600' ?>">EN</a>
                <span class="text-zinc-300">|</span>
                <a href="?page=<?= $page ?>&lang=ar<?= $isAdmin ? '&admin=1' : '' ?>" class="<?= $lang === 'ar' ? 'text-red-600' : 'text-zinc-400 hover:text-zinc-600' ?>">AR</a>
            </div>
            
            <?php if ($isAdmin): ?>
                <span class="bg-red-600 text-white text-[10px] px-2 py-0.5 rounded font-bold">EDITOR</span>
            <?php endif; ?>

            <button id="mobile-menu-btn" class="md:hidden text-on-surface hover:text-red-600 transition-colors">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Container -->
    <div id="mobile-menu" class="hidden md:hidden relative inset-0 z-[60] animate-fade-in" style="background-color: white !important;">
        <div class="flex flex-col h-full p-8 pt-24 space-y-8 bg-zinc-100">
            <button id="mobile-menu-close" class="absolute top-8 right-8 text-on-surface hover:text-red-600">
                <span class="material-symbols-outlined text-4xl">close</span>
            </button>

            <div class="flex flex-col space-y-6 text-center">
                <a class="text-3xl font-headline font-extrabold <?= $page === 'home' ? 'text-red-600' : 'text-zinc-800 dark:text-zinc-200' ?>" href="<?= url('home') ?>"><?= translate('nav-home', 'Home') ?></a>
                <a class="text-3xl font-headline font-extrabold <?= $page === 'about' ? 'text-red-600' : 'text-zinc-800 dark:text-zinc-200' ?>" href="<?= url('about') ?>"><?= translate('nav-about', 'About Us') ?></a>
                <a class="text-3xl font-headline font-extrabold <?= $page === 'services' ? 'text-red-600' : 'text-zinc-800 dark:text-zinc-200' ?>" href="<?= url('services') ?>"><?= translate('nav-services', 'Services') ?></a>
                <a class="text-3xl font-headline font-extrabold <?= $page === 'clients' ? 'text-red-600' : 'text-zinc-800 dark:text-zinc-200' ?>" href="<?= url('clients') ?>"><?= translate('nav-clients', 'Clients') ?></a>
                <a class="text-3xl font-headline font-extrabold <?= $page === 'contact' ? 'text-red-600' : 'text-zinc-800 dark:text-zinc-200' ?>" href="<?= url('contact') ?>"><?= translate('nav-contact', 'Contact Us') ?></a>
            </div>

            <div class="pt-12 flex justify-center gap-8">
                <div class="flex gap-4 text-sm font-bold uppercase tracking-widest bg-zinc-100 p-2 px-6 rounded-full">
                    <a href="?page=<?= $page ?>&lang=en<?= $isAdmin ? '&admin=1' : '' ?>" class="<?= $lang === 'en' ? 'text-red-600' : 'text-zinc-400' ?>">English</a>
                    <span class="text-zinc-300">|</span>
                    <a href="?page=<?= $page ?>&lang=ar<?= $isAdmin ? '&admin=1' : '' ?>" class="<?= $lang === 'ar' ? 'text-red-600' : 'text-zinc-400' ?>">العربية</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const close = document.getElementById('mobile-menu-close');

        if (btn && menu && close) {
            btn.addEventListener('click', () => {
                menu.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });

            close.addEventListener('click', () => {
                menu.classList.add('hidden');
                document.body.style.overflow = '';
            });

            // Close on link click
            menu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                    document.body.style.overflow = '';
                });
            });
        }
    });
</script>

<main class="<?= $page === 'home' ? '' : 'pt-[6rem]' ?>">
