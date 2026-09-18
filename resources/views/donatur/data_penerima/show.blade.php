@extends('layouts.donatur')

@section('title', 'Detail Penerima - Wapen Donatur')
@section('active_menu', 'penerima')
@section('page_title', 'Detail Penerima')

@section('content')
    <div class="space-y-6 max-w-3xl mx-auto w-full">
        <a href="{{ route('donatur.penerima') }}"
            class="inline-flex items-center gap-2 font-label-md text-label-md text-primary uppercase tracking-wider hover:underline">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
            Kembali
        </a>

        {{-- Info Penerima --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 shadow-soft-low p-6">
            @php
                $nama = $survey->data_penerima?->user?->nama_lengkap ?? $survey->nama_subjek ?? '-';
                $username = $survey->data_penerima?->user?->username;
                $email = $survey->data_penerima?->user?->email;
                $nohp = $survey->data_penerima?->user?->nomor_hp ?? $survey->nomor_telepon;
            @endphp
            <div class="flex items-center gap-4 mb-5">
                <div class="w-14 h-14 rounded-full bg-secondary-container flex items-center justify-center flex-shrink-0">
                    <span class="text-xl font-bold text-on-secondary-container">{{ strtoupper(substr($nama, 0, 1)) }}</span>
                </div>
                <div>
                    <p class="text-lg font-bold text-on-surface">{{ $nama }}</p>
                    @if ($username)
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ $username }}</p>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Email</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $email ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">No. HP</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $nohp ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Lokasi RW</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $survey->lokasi_rw ?? '-' }}</p>
                </div>
                <div class="col-span-2">
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Alamat</p>
                    <p class="font-body-sm text-body-sm text-on-surface">{{ $survey->alamat_lengkap ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Data Survey --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 shadow-soft-low p-6">
            <h2 class="font-label-md text-label-md text-on-surface mb-4 flex items-center gap-2 font-semibold">
                <span class="material-symbols-outlined text-primary text-xl">assignment</span>
                Data Survey
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Jenis Survey</p>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full font-label-sm text-label-sm bg-secondary-container text-on-secondary-container">
                        {{ $survey->jenis_survey ?? '-' }}
                    </span>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Status Kelayakan</p>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full font-label-sm text-label-sm
                        {{ $survey->status_kelayakan === 'lolos' ? 'bg-secondary-container text-on-secondary-container' : (($survey->status_kelayakan === 'tidak_lolos') ? 'bg-error-container text-on-error-container' : 'bg-surface-container-high text-on-surface') }}">
                        {{ $survey->status_kelayakan ?? '-' }}
                    </span>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Skor Kelayakan</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $survey->skor_kelayakan ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Nama Subjek</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $survey->nama_subjek ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Tanggal Survey</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $survey->tanggal_survey ? \Carbon\Carbon::parse($survey->tanggal_survey)->translatedFormat('d M Y') : '-' }}</p>
                </div>
                <div>
                    <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Kelurahan</p>
                    <p class="font-label-md text-label-md text-on-surface">{{ $survey->kelurahan ?? '-' }}</p>
                </div>
                @if ($survey->catatan_survey)
                    <div class="col-span-2 sm:col-span-3">
                        <p class="font-label-sm text-label-sm text-on-surface-variant mb-1">Catatan Survey</p>
                        <p class="font-body-sm text-body-sm text-on-surface">{{ $survey->catatan_survey }}</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Lampiran Survey --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 shadow-soft-low p-6">
            <h2 class="font-label-md text-label-md text-on-surface mb-4 flex items-center gap-2 font-semibold">
                <span class="material-symbols-outlined text-primary text-xl">attachment</span>
                Lampiran
            </h2>
            @if ($survey->foto_lokasi_url || $survey->foto_identitas_url || $survey->foto_dokumen_url)
                <div class="space-y-4">
                    @if ($survey->foto_lokasi_url)
                        <div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant mb-2 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base">place</span>
                                Foto Lokasi
                            </p>
                            <a href="{{ asset($survey->foto_lokasi_url) }}" target="_blank"
                                class="block rounded-lg overflow-hidden border border-outline-variant/60 group">
                                <img src="{{ asset($survey->foto_lokasi_url) }}" alt="Foto Lokasi"
                                    class="w-full max-h-96 object-contain bg-surface-container-low transition-opacity group-hover:opacity-90" />
                            </a>
                        </div>
                    @endif
                    @if ($survey->foto_identitas_url)
                        <div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant mb-2 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base">badge</span>
                                Foto Identitas
                            </p>
                            <a href="{{ asset($survey->foto_identitas_url) }}" target="_blank"
                                class="block rounded-lg overflow-hidden border border-outline-variant/60 group">
                                <img src="{{ asset($survey->foto_identitas_url) }}" alt="Foto Identitas"
                                    class="w-full max-h-96 object-contain bg-surface-container-low transition-opacity group-hover:opacity-90" />
                            </a>
                        </div>
                    @endif
                    @if ($survey->foto_dokumen_url)
                        <div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant mb-2 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base">description</span>
                                Foto Dokumen
                            </p>
                            <a href="{{ asset($survey->foto_dokumen_url) }}" target="_blank"
                                class="block rounded-lg overflow-hidden border border-outline-variant/60 group">
                                <img src="{{ asset($survey->foto_dokumen_url) }}" alt="Foto Dokumen"
                                    class="w-full max-h-96 object-contain bg-surface-container-low transition-opacity group-hover:opacity-90" />
                            </a>
                        </div>
                    @endif
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-10 gap-2 text-center">
                    <span class="material-symbols-outlined text-4xl text-on-surface-variant opacity-30">attachment</span>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Tidak ada lampiran untuk penerima ini.</p>
                </div>
            @endif
        </div>
    </div>
@endsection