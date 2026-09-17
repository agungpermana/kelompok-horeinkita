@extends('layouts.warung')

@section('title', 'Bukti Penyerahan - Wapen')
@section('active_menu', 'bukti_penyerahan')
@section('page_title', 'Bukti Penyerahan & Riwayat')

@section('header_actions')
<button onclick="bukaModal()"
           class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all shadow-sm">
            <span class="material-symbols-outlined text-base">add</span>
            Tambah Bukti
        </button>
@endsection

@section('content')
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
                        <div class="bg-surface-container rounded-xl p-4">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-3">
                                <div>
                                    <p class="text-xs text-on-surface-variant mb-1">ID Kupon</p>
                                    <p class="text-sm font-semibold">#{{ $bukti->id_kupon ?? '-' }}</p>
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
                            @if($bukti->foto_bukti_url)
                            <div class="border-t border-outline-variant/30 pt-3">
                                <p class="text-xs text-on-surface-variant mb-2">Foto Bukti</p>
                                <a href="{{ Storage::url($bukti->foto_bukti_url) }}" target="_blank">
                                    <img src="{{ Storage::url($bukti->foto_bukti_url) }}"
                                         alt="Foto Bukti"
                                         class="w-48 h-48 rounded-xl border border-outline-variant object-cover hover:opacity-80 transition-all cursor-pointer"/>
                                </a>
                            </div>
                            @endif
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
@endsection

@push('scripts')
{{-- ===================== MODAL TAMBAH BUKTI ===================== --}}
<div id="modal-bukti" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="tutupModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-lg z-10 max-h-[90vh] overflow-y-auto">

        <div class="flex items-center justify-between px-6 py-4 border-b border-outline-variant sticky top-0 bg-white z-10">
            <h2 class="text-base font-bold text-on-surface">Tambah Bukti Penyerahan</h2>
            <button onclick="tutupModal()" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-surface-container text-on-surface-variant transition-all">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>

        <form action="{{ route('bukti-penyerahan.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
            @csrf

            @php
                $myWarung = \App\Models\DataWarung::where('id_user', auth()->user()->id_user ?? auth()->id())->first();
                $kupons   = \App\Models\kupon_digital::all();
            @endphp

            @if($myWarung)
                <div class="flex items-center gap-2 px-3 py-2 bg-surface-container rounded-lg text-sm text-on-surface-variant">
                    <span class="material-symbols-outlined text-base">storefront</span>
                    <span>{{ $myWarung->nama_warung }}</span>
                </div>
            @endif

            <p class="text-sm font-bold text-on-surface">Data Penyerahan</p>

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Kupon <span class="text-red-500">*</span></label>
                @if($kupons->count() > 0)
                    <select name="id_kupon" required
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        <option value="">-- Pilih Kupon --</option>
                        @foreach($kupons as $kupon)
                            <option value="{{ $kupon->id_kupon }}">
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
            </div>

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Tanggal Penyerahan <span class="text-red-500">*</span></label>
                <input type="date" name="tanggal_penyerahan" value="{{ date('Y-m-d') }}"
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required/>
            </div>

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Foto Bukti</label>
                <div class="relative">
                    <input type="file" name="foto_bukti" id="foto_bukti"
                        accept="image/jpg,image/jpeg,image/png,image/webp"
                        class="hidden"
                        onchange="previewFoto(this)"/>
                    <label for="foto_bukti"
                        class="flex items-center gap-3 w-full px-3.5 py-2.5 border border-outline-variant border-dashed rounded-lg text-sm text-on-surface-variant bg-white hover:bg-surface-container-low cursor-pointer transition-all">
                        <span class="material-symbols-outlined text-xl text-primary">add_photo_alternate</span>
                        <span id="foto-label">Pilih foto dari galeri...</span>
                    </label>
                </div>
                <div id="foto-preview" class="hidden mt-2">
                    <img id="foto-img" src="" alt="Preview" class="w-full max-h-40 object-cover rounded-lg border border-outline-variant"/>
                    <button type="button" onclick="hapusFoto()" class="mt-1 text-xs text-red-500 hover:underline">Hapus foto</button>
                </div>
                <p class="text-xs text-on-surface-variant mt-1">Format: JPG, PNG, WEBP. Maks 5MB.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">Catatan Penyerahan</label>
                <textarea name="catatan_penyerahan" rows="2"
                    placeholder="Catatan tambahan..."
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"></textarea>
            </div>

            <div class="border-t border-outline-variant/40 pt-3">
                <p class="text-sm font-bold text-on-surface mb-3">Status Awal Penyaluran</p>
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Status <span class="text-red-500">*</span></label>
                    <select name="status_penyaluran" required
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        <option value="">-- Pilih Status --</option>
                        <option value="pending">Pending</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Keterangan</label>
                    <textarea name="keterangan" rows="2"
                        placeholder="Keterangan status..."
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"></textarea>
                </div>
            </div>

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
    hapusFoto();
}
function previewFoto(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('foto-img').src = e.target.result;
            document.getElementById('foto-preview').classList.remove('hidden');
            document.getElementById('foto-label').textContent = file.name;
        };
        reader.readAsDataURL(file);
    }
}
function hapusFoto() {
    document.getElementById('foto_bukti').value = '';
    document.getElementById('foto-preview').classList.add('hidden');
    document.getElementById('foto-label').textContent = 'Pilih foto dari galeri...';
    document.getElementById('foto-img').src = '';
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') tutupModal();
});
</script>
@endpush
