<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Edit Paket Sembako - Wapen</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                "secondary-container": "#a9acfd",
                "primary": "#0800b5",
                "background": "#f8f9ff",
                "on-surface": "#0b1c30",
                "surface": "#f8f9ff",
                "surface-container": "#e5eeff",
                "outline": "#767588",
                "on-surface-variant": "#454556",
                "outline-variant": "#c6c4d9",
                "surface-container-low": "#eff4ff",
                "surface-container-lowest": "#ffffff",
                "on-secondary-container": "#3a3d86",
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
</style>
</head>
<body class="bg-background font-sans text-on-surface flex min-h-screen">

{{-- Sidebar --}}
<aside class="hidden md:flex bg-surface-container-lowest border-r border-outline-variant w-64 fixed left-0 top-0 h-screen flex-col p-4 z-40">
    <div class="flex items-center gap-3 mb-8 px-2">
        <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center">
            <span class="material-symbols-outlined text-white text-xl">storefront</span>
        </div>
        <div>
            <h1 class="text-lg font-bold text-on-surface">Wapen</h1>
            <p class="text-xs text-on-surface-variant">Warung Penyalur</p>
        </div>
    </div>
    <nav class="flex-1 flex flex-col gap-1">
        <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-widest px-4 mb-2">Menu</p>
        <a href="{{ route('warung.dashboard') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
            <span class="material-symbols-outlined text-xl">dashboard</span>
            <span class="text-sm">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-secondary-container text-on-secondary-container font-semibold transition-all" href="{{ route('katalog-paket.index') }}">
            <span class="material-symbols-outlined text-xl" data-weight="fill">inventory_2</span>
            <span class="text-sm">Katalog Sembako</span>
        </a>
        <a href="{{ route('katalog-paket.create') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
            <span class="material-symbols-outlined text-xl">add_box</span>
            <span class="text-sm">Tambah Paket</span>
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

<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">

    <header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-6 md:px-10 py-4 flex items-center gap-4">
        <a href="{{ route('katalog-paket.index') }}" class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-surface-container transition-all text-on-surface-variant">
            <span class="material-symbols-outlined text-xl">arrow_back</span>
        </a>
        <h1 class="text-xl font-semibold text-on-surface">Edit Paket Sembako</h1>
    </header>

    <div class="p-6 md:p-10 max-w-2xl">

        @if($errors->any())
            <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 mb-6 text-sm">
                <span class="material-symbols-outlined text-red-500 text-xl mt-0.5">error</span>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-[0px_2px_4px_rgba(0,0,0,0.05)] p-6">
            <form action="{{ route('katalog-paket.update', $paket->id_paket) }}" method="POST" class="space-y-5" onsubmit="siapkanHarga(this)">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">
                        Nama Paket <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_paket"
                        value="{{ old('nama_paket', $paket->nama_paket) }}"
                        placeholder="Contoh: Paket Sembako Hemat A"
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required/>
                    @error('nama_paket')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Deskripsi</label>
                    <textarea name="deskripsi" rows="3"
                        placeholder="Isi paket: beras 5kg, minyak 1L, gula 1kg, ..."
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-1.5">
                            Harga (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="harga"
                            value="{{ old('harga', (int) $paket->harga) }}"
                            inputmode="numeric" placeholder="Rp 0"
                            oninput="formatHarga(this)"
                            class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            required/>
                        @error('harga')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-1.5">
                            Stok <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="stok"
                            value="{{ old('stok', $paket->stok) }}"
                            min="0" placeholder="0"
                            class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            required/>
                        @error('stok')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-3 pt-2">
                    <a href="{{ route('katalog-paket.index') }}"
                        class="flex-1 text-center px-4 py-2.5 rounded-lg border border-outline-variant text-on-surface-variant text-sm font-semibold hover:bg-surface-container-low transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 px-4 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all shadow-[0px_2px_4px_rgba(0,0,0,0.1)]">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function rupiahFormatted(nilai) {
        const angka = String(nilai ?? '').replace(/\D/g, '');
        return angka === '' ? '' : 'Rp ' + parseInt(angka, 10).toLocaleString('id-ID');
    }
    function formatHarga(input) {
        input.value = rupiahFormatted(input.value);
    }
    function siapkanHarga(form) {
        const harga = form.querySelector('[name="harga"]');
        if (harga) {
            harga.value = harga.value.replace(/\D/g, '');
        }
        return true;
    }
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[name="harga"]').forEach(function (input) {
            if (input.value !== '') {
                formatHarga(input);
            }
        });
    });
</script>

</body>
</html>
