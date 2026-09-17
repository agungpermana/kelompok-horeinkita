@extends('layouts.warung')

@section('title', 'Detail Penerima - Wapen')
@section('active_menu', 'penerima')
@section('page_title', 'Detail Penerima')

@section('header_back_button')
<a href="{{ route('warung.penerima.index') }}"
   class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-surface-container transition-all text-on-surface-variant">
    <span class="material-symbols-outlined text-xl">arrow_back</span>
</a>
@endsection

@section('content')
<div class="max-w-2xl space-y-5">

    {{-- Info Pribadi --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
        <div class="flex items-center gap-4 mb-5">
            <div class="w-14 h-14 rounded-full bg-secondary-container flex items-center justify-center flex-shrink-0">
                <span class="text-xl font-bold text-on-secondary-container">
                    {{ strtoupper(substr($penerima->user?->nama_lengkap ?? '?', 0, 1)) }}
                </span>
            </div>
            <div>
                <p class="text-lg font-bold text-on-surface">{{ $penerima->user?->nama_lengkap ?? '-' }}</p>
                <p class="text-sm text-on-surface-variant">@{{ $penerima->user?->username ?? '-' }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-xs text-on-surface-variant mb-1">Email</p>
                <p class="text-sm font-semibold text-on-surface">{{ $penerima->user?->email ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-on-surface-variant mb-1">No. HP</p>
                <p class="text-sm font-semibold text-on-surface">{{ $penerima->user?->nomor_hp ?? '-' }}</p>
            </div>
        </div>
    </div>

    {{-- Info Lokasi --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
        <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">location_on</span>
            Lokasi
        </h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-xs text-on-surface-variant mb-1">Lokasi RW</p>
                @if($penerima->lokasi_rw)
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-semibold">
                        {{ $penerima->lokasi_rw }}
                    </span>
                @else
                    <p class="text-sm text-on-surface-variant">-</p>
                @endif
            </div>
            <div class="col-span-2">
                <p class="text-xs text-on-surface-variant mb-1">Alamat</p>
                <p class="text-sm text-on-surface">{{ $penerima->alamat_penerima ?? '-' }}</p>
            </div>
        </div>
    </div>

    {{-- Info Survey --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
        <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">assignment</span>
            Data Survey
        </h2>
        @if($penerima->survey)
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">Nama Subjek</p>
                    <p class="text-sm font-semibold text-on-surface">{{ $penerima->survey->nama_subjek ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">Status Kelayakan</p>
                    <p class="text-sm font-semibold text-on-surface">{{ $penerima->survey->status_kelayakan ?? '-' }}</p>
                </div>
            </div>
        @else
            <div class="text-center py-6">
                <span class="material-symbols-outlined text-4xl text-on-surface-variant opacity-30">assignment_late</span>
                <p class="text-sm text-on-surface-variant mt-2">Belum ada data survey.</p>
            </div>
        @endif
    </div>

</div>
@endsection
