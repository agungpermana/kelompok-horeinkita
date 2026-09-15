<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Tambah Bukti Penyerahan - Wapen</title>
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
                "on-secondary-container": "#3a3d86",
                "background": "#f8f9ff",
                "on-surface": "#0b1c30",
                "surface": "#f8f9ff",
                "surface-container": "#e5eeff",
                "outline": "#767588",
                "on-surface-variant": "#454556",
                "outline-variant": "#c6c4d9",
                "surface-container-low": "#eff4ff",
                "surface-container-lowest": "#ffffff",
            },
            fontFamily: { "sans": ["Inter", "sans-serif"] },
        }
    }
}
</script>
<style>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
.material-symbols-outlined[data-weight="fill"] { font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
</style>
</head>
<body class="bg-background font-sans text-on-surface flex min-h-screen">

{{-- SIDEBAR --}}
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
        <a href="{{ route('warung.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
            <span class="material-symbols-outlined text-xl">dashboard</span>
            <span class="text-sm">Dashboard</span>
        </a>
        <a href="{{ route('katalog-paket.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
            <span class="material-symbols-outlined text-xl">inventory_2</span>
            <span class="text-sm">Katalog Sembako</span>
        </a>
        <a href="{{ route('bukti-penyerahan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-secondary-container text-on-secondary-container font-semibold transition-all">
            <span class="material-symbols-outlined text-xl" data-weight="fill">assignment_turned_in</span>
            <span class="text-sm">Bukti Penyerahan</span>
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

{{-- MAIN --}}
<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">
    <header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-6 md:px-10 py-4 flex items-center gap-4">
        <a href="{{ route('bukti-penyerahan.index') }}" class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-surface-container transition-all text-on-surface-variant">
            <span class="material-symbols-outlined text-xl">arrow_back</span>
        </a>
        <h1 class="text-xl font-semibold text-on-surface">Tambah Bukti Penyerahan</h1>
    </header>

    <div class="p-6 md:p-10 max-w-2xl mx-auto">

        @if($errors->any())
            <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 mb-6 text-sm">
                <span class="material-symbols-outlined text-red-500 text-xl mt-0.5">error</span>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
            <form action="{{ route('bukti-penyerahan.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Info warung --}}
                @if($warung)
                    <div class="flex items-center gap-2 px-3 py-2 bg-surface-container rounded-lg text-sm text-on-surface-variant">
                        <span class="material-symbols-outlined text-base">storefront</span>
                        <span>{{ $warung->nama_warung }}</span>
                    </div>
                @endif

                {{-- Data Penyerahan --}}
                <div class="border-t border-outline-variant/40 pt-4">
                    <p class="text-sm font-bold text-on-surface mb-4">Data Penyerahan</p>
                    <div class="space-y-4">

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Kupon <span class="text-red-500">*</span></label>
                            @if($kupons->count() > 0)
                                <select name="id_kupon" required
                                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                    <option value="">-- Pilih Kupon --</option>
                                    @foreach($kupons as $kupon)
                                        <option value="{{ $kupon->id_kupon }}" {{ old('id_kupon') == $kupon->id_kupon ? 'selected' : '' }}>
                                            Kupon #{{ $kupon->id_kupon }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <div class="px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface-variant bg-surface-container">
                                    Tidak ada kupon tersedia
                                </div>
                            @endif
                            @error('id_kupon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Tanggal Penyerahan <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal_penyerahan"
                                value="{{ old('tanggal_penyerahan', date('Y-m-d')) }}"
                                class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                required/>
                            @error('tanggal_penyerahan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Foto Bukti (URL)</label>
                            <input type="text" name="foto_bukti_url" value="{{ old('foto_bukti_url') }}"
                                placeholder="https://..."
                                class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"/>
                            @error('foto_bukti_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Catatan Penyerahan</label>
                            <textarea name="catatan_penyerahan" rows="3"
                                placeholder="Catatan tambahan tentang penyerahan..."
                                class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ old('catatan_penyerahan') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Riwayat Awal --}}
                <div class="border-t border-outline-variant/40 pt-4">
                    <p class="text-sm font-bold text-on-surface mb-4">Status Awal Penyaluran</p>
                    <div class="space-y-4">

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Status <span class="text-red-500">*</span></label>
                            <select name="status_penyaluran" required
                                class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                <option value="">-- Pilih Status --</option>
                                <option value="pending" {{ old('status_penyaluran') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="proses" {{ old('status_penyaluran') == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ old('status_penyaluran') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status_penyaluran') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Keterangan</label>
                            <textarea name="keterangan" rows="2"
                                placeholder="Keterangan status penyaluran..."
                                class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ old('keterangan') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="flex gap-3 pt-2">
                    <a href="{{ route('bukti-penyerahan.index') }}"
                        class="flex-1 text-center px-4 py-2.5 rounded-lg border border-outline-variant text-on-surface-variant text-sm font-semibold hover:bg-surface-container-low transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 px-4 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
                        Simpan Bukti
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

</body>
</html>
