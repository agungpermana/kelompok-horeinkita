<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Dashboard - Wapen Warung</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                "secondary-container": "#a9acfd",
                "secondary": "#5457a1",
                "primary": "#0800b5",
                "on-secondary-container": "#3a3d86",
                "background": "#f8f9ff",
                "primary-container": "#2121e2",
                "on-surface": "#0b1c30",
                "surface-variant": "#d3e4fe",
                "surface": "#f8f9ff",
                "surface-container": "#e5eeff",
                "outline": "#767588",
                "on-surface-variant": "#454556",
                "surface-container-highest": "#d3e4fe",
                "outline-variant": "#c6c4d9",
                "surface-container-low": "#eff4ff",
                "surface-tint": "#3c41f5",
                "surface-container-lowest": "#ffffff",
                "on-secondary": "#ffffff",
                "on-primary": "#ffffff",
                "surface-container-high": "#dce9ff"
            },
            fontFamily: { "sans": ["Inter", "sans-serif"] },
        }
    }
}
</script>
<style>
.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
.material-symbols-outlined[data-weight="fill"] {
    font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
</style>
</head>
<body class="bg-background font-sans text-on-surface flex min-h-screen">

{{-- Sidebar --}}
<aside class="hidden md:flex bg-surface-container-lowest border-r border-outline-variant w-64 fixed left-0 top-0 h-screen flex-col p-4 z-40">
    <div class="flex items-center gap-3 mb-8 px-2">
        <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center">
            <span class="material-symbols-outlined text-white text-xl" data-weight="fill">storefront</span>
        </div>
        <div>
            <h1 class="text-base font-bold text-on-surface">Wapen</h1>
            <p class="text-xs text-on-surface-variant">Warung Penyalur</p>
        </div>
    </div>

    <nav class="flex-1 flex flex-col gap-1">
        <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-widest px-4 mb-2">Menu</p>

        <a href="{{ route('warung.dashboard') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-secondary-container text-on-secondary-container font-semibold transition-all">
            <span class="material-symbols-outlined text-xl" data-weight="fill">dashboard</span>
            <span class="text-sm">Dashboard</span>
        </a>

        <a href="{{ route('katalog-paket.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
            <span class="material-symbols-outlined text-xl">inventory_2</span>
            <span class="text-sm">Katalog Sembako</span>
        </a>
    </nav>

    <div class="mt-auto flex flex-col gap-1 border-t border-outline-variant pt-4">
        <div class="flex items-center gap-3 px-4 py-2 rounded-lg">
            <span class="material-symbols-outlined text-on-surface-variant">account_circle</span>
            <div>
                <p class="text-sm font-semibold text-on-surface truncate">{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</p>
                <p class="text-xs text-on-surface-variant">Pemilik Warung</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-sm">Keluar</span>
            </button>
        </form>
    </div>
</aside>

{{-- Main --}}
<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">

    <header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-6 md:px-10 py-4 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-on-surface">Dashboard</h1>
        <span class="text-sm text-on-surface-variant">{{ now()->translatedFormat('d F Y') }}</span>
    </header>

    <div class="p-6 md:p-10 max-w-5xl mx-auto space-y-8">

        {{-- Sambutan --}}
        <div class="bg-primary rounded-xl p-6 text-white">
            <p class="text-sm font-medium opacity-80 mb-1">Selamat datang,</p>
            <h2 class="text-2xl font-bold">{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</h2>
            <p class="text-sm opacity-70 mt-1">Kelola katalog sembako warung Anda dari sini.</p>
        </div>

        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @php
                $jumlahPaket = \App\Models\katalog_paket::count();
                $stokHabis   = \App\Models\katalog_paket::where('stok', 0)->count();
            @endphp

            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-[0px_2px_4px_rgba(0,0,0,0.05)] p-6 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-primary text-2xl" data-weight="fill">inventory_2</span>
                </div>
                <div>
                    <p class="text-sm text-on-surface-variant">Total Paket Sembako</p>
                    <p class="text-3xl font-bold text-primary mt-0.5">{{ $jumlahPaket }}</p>
                </div>
            </div>

            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-[0px_2px_4px_rgba(0,0,0,0.05)] p-6 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-red-500 text-2xl" data-weight="fill">warning</span>
                </div>
                <div>
                    <p class="text-sm text-on-surface-variant">Stok Habis</p>
                    <p class="text-3xl font-bold text-red-500 mt-0.5">{{ $stokHabis }}</p>
                </div>
            </div>
        </div>

        {{-- Aksi Cepat --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-[0px_2px_4px_rgba(0,0,0,0.05)] p-6">
            <h3 class="text-base font-semibold text-on-surface mb-4">Aksi Cepat</h3>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('katalog-paket.index') }}"
                   class="flex items-center gap-2 px-4 py-2.5 rounded-lg border border-outline-variant text-on-surface text-sm font-semibold hover:bg-surface-container-low transition-all">
                    <span class="material-symbols-outlined text-base">list</span>
                    Lihat Semua Katalog
                </a>
            </div>
        </div>

    </div>
</main>

</body>
</html>
