<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Katalog Sembako - Wapen</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                "secondary-container": "#a9acfd",
                "secondary": "#5457a1",
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
                "on-primary": "#ffffff",
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

{{-- ======================== SIDEBAR ======================== --}}
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
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
            <span class="material-symbols-outlined text-xl">dashboard</span>
            <span class="text-sm">Dashboard</span>
        </a>
        <a href="{{ route('katalog-paket.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-secondary-container text-on-secondary-container font-semibold transition-all">
            <span class="material-symbols-outlined text-xl" data-weight="fill">inventory_2</span>
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

{{-- ======================== MAIN ======================== --}}
<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">

    <header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-6 md:px-10 py-4 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-on-surface">Katalog Sembako</h1>
        <button onclick="bukaModalTambah()"
           class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all shadow-sm">
            <span class="material-symbols-outlined text-base">add</span>
            Tambah Paket
        </button>
    </header>

    <div class="p-6 md:p-10 max-w-5xl mx-auto space-y-5">

        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm">
                <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        @if($paket->count() > 0)
            <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-surface-container border-b border-outline-variant">
                            <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant w-10">#</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant">Nama Paket</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant">Harga</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant hidden sm:table-cell">Stok</th>
                            <th class="text-right px-4 py-3 text-xs font-semibold text-on-surface-variant">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paket as $i => $item)
                        <tr class="border-b border-outline-variant/40 hover:bg-surface-container-low transition-colors last:border-b-0">
                            <td class="px-4 py-3.5 text-sm text-on-surface-variant">{{ $i + 1 }}</td>
                            <td class="px-4 py-3.5">
                                <p class="text-sm font-semibold text-on-surface">{{ $item->nama_paket }}</p>
                                @if($item->deskripsi)
                                    <p class="text-xs text-on-surface-variant mt-0.5">{{ Str::limit($item->deskripsi, 55) }}</p>
                                @endif
                            </td>
                            <td class="px-4 py-3.5 text-sm font-semibold text-primary">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3.5 hidden sm:table-cell">
                                @if($item->stok > 0)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                        {{ $item->stok }} unit
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                                        Habis
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3.5">
                                <div class="flex items-center justify-end gap-2">
                                    {{-- Tombol Edit buka popup --}}
                                    <button type="button"
                                        onclick="bukaModalEdit({{ $item->id_paket }}, '{{ addslashes($item->nama_paket) }}', '{{ addslashes($item->deskripsi) }}', {{ $item->harga }}, {{ $item->stok }})"
                                        class="flex items-center gap-1 px-3 py-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-low text-xs font-semibold transition-all">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                        Edit
                                    </button>
                                    <form action="{{ route('katalog-paket.destroy', $item->id_paket) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus paket ini?')"
                                            class="flex items-center gap-1 px-3 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 text-xs font-semibold transition-all">
                                            <span class="material-symbols-outlined text-sm">delete</span>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm flex flex-col items-center justify-center py-20 gap-4">
                <span class="material-symbols-outlined text-6xl text-on-surface-variant opacity-30">inventory_2</span>
                <div class="text-center">
                    <p class="text-lg font-semibold text-on-surface">Belum ada paket sembako</p>
                    <p class="text-sm text-on-surface-variant mt-1">Klik tombol "Tambah Paket" untuk memulai.</p>
                </div>
                <button onclick="bukaModalTambah()"
                   class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all mt-2">
                    <span class="material-symbols-outlined text-base">add</span>
                    Tambah Paket
                </button>
            </div>
        @endif
    </div>
</main>

{{-- ======================== MODAL TAMBAH ======================== --}}
<div id="modal-tambah" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="tutupModal('modal-tambah')"></div>
    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-md z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-outline-variant">
            <h2 class="text-base font-bold text-on-surface">Tambah Paket Sembako</h2>
            <button onclick="tutupModal('modal-tambah')" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-surface-container text-on-surface-variant transition-all">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>
        <form action="{{ route('katalog-paket.store') }}" method="POST" class="px-6 py-5 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Warung <span class="text-red-500">*</span></label>
                <select name="id_warung" required
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    <option value="">-- Pilih Warung --</option>
                    @foreach(\App\Models\DataWarung::all() as $warung)
                        <option value="{{ $warung->id_warung }}" {{ old('id_warung') == $warung->id_warung ? 'selected' : '' }}>
                            {{ $warung->nama_warung }}
                        </option>
                    @endforeach
                </select>
                @error('id_warung') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Nama Paket <span class="text-red-500">*</span></label>
                <input type="text" name="nama_paket" value="{{ old('nama_paket') }}"
                    placeholder="Contoh: Paket Sembako Hemat A"
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required/>
                @error('nama_paket') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                    placeholder="Isi paket: beras 5kg, minyak 1L, gula 1kg, ..."
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Harga (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="harga" value="{{ old('harga') }}" min="0" placeholder="0"
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required/>
                    @error('harga') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Stok <span class="text-red-500">*</span></label>
                    <input type="number" name="stok" value="{{ old('stok') }}" min="0" placeholder="0"
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required/>
                    @error('stok') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah')"
                    class="flex-1 px-4 py-2.5 rounded-lg border border-outline-variant text-on-surface-variant text-sm font-semibold hover:bg-surface-container-low transition-all">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 px-4 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
                    Simpan Paket
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ======================== MODAL EDIT ======================== --}}
<div id="modal-edit" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="tutupModal('modal-edit')"></div>
    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-md z-10">
        <div class="flex items-center justify-between px-6 py-4 border-b border-outline-variant">
            <h2 class="text-base font-bold text-on-surface">Edit Paket Sembako</h2>
            <button onclick="tutupModal('modal-edit')" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-surface-container text-on-surface-variant transition-all">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>
        <form id="form-edit" action="" method="POST" class="px-6 py-5 space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Nama Paket <span class="text-red-500">*</span></label>
                <input type="text" id="edit-nama" name="nama_paket"
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required/>
            </div>
            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Deskripsi</label>
                <textarea id="edit-deskripsi" name="deskripsi" rows="3"
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Harga (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" id="edit-harga" name="harga" min="0"
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Stok <span class="text-red-500">*</span></label>
                    <input type="number" id="edit-stok" name="stok" min="0"
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required/>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="tutupModal('modal-edit')"
                    class="flex-1 px-4 py-2.5 rounded-lg border border-outline-variant text-on-surface-variant text-sm font-semibold hover:bg-surface-container-low transition-all">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 px-4 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function bukaModalTambah() {
    document.getElementById('modal-tambah').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function bukaModalEdit(id, nama, deskripsi, harga, stok) {
    // Set action form ke route update
    document.getElementById('form-edit').action = '/katalog-paket/' + id;
    // Isi nilai form
    document.getElementById('edit-nama').value = nama;
    document.getElementById('edit-deskripsi').value = deskripsi;
    document.getElementById('edit-harga').value = harga;
    document.getElementById('edit-stok').value = stok;
    // Buka modal
    document.getElementById('modal-edit').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function tutupModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        tutupModal('modal-tambah');
        tutupModal('modal-edit');
    }
});

// Buka modal tambah otomatis kalau ada error dari store
@if($errors->any() && !old('_method'))
    document.addEventListener('DOMContentLoaded', () => bukaModalTambah());
@endif
</script>

</body>
</html>
