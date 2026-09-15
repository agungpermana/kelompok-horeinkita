<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Detail Bukti Penyerahan - Wapen</title>
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
        <h1 class="text-xl font-semibold text-on-surface">Detail Bukti Penyerahan</h1>
    </header>

    <div class="p-6 md:p-10 max-w-3xl mx-auto space-y-6">

        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm">
                <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        {{-- Info Bukti --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
            <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">receipt_long</span>
                Informasi Bukti
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">ID Bukti</p>
                    <p class="text-sm font-semibold">#{{ $bukti->id_bukti }}</p>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">ID Kupon</p>
                    <p class="text-sm font-semibold">#{{ $bukti->id_kupon }}</p>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">Warung</p>
                    <p class="text-sm font-semibold">{{ $bukti->warung->nama_warung ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">Tanggal Penyerahan</p>
                    <p class="text-sm font-semibold">{{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs text-on-surface-variant mb-1">Catatan</p>
                    <p class="text-sm">{{ $bukti->catatan_penyerahan ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Riwayat Penyaluran --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
            <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">history</span>
                Riwayat Penyaluran
            </h2>

            @if($bukti->riwayat->count() > 0)
                <div class="relative mb-6">
                    <div class="absolute left-3.5 top-0 bottom-0 w-0.5 bg-outline-variant/50"></div>
                    <div class="space-y-3 pl-10">
                        @foreach($bukti->riwayat as $riwayat)
                        <div class="relative">
                            <div class="absolute -left-6 top-1.5 w-3 h-3 rounded-full border-2 border-primary bg-white"></div>
                            <div class="bg-surface-container rounded-lg p-3">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                                        {{ $riwayat->status_penyaluran === 'selesai' ? 'bg-green-100 text-green-700' :
                                           ($riwayat->status_penyaluran === 'proses' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700') }}">
                                        {{ ucfirst($riwayat->status_penyaluran) }}
                                    </span>
                                    <span class="text-xs text-on-surface-variant">
                                        {{ $riwayat->waktu_pencatatan ? $riwayat->waktu_pencatatan->format('d M Y H:i') : '-' }}
                                    </span>
                                </div>
                                @if($riwayat->keterangan)
                                    <p class="text-xs text-on-surface-variant mt-1">{{ $riwayat->keterangan }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-sm text-on-surface-variant mb-4">Belum ada riwayat penyaluran.</p>
            @endif

            {{-- Form Tambah Riwayat --}}
            <div class="border-t border-outline-variant/40 pt-4">
                <p class="text-sm font-semibold text-on-surface mb-3">Tambah Riwayat Baru</p>
                <form action="{{ route('bukti-penyerahan.riwayat.store', $bukti->id_bukti) }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-on-surface mb-1.5">Status <span class="text-red-500">*</span></label>
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
                        <label class="block text-xs font-semibold text-on-surface mb-1.5">Keterangan</label>
                        <textarea name="keterangan" rows="2" placeholder="Keterangan tambahan..."
                            class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ old('keterangan') }}</textarea>
                    </div>
                    <button type="submit"
                        class="flex items-center gap-2 px-4 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
                        <span class="material-symbols-outlined text-base">add</span>
                        Simpan Riwayat
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

</body>
</html>
