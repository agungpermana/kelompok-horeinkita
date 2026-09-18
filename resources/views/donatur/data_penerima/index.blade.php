@extends('layouts.donatur')

@section('title', 'Data Penerima - Wapen Donatur')
@section('active_menu', 'penerima')
@section('page_title', 'Data Penerima')

@section('content')
    @if ($surveys->count() > 0)
        <div class="bg-surface-container-lowest rounded-xl shadow-soft-low overflow-x-auto">
            <div class="px-5 py-4 border-b border-outline-variant/40 flex items-center justify-between">
                <p class="font-label-md text-label-md text-on-surface">Total: {{ $surveys->count() }} penerima</p>
            </div>
            <table class="w-full min-w-max">
                <thead>
                    <tr class="border-b border-outline-variant/60 bg-surface-container-low">
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">#</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Nama</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">No. HP</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Lokasi RW</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Jenis Survey</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Status Kelayakan</th>
                        <th class="text-right px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveys as $i => $survey)
                        <tr class="border-b border-outline-variant/40 hover:bg-surface-container-low transition-colors last:border-b-0">
                            <td class="px-4 py-4 font-body-sm text-body-sm text-on-surface-variant">{{ $i + 1 }}</td>
                            <td class="px-4 py-4">
                                @php
                                    $nama = $survey->data_penerima?->user?->nama_lengkap ?? $survey->nama_subjek ?? '-';
                                    $username = $survey->data_penerima?->user?->username;
                                @endphp
                                <p class="font-label-md text-label-md text-on-surface">{{ $nama }}</p>
                                @if ($username)
                                    <p class="font-label-sm text-label-sm text-on-surface-variant">{{ $username }}</p>
                                @endif
                            </td>
                            <td class="px-4 py-4 font-body-sm text-body-sm text-on-surface-variant">{{ $survey->nomor_telepon ?? '-' }}</td>
                            <td class="px-4 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full font-label-sm text-label-sm bg-primary/10 text-primary">{{ $survey->lokasi_rw ?? '-' }}</span>
                            </td>
                            <td class="px-4 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full font-label-sm text-label-sm bg-secondary-container text-on-secondary-container">
                                    {{ $survey->jenis_survey ?? '-' }}
                                </span>
                            </td>
                            <td class="px-4 py-4">
                                @if ($survey->status_kelayakan)
                                    <span class="font-label-sm text-label-sm px-3 py-1.5 rounded-full uppercase tracking-wider
                                        {{ $survey->status_kelayakan === 'lolos' ? 'bg-secondary-container text-on-secondary-container' : 'bg-error-container text-on-error-container' }}">
                                        {{ $survey->status_kelayakan }}
                                    </span>
                                @else
                                    <span class="font-body-sm text-body-sm text-on-surface-variant">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-right">
                                <a href="{{ route('donatur.penerima.show', $survey->id_survey) }}"
                                    class="inline-flex items-center gap-1.5 font-label-sm text-label-sm text-primary uppercase tracking-wider hover:underline">
                                    <span class="material-symbols-outlined text-base">visibility</span>
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-surface-container-lowest rounded-xl border border-dashed border-outline-variant flex flex-col items-center justify-center py-20 gap-3 text-center">
            <span class="material-symbols-outlined text-5xl text-on-surface-variant opacity-30">group</span>
            <div>
                <p class="font-label-md text-label-md text-on-surface">Belum ada data penerima</p>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                    Data penerima dari hasil survey akan muncul di sini.
                </p>
            </div>
        </div>
    @endif
@endsection