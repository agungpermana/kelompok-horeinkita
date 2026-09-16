@extends('layouts.warung')

@section('title', 'Dashboard - Wapen Warung')
@section('active_menu', 'dashboard')
@section('page_title', 'Dashboard')

@section('header_actions')
<span class="text-sm text-on-surface-variant">{{ now()->translatedFormat('d F Y') }}</span>
@endsection

@section('content')
{{-- Sambutan --}}
        <div class="bg-primary rounded-xl p-6 text-white">
            <p class="text-sm font-medium opacity-80 mb-1">Selamat datang,</p>
            <h2 class="text-2xl font-bold">{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</h2>
            <p class="text-sm opacity-70 mt-1">Kelola katalog sembako warung Anda dari sini.</p>
        </div>

        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @php
                $jumlahPaket = \App\Models\katalog_paket::count();
                $stokHabis   = \App\Models\katalog_paket::where('stok', 0)->count();
            @endphp

            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-[0px_2px_4px_rgba(0,0,0,0.05)] p-6 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-primary text-2xl" data-weight="fill">inventory_2</span>
                </div>
                <div>
                    <p class="text-sm text-on-surface-variant">Total Paket Sembako</p>
                    <p class="text-3xl font-bold text-primary mt-0.5">{{ $jumlahPaket }}</p>
                </div>
            </div>

            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-[0px_2px_4px_rgba(0,0,0,0.05)] p-6 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-red-500 text-2xl" data-weight="fill">warning</span>
                </div>
                <div>
                    <p class="text-sm text-on-surface-variant">Stok Habis</p>
                    <p class="text-3xl font-bold text-red-500 mt-0.5">{{ $stokHabis }}</p>
                </div>
            </div>
        </div>

        {{-- Aksi Cepat --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-[0px_2px_4px_rgba(0,0,0,0.05)] p-6">
            <h3 class="text-base font-semibold text-on-surface mb-4">Aksi Cepat</h3>
            <div class="flex flex-wrap gap-3">
                <a 
                   class="flex items-center gap-2 px-4 py-2.5 rounded-lg border border-outline-variant text-on-surface text-sm font-semibold hover:bg-surface-container-low transition-all">
                    <span class="material-symbols-outlined text-base">list</span>
                    Lihat Semua Katalog
                </a>
            </div>
        </div>
@endsection
