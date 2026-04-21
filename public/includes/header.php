<!DOCTYPE html>
<html class="light" lang="<?= $lang ?>" dir="<?= $lang === 'ar' ? 'rtl' : 'ltr' ?>">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= translate('site-title', 'Super Speed | Security & Logistics') ?></title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Tailwind CSS (via CDN) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#bb000f",
                        "secondary": "#994600",
                        "background": "#f9f9f9",
                        "surface": "#ffffff",
                        "on-surface": "#1a1c1c"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Inter"]
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
        
        <div class="hidden md:flex items-center space-x-12">
            <a class="<?= $page === 'home' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('home') ?>"><?= translate('nav-home', 'Home') ?></a>
            <a class="<?= $page === 'about' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('about') ?>"><?= translate('nav-about', 'About Us') ?></a>
            <a class="<?= $page === 'services' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('services') ?>"><?= translate('nav-services', 'Services') ?></a>
            <a class="<?= $page === 'clients' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('clients') ?>"><?= translate('nav-clients', 'Clients') ?></a>
            <a class="<?= $page === 'contact' ? 'text-red-600 font-bold border-b-2 border-red-600' : 'text-zinc-600 font-medium hover:text-red-500' ?> py-2 transition-all" href="<?= url('contact') ?>"><?= translate('nav-contact', 'Contact Us') ?></a>
        </div>
        
        <div class="flex items-center gap-6">
            <div class="flex gap-2 text-xs font-bold uppercase tracking-widest bg-zinc-100 p-1 px-3 rounded-full">
                <a href="?page=<?= $page ?>&lang=en" class="<?= $lang === 'en' ? 'text-red-600' : 'text-zinc-400 hover:text-zinc-600' ?>">EN</a>
                <span class="text-zinc-300">|</span>
                <a href="?page=<?= $page ?>&lang=ar" class="<?= $lang === 'ar' ? 'text-red-600' : 'text-zinc-400 hover:text-zinc-600' ?>">AR</a>
            </div>
            
            <?php if ($isAdmin): ?>
                <span class="bg-red-600 text-white text-[10px] px-2 py-0.5 rounded font-bold">EDITOR</span>
            <?php endif; ?>

            <button class="md:hidden text-on-surface">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </div>
</nav>

<main class="<?= $page === 'home' ? '' : 'pt-[6rem]' ?>">
