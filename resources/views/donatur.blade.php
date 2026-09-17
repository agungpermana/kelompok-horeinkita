<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Wapen - Pilihan Bahan Pokok</title>
<!-- Google Fonts: Inter & Material Symbols -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Configuration -->
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
                      "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                      "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                      "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                      "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                      "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.01em", "fontWeight": "600"}],
                      "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                      "headline-sm": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                      "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                      "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}]
              }
            }
          }
        }
    </script>
<style>
        body {
            background-color: #F8FAFC; /* Very light gray as requested */
            font-family: 'Inter', sans-serif;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .ambient-shadow-low {
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="text-on-surface antialiased min-h-screen flex flex-col">
<!-- TopNavBar -->
<nav class="bg-surface-container-lowest dark:bg-on-surface docked full-width top-0 border-b border-outline-variant dark:border-outline flat no shadows z-50 sticky">
<div class="flex justify-between items-center px-margin-desktop py-4 w-full max-w-container-max mx-auto">
<!-- Brand -->
<div class="flex items-center gap-2">
<img alt="Wapen Logo" class="h-10 w-auto object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAfPrO2YOajYYURQ3OsIGkMrkbY31fgdHaBFtKAPBn6iYxc1VKaJw1szuDwu04dzyCG_hlAhFwXRpwxWqshkofzhS6szpWlA3R-UgKL8rowa1wb97RTurp4cnCX-kcuFE3SNbG2gnQ_3nDbOCt1GVreLsOm4ie22vKH2rGm6oPfzxnrOj9b0IyfPBFGGwyBqjcsO-_OEZzKJSdyGmTBXnwZMmothY0uLcyO2fSj-qse3CoKAT6y5ND-o5ULOBit8FXREzc"/>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface dark:text-surface">Wapen</span>
</div>
<!-- Navigation Links -->
<div class="hidden md:flex gap-8 items-center">
<a class="text-primary dark:text-inverse-primary border-b-2 border-primary pb-1 font-label-md text-label-md hover:text-primary dark:hover:text-primary-fixed transition-colors scale-95 duration-150" href="#">Program</a>
<a class="text-on-surface-variant dark:text-surface-variant font-label-md text-label-md hover:text-primary dark:hover:text-primary-fixed transition-colors scale-95 duration-150" href="#">Donasi</a>
<a class="text-on-surface-variant dark:text-surface-variant font-label-md text-label-md hover:text-primary dark:hover:text-primary-fixed transition-colors scale-95 duration-150" href="#">Kontak</a>
</div>
<!-- Actions -->
<div class="flex items-center gap-4">
<button class="bg-primary-container text-on-primary rounded-xl px-6 py-2 font-label-md text-label-md hover:bg-primary transition-colors scale-95 duration-150">
                    Masuk Sistem
                </button>
</div>
</div>
</nav>
<!-- Main Content Canvas -->
<main class="flex-grow w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg md:py-stack-xl flex flex-col gap-stack-xl">
<!-- Hero Banner -->
<section class="w-full bg-surface-container-highest rounded-xl p-8 md:p-16 flex flex-col items-center justify-center text-center gap-stack-md ambient-shadow-low relative overflow-hidden">
<div class="bg-surface-container-lowest p-4 rounded-full mb-4 z-10 ambient-shadow-low">
<span class="material-symbols-outlined text-4xl text-primary" data-weight="fill">redeem</span>
</div>
<h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface z-10">Program Paket Sembako Amanah</h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl z-10">Pilih paket makanan dari warung terverifikasi untuk disalurkan kepada mereka yang membutuhkan.</p>
<!-- Carousel Indicators -->
<div class="flex gap-2 mt-4 z-10">
<div class="h-1 w-8 bg-primary rounded-full"></div>
<div class="h-1 w-8 bg-outline-variant rounded-full"></div>
<div class="h-1 w-8 bg-outline-variant rounded-full"></div>
</div>
</section>
<!-- Catalog Section -->
<div class="flex flex-col lg:flex-row gap-gutter">
<!-- Sidebar Filters -->
<aside class="w-full lg:w-64 flex-shrink-0 flex flex-col gap-stack-xl">
<!-- Category -->
<div class="flex flex-col gap-stack-sm">
<h3 class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider mb-2">KATEGORI PRODUK</h3>
<label class="flex items-center gap-3 cursor-pointer group">
<input checked="" class="form-checkbox h-5 w-5 text-primary-container rounded border-outline focus:ring-primary focus:ring-2 focus:ring-offset-1 transition-all" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface group-hover:text-primary transition-colors font-medium">Semua Bahan Pokok</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="form-checkbox h-5 w-5 text-primary-container rounded border-outline-variant focus:ring-primary focus:ring-2 focus:ring-offset-1 transition-all" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface-variant group-hover:text-primary transition-colors">Paket Sembako (Bundling)</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="form-checkbox h-5 w-5 text-primary-container rounded border-outline-variant focus:ring-primary focus:ring-2 focus:ring-offset-1 transition-all" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface-variant group-hover:text-primary transition-colors">Item Satuan (Beras, Minyak, dll)</span>
</label>
</div>
<!-- Price Range -->
<div class="flex flex-col gap-stack-sm">
<h3 class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider mb-2">RENTANG HARGA</h3>
<div class="flex items-center gap-2">
<span class="font-body-sm text-body-sm text-on-surface-variant w-6">Rp</span>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Min" type="text"/>
</div>
<div class="flex items-center gap-2">
<span class="font-body-sm text-body-sm text-on-surface-variant w-6">Rp</span>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Max" type="text"/>
</div>
</div>
<!-- Location -->
<div class="flex flex-col gap-stack-sm">
<h3 class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider mb-2">LOKASI WARUNG</h3>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant text-xl">location_on</span>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg pl-10 pr-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Cari lokasi..." type="text"/>
</div>
</div>
</aside>
<!-- Product List Area -->
<div class="flex-grow flex flex-col gap-stack-lg">
<!-- Toolbar -->
<div class="flex justify-between items-center pb-4 border-b border-outline-variant">
<h2 class="font-headline-sm text-headline-sm text-on-surface">Pilihan Bahan Pokok</h2>
<div class="flex items-center gap-3">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase">URUTKAN:</span>
<select class="bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2 font-body-sm text-body-sm text-on-surface focus:border-primary outline-none cursor-pointer">
<option>Paling Sesuai</option>
<option>Harga Terendah</option>
<option>Harga Tertinggi</option>
<option>Rating Tertinggi</option>
</select>
</div>
</div>
<!-- Product Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-gutter">
<!-- Card 1: Paket -->
<div class="bg-surface-container-lowest rounded-xl ambient-shadow-low overflow-hidden flex flex-col hover:-translate-y-1 transition-transform duration-300 border border-transparent hover:border-surface-container-highest">
<div class="relative h-48 bg-surface-container flex items-center justify-center p-4">
<div class="absolute top-4 left-4 z-10 flex items-center gap-1">
<span class="material-symbols-outlined text-sm text-primary" data-weight="fill">verified</span>
<span class="font-label-sm text-label-sm text-on-surface">Warung Ibu Sri</span>
</div>
<span class="absolute top-4 right-4 bg-on-surface text-surface font-label-sm text-[10px] uppercase px-2 py-1 rounded-full z-10">PAKET</span>
<div class="w-full h-full rounded-lg bg-surface-container-high border-2 border-dashed border-outline-variant flex items-center justify-center relative overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-multiply" data-alt="A high-quality, brightly lit top-down photo of a carefully arranged bundle of essential groceries including a 5kg sack of rice, a bottle of cooking oil, and a bag of sugar on a clean white surface. Modern light mode UI aesthetic, casting soft shadows, conveying a sense of fresh and reliable aid packages." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCr01oWsjg1dGNHemZTHMzBOrZjNopXmeZIzzjnJSmZFcYjgMFIIWZZt5KA63pTtnNGnhvPpznHtpMEn7NHB0RiJwBVzVL3qXEef1T4201B-5G2t9r5qcDe4jK9Srux2dYqQzyzfnTQI7dEG8SGfS05OOtWmXOgpPYQfq2wGE-jJ-MEvGTOiTBSdgymxN4BYvZkrNAYic1rQld-yUCfNVfiugQ7tVKXjUG5DYgxg05MNDwrD7HEMdVHbg')"></div>
<span class="font-label-md text-label-md text-on-surface-variant z-10 uppercase tracking-widest opacity-50">IMAGE (PAKET SEMBAKO)</span>
</div>
</div>
<div class="p-6 flex flex-col flex-grow gap-3">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight mb-1">Paket Sembako Berkah</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">Isi: Beras 5kg, Minyak 1L, Gula 1kg</p>
</div>
<div class="flex items-center gap-1 mt-auto">
<span class="material-symbols-outlined text-sm text-yellow-500" data-weight="fill">star</span>
<span class="font-label-sm text-label-sm font-bold text-on-surface">4.9</span>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-1">| 1.2k Terjual</span>
</div>
<div class="font-headline-md text-headline-md text-on-surface mt-1">Rp 95.000</div>
<div class="flex items-center gap-1 text-on-surface-variant mb-4">
<span class="material-symbols-outlined text-[16px]">location_on</span>
<span class="font-body-sm text-[12px]">Jakarta Selatan</span>
</div>
<button class="w-full bg-primary-container text-on-primary rounded-xl py-3 font-label-md text-label-md uppercase tracking-wider hover:bg-primary transition-colors focus:ring-4 focus:ring-primary-container/30">
                                PILIH PAKET
                            </button>
</div>
</div>
<!-- Card 2: Satuan Beras -->
<div class="bg-surface-container-lowest rounded-xl ambient-shadow-low overflow-hidden flex flex-col hover:-translate-y-1 transition-transform duration-300 border border-transparent hover:border-surface-container-highest">
<div class="relative h-48 bg-surface-container flex items-center justify-center p-4">
<div class="absolute top-4 left-4 z-10 flex items-center gap-1">
<span class="material-symbols-outlined text-sm text-primary" data-weight="fill">verified</span>
<span class="font-label-sm text-label-sm text-on-surface">Warung Berkah</span>
</div>
<span class="absolute top-4 right-4 bg-surface-variant text-on-surface font-label-sm text-[10px] uppercase px-2 py-1 rounded-full z-10">SATUAN</span>
<div class="w-full h-full rounded-lg bg-surface-container-high border-2 border-dashed border-outline-variant flex items-center justify-center relative overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-multiply" data-alt="A clean, minimalist product shot of a single premium 5kg sack of white rice on a bright, seamless background. The lighting is soft and even, highlighting the texture of the packaging. Modern e-commerce visual style, communicating quality and staple food necessities." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAQ93byw7JcSHEHLEo3rFM5n3WSqhIhw8kuBPD8IdiH59CGrsaw2gzy7RYoQ7AqpB-1jn_Fe-MCBzXd91x3exxWakAt8maN62gGXAD_v5QQaZjWmvyHVKAtqjkqnypGT38c6RW6V2AIDhGFjINUE8qgDLLFYqyxuOoB-cCtE9P84U6vX1UCkWiVvDMyOHy_8cx5qsyq0s2Y9ZoTaSegTHrL9sFQniCu39lozmlAEff4KgIOKRVYRMJ3ag')"></div>
<span class="font-label-md text-label-md text-on-surface-variant z-10 uppercase tracking-widest opacity-50">IMAGE (BERAS)</span>
</div>
</div>
<div class="p-6 flex flex-col flex-grow gap-3">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight mb-1">Beras Premium (Satuan)</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">Kuantitas: 5kg per karung</p>
</div>
<div class="flex items-center gap-1 mt-auto">
<span class="material-symbols-outlined text-sm text-yellow-500" data-weight="fill">star</span>
<span class="font-label-sm text-label-sm font-bold text-on-surface">4.8</span>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-1">| 2.5k Terjual</span>
</div>
<div class="font-headline-md text-headline-md text-on-surface mt-1">Rp 68.000</div>
<div class="flex items-center gap-1 text-on-surface-variant mb-4">
<span class="material-symbols-outlined text-[16px]">location_on</span>
<span class="font-body-sm text-[12px]">Bandung Tengah</span>
</div>
<button class="w-full bg-primary-container text-on-primary rounded-xl py-3 font-label-md text-label-md uppercase tracking-wider hover:bg-primary transition-colors focus:ring-4 focus:ring-primary-container/30">
                                PILIH ITEM
                            </button>
</div>
</div>
<!-- Card 3: Satuan Minyak -->
<div class="bg-surface-container-lowest rounded-xl ambient-shadow-low overflow-hidden flex flex-col hover:-translate-y-1 transition-transform duration-300 border border-transparent hover:border-surface-container-highest">
<div class="relative h-48 bg-surface-container flex items-center justify-center p-4">
<div class="absolute top-4 left-4 z-10 flex items-center gap-1">
<span class="material-symbols-outlined text-sm text-outline" data-weight="fill">store</span>
<span class="font-label-sm text-label-sm text-on-surface">Toko Makmur</span>
</div>
<span class="absolute top-4 right-4 bg-surface-variant text-on-surface font-label-sm text-[10px] uppercase px-2 py-1 rounded-full z-10">SATUAN</span>
<div class="w-full h-full rounded-lg bg-surface-container-high border-2 border-dashed border-outline-variant flex items-center justify-center relative overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-multiply" data-alt="A bright, high-resolution product image of a 2-liter pouch of clear, golden cooking oil against a pure white background. The image is crisp, with subtle reflections on the plastic pouch, fitting a modern, trustworthy digital catalog for essential goods." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCzKDoyg7SZTxBfbDUrRf5lLoaSMjJKLQ1YjE48EDNbIMVdoTRfUv6CoiXzwdwWhdhhialrpjPu0Jxl7OfH0sZBbEasrIv9LEP0dMggubmRFdK2wZS3CbkZfuiQJbrrsH0-AivzqzPDYBYbH5Q_DD6K_H7a-qITbj1AL2kgfXSbXd85G4wPdWyYwI0WdWins637odO6aQxAd8RKKToICTeGLNGkZ3JwxzaRJ4DyFiuFzNtmyUtYCh3snA')"></div>
<span class="font-label-md text-label-md text-on-surface-variant z-10 uppercase tracking-widest opacity-50">IMAGE (MINYAK)</span>
</div>
</div>
<div class="p-6 flex flex-col flex-grow gap-3">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight mb-1">Minyak Goreng 2L</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">Kuantitas: 2 Liter per pouch</p>
</div>
<div class="flex items-center gap-1 mt-auto">
<span class="material-symbols-outlined text-sm text-yellow-500" data-weight="fill">star</span>
<span class="font-label-sm text-label-sm font-bold text-on-surface">4.7</span>
<span class="font-body-sm text-body-sm text-on-surface-variant ml-1">| 3.1k Terjual</span>
</div>
<div class="font-headline-md text-headline-md text-on-surface mt-1">Rp 32.500</div>
<div class="flex items-center gap-1 text-on-surface-variant mb-4">
<span class="material-symbols-outlined text-[16px]">location_on</span>
<span class="font-body-sm text-[12px]">Surabaya Barat</span>
</div>
<button class="w-full bg-primary-container text-on-primary rounded-xl py-3 font-label-md text-label-md uppercase tracking-wider hover:bg-primary transition-colors focus:ring-4 focus:ring-primary-container/30">
                                PILIH ITEM
                            </button>
</div>
</div>
</div>
<!-- Pagination -->
<div class="flex justify-center items-center gap-2 mt-8 pt-4">
<button class="w-10 h-10 rounded-lg border border-outline-variant flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors disabled:opacity-50" disabled="">
<span class="material-symbols-outlined text-sm">chevron_left</span>
</button>
<button class="w-10 h-10 rounded-lg bg-primary-container text-on-primary flex items-center justify-center font-label-md text-label-md shadow-sm">1</button>
<button class="w-10 h-10 rounded-lg border border-outline-variant flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md">2</button>
<button class="w-10 h-10 rounded-lg border border-outline-variant flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors font-label-md text-label-md">3</button>
<button class="w-10 h-10 rounded-lg border border-outline-variant flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined text-sm">chevron_right</span>
</button>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-surface-container-lowest dark:bg-on-surface full-width bottom-0 border-t border-outline-variant dark:border-outline flat no shadows mt-stack-xl">
<div class="flex justify-between items-center px-margin-desktop py-8 w-full max-w-container-max mx-auto flex-col md:flex-row gap-stack-md">
<!-- Copyright -->
<div class="text-on-surface-variant dark:text-surface-variant font-label-sm text-label-sm">
                © 2026 WAPEN - WARUNG PENYALUR
            </div>
<!-- Links -->
<div class="flex gap-6">
<a class="text-on-surface-variant font-label-sm text-label-sm hover:underline opacity-80 transition-opacity" href="#">Kebijakan</a>
<a class="text-on-surface-variant font-label-sm text-label-sm hover:underline opacity-80 transition-opacity" href="#">Ketentuan</a>
</div>
</div>
</footer>
</body></html>