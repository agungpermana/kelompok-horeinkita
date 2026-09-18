@extends('layouts.warung')

@section('title', 'Bukti Penyerahan - Wapen')
@section('active_menu', 'bukti_penyerahan')
@section('page_title', 'Bukti Penyerahan & Riwayat')

@section('content')
    <div id="alert-success" class="hidden flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm">
        <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
        <span id="alert-success-text"></span>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm">
            <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div id="table-container">
        @if($buktis->count() > 0)
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-outline-variant/40 bg-surface-container text-xs uppercase tracking-wide text-on-surface-variant">
                                <th class="text-left px-5 py-3 font-semibold">ID</th>
                                <th class="text-left px-5 py-3 font-semibold">Kupon</th>
                                <th class="text-left px-5 py-3 font-semibold">Donatur</th>
                                <th class="text-left px-5 py-3 font-semibold">Penerima</th>
                                <th class="text-left px-5 py-3 font-semibold">Tanggal Penyerahan</th>
                                <th class="text-left px-5 py-3 font-semibold">Status</th>
                                <th class="text-left px-5 py-3 font-semibold">Foto</th>
                                <th class="text-left px-5 py-3 font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buktis as $bukti)
                            @php
                                $transaksi   = $bukti->kupon?->transaksi;
                                $namaDonatur = $transaksi?->donatur?->nama_lengkap ?? '-';
                                $namaPenerima = $transaksi?->penerima?->user?->nama_lengkap ?? '-';
                            @endphp
                            <tr class="border-b border-outline-variant/20 hover:bg-surface-container-low transition-all">
                                <td class="px-5 py-3.5 font-semibold text-on-surface">#{{ $bukti->id_bukti }}</td>
                                <td class="px-5 py-3.5">Kupon #{{ $bukti->id_kupon ?? '-' }}</td>
                                <td class="px-5 py-3.5">{{ $namaDonatur }}</td>
                                <td class="px-5 py-3.5">{{ $namaPenerima }}</td>
                                <td class="px-5 py-3.5">{{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}</td>
                                <td class="px-5 py-3.5">
                                    @php $statusTerakhir = $bukti->riwayat->first()->status_penyaluran ?? 'pending'; @endphp
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                                        {{ $statusTerakhir === 'selesai' ? 'bg-green-100 text-green-700' :
                                           ($statusTerakhir === 'proses' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700') }}">
                                        {{ ucfirst($statusTerakhir) }}
                                    </span>
                                </td>
                                <td class="px-5 py-3.5">
                                    @if($bukti->foto_bukti_url)
                                        <a href="{{ Storage::url($bukti->foto_bukti_url) }}" target="_blank">
                                            <img src="{{ Storage::url($bukti->foto_bukti_url) }}"
                                                 alt="Foto Bukti"
                                                 class="w-12 h-12 rounded-lg border border-outline-variant object-cover hover:opacity-80 transition-all cursor-pointer"/>
                                        </a>
                                    @else
                                        <span class="text-on-surface-variant">-</span>
                                    @endif
                                </td>
                                <td class="px-5 py-3.5">
                                    <a href="{{ route('bukti-penyerahan.show', $bukti->id_bukti) }}"
                                       class="inline-flex items-center gap-1 text-xs text-primary font-semibold hover:underline">
                                        <span class="material-symbols-outlined text-sm">visibility</span>
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm flex flex-col items-center justify-center py-20 gap-4" id="empty-state">
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

    <div class="flex justify-end mt-3">
        <button onclick="bukaModal()"
           class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all shadow-sm">
            <span class="material-symbols-outlined text-base">add</span>
            Tambah Bukti
        </button>
    </div>
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

        <form id="form-bukti" action="{{ route('bukti-penyerahan.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
            @csrf

            @php
                $myWarung = \App\Models\DataWarung::where('id_user', auth()->user()->id_user ?? auth()->id())->first();
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
                    <select name="id_kupon" id="id_kupon" required
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        <option value="">-- Pilih Kupon --</option>
                        @foreach($kupons as $kupon)
                            <option value="{{ $kupon->id_kupon }}">
                                Kupon #{{ $kupon->id_kupon }}
                                @if($kupon->kode_kupon) — {{ $kupon->kode_kupon }} @endif
                                @if($kupon->transaksi?->penerima?->user?->nama_lengkap) — {{ $kupon->transaksi->penerima->user->nama_lengkap }} @endif
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

            <div id="form-error" class="hidden flex items-start gap-2 bg-red-50 border border-red-200 text-red-800 rounded-lg px-3 py-2 text-sm">
                <span class="material-symbols-outlined text-red-500 text-lg">error</span>
                <span id="form-error-text"></span>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="button" onclick="tutupModal()"
                    class="flex-1 px-4 py-2.5 rounded-lg border border-outline-variant text-on-surface-variant text-sm font-semibold hover:bg-surface-container-low transition-all">
                    Batal
                </button>
                <button type="submit" id="btn-simpan"
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
    document.getElementById('form-error').classList.add('hidden');
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

function statusBadge(status) {
    let cls = 'bg-blue-100 text-blue-700';
    if (status === 'selesai') cls = 'bg-green-100 text-green-700';
    else if (status === 'proses') cls = 'bg-yellow-100 text-yellow-700';
    return '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold ' + cls + '">' +
        status.charAt(0).toUpperCase() + status.slice(1) + '</span>';
}

function tampilkanAlert(text) {
    const alert = document.getElementById('alert-success');
    document.getElementById('alert-success-text').textContent = text;
    alert.classList.remove('hidden');
    alert.scrollIntoView({ behavior: 'smooth', block: 'center' });
    setTimeout(function() { alert.classList.add('hidden'); }, 4000);
}

function tambahBaris(data) {
    const container = document.getElementById('table-container');
    let table = document.querySelector('#table-container table');
    const emptyState = document.getElementById('empty-state');

    if (emptyState) {
        emptyState.remove();
        container.innerHTML = '' +
        '<div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">' +
            '<div class="overflow-x-auto"><table class="w-full text-sm">' +
                '<thead><tr class="border-b border-outline-variant/40 bg-surface-container text-xs uppercase tracking-wide text-on-surface-variant">' +
                    '<th class="text-left px-5 py-3 font-semibold">ID</th>' +
                    '<th class="text-left px-5 py-3 font-semibold">Kupon</th>' +
                    '<th class="text-left px-5 py-3 font-semibold">Donatur</th>' +
                    '<th class="text-left px-5 py-3 font-semibold">Penerima</th>' +
                    '<th class="text-left px-5 py-3 font-semibold">Tanggal Penyerahan</th>' +
                    '<th class="text-left px-5 py-3 font-semibold">Status</th>' +
                    '<th class="text-left px-5 py-3 font-semibold">Foto</th>' +
                    '<th class="text-left px-5 py-3 font-semibold">Aksi</th>' +
                '</tr></thead><tbody></tbody>' +
            '</table></div>' +
        '</div>';
        table = document.querySelector('#table-container table');
    }

    const tbody = table.querySelector('tbody');
    const tr = document.createElement('tr');
    tr.className = 'border-b border-outline-variant/20 hover:bg-surface-container-low transition-all';
    tr.innerHTML = '' +
        '<td class="px-5 py-3.5 font-semibold text-on-surface">#' + data.id_bukti + '</td>' +
        '<td class="px-5 py-3.5">Kupon #' + (data.id_kupon || '-') + '</td>' +
        '<td class="px-5 py-3.5">' + (data.donatur || '-') + '</td>' +
        '<td class="px-5 py-3.5">' + (data.penerima || '-') + '</td>' +
        '<td class="px-5 py-3.5">' + data.tanggal_penyerahan + '</td>' +
        '<td class="px-5 py-3.5">' + statusBadge(data.status) + '</td>' +
        '<td class="px-5 py-3.5">' + (data.foto_url
            ? '<a href="' + data.foto_url + '" target="_blank">' +
              '<img src="' + data.foto_url + '" alt="Foto Bukti" class="w-12 h-12 rounded-lg border border-outline-variant object-cover hover:opacity-80 transition-all cursor-pointer"/>' +
              '</a>'
            : '<span class="text-on-surface-variant">-</span>') + '</td>' +
        '<td class="px-5 py-3.5">' +
            '<a href="/bukti-penyerahan/' + data.id_bukti + '" class="inline-flex items-center gap-1 text-xs text-primary font-semibold hover:underline">' +
                '<span class="material-symbols-outlined text-sm">visibility</span>Detail' +
            '</a>' +
        '</td>';
    tbody.insertBefore(tr, tbody.firstChild);
}

document.getElementById('form-bukti').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const btn = document.getElementById('btn-simpan');
    btn.disabled = true;
    btn.textContent = 'Menyimpan...';
    document.getElementById('form-error').classList.add('hidden');

    const formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
        body: formData,
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
        if (data.success) {
            tambahBaris(data.data);
            tutupModal();
            tampilkanAlert(data.message);
            form.reset();
        } else {
            document.getElementById('form-error-text').textContent = data.message || 'Terjadi kesalahan.';
            document.getElementById('form-error').classList.remove('hidden');
        }
    })
    .catch(function() {
        document.getElementById('form-error-text').textContent = 'Terjadi kesalahan jaringan. Coba lagi.';
        document.getElementById('form-error').classList.remove('hidden');
    })
    .finally(function() {
        btn.disabled = false;
        btn.textContent = 'Simpan Bukti';
    });
});
</script>
@endpush