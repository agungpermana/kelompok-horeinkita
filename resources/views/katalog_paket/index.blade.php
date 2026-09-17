@extends('layouts.warung')

@section('title', 'Katalog Sembako - Wapen')
@section('active_menu', 'katalog')
@section('page_title', 'Katalog Sembako')

@section('header_actions')
<button onclick="bukaModalTambah()"
   class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white font-label-md text-label-md hover:opacity-90 transition-all shadow-sm">
    <span class="material-symbols-outlined text-base">add</span>
    Tambah Paket
</button>
@endsection

@section('content')

@if(session('success'))
    <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 font-body-sm text-body-sm">
        <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
        {{ session('success') }}
    </div>
@endif

@if($paket->count() > 0)
    <div class="bg-surface-container-lowest rounded-xl shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30 overflow-hidden">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-surface-container border-b border-outline-variant">
                    <th class="text-left px-4 py-3 font-label-md text-label-md text-on-surface-variant w-10">#</th>
                    <th class="text-left px-4 py-3 font-label-md text-label-md text-on-surface-variant">Nama Paket</th>
                    <th class="text-left px-4 py-3 font-label-md text-label-md text-on-surface-variant hidden md:table-cell">Warung</th>
                    <th class="text-left px-4 py-3 font-label-md text-label-md text-on-surface-variant">Harga</th>
                    <th class="text-left px-4 py-3 font-label-md text-label-md text-on-surface-variant hidden sm:table-cell">Stok</th>
                    <th class="text-right px-4 py-3 font-label-md text-label-md text-on-surface-variant">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paket as $i => $item)
                <tr class="border-b border-outline-variant/40 hover:bg-surface-container-low transition-colors last:border-b-0">
                    <td class="px-4 py-4 font-body-sm text-body-sm text-on-surface-variant">{{ $i + 1 }}</td>
                    <td class="px-4 py-4">
                        <p class="font-label-md text-label-md text-on-surface">{{ $item->nama_paket }}</p>
                        @if($item->deskripsi)
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">{{ Str::limit($item->deskripsi, 55) }}</p>
                        @endif
                    </td>
                    <td class="px-4 py-4 font-body-sm text-body-sm text-on-surface-variant hidden md:table-cell">
                        {{ $item->warung->nama_warung ?? '-' }}
                    </td>
                    <td class="px-4 py-4 font-label-md text-label-md text-primary">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-4 hidden sm:table-cell">
                        @if($item->stok > 0)
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-green-100 text-green-700 font-label-sm text-label-sm">
                                {{ $item->stok }} unit
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 rounded-full bg-red-100 text-red-700 font-label-sm text-label-sm">
                                Habis
                            </span>
                        @endif
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <button type="button"
                                onclick="bukaModalEdit({{ $item->id_paket }}, '{{ addslashes($item->nama_paket) }}', '{{ addslashes($item->deskripsi) }}', {{ $item->harga }}, {{ $item->stok }})"
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-low font-label-sm text-label-sm transition-all">
                                <span class="material-symbols-outlined text-sm">edit</span>
                                Edit
                            </button>
                            <form action="{{ route('katalog-paket.destroy', $item->id_paket) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus paket ini?')"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 font-label-sm text-label-sm transition-all">
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
    <div class="bg-surface-container-lowest rounded-xl shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30 flex flex-col items-center justify-center py-20 gap-4">
        <span class="material-symbols-outlined text-6xl text-on-surface-variant/40">inventory_2</span>
        <div class="text-center">
            <p class="font-headline-sm text-headline-sm text-on-surface">Belum ada paket sembako</p>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Tambahkan paket sembako pertama untuk warung Anda.</p>
        </div>
        <button onclick="bukaModalTambah()"
           class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-primary text-white font-label-md text-label-md hover:opacity-90 transition-all mt-2">
            <span class="material-symbols-outlined text-base">add</span>
            Tambah Paket
        </button>
    </div>
@endif

@endsection

@push('scripts')
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
        <form action="{{ route('katalog-paket.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
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
            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Gambar Paket</label>
                <div class="relative">
                    <input type="file" name="gambar_paket" id="gambar-tambah"
                        accept="image/jpg,image/jpeg,image/png,image/webp"
                        class="hidden" onchange="previewGambar(this, 'preview-tambah', 'label-tambah')"/>
                    <label for="gambar-tambah"
                        class="flex items-center gap-3 w-full px-3.5 py-2.5 border border-outline-variant border-dashed rounded-lg text-sm text-on-surface-variant bg-white hover:bg-surface-container-low cursor-pointer transition-all">
                        <span class="material-symbols-outlined text-xl text-primary">add_photo_alternate</span>
                        <span id="label-tambah">Pilih gambar dari galeri...</span>
                    </label>
                </div>
                <div id="preview-tambah" class="hidden mt-2">
                    <img id="img-tambah" src="" alt="Preview" class="w-20 h-20 object-cover rounded-lg border border-outline-variant"/>
                    <button type="button" onclick="hapusGambar('gambar-tambah','preview-tambah','label-tambah','img-tambah')" class="mt-1 text-xs text-red-500 hover:underline block">Hapus</button>
                </div>
                <p class="text-xs text-on-surface-variant mt-1">Format: JPG, PNG, WEBP. Maks 5MB.</p>
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
        <form id="form-edit" action="" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
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
            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Gambar Paket</label>
                <div id="edit-gambar-lama" class="hidden mb-2">
                    <p class="text-xs text-on-surface-variant mb-1">Gambar saat ini:</p>
                    <img id="img-edit-lama" src="" alt="Gambar" class="w-16 h-16 object-cover rounded-lg border border-outline-variant"/>
                </div>
                <div class="relative">
                    <input type="file" name="gambar_paket" id="gambar-edit"
                        accept="image/jpg,image/jpeg,image/png,image/webp"
                        class="hidden" onchange="previewGambar(this, 'preview-edit', 'label-edit')"/>
                    <label for="gambar-edit"
                        class="flex items-center gap-3 w-full px-3.5 py-2.5 border border-outline-variant border-dashed rounded-lg text-sm text-on-surface-variant bg-white hover:bg-surface-container-low cursor-pointer transition-all">
                        <span class="material-symbols-outlined text-xl text-primary">add_photo_alternate</span>
                        <span id="label-edit">Ganti gambar (opsional)...</span>
                    </label>
                </div>
                <div id="preview-edit" class="hidden mt-2">
                    <img id="img-edit" src="" alt="Preview" class="w-16 h-16 object-cover rounded-lg border border-outline-variant"/>
                    <button type="button" onclick="hapusGambar('gambar-edit','preview-edit','label-edit','img-edit')" class="mt-1 text-xs text-red-500 hover:underline block">Hapus pilihan</button>
                </div>
                <p class="text-xs text-on-surface-variant mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
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
function bukaModalEdit(id, nama, deskripsi, harga, stok, gambar) {
    document.getElementById('form-edit').action = '/katalog-paket/' + id;
    document.getElementById('edit-nama').value = nama;
    document.getElementById('edit-deskripsi').value = deskripsi;
    document.getElementById('edit-harga').value = harga;
    document.getElementById('edit-stok').value = stok;
    // Tampilkan gambar lama jika ada
    const imgLama = document.getElementById('edit-gambar-lama');
    if (gambar) {
        document.getElementById('img-edit-lama').src = '/storage/' + gambar;
        imgLama.classList.remove('hidden');
    } else {
        imgLama.classList.add('hidden');
    }
    // Reset preview baru
    hapusGambar('gambar-edit','preview-edit','label-edit','img-edit');
    document.getElementById('modal-edit').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}
function tutupModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = '';
}
function previewGambar(input, previewId, labelId) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        const imgId = previewId === 'preview-tambah' ? 'img-tambah' : 'img-edit';
        reader.onload = function(e) {
            document.getElementById(imgId).src = e.target.result;
            document.getElementById(previewId).classList.remove('hidden');
            document.getElementById(labelId).textContent = file.name;
        };
        reader.readAsDataURL(file);
    }
}
function hapusGambar(inputId, previewId, labelId, imgId) {
    document.getElementById(inputId).value = '';
    document.getElementById(previewId).classList.add('hidden');
    document.getElementById(labelId).textContent = inputId === 'gambar-tambah' ? 'Pilih gambar dari galeri...' : 'Ganti gambar (opsional)...';
    document.getElementById(imgId).src = '';
}
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        tutupModal('modal-tambah');
        tutupModal('modal-edit');
    }
});
@if($errors->any() && !old('_method'))
    document.addEventListener('DOMContentLoaded', () => bukaModalTambah());
@endif
</script>
@endpush
