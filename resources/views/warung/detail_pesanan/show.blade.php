@extends('layouts.warung')

@section('title', 'Detail Pesanan - Wapen')
@section('active_menu', 'detail_pesanan')
@section('page_title', 'Detail Pesanan')

@section('header_back_button')
<a href="{{ route('warung.detail-pesanan.index') }}"
   class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-surface-container transition-all text-on-surface-variant">
    <span class="material-symbols-outlined text-xl">arrow_back</span>
</a>
@endsection

@section('content')
<div class="max-w-2xl space-y-5">

    @if (session('success'))
    <div class="bg-secondary-container text-on-secondary-container rounded-xl p-4 flex items-center gap-3 shadow-sm">
        <span class="material-symbols-outlined">check_circle</span>
        <p class="text-sm font-semibold">{{ session('success') }}</p>
    </div>
    @endif

    {{-- Status & ID --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-xs text-on-surface-variant mb-1">ID Pesanan</p>
                <p class="text-lg font-bold text-on-surface">#{{ $pesanan->id_transaksi }}</p>
            </div>
            @php
                $status = strtolower($pesanan->status_pembayaran ?? 'pending');
                $color  = match($status) {
                    'lunas' => 'bg-green-100 text-green-700',
                    'gagal' => 'bg-red-100 text-red-700',
                    default => 'bg-yellow-100 text-yellow-700',
                };
                $label  = match($status) {
                    'lunas' => 'Diterima',
                    'gagal' => 'Ditolak',
                    default => 'Menunggu Persetujuan',
                };
            @endphp
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $color }}">
                {{ $label }}
            </span>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-xs text-on-surface-variant mb-1">Tanggal</p>
                <p class="text-sm font-semibold">{{ $pesanan->tanggal_transaksi ? \Carbon\Carbon::parse($pesanan->tanggal_transaksi)->format('d M Y H:i') : '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-on-surface-variant mb-1">Metode Pembayaran</p>
                <p class="text-sm font-semibold">{{ $pesanan->metode_pembayaran ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-on-surface-variant mb-1">Jumlah Paket</p>
                <p class="text-sm font-semibold">{{ $pesanan->jumlah_paket }} unit</p>
            </div>
            <div>
                <p class="text-xs text-on-surface-variant mb-1">Total Bayar</p>
                <p class="text-sm font-bold text-primary">Rp {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    {{-- Donatur --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
        <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">volunteer_activism</span>
            Donatur
        </h2>
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-bold text-on-secondary-container">
                    {{ strtoupper(substr($pesanan->donatur?->nama_lengkap ?? '?', 0, 1)) }}
                </span>
            </div>
            <div>
                <p class="text-sm font-semibold text-on-surface">{{ $pesanan->donatur?->nama_lengkap ?? '-' }}</p>
                <p class="text-xs text-on-surface-variant">{{ $pesanan->donatur?->email ?? '-' }}</p>
                <p class="text-xs text-on-surface-variant">{{ $pesanan->donatur?->nomor_hp ?? '-' }}</p>
            </div>
        </div>
    </div>

    {{-- Paket --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
        <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">inventory_2</span>
            Paket Sembako
        </h2>
        @if($pesanan->paket)
        <div class="flex items-center gap-4">
            @if($pesanan->paket->gambar_paket)
                <img src="{{ Storage::url($pesanan->paket->gambar_paket) }}"
                     alt="Gambar Paket"
                     class="w-16 h-16 rounded-xl object-cover border border-outline-variant flex-shrink-0"/>
            @else
                <div class="w-16 h-16 rounded-xl bg-surface-container flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-on-surface-variant text-2xl">inventory_2</span>
                </div>
            @endif
            <div>
                <p class="text-sm font-semibold text-on-surface">{{ $pesanan->paket->nama_paket }}</p>
                <p class="text-xs text-on-surface-variant mt-0.5">{{ $pesanan->paket->deskripsi ?? '-' }}</p>
                <p class="text-sm font-semibold text-primary mt-1">Rp {{ number_format($pesanan->paket->harga, 0, ',', '.') }} / paket</p>
            </div>
        </div>
        @else
            <p class="text-sm text-on-surface-variant">Data paket tidak ditemukan.</p>
        @endif
    </div>

    {{-- Penerima --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
        <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">person</span>
            Penerima
        </h2>
        @if($pesanan->penerima?->user)
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-xs text-on-surface-variant mb-1">Nama</p>
                <p class="text-sm font-semibold">{{ $pesanan->penerima->user->nama_lengkap ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-on-surface-variant mb-1">No. HP</p>
                <p class="text-sm font-semibold">{{ $pesanan->penerima->user->nomor_hp ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-on-surface-variant mb-1">Lokasi RW</p>
                <p class="text-sm font-semibold">{{ $pesanan->penerima->lokasi_rw ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-on-surface-variant mb-1">Alamat</p>
                <p class="text-sm">{{ $pesanan->penerima->alamat_penerima ?? '-' }}</p>
            </div>
        </div>
        @else
            <p class="text-sm text-on-surface-variant">Data penerima tidak ditemukan.</p>
        @endif
    </div>

    @if ($status === 'pending')
        {{-- Aksi Persetujuan --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
            <h2 class="text-sm font-bold text-on-surface mb-1 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">fact_check</span>
                Konfirmasi Pesanan
            </h2>
            <p class="text-xs text-on-surface-variant mb-4">Terima pesanan untuk memproses penyaluran dan menerbitkan kupon donasi, atau tolak jika tidak dapat diproses.</p>
            <div class="flex flex-col sm:flex-row gap-3">
                <form method="POST" action="{{ route('warung.detail-pesanan.terima', $pesanan->id_transaksi) }}" class="flex-1"
                    onsubmit="return confirm('Terima pesanan #{{ $pesanan->id_transaksi }}?');">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-primary text-white text-sm font-bold hover:opacity-90 transition-all">
                        <span class="material-symbols-outlined" data-weight="fill">check_circle</span>
                        Terima
                    </button>
                </form>
                <form method="POST" action="{{ route('warung.detail-pesanan.tolak', $pesanan->id_transaksi) }}" class="flex-1"
                    onsubmit="return confirm('Tolak pesanan #{{ $pesanan->id_transaksi }}?');">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl border border-error text-error text-sm font-bold hover:bg-error-container transition-all">
                        <span class="material-symbols-outlined">close</span>
                        Tolak
                    </button>
                </form>
            </div>
        </div>
    @elseif ($status === 'lunas' && $pesanan->kupon)
        {{-- Kupon Digital --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
            <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">confirmation_number</span>
                Kupon Digital
            </h2>
            <div class="flex items-center justify-between gap-4 border border-dashed border-outline-variant rounded-xl p-4 bg-surface-container-low">
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">Kode Kupon</p>
                    <p class="text-lg font-bold tracking-widest text-primary">{{ $pesanan->kupon->kode_kupon }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-on-surface-variant mb-1">Berlaku Hingga</p>
                    <p class="text-sm font-semibold">{{ $pesanan->kupon->tanggal_kadaluarsa ? \Carbon\Carbon::parse($pesanan->kupon->tanggal_kadaluarsa)->translatedFormat('d M Y') : '-' }}</p>
                </div>
            </div>
        </div>
    @endif

</div>
@endsection
