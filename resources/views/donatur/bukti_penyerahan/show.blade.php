@extends('layouts.donatur')

@section('title', 'Detail Bukti Penyerahan - Wapen Donatur')
@section('active_menu', 'bukti')
@section('page_title', 'Detail Bukti Penyerahan')

@section('content')
    <div class="space-y-6 max-w-3xl mx-auto w-full">
        <a href="{{ route('donatur.bukti') }}"
            class="inline-flex items-center gap-2 font-label-md text-label-md text-primary uppercase tracking-wider hover:underline">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
            Kembali
        </a>

        @if (session('success'))
            <div class="w-full bg-secondary-container text-on-secondary-container rounded-xl p-4 flex items-center gap-3 shadow-soft-low">
                <span class="material-symbols-outlined">check_circle</span>
                <p class="font-label-md text-label-md">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Informasi Bukti --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 shadow-soft-low p-6">
            <h2 class="font-label-md text-label-md text-on-surface mb-4 flex items-center gap-2 font-semibold">
                <span class="material-symbols-outlined text-primary text-xl">receipt_long</span>
                Informasi Bukti
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">ID Bukti</p>
                    <p class="font-label-md text-label-md text-on-surface">#{{ $bukti->id_bukti }}</p>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Kupon</p>
                    <p class="font-label-md text-label-md text-on-surface">#{{ $bukti->id_kupon ?? '-' }}</p>
                    @if ($bukti->kupon?->kode_kupon)
                        <p class="font-label-sm text-label-sm text-primary tracking-widest mt-0.5">{{ $bukti->kupon->kode_kupon }}</p>
                    @endif
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Penerima</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $bukti->kupon?->transaksi?->penerima?->user?->nama_lengkap ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Warung</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $bukti->warung?->nama_warung ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Tanggal Penyerahan</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}</p>
                </div>
                <div class="col-span-2">
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Catatan</p>
                    <p class="font-body-sm text-body-sm text-on-surface">{{ $bukti->catatan_penyerahan ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Lampiran (Foto Bukti) --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 shadow-soft-low p-6">
            <h2 class="font-label-md text-label-md text-on-surface mb-4 flex items-center gap-2 font-semibold">
                <span class="material-symbols-outlined text-primary text-xl">attachment</span>
                Lampiran
            </h2>
            @if ($bukti->foto_bukti_url)
                <div class="space-y-3">
                    <a href="{{ Storage::url($bukti->foto_bukti_url) }}" target="_blank"
                        class="block rounded-lg overflow-hidden border border-outline-variant/60 group">
                        <img src="{{ Storage::url($bukti->foto_bukti_url) }}" alt="Foto Bukti Penyerahan"
                            class="w-full max-h-96 object-contain bg-surface-container-low transition-opacity group-hover:opacity-90" />
                    </a>
                    <a href="{{ Storage::url($bukti->foto_bukti_url) }}" target="_blank"
                        class="inline-flex items-center gap-2 font-label-sm text-label-sm text-primary uppercase tracking-wider hover:underline">
                        <span class="material-symbols-outlined text-base">download</span>
                        Buka Lampiran
                    </a>
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-10 gap-2 text-center">
                    <span class="material-symbols-outlined text-4xl text-on-surface-variant opacity-30">attachment</span>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Tidak ada lampiran untuk bukti ini.</p>
                </div>
            @endif
        </div>

        {{-- Riwayat Penyaluran --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 shadow-soft-low p-6">
            <h2 class="font-label-md text-label-md text-on-surface mb-4 flex items-center gap-2 font-semibold">
                <span class="material-symbols-outlined text-primary text-xl">history</span>
                Riwayat Penyaluran
            </h2>

            @if ($bukti->riwayat->count() > 0)
                <div class="relative">
                    <div class="absolute left-[7px] top-1 bottom-1 w-0.5 bg-outline-variant/50"></div>
                    <div class="space-y-4">
                        @foreach ($bukti->riwayat as $riwayat)
                            <div class="relative pl-8">
                                <span class="absolute left-0 top-1.5 w-[15px] h-[15px] rounded-full border-2 border-primary bg-white"></span>
                                <div class="bg-surface-container rounded-lg p-3">
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="font-label-sm text-label-sm px-3 py-1 rounded-full uppercase tracking-wider
                                            {{ $riwayat->status_penyaluran === 'selesai' ? 'bg-secondary-container text-on-secondary-container' :
                                               ($riwayat->status_penyaluran === 'proses' ? 'bg-surface-container-high text-on-surface' : 'bg-primary/10 text-primary') }}">
                                            {{ ucfirst($riwayat->status_penyaluran) }}
                                        </span>
                                        <span class="font-body-sm text-body-sm text-on-surface-variant">
                                            {{ $riwayat->waktu_pencatatan ? $riwayat->waktu_pencatatan->format('d M Y H:i') : '-' }}
                                        </span>
                                    </div>
                                    @if ($riwayat->keterangan)
                                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">{{ $riwayat->keterangan }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="font-body-sm text-body-sm text-on-surface-variant">Belum ada riwayat penyaluran.</p>
            @endif
        </div>
    </div>
@endsection