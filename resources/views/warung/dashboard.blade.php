@extends('layouts.warung')

@section('title', 'Dashboard - Wapen Warung')
@section('active_menu', 'dashboard')
@section('page_title', 'Dashboard Pemilik Warung')

@section('header_actions')
@php $myWarung = \App\Models\DataWarung::where('id_user', auth()->user()->id_user)->first(); @endphp
<div class="flex items-center gap-3">
    <div class="text-right hidden sm:block">
        <p class="text-xs font-semibold text-on-surface">{{ $myWarung->nama_warung ?? 'Warung Anda' }}</p>
        <p class="text-xs text-on-surface-variant">{{ $myWarung->lokasi_rw ?? '-' }}</p>
    </div>
    <a href="{{ route('warung.akun.edit') }}"
       class="w-9 h-9 rounded-full bg-surface-container border border-outline-variant flex items-center justify-center hover:bg-surface-container-high transition-all" title="Profil & Akun">
        <span class="material-symbols-outlined text-on-surface-variant text-xl">account_circle</span>
    </a>
</div>
@endsection

@section('content')
@php
    $myWarung     = \App\Models\DataWarung::where('id_user', auth()->user()->id_user)->first();
    $idWarung     = $myWarung?->id_warung;

    $totalBarang  = \App\Models\katalog_paket::when($idWarung, fn($q) => $q->where('id_warung', $idWarung))->count();
    $stokTotal    = \App\Models\katalog_paket::when($idWarung, fn($q) => $q->where('id_warung', $idWarung))->sum('stok');
    $stokMenipis  = \App\Models\katalog_paket::when($idWarung, fn($q) => $q->where('id_warung', $idWarung))
                        ->where('stok', '>', 0)->where('stok', '<=', 10)->get();
    $stokHabis    = \App\Models\katalog_paket::when($idWarung, fn($q) => $q->where('id_warung', $idWarung))
                        ->where('stok', 0)->get();
    $totalPenerima  = \App\Models\data_penerima::count();
    $totalPesanan   = \App\Models\transaksi_donasi::count();
    $penyerahanTerbaru = \App\Models\bukti_penyerahan::with(['riwayat' => fn($q) => $q->latest('waktu_pencatatan')])
                        ->when($idWarung, fn($q) => $q->where('id_warung', $idWarung))
                        ->latest('tanggal_penyerahan')->take(3)->get();
@endphp

@if(session('success'))
    <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm">
        <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
        {{ session('success') }}
    </div>
@endif

{{-- ===== STAT CARDS ===== --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <div class="bg-white rounded-xl border border-outline-variant/30 shadow-sm p-5">
        <div class="flex items-start justify-between mb-3">
            <p class="text-sm text-on-surface-variant">Total Barang</p>
            <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">inventory_2</span>
        </div>
        <p class="text-3xl font-bold text-on-surface">{{ $totalBarang }} <span class="text-lg font-semibold">Jenis</span></p>
        <p class="text-xs text-on-surface-variant mt-1">Stok tersedia: {{ $stokTotal }} unit</p>
    </div>

    <div class="bg-white rounded-xl border border-outline-variant/30 shadow-sm p-5">
        <div class="flex items-start justify-between mb-3">
            <p class="text-sm text-on-surface-variant">Penerima Terafiliasi</p>
            <span class="material-symbols-outlined text-secondary text-xl" data-weight="fill">group</span>
        </div>
        <p class="text-3xl font-bold text-on-surface">{{ $totalPenerima }} <span class="text-lg font-semibold">KK</span></p>
        <p class="text-xs text-on-surface-variant mt-1">Area RW 04 & 05</p>
    </div>

    <div class="bg-white rounded-xl border border-outline-variant/30 shadow-sm p-5">
        <div class="flex items-start justify-between mb-3">
            <p class="text-sm text-on-surface-variant">Detail Pesanan</p>
            <span class="material-symbols-outlined text-green-600 text-xl" data-weight="fill">receipt</span>
        </div>
        <p class="text-3xl font-bold text-on-surface">{{ $totalPesanan }}</p>
        <p class="text-xs text-on-surface-variant mt-1">Bulan {{ now()->translatedFormat('F Y') }}</p>
    </div>
</div>

{{-- ===== BARIS TENGAH ===== --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- Penyerahan Terbaru --}}
    <div class="bg-white rounded-xl border border-outline-variant/30 shadow-sm p-5">
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm font-bold text-on-surface">Penyerahan Terbaru</p>
            <a href="{{ route('bukti-penyerahan.index') }}" class="text-xs text-primary font-semibold hover:underline">Lihat Semua</a>
        </div>

        @if($penyerahanTerbaru->count() > 0)
            <div class="space-y-3">
                @foreach($penyerahanTerbaru as $bukti)
                @php
                    $riwayat = $bukti->riwayat->first();
                    $status  = $riwayat?->status_penyaluran ?? 'pending';
                    $badgeColor = match(strtolower($status)) {
                        'selesai' => 'bg-green-100 text-green-700',
                        'proses'  => 'bg-yellow-100 text-yellow-700',
                        default   => 'bg-blue-100 text-blue-700',
                    };
                @endphp
                <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-surface-container-low transition-all">
                    <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-primary text-base" data-weight="fill">person</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-on-surface truncate">
                            {{ $bukti->catatan_penyerahan ? Str::limit($bukti->catatan_penyerahan, 25) : 'Kupon #' . ($bukti->id_kupon ?? '-') }}
                        </p>
                        <p class="text-xs text-on-surface-variant">
                            Bukti #{{ $bukti->id_bukti }} &bull; {{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}
                        </p>
                    </div>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold flex-shrink-0 {{ $badgeColor }}">
                        {{ ucfirst($status) }}
                    </span>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <span class="material-symbols-outlined text-4xl text-on-surface-variant opacity-30">assignment_turned_in</span>
                <p class="text-sm text-on-surface-variant mt-2">Belum ada penyerahan.</p>
            </div>
        @endif
    </div>

    {{-- Stok Menipis --}}
    <div class="bg-white rounded-xl border border-outline-variant/30 shadow-sm p-5">
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm font-bold text-on-surface">Stok Menipis</p>
            <a href="{{ route('katalog-paket.index') }}"
               class="px-3 py-1.5 rounded-lg bg-on-surface text-white text-xs font-semibold hover:opacity-80 transition-all"
               style="background:#1e1e2e">
                Update Stok
            </a>
        </div>

        @if($stokMenipis->count() > 0 || $stokHabis->count() > 0)
            <table class="w-full">
                <thead>
                    <tr class="border-b border-outline-variant/40">
                        <th class="text-left text-xs font-semibold text-on-surface-variant pb-2">Barang</th>
                        <th class="text-center text-xs font-semibold text-on-surface-variant pb-2">Sisa Stok</th>
                        <th class="text-right text-xs font-semibold text-on-surface-variant pb-2">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/20">
                    @foreach($stokHabis->take(2) as $item)
                    <tr>
                        <td class="py-2.5 text-sm text-on-surface">{{ $item->nama_paket }}</td>
                        <td class="py-2.5 text-center text-sm font-bold text-red-600">0</td>
                        <td class="py-2.5 text-right">
                            <span class="text-xs font-semibold text-red-600">Kritis</span>
                        </td>
                    </tr>
                    @endforeach
                    @foreach($stokMenipis->take(3) as $item)
                    <tr>
                        <td class="py-2.5 text-sm text-on-surface">{{ $item->nama_paket }}</td>
                        <td class="py-2.5 text-center text-sm font-bold text-yellow-600">{{ $item->stok }}</td>
                        <td class="py-2.5 text-right">
                            <span class="text-xs font-semibold text-yellow-600">Peringatan</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center py-8">
                <span class="material-symbols-outlined text-4xl text-green-500 opacity-60">check_circle</span>
                <p class="text-sm text-on-surface-variant mt-2">Semua stok aman.</p>
            </div>
        @endif
    </div>
</div>

{{-- ===== SEBARAN PENERIMA ===== --}}
<div class="bg-white rounded-xl border border-outline-variant/30 shadow-sm p-5">
    <p class="text-sm font-bold text-on-surface mb-4">
        Sebaran Penerima {{ $myWarung?->lokasi_rw ?? 'RW' }}
    </p>
    <div class="bg-surface-container rounded-xl flex flex-col items-center justify-center py-14 gap-3">
        <span class="material-symbols-outlined text-5xl text-on-surface-variant opacity-30">map</span>
        <a href="{{ route('warung.penerima.index') }}"
           class="text-sm text-primary font-semibold hover:underline border border-primary/30 px-4 py-1.5 rounded-lg">
            [ Visualisasi Peta / Daftar Lokasi Penerima ]
        </a>
    </div>
</div>

@endsection
