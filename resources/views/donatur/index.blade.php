@extends('layouts.donatur')

@section('title', 'Dashboard - Wapen Donatur')
@section('active_menu', 'dashboard')
@section('page_title', 'Dashboard')

@section('content')
    @php
        $paket = $paket ?? \App\Models\katalog_paket::with('warung')->get();
        $totalPaket = $paket->count();
        $totalWarung = $paket->pluck('warung.nama_warung')->filter()->unique()->count();
        $hargaTermurah = $paket->min('harga');
        $stokTersedia = $paket->sum('stok');
    @endphp

    {{-- Hero Banner --}}
    <section class="w-full bg-surface-container-highest rounded-xl p-8 md:p-16 flex flex-col items-center justify-center text-center gap-stack-md ambient-shadow-low relative overflow-hidden">
        <div class="bg-surface-container-lowest p-4 rounded-full mb-4 z-10 ambient-shadow-low">
            <span class="material-symbols-outlined text-4xl text-primary" data-weight="fill">volunteer_activism</span>
        </div>
        <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface z-10">Dashboard Donatur</h1>
        <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl z-10">Pilih paket sembako dari warung terverifikasi untuk disalurkan kepada mereka yang membutuhkan.</p>
    </section>

    {{-- Statistik Ringkas --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-gutter">
        <div class="bg-surface-container-lowest rounded-xl p-6 ambient-shadow-low">
            <div class="flex items-center gap-3 mb-2">
                <span class="w-10 h-10 rounded-lg bg-secondary-container flex items-center justify-center text-on-secondary-container">
                    <span class="material-symbols-outlined text-xl">inventory_2</span>
                </span>
            </div>
            <p class="font-headline-md text-headline-md text-on-surface">{{ number_format($totalPaket) }}</p>
            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Total Paket</p>
        </div>
        <div class="bg-surface-container-lowest rounded-xl p-6 ambient-shadow-low">
            <div class="flex items-center gap-3 mb-2">
                <span class="w-10 h-10 rounded-lg bg-secondary-container flex items-center justify-center text-on-secondary-container">
                    <span class="material-symbols-outlined text-xl">storefront</span>
                </span>
            </div>
            <p class="font-headline-md text-headline-md text-on-surface">{{ number_format($totalWarung) }}</p>
            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Total Warung</p>
        </div>
        <div class="bg-surface-container-lowest rounded-xl p-6 ambient-shadow-low">
            <div class="flex items-center gap-3 mb-2">
                <span class="w-10 h-10 rounded-lg bg-secondary-container flex items-center justify-center text-on-secondary-container">
                    <span class="material-symbols-outlined text-xl">sell</span>
                </span>
            </div>
            <p class="font-headline-md text-headline-md text-on-surface">Rp {{ $hargaTermurah !== null ? number_format((float) $hargaTermurah, 0, ',', '.') : '0' }}</p>
            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Harga Termurah</p>
        </div>
        <div class="bg-surface-container-lowest rounded-xl p-6 ambient-shadow-low">
            <div class="flex items-center gap-3 mb-2">
                <span class="w-10 h-10 rounded-lg bg-secondary-container flex items-center justify-center text-on-secondary-container">
                    <span class="material-symbols-outlined text-xl">package_2</span>
                </span>
            </div>
            <p class="font-headline-md text-headline-md text-on-surface">{{ number_format($stokTersedia) }}</p>
            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Stok Tersedia</p>
        </div>
    </div>

    {{-- Catalog Section --}}
    <div class="flex flex-col lg:flex-row gap-gutter">
        <div class="flex-grow flex flex-col gap-stack-lg">
            <div class="flex justify-between items-center pb-4 border-b border-outline-variant">
                <h2 class="font-headline-sm text-headline-sm text-on-surface">Katalog Paket Sembako</h2>
                <div class="flex items-center gap-3">
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase">URUTKAN:</span>
                    <select class="bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2 font-body-sm text-body-sm text-on-surface focus:border-primary outline-none cursor-pointer">
                        <option>Paling Sesuai</option>
                        <option>Harga Terendah</option>
                        <option>Harga Tertinggi</option>
                        <option>Stok Terbanyak</option>
                    </select>
                </div>
            </div>

            @if ($paket->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-gutter">
                    @foreach ($paket as $item)
                        <div class="bg-surface-container-lowest rounded-xl ambient-shadow-low overflow-hidden flex flex-col hover:-translate-y-1 transition-transform duration-300 border border-transparent hover:border-surface-container-highest">
                            <div class="relative h-40 bg-surface-container flex items-center justify-center p-4">
                                <div class="absolute top-4 left-4 z-10 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary" data-weight="fill">verified</span>
                                    <span class="font-label-sm text-label-sm text-on-surface">{{ $item->warung?->nama_warung ?? 'Warung Mitra' }}</span>
                                </div>
                                <span class="absolute top-4 right-4 bg-on-surface text-surface font-label-sm text-[10px] uppercase px-2 py-1 rounded-full z-10">PAKET</span>
                                <div class="w-full h-full rounded-lg bg-surface-container-high border-2 border-dashed border-outline-variant flex items-center justify-center relative overflow-hidden">
                                    <span class="font-label-md text-label-md text-on-surface-variant z-10 uppercase tracking-widest opacity-50">PAKET #{{ $item->id_paket }}</span>
                                </div>
                            </div>
                            <div class="p-6 flex flex-col flex-grow gap-3">
                                <div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight mb-1">{{ $item->nama_paket }}</h3>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">{{ $item->deskripsi ?: 'Belum ada deskripsi.' }}</p>
                                </div>
                                <div class="flex items-center gap-2 mt-auto">
                                    <span class="font-label-sm text-label-sm font-bold text-on-surface">{{ $item->stok }} Tersedia</span>
                                </div>
                                <div class="font-headline-md text-headline-md text-on-surface mt-1">Rp {{ number_format((float) $item->harga, 0, ',', '.') }}</div>
                                <div class="flex items-center gap-1 text-on-surface-variant mb-4">
                                    <span class="material-symbols-outlined text-[16px]">location_on</span>
                                    <span class="font-body-sm text-[12px]">{{ $item->warung?->alamat_warung ?: 'Lokasi Warung' }}</span>
                                </div>
                                <button class="w-full bg-primary-container text-on-primary rounded-xl py-3 font-label-md text-label-md uppercase tracking-wider hover:bg-primary transition-colors focus:ring-4 focus:ring-primary-container/30">
                                    PILIH PAKET
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-surface-container-lowest rounded-xl border border-dashed border-outline-variant flex flex-col items-center justify-center py-16 gap-3 text-center">
                    <span class="material-symbols-outlined text-5xl text-on-surface-variant opacity-30">inventory_2</span>
                    <div>
                        <p class="font-label-md text-label-md text-on-surface">Belum ada paket tersedia</p>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                            Paket sembako dari warung terverifikasi akan tampil di sini.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection