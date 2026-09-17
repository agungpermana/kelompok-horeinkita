@extends('layouts.warung')

@section('title', 'Data Penerima - Wapen')
@section('active_menu', 'penerima')
@section('page_title', 'Data Penerima')

@section('header_actions')
<form method="GET" action="{{ route('warung.penerima.index') }}" class="flex items-center gap-2">
    <div class="relative">
        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-base">search</span>
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari nama penerima..."
            class="pl-9 pr-4 py-2 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all w-56"/>
    </div>
    <button type="submit" class="px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
        Cari
    </button>
    @if(request('search'))
        <a href="{{ route('warung.penerima.index') }}" class="px-4 py-2 rounded-lg border border-outline-variant text-on-surface-variant text-sm font-semibold hover:bg-surface-container-low transition-all">
            Reset
        </a>
    @endif
</form>
@endsection

@section('content')
@php
    $myWarung = \App\Models\DataWarung::where('id_user', auth()->user()->id_user)->first();
@endphp

{{-- Info filter aktif --}}
@if($myWarung && $myWarung->lokasi_rw && $myWarung->lokasi_rw !== '-')
    <div class="flex items-center gap-2 bg-blue-50 border border-blue-200 text-blue-800 rounded-xl px-4 py-3 text-sm">
        <span class="material-symbols-outlined text-blue-500 text-xl">filter_list</span>
        Menampilkan penerima di wilayah <strong>{{ $myWarung->lokasi_rw }}</strong>
    </div>
@endif

@if($penerimas->count() > 0)
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-outline-variant/40 flex items-center justify-between">
            <p class="text-sm font-semibold text-on-surface">Total: {{ $penerimas->count() }} penerima</p>
        </div>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-surface-container border-b border-outline-variant">
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant w-10">#</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant">Nama</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant hidden md:table-cell">No. HP</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant hidden sm:table-cell">Lokasi RW</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant hidden lg:table-cell">Alamat</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-on-surface-variant hidden md:table-cell">Survey</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-on-surface-variant">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penerimas as $i => $penerima)
                <tr class="border-b border-outline-variant/40 hover:bg-surface-container-low transition-colors last:border-b-0">
                    <td class="px-4 py-3.5 text-sm text-on-surface-variant">{{ $i + 1 }}</td>
                    <td class="px-4 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center flex-shrink-0">
                                <span class="text-xs font-bold text-on-secondary-container">
                                    {{ strtoupper(substr($penerima->user?->nama_lengkap ?? '?', 0, 1)) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-on-surface">{{ $penerima->user?->nama_lengkap ?? '-' }}</p>
                                <p class="text-xs text-on-surface-variant">{{ $penerima->user?->username ?? '-' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3.5 text-sm text-on-surface-variant hidden md:table-cell">
                        {{ $penerima->user?->nomor_hp ?? '-' }}
                    </td>
                    <td class="px-4 py-3.5 hidden sm:table-cell">
                        @if($penerima->lokasi_rw)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-semibold">
                                {{ $penerima->lokasi_rw }}
                            </span>
                        @else
                            <span class="text-sm text-on-surface-variant">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3.5 text-sm text-on-surface-variant hidden lg:table-cell">
                        {{ Str::limit($penerima->alamat_penerima ?? '-', 40) }}
                    </td>
                    <td class="px-4 py-3.5 hidden md:table-cell">
                        @if($penerima->survey)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                {{ Str::limit($penerima->survey->nama_subjek ?? 'Ada', 20) }}
                            </span>
                        @else
                            <span class="text-xs text-on-surface-variant">Belum survey</span>
                        @endif
                    </td>
                    <td class="px-4 py-3.5 text-right">
                        <a href="{{ route('warung.penerima.show', $penerima->id_penerima) }}"
                           class="flex items-center gap-1 px-3 py-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-low text-xs font-semibold transition-all inline-flex">
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
        <span class="material-symbols-outlined text-6xl text-on-surface-variant opacity-30">group</span>
        <div class="text-center">
            <p class="text-lg font-semibold text-on-surface">
                {{ request('search') ? 'Penerima tidak ditemukan' : 'Belum ada data penerima' }}
            </p>
            <p class="text-sm text-on-surface-variant mt-1">
                {{ request('search') ? 'Coba kata kunci lain.' : 'Data penerima akan muncul di sini.' }}
            </p>
        </div>
    </div>
@endif
@endsection
