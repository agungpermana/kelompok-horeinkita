<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Wapen - Konfigurasi Donasi</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-container": "#a9acfd",
                        "secondary": "#5457a1",
                        "primary": "#0800b5",
                        "inverse-on-surface": "#eaf1ff",
                        "on-secondary-container": "#3a3d86",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed-dim": "#c0c1ff",
                        "error-container": "#ffdad6",
                        "secondary-fixed": "#e1e0ff",
                        "background": "#f8f9ff",
                        "primary-container": "#2121e2",
                        "inverse-primary": "#bfc1ff",
                        "on-primary-fixed-variant": "#1b19df",
                        "on-surface": "#0b1c30",
                        "surface-variant": "#d3e4fe",
                        "on-primary-fixed": "#03006d",
                        "on-primary-container": "#b1b4ff",
                        "surface": "#f8f9ff",
                        "on-tertiary-container": "#b6bbc5",
                        "tertiary-container": "#464b54",
                        "inverse-surface": "#213145",
                        "on-error-container": "#93000a",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#c2c6d1",
                        "surface-container": "#e5eeff",
                        "outline": "#767588",
                        "on-surface-variant": "#454556",
                        "surface-container-highest": "#d3e4fe",
                        "error": "#ba1a1a",
                        "outline-variant": "#c6c4d9",
                        "surface-dim": "#cbdbf5",
                        "on-secondary-fixed": "#0d0d5b",
                        "on-secondary-fixed-variant": "#3c3f87",
                        "on-tertiary-fixed": "#171c23",
                        "surface-container-low": "#eff4ff",
                        "surface-tint": "#3c41f5",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed-dim": "#bfc1ff",
                        "primary-fixed": "#e1e0ff",
                        "tertiary-fixed": "#dee2ed",
                        "on-secondary": "#ffffff",
                        "on-background": "#0b1c30",
                        "on-primary": "#ffffff",
                        "tertiary": "#2f343d",
                        "on-tertiary-fixed-variant": "#424750",
                        "surface-bright": "#f8f9ff",
                        "surface-container-high": "#dce9ff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-mobile": "16px",
                        "stack-md": "16px",
                        "margin-desktop": "40px",
                        "stack-sm": "8px",
                        "container-max": "1280px",
                        "stack-xl": "48px",
                        "stack-lg": "24px",
                        "gutter": "24px"
                    },
                    "fontFamily": {
                        "headline-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "label-md": ["Inter"],
                        "body-sm": ["Inter"],
                        "headline-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "700" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "label-sm": ["12px", { "lineHeight": "16px", "fontWeight": "500" }],
                        "label-md": ["14px", { "lineHeight": "16px", "letterSpacing": "0.01em", "fontWeight": "600" }],
                        "body-sm": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
                        "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }]
                    },
                    "boxShadow": {
                        'soft-low': '0px 2px 4px rgba(0, 0, 0, 0.05)',
                        'soft-high': '0px 10px 20px rgba(13, 13, 91, 0.08)',
                    }
                }
            }
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined.fill {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-background antialiased min-h-screen flex flex-col">
<!-- Header (Nav Suppressed due to Transactional Flow, keeping simple brand anchor) -->
<header class="bg-surface-container-lowest border-b border-outline-variant w-full">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-4 flex justify-between items-center">
<div class="flex items-center gap-2">
<div class="w-12 h-12 bg-on-surface rounded-xl flex items-center justify-center overflow-hidden"><img alt="WAPEN Logo" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuArhJaQjaeamCU1CoTD5mWI4mylts8m-JGugNAgkSNaNDWDUlu1AVDCxaOgW_w9AjS-ZohOt2YnNtQYqEdczzWYlevw1HH9_dSwzuDw9-6nbnHfgY15F0OsXmAmhPPeaDgwGEWQ774gZhNndMQCHkg2SRocs0KqXlzO9R3vV_HQm8f_h7bVPaF6oMmmYGh_G14nLewO79PYUOEJWv6cGRPhS39b_oL1q8GmPnrjdOLljPU5_PRcKwOO8QUrRqpDuanbB2o"/></div>
<div>
<h1 class="font-headline-sm text-headline-sm text-on-surface">WAPEN</h1>
<p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Warung Penyalur</p>
</div>
</div>
<div class="flex items-center gap-4 hidden md:flex">
<span class="font-label-md text-label-md text-on-surface-variant uppercase">Langkah 2 Dari 3</span>
<div class="flex gap-1">
<div class="w-8 h-1 bg-on-surface"></div>
<div class="w-8 h-1 bg-on-surface"></div>
<div class="w-8 h-1 bg-surface-variant"></div>
</div>
</div>
</div>
</header>
<!-- Main Content -->
<main class="flex-grow max-w-container-max w-full mx-auto px-margin-mobile md:px-margin-desktop py-stack-xl">
<h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-stack-xl">Konfigurasi Donasi</h2>
<div class="flex flex-col lg:flex-row gap-gutter">
<!-- Left Column: Form Steps -->
<div class="flex-1 flex flex-col gap-stack-xl">
<!-- Section 1: Penerima Manfaat -->
<section>
<div class="flex justify-between items-center mb-stack-md">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-on-surface text-surface flex items-center justify-center font-headline-sm text-headline-sm">1</div>
<h3 class="font-headline-md text-headline-md text-on-surface">Pilih Penerima Manfaat</h3>
</div>
<a class="font-label-md text-label-md text-on-surface-variant uppercase hover:text-primary transition-colors" href="#">Lihat Semua</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
<!-- Active Card -->
<div class="bg-surface-container-lowest rounded-xl border-2 border-on-surface p-4 flex flex-col justify-between cursor-pointer relative shadow-soft-low">
<div class="absolute top-4 right-4">
<span class="material-symbols-outlined fill text-on-surface">check_circle</span>
</div>
<div class="flex items-center gap-3 mb-4">
<div class="w-12 h-12 rounded-full bg-surface-variant flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined">person</span>
</div>
<div>
<h4 class="font-label-md text-label-md text-on-surface">Ibu Aminah</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant">Lansia • Jakarta Selatan</p>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant italic">"Membutuhkan bantuan bahan pokok bulanan."</p>
</div>
<!-- Inactive Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-4 flex flex-col justify-between cursor-pointer hover:border-primary-container transition-colors">
<div class="flex items-center gap-3 mb-4 opacity-70">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined">person</span>
</div>
<div>
<h4 class="font-label-md text-label-md text-on-surface">Pak Mulyadi</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant">Pekerja Harian • Depok</p>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant italic opacity-70">"Keluarga dengan 3 anak usia sekolah."</p>
</div>
</div>
<button class="mt-stack-md w-full py-4 rounded-xl border border-dashed border-outline-variant text-on-surface-variant font-label-md text-label-md uppercase flex items-center justify-center gap-2 hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined">add</span>
                        Cari Penerima Lainnya
                    </button>
</section>
<!-- Section 2: Nama Donatur -->
<section>
<div class="flex items-center gap-3 mb-stack-md">
<div class="w-8 h-8 rounded-full bg-on-surface text-surface flex items-center justify-center font-headline-sm text-headline-sm">2</div>
<h3 class="font-headline-md text-headline-md text-on-surface">Pengaturan Nama Donatur</h3>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
<!-- Show Name -->
<div class="bg-surface-container-lowest rounded-xl border-2 border-on-surface p-4 relative shadow-soft-low">
<div class="absolute top-4 right-4">
<span class="material-symbols-outlined fill text-on-surface">radio_button_checked</span>
</div>
<h4 class="font-label-md text-label-md text-on-surface mb-2">Tampilkan Nama</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-4">Nama anda akan terlihat oleh warung dan penerima bantuan.</p>
<input class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-3 py-2 font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-shadow" type="text" value="Budi Santoso"/>
</div>
<!-- Anonymous -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-4 relative cursor-pointer hover:border-primary-container transition-colors">
<div class="absolute top-4 right-4">
<span class="material-symbols-outlined text-outline-variant">radio_button_unchecked</span>
</div>
<h4 class="font-label-md text-label-md text-on-surface mb-2">Donasi Anonim</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-4">Nama anda akan disembunyikan. Tertulis sebagai "Hamba Allah".</p>
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-sm">visibility_off</span>
<span class="font-label-sm text-label-sm uppercase">Anonymous Mode On</span>
</div>
</div>
</div>
</section>
<!-- Section 3: Pesan -->
<section>
<label class="block font-label-md text-label-md text-on-surface-variant uppercase mb-stack-sm">Pesan Untuk Penerima (Opsional)</label>
<textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl p-4 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-shadow resize-none" placeholder="Tuliskan pesan semangat atau doa untuk penerima..." rows="4"></textarea>
</section>
</div>
<!-- Right Column: Sidebar -->
<aside class="w-full lg:w-[400px]">
<div class="bg-surface-container-low rounded-xl p-stack-lg shadow-soft-high sticky top-stack-lg">
<h3 class="font-headline-md text-headline-md text-on-surface mb-stack-lg">Ringkasan Pesanan</h3>
<!-- Item -->
<div class="flex items-start justify-between mb-stack-md bg-surface-container-lowest p-4 rounded-lg">
<div class="flex gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined">shopping_basket</span>
</div>
<div>
<h4 class="font-label-md text-label-md text-on-surface">Paket Sembako Berkah</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant">Warung Ibu Sri</p>
<p class="font-label-sm text-label-sm text-on-surface mt-1">1x</p>
</div>
</div>
<span class="font-label-md text-label-md text-on-surface">Rp 95.000</span>
</div>
<div class="border-t border-outline-variant pt-stack-md mt-stack-md space-y-2">
<div class="flex justify-between">
<span class="font-body-sm text-body-sm text-on-surface-variant">Subtotal</span>
<span class="font-body-sm text-body-sm text-on-surface">Rp 95.000</span>
</div>
<div class="flex justify-between">
<span class="font-body-sm text-body-sm text-on-surface-variant">Biaya Operasional</span>
<span class="font-body-sm text-body-sm text-on-surface">Rp 2.000</span>
</div>
</div>
<div class="border-t border-on-surface pt-stack-md mt-stack-md flex justify-between items-end mb-stack-lg">
<span class="font-label-md text-label-md text-on-surface uppercase tracking-wider">Total Bayar</span>
<span class="font-headline-md text-headline-md text-on-surface">Rp 97.000</span>
</div>
<button class="w-full bg-on-surface text-surface py-4 rounded-xl font-label-md text-label-md uppercase hover:bg-opacity-90 transition-opacity flex justify-center items-center gap-2">
                        Pilih Pembayaran
                    </button>
<div class="mt-4 flex justify-center items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-sm">verified_user</span>
<span class="font-label-sm text-label-sm uppercase">Donasi Terjamin Aman</span>
</div>
</div>
<div class="mt-stack-md p-4 border border-dashed border-outline-variant rounded-xl">
<p class="font-body-sm text-body-sm text-on-surface-variant text-center italic">"Bantuan akan diproses oleh Warung Ibu Sri dan bukti penyaluran akan dikirimkan ke riwayat donasi anda."</p>
</div>
</aside>
</div>
</main>
<!-- Simple Footer for Transactional Flow -->
<footer class="mt-auto border-t border-outline-variant bg-surface-container-lowest">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-md flex justify-center gap-stack-lg">
<a class="font-label-sm text-label-sm text-on-surface-variant uppercase hover:text-on-surface transition-colors" href="#">Bantuan</a>
<a class="font-label-sm text-label-sm text-on-surface-variant uppercase hover:text-on-surface transition-colors" href="#">Keamanan</a>
<a class="font-label-sm text-label-sm text-on-surface-variant uppercase hover:text-on-surface transition-colors" href="#">Kontak</a>
</div>
</footer>
</body></html>