@extends('layouts.warung')

@section('title', 'Detail Pesanan - Wapen')
@section('active_menu', 'detail_pesanan')
@section('page_title', 'Detail Pesanan')

@section('header_actions')
<form method="GET" action="{{ route('warung.detail-pesanan.index') }}" class="flex items-center gap-2">
    <div class="relative">
        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">search</span>
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari donatur..."
            class="pl-9 pr-3 py-2 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all w-44"/>
    </div>
    <select name="status"
        class="px-3 py-2 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
        <option value="">Semua</option>
        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="lunas"   {{ request('status') === 'lunas'   ? 'selected' : '' }}>Lunas</option>
        <option value="gagal"   {{ request('status') === 'gagal'   ? 'selected' : '' }}>Gagal</option>
    </select>
    <button type="submit"
        class="px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
        Cari
    </button>
    @if(request('search') || request('status'))
        <a href="{{ route('warung.detail-pesanan.index') }}"
           class="px-3 py-2 rounded-lg border border-outline-variant text-on-surface-variant text-sm hover:bg-surface-container-low transition-all">
            ✕
        </a>
    @endif
</form>
@endsection

@section('content')

@if($pesanans->count() > 0)
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
        <div class="px-5 py-3.5 border-b border-outline-variant/40">
            <p class="text-sm font-semibold text-on-surface">Total: {{ $pesanans->count() }} pesanan</p>
        </div>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-surface-container border-b border-outline-variant">
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant w-10">#</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant">Donatur</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant hidden md:table-cell">Paket</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant hidden sm:table-cell">Jumlah</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant">Total</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant hidden md:table-cell">Metode</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant">Status</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-on-surface-variant">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanans as $i => $p)
                @php
                    $status = strtolower($p->status_pembayaran ?? 'pending');
                    $color  = match($status) {
                        'lunas' => 'bg-green-100 text-green-700',
                        'gagal' => 'bg-red-100 text-red-700',
                        default => 'bg-yellow-100 text-yellow-700',
                    };
                @endphp
                <tr class="border-b border-outline-variant/40 hover:bg-surface-container-low transition-colors last:border-b-0">
                    <td class="px-4 py-3.5 text-sm text-on-surface-variant">{{ $i + 1 }}</td>
                    <td class="px-4 py-3.5">
                        <p class="text-sm font-semibold text-on-surface">{{ $p->donatur?->nama_lengkap ?? '-' }}</p>
                        <p class="text-xs text-on-surface-variant">
                            {{ $p->tanggal_transaksi ? \Carbon\Carbon::parse($p->tanggal_transaksi)->format('d M Y') : '-' }}
                        </p>
                    </td>
                    <td class="px-4 py-3.5 text-sm text-on-surface-variant hidden md:table-cell">
                        {{ $p->paket?->nama_paket ?? '-' }}
                    </td>
                    <td class="px-4 py-3.5 text-sm text-on-surface hidden sm:table-cell">
                        {{ $p->jumlah_paket }} unit
                    </td>
                    <td class="px-4 py-3.5 text-sm font-semibold text-primary">
                        Rp {{ number_format($p->total_bayar, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3.5 text-sm text-on-surface-variant hidden md:table-cell">
                        {{ $p->metode_pembayaran ?? '-' }}
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold {{ $color }}">
                            {{ ucfirst($status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3.5 text-right">
                        <a href="{{ route('warung.detail-pesanan.show', $p->id_transaksi) }}"
                           class="flex items-center gap-1 px-3 py-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-low text-xs font-semibold transition-all inline-flex ml-auto">
                            <span class="material-symbols-outlined text-sm">visibility</span>
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm flex flex-col items-center justify-center py-20 gap-4">
        <span class="material-symbols-outlined text-6xl text-on-surface-variant opacity-30">receipt_long</span>
        <div class="text-center">
            <p class="text-lg font-semibold text-on-surface">
                {{ request('search') || request('status') ? 'Pesanan tidak ditemukan' : 'Belum ada pesanan' }}
            </p>
            <p class="text-sm text-on-surface-variant mt-1">
                Pesanan akan muncul di sini setelah ada donatur yang melakukan pembayaran.
            </p>
        </div>
    </div>
@endif

@endsection
