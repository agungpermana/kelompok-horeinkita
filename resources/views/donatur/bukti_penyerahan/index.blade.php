@extends('layouts.donatur')

@section('title', 'Bukti Penyerahan - Wapen Donatur')
@section('active_menu', 'bukti')
@section('page_title', 'Bukti Penyerahan')

@section('content')
    @if (session('success'))
        <div class="w-full bg-secondary-container text-on-secondary-container rounded-xl p-4 flex items-center gap-3 shadow-soft-low">
            <span class="material-symbols-outlined">check_circle</span>
            <p class="font-label-md text-label-md">{{ session('success') }}</p>
        </div>
    @endif

    @if ($buktis->count() > 0)
        <div class="bg-surface-container-lowest rounded-xl shadow-soft-low overflow-x-auto">
            <table class="w-full min-w-max">
                <thead>
                    <tr class="border-b border-outline-variant/60 bg-surface-container-low">
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">ID</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Kupon</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Penerima</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Tanggal Penyerahan</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Status</th>
                        <th class="text-left px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Foto</th>
                        <th class="text-right px-4 py-3 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buktis as $bukti)
                        @php
                            $status = strtolower($bukti->riwayat->first()->status_penyaluran ?? 'pending');
                            $badge = match ($status) {
                                'selesai' => 'bg-secondary-container text-on-secondary-container',
                                'proses'  => 'bg-surface-container-high text-on-surface',
                                default   => 'bg-primary/10 text-primary',
                            };
                        @endphp
                        <tr class="border-b border-outline-variant/40 hover:bg-surface-container-low transition-colors last:border-b-0">
                            <td class="px-4 py-4 font-label-md text-label-md text-on-surface">#{{ $bukti->id_bukti }}</td>
                            <td class="px-4 py-4">
                                <p class="font-label-sm text-label-sm text-on-surface">Kupon #{{ $bukti->id_kupon ?? '-' }}</p>
                                @if ($bukti->kupon?->kode_kupon)
                                    <p class="font-label-sm text-label-sm text-primary tracking-widest">{{ $bukti->kupon->kode_kupon }}</p>
                                @endif
                            </td>
                            <td class="px-4 py-4 font-body-sm text-body-sm text-on-surface">{{ $bukti->kupon?->transaksi?->penerima?->user?->nama_lengkap ?? '-' }}</td>
                            <td class="px-4 py-4 font-body-sm text-body-sm text-on-surface-variant">{{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}</td>
                            <td class="px-4 py-4">
                                <span class="font-label-sm text-label-sm px-3 py-1.5 rounded-full uppercase tracking-wider {{ $badge }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td class="px-4 py-4">
                                @if ($bukti->foto_bukti_url)
                                    <a href="{{ Storage::url($bukti->foto_bukti_url) }}" target="_blank">
                                        <img src="{{ Storage::url($bukti->foto_bukti_url) }}" alt="Foto Bukti"
                                            class="w-12 h-12 rounded-lg border border-outline-variant object-cover hover:opacity-80 transition-all cursor-pointer" />
                                    </a>
                                @else
                                    <span class="font-body-sm text-body-sm text-on-surface-variant">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-right">
                                <a href="{{ route('donatur.bukti.show', $bukti->id_bukti) }}"
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
            <span class="material-symbols-outlined text-5xl text-on-surface-variant opacity-30">assignment_turned_in</span>
            <div>
                <p class="font-label-md text-label-md text-on-surface">Belum ada bukti penyerahan</p>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                    Bukti penyerahan dari donasi Anda akan muncul di sini.
                </p>
            </div>
        </div>
    @endif
@endsection