<!DOCTYPE html><html lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Wapen - Dashboard Penerima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface": "#f8f9ff",
                        "outline-variant": "#c6c4d9",
                        "on-primary-container": "#b1b4ff",
                        "on-background": "#0b1c30",
                        "on-surface": "#0b1c30",
                        "on-secondary-container": "#3a3d86",
                        "surface-container-low": "#eff4ff",
                        "on-primary": "#ffffff",
                        "on-secondary-fixed": "#0d0d5b",
                        "surface-container-lowest": "#ffffff",
                        "secondary-container": "#a9acfd",
                        "primary-fixed": "#e1e0ff",
                        "on-tertiary-fixed": "#171c23",
                        "surface-tint": "#3c41f5",
                        "tertiary-fixed-dim": "#c2c6d1",
                        "on-primary-fixed": "#03006d",
                        "outline": "#767588",
                        "inverse-surface": "#213145",
                        "surface-container": "#e5eeff",
                        "surface-container-highest": "#d3e4fe",
                        "on-tertiary-fixed-variant": "#424750",
                        "surface-variant": "#d3e4fe",
                        "secondary": "#5457a1",
                        "error": "#ba1a1a",
                        "on-error": "#ffffff",
                        "secondary-fixed-dim": "#c0c1ff",
                        "on-surface-variant": "#454556",
                        "on-secondary": "#ffffff",
                        "tertiary-container": "#464b54",
                        "primary": "#0800b5",
                        "on-secondary-fixed-variant": "#3c3f87",
                        "on-tertiary-container": "#b6bbc5",
                        "tertiary": "#2f343d",
                        "surface-bright": "#f8f9ff",
                        "on-primary-fixed-variant": "#1b19df",
                        "surface-dim": "#cbdbf5",
                        "background": "#f8f9ff",
                        "primary-container": "#2121e2",
                        "tertiary-fixed": "#dee2ed",
                        "on-tertiary": "#ffffff",
                        "primary-fixed-dim": "#bfc1ff",
                        "surface-container-high": "#dce9ff",
                        "inverse-primary": "#bfc1ff",
                        "inverse-on-surface": "#eaf1ff",
                        "on-error-container": "#93000a",
                        "secondary-fixed": "#e1e0ff",
                        "error-container": "#ffdad6"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "container-max": "1280px",
                        "margin-mobile": "16px",
                        "stack-lg": "24px",
                        "stack-xl": "48px",
                        "margin-desktop": "40px",
                        "stack-sm": "8px",
                        "gutter": "24px",
                        "stack-md": "16px"
                    },
                    "fontFamily": {
                        "headline-sm": ["Inter"],
                        "body-sm": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "headline-lg-mobile": ["Inter"]
                    },
                    "fontSize": {
                        "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "body-sm": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "label-md": ["14px", { "lineHeight": "16px", "letterSpacing": "0.01em", "fontWeight": "600" }],
                        "label-sm": ["12px", { "lineHeight": "16px", "fontWeight": "500" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "700" }]
                    }
                }
            }
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9ff; }
        .shadow-low { box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05); }
        .shadow-high { box-shadow: 0px 10px 20px rgba(13, 13, 91, 0.08); }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-surface text-on-surface h-screen overflow-hidden flex">
<!-- Sidebar Navigation -->
<aside class="hidden md:flex bg-surface-container-lowest border-r border-outline-variant h-screen w-64 fixed left-0 top-0 flex-col p-4 gap-stack-md z-10 shadow-low">
<div class="flex items-center gap-4 mb-8 px-2">
<img alt="Wapen Logo" class="h-12 w-auto object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCB9XiOUkqVfUWbaB7NlS-HXs26gk4a0G174rWonp_9HLd3I1ec65e_mLzKblY0NJfEq3U5rZ8REQ813Jg8DoyfxtZ044ETsLUOaKVU0ATFXHgUTG55Q116ddEO-ml28VbEqHS90dxbStHZeS_ADuQu35S0dysbYOzTm5iZeE1CYupttZQzK23kh9p2GosTTD59Xavc9tw8SbdY9sS2bfmGvFG39G-IeP9xFXnl5Fo4xTXYNvW4opKn-G_o0GfkIK9YU_w">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">Wapen</span></div>
<nav class="flex-1 flex flex-col gap-2">
<!-- Active Nav Item -->
<a class="flex items-center gap-3 px-4 py-3 bg-secondary-container text-on-secondary-container rounded-lg font-bold transition-all hover:bg-surface-container translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
<span class="font-label-md text-label-md">Ringkasan</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-low rounded-lg transition-all hover:bg-surface-container translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">description</span>
<span class="font-label-md text-label-md">Input Survey</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-low rounded-lg transition-all hover:bg-surface-container translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">assignment_ind</span>
<span class="font-label-md text-label-md">Provisioning</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-low rounded-lg transition-all hover:bg-surface-container translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">database</span>
<span class="font-label-md text-label-md">Data Survey</span>
</a>
</nav>
<div class="mt-auto border-t border-outline-variant pt-4">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-low rounded-lg transition-all hover:bg-surface-container translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-md text-label-md">Pengaturan</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-error hover:bg-error-container rounded-lg transition-all hover:bg-surface-container translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">logout</span>
<span class="font-label-md text-label-md">Keluar</span>
</a>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 ml-0 md:ml-64 h-full overflow-y-auto w-full relative pb-24 md:pb-0">
<!-- Mobile Top App Bar (Only visible on small screens) -->
<header class="md:hidden bg-surface-container-lowest border-b border-outline-variant p-4 flex justify-between items-center sticky top-0 z-20">
<div class="flex items-center gap-3">
<img alt="Wapen Logo Mobile" class="h-8 w-auto" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNRt5hY6OI66DeXcd7T9NFNPVyjUTci6obJ7O5BTqu8W4_p-m4svcupsxEqiIekvneLx9JDom6g_K93aCK0POWMYw9jFVM4z3CTtHcPwXEgKeMo-ZjsrklZHA4lR5I1NKdfo8Hu5NW_aIqN2Aoym5RiehC4X9Rjdkcyanchx-d7SaYCeNZ6909Zosnh86J_UAK1V_M7wI8QaQwA2R-Siggn42oFizycVe3Je7K9wkjIDwH8QkR9V9VBF7zswsO6x0MHTE">
</div>
<div class="flex items-center gap-3 text-right">
<div>
<p class="font-label-md text-label-md text-on-surface">Bp. Budi</p>
<p class="font-label-sm text-label-sm text-on-surface-variant">PENERIMA</p>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-surface-variant">person</span>
</div>
</div>
</header>
<!-- Desktop Header Area (Inside Main Canvas) -->
<div class="hidden md:flex justify-end items-center p-6 lg:px-margin-desktop w-full max-w-container-max mx-auto">
<div class="flex items-center gap-4">
<div class="text-right">
<p class="font-label-md text-label-md text-on-surface">Bp. Budi</p>
<p class="font-label-sm text-label-sm text-on-surface-variant">PENERIMA</p>
</div>
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center shadow-low">
<span class="material-symbols-outlined text-on-surface-variant">person</span>
</div>
</div>
</div>
<div class="p-4 md:p-6 lg:px-margin-desktop w-full max-w-container-max mx-auto flex flex-col gap-stack-xl mt-4 md:mt-0">
<!-- Status Card -->
<section>
<div class="bg-on-background rounded-[16px] p-6 text-on-primary relative overflow-hidden shadow-high">
<!-- Decorative subtle background shape -->
<div class="absolute -right-20 -top-20 w-64 h-64 bg-white opacity-5 rounded-full blur-2xl pointer-events-none"></div>
<div class="flex justify-between items-center mb-6 relative z-10">
<p class="font-label-sm text-label-sm uppercase tracking-wider text-outline-variant">Status Akun</p>
<span class="bg-[#052e16] text-[#4ade80] px-3 py-1 rounded-full font-label-sm text-label-sm flex items-center gap-1 border border-[#14532d]">
<span class="material-symbols-outlined" style="font-size: 14px;">check_circle</span>
                            TERVERIFIKASI
                        </span>
</div>
<div class="relative z-10">
<h1 class="font-headline-lg text-headline-lg mb-2">Aktif</h1>
<p class="font-body-sm text-body-sm text-outline-variant max-w-md">
                            Anda berhak menerima bantuan sembako dari donatur melalui warung terafiliasi.
                        </p>
</div>
</div>
</section>
<!-- Active Coupon Section -->
<section>
<div class="flex justify-between items-end mb-4">
<h2 class="font-headline-sm text-headline-sm text-on-surface">Kupon Aktif</h2>
<span class="font-body-sm text-body-sm text-on-surface-variant">1 Tersedia</span>
</div>
<div class="bg-surface-container-lowest rounded-[16px] shadow-low border border-dashed border-outline-variant p-1">
<div class="bg-white rounded-[14px] p-6">
<div class="flex justify-between items-start mb-8">
<div>
<p class="font-label-sm text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">Kode Kupon</p>
<p class="font-headline-md text-headline-md text-on-surface tracking-[0.2em] font-mono">BT-2026-X99</p>
</div>
<div class="w-12 h-12 bg-surface-container rounded-lg flex items-center justify-center text-primary">
<span class="material-symbols-outlined" style="font-size: 28px;">qr_code_2</span>
</div>
</div>
<div class="border-t border-dashed border-outline-variant my-4 relative">
<!-- Cutout decorations -->
<div class="absolute -left-8 top-1/2 -translate-y-1/2 w-4 h-8 bg-surface rounded-r-full border-r border-y border-dashed border-outline-variant"></div>
<div class="absolute -right-8 top-1/2 -translate-y-1/2 w-4 h-8 bg-surface rounded-l-full border-l border-y border-dashed border-outline-variant"></div>
</div>
<div class="flex flex-col gap-3 mb-6">
<div class="flex justify-between items-center">
<span class="font-body-sm text-body-sm text-on-surface-variant">Paket Bantuan</span>
<span class="font-label-md text-label-md text-on-surface">Sembako Lengkap A</span>
</div>
<div class="flex justify-between items-center">
<span class="font-body-sm text-body-sm text-on-surface-variant">Lokasi Penukaran</span>
<a class="font-label-md text-label-md text-primary underline hover:text-primary-container transition-colors flex items-center gap-1" href="#">
                                    Warung Berkah Ibu
                                    <span class="material-symbols-outlined" style="font-size: 16px;">open_in_new</span>
</a>
</div>
</div>
<button class="w-full bg-on-background hover:bg-[#1a2b42] text-white py-4 rounded-xl font-label-md text-label-md transition-colors shadow-md flex justify-center items-center gap-2">
<span class="material-symbols-outlined">qr_code_scanner</span>
                            Tampilkan QR Code
                        </button>
</div>
</div>
</section>
<!-- History Section -->
<section class="mb-8">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-4">Riwayat Bantuan</h2>
<div class="flex flex-col gap-4">
<!-- History Item 1 -->
<div class="bg-surface-container-lowest rounded-[16px] p-4 shadow-low border border-outline-variant hover:border-primary-fixed-dim transition-colors cursor-pointer group flex items-center">
<div class="w-12 h-12 rounded-full bg-surface-container-low flex items-center justify-center text-primary mr-4 group-hover:bg-primary-fixed transition-colors">
<span class="material-symbols-outlined">task_alt</span>
</div>
<div class="flex-1">
<h3 class="font-label-md text-label-md text-on-surface mb-1">Penukaran Berhasil</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1">
                                Warung Berkah Ibu <span class="w-1 h-1 rounded-full bg-outline-variant inline-block mx-1"></span> 05 Jan 2026
                            </p>
</div>
<span class="material-symbols-outlined text-outline-variant group-hover:text-primary transition-colors">chevron_right</span>
</div>
<!-- History Item 2 -->
<div class="bg-surface-container-lowest rounded-[16px] p-4 shadow-low border border-outline-variant hover:border-primary-fixed-dim transition-colors cursor-pointer group flex items-center">
<div class="w-12 h-12 rounded-full bg-surface-container-low flex items-center justify-center text-primary mr-4 group-hover:bg-primary-fixed transition-colors">
<span class="material-symbols-outlined">task_alt</span>
</div>
<div class="flex-1">
<h3 class="font-label-md text-label-md text-on-surface mb-1">Penukaran Berhasil</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1">
                                Warung Berkah Ibu <span class="w-1 h-1 rounded-full bg-outline-variant inline-block mx-1"></span> 20 Des 2025
                            </p>
</div>
<span class="material-symbols-outlined text-outline-variant group-hover:text-primary transition-colors">chevron_right</span>
</div>
</div>
</section>
</div>
</main>
<!-- Mobile Bottom Navigation (Only visible on md:hidden) -->
<nav class="md:hidden fixed bottom-0 w-full bg-surface-container-lowest border-t border-outline-variant flex justify-around items-center py-2 px-4 z-20 pb-safe shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
<a class="flex flex-col items-center p-2 text-primary" href="#">
<span class="material-symbols-outlined mb-1" style="font-variation-settings: 'FILL' 1;">home</span>
<span class="font-label-sm text-label-sm text-[10px]">Beranda</span>
</a>
<a class="flex flex-col items-center p-2 text-on-surface-variant hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined mb-1">local_activity</span>
<span class="font-label-sm text-label-sm text-[10px]">Kupon</span>
</a>
<a class="flex flex-col items-center p-2 text-on-surface-variant hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined mb-1">history</span>
<span class="font-label-sm text-label-sm text-[10px]">Riwayat</span>
</a>
<a class="flex flex-col items-center p-2 text-on-surface-variant hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined mb-1">person</span>
<span class="font-label-sm text-label-sm text-[10px]">Profil</span>
</a>
</nav>
<style>
        /* Safe area padding for mobile notch/home indicator */
        @supports (padding-bottom: env(safe-area-inset-bottom)) {
            .pb-safe { padding-bottom: env(safe-area-inset-bottom); }
        }
    </style>


</body></html>