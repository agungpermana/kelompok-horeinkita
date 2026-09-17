@extends('layouts.donatur')

@section('title', 'Riwayat Transaksi - Wapen Donatur')
@section('active_menu', 'riwayat')
@section('page_title', 'Riwayat Transaksi')

@section('content')
    @php
        $formatRp = function ($nilai) {
            return 'Rp ' . number_format((float) $nilai, 0, ',', '.');
        };
    @endphp

    @if (session('success'))
        <div class="w-full bg-secondary-container text-on-secondary-container rounded-xl p-4 flex items-center gap-3 shadow-soft-low">
            <span class="material-symbols-outlined">check_circle</span>
            <p class="font-label-md text-label-md">{{ session('success') }}</p>
        </div>
    @endif

    @if ($transaksis->count() > 0)
        <div class="bg-surface-container-lowest rounded-xl shadow-soft-low overflow-x-auto">
            <table class="w-full min-w-max">
                <thead>
                    <tr class="border-b border-outline-variant/60 bg-surface-container-low">
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">No</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Paket</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Penerima</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Metode</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Total</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Tanggal</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Status</th>
                        <th class="text-right px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $i => $t)
                        @php
                            $status = strtolower($t->status_pembayaran ?? 'pending');
                            $badge = match ($status) {
                                'lunas' => 'bg-secondary-container text-on-secondary-container',
                                'gagal' => 'bg-error-container text-on-error-container',
                                default => 'bg-surface-container-high text-on-surface',
                            };
                            $label = match ($status) {
                                'lunas' => 'Berhasil',
                                'gagal' => 'Dibatalkan',
                                default => 'Pending',
                            };
                        @endphp
                        <tr class="border-b border-outline-variant/40 hover:bg-surface-container-low transition-colors last:border-b-0">
                            <td class="px-4 py-4 font-body-sm text-body-sm text-on-surface-variant">{{ $i + 1 }}</td>
                            <td class="px-4 py-4">
                                <p class="font-label-md text-label-md text-on-surface">{{ $t->paket?->nama_paket ?? 'Paket Sembako' }}</p>
                                <p class="font-label-sm text-label-sm text-on-surface-variant">{{ $t->paket?->warung?->nama_warung ?? 'Warung Mitra' }}</p>
                                @if ($status === 'lunas' && $t->kupon)
                                    <p class="flex items-center gap-1 mt-1 text-primary">
                                        <span class="material-symbols-outlined text-sm">confirmation_number</span>
                                        <span class="font-label-sm text-label-sm tracking-widest">{{ $t->kupon->kode_kupon }}</span>
                                    </p>
                                @endif
                            </td>
                            <td class="px-4 py-4 font-body-sm text-body-sm text-on-surface">{{ $t->penerima?->user?->nama_lengkap ?? '-' }}</td>
                            <td class="px-4 py-4">
                                <span class="font-label-sm text-label-sm text-on-surface-variant uppercase">{{ $t->metode_pembayaran ?? '-' }}</span>
                            </td>
                            <td class="px-4 py-4 font-label-md text-label-md text-on-surface">{{ $formatRp($t->total_bayar) }}</td>
                            <td class="px-4 py-4 font-body-sm text-body-sm text-on-surface-variant">{{ $t->tanggal_transaksi ? \Carbon\Carbon::parse($t->tanggal_transaksi)->translatedFormat('d M Y, H:i') : '-' }}</td>
                            <td class="px-4 py-4">
                                <span class="font-label-sm text-label-sm px-3 py-1.5 rounded-full uppercase tracking-wider {{ $badge }}">
                                    {{ $label }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-right">
                                @if ($status === 'pending')
                                    <form method="POST" action="{{ route('donatur.riwayat.batalkan', $t->id_transaksi) }}"
                                        class="inline-block"
                                        onsubmit="return confirm('Batalkan pesanan #{{ $t->id_transaksi }}?');">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg border border-outline-variant text-error font-label-md text-label-md uppercase hover:bg-error-container transition-colors">
                                            <span class="material-symbols-outlined text-lg">close</span>
                                            Batalkan
                                        </button>
                                    </form>
                                @else
                                    <span class="font-body-sm text-body-sm text-on-surface-variant">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-surface-container-lowest rounded-xl border border-dashed border-outline-variant flex flex-col items-center justify-center py-20 gap-3 text-center">
            <span class="material-symbols-outlined text-5xl text-on-surface-variant opacity-30">receipt_long</span>
            <div>
                <p class="font-label-md text-label-md text-on-surface">Belum ada transaksi</p>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                    Donasi yang anda bayar akan tercatat di sini.
                </p>
            </div>
            <a href="{{ route('donatur.dashboard') }}"
                class="mt-2 px-4 py-2 rounded-lg bg-on-surface text-surface font-label-md text-label-md uppercase tracking-wider hover:bg-opacity-90 transition-opacity">
                Lihat Katalog Paket
            </a>
        </div>
    @endif
@endsection