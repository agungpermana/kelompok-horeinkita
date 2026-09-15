<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Bukti Penyerahan - Wapen</title>
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
details > summary { list-style: none; }
details > summary::-webkit-details-marker { display: none; }
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
    <header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-6 md:px-10 py-4 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-on-surface">Bukti Penyerahan & Riwayat</h1>
        <button onclick="bukaModal()"
           class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all shadow-sm">
            <span class="material-symbols-outlined text-base">add</span>
            Tambah Bukti
        </button>
    </header>

    <div class="p-6 md:p-10 max-w-5xl mx-auto space-y-5">

        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm">
                <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        @if($buktis->count() > 0)
            <div class="space-y-4">
                @foreach($buktis as $bukti)
                <details class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden group" {{ $loop->first ? 'open' : '' }}>
                    <summary class="flex items-center justify-between px-5 py-4 cursor-pointer hover:bg-surface-container-low transition-all select-none">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">receipt_long</span>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-on-surface">Kupon #{{ $bukti->id_kupon }}</p>
                                <p class="text-xs text-on-surface-variant mt-0.5">
                                    {{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}
                                    @if($bukti->riwayat->count() > 0)
                                        &bull;
                                        @php $statusTerakhir = $bukti->riwayat->first()->status_penyaluran; @endphp
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                                            {{ $statusTerakhir === 'selesai' ? 'bg-green-100 text-green-700' :
                                               ($statusTerakhir === 'proses' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700') }}">
                                            {{ ucfirst($statusTerakhir) }}
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <span class="material-symbols-outlined text-on-surface-variant text-xl transition-transform group-open:rotate-180">expand_more</span>
                    </summary>

                    <div class="border-t border-outline-variant/40 px-5 py-4 space-y-4">
                        {{-- Info --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-surface-container rounded-xl p-4">
                            <div>
                                <p class="text-xs text-on-surface-variant mb-1">ID Kupon</p>
                                <p class="text-sm font-semibold">#{{ $bukti->id_kupon }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-on-surface-variant mb-1">Tanggal</p>
                                <p class="text-sm font-semibold">{{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-on-surface-variant mb-1">Catatan</p>
                                <p class="text-sm">{{ $bukti->catatan_penyerahan ?? '-' }}</p>
                            </div>
                        </div>

                        {{-- Riwayat --}}
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-semibold text-on-surface">Riwayat Penyaluran</p>
                                <a href="{{ route('bukti-penyerahan.show', $bukti->id_bukti) }}"
                                   class="flex items-center gap-1 text-xs text-primary font-semibold hover:underline">
                                    <span class="material-symbols-outlined text-sm">add_circle</span>
                                    Tambah Riwayat
                                </a>
                            </div>
                            @if($bukti->riwayat->count() > 0)
                                <div class="relative">
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
                                <div class="text-center py-6 bg-surface-container rounded-xl">
                                    <p class="text-sm text-on-surface-variant">Belum ada riwayat penyaluran.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </details>
                @endforeach
            </div>
        @else
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm flex flex-col items-center justify-center py-20 gap-4">
                <span class="material-symbols-outlined text-6xl text-on-surface-variant opacity-30">assignment_turned_in</span>
                <div class="text-center">
                    <p class="text-lg font-semibold text-on-surface">Belum ada bukti penyerahan</p>
                    <p class="text-sm text-on-surface-variant mt-1">Klik "Tambah Bukti" untuk memulai.</p>
                </div>
                <button onclick="bukaModal()"
                   class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all mt-2">
                    <span class="material-symbols-outlined text-base">add</span>
                    Tambah Bukti
                </button>
            </div>
        @endif
    </div>
</main>

{{-- ===================== MODAL TAMBAH BUKTI ===================== --}}
<div id="modal-bukti" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="tutupModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-lg z-10 max-h-[90vh] overflow-y-auto">

        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-outline-variant sticky top-0 bg-white">
            <h2 class="text-base font-bold text-on-surface">Tambah Bukti Penyerahan</h2>
            <button onclick="tutupModal()" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-surface-container text-on-surface-variant transition-all">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>

        {{-- Form --}}
        <form action="{{ route('bukti-penyerahan.store') }}" method="POST" class="px-6 py-5 space-y-4">
            @csrf

            @php
                $myWarung = \App\Models\DataWarung::where('id_user', auth()->user()->id_user ?? auth()->id())->first();
                $kupons   = \App\Models\kupon_digital::all();
            @endphp

            {{-- Info warung --}}
            @if($myWarung)
                <div class="flex items-center gap-2 px-3 py-2 bg-surface-container rounded-lg text-sm text-on-surface-variant">
                    <span class="material-symbols-outlined text-base">storefront</span>
                    <span>{{ $myWarung->nama_warung }}</span>
                </div>
            @endif

            {{-- Data Penyerahan --}}
            <p class="text-sm font-bold text-on-surface">Data Penyerahan</p>

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Kupon <span class="text-red-500">*</span></label>
                @if($kupons->count() > 0)
                    <select name="id_kupon" required
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        <option value="">-- Pilih Kupon --</option>
                        @foreach($kupons as $kupon)
                            <option value="{{ $kupon->id_kupon }}" {{ old('id_kupon') == $kupon->id_kupon ? 'selected' : '' }}>
                                Kupon #{{ $kupon->id_kupon }}
                                @if($kupon->kode_kupon) — {{ $kupon->kode_kupon }} @endif
                            </option>
                        @endforeach
                    </select>
                @else
                    <div class="px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface-variant bg-surface-container">
                        Belum ada kupon — kupon dibuat otomatis dari transaksi donasi
                    </div>
                    <input type="hidden" name="id_kupon" value=""/>
                @endif
                @error('id_kupon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Tanggal Penyerahan <span class="text-red-500">*</span></label>
                <input type="date" name="tanggal_penyerahan" value="{{ old('tanggal_penyerahan', date('Y-m-d')) }}"
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required/>
                @error('tanggal_penyerahan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Foto Bukti (URL)</label>
                <input type="text" name="foto_bukti_url" value="{{ old('foto_bukti_url') }}"
                    placeholder="https://..."
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"/>
            </div>

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Catatan Penyerahan</label>
                <textarea name="catatan_penyerahan" rows="2"
                    placeholder="Catatan tambahan..."
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ old('catatan_penyerahan') }}</textarea>
            </div>

            {{-- Status Awal --}}
            <div class="border-t border-outline-variant/40 pt-3">
                <p class="text-sm font-bold text-on-surface mb-3">Status Awal Penyaluran</p>

                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Status <span class="text-red-500">*</span></label>
                    <select name="status_penyaluran" required
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        <option value="">-- Pilih Status --</option>
                        <option value="pending" {{ old('status_penyaluran') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses"  {{ old('status_penyaluran') == 'proses'  ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ old('status_penyaluran') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    @error('status_penyaluran') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mt-3">
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Keterangan</label>
                    <textarea name="keterangan" rows="2"
                        placeholder="Keterangan status..."
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ old('keterangan') }}</textarea>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="tutupModal()"
                    class="flex-1 px-4 py-2.5 rounded-lg border border-outline-variant text-on-surface-variant text-sm font-semibold hover:bg-surface-container-low transition-all">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 px-4 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
                    Simpan Bukti
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function bukaModal() {
    document.getElementById('modal-bukti').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}
function tutupModal() {
    document.getElementById('modal-bukti').classList.add('hidden');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') tutupModal(); });
@if($errors->any())
    document.addEventListener('DOMContentLoaded', () => bukaModal());
@endif
</script>

</body>
</html>
