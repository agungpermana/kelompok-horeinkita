@extends('layouts.admin')

@section('title', 'Laporan Penyaluran - Admin Wapen')
@section('active_menu', 'penyaluran')
@section('page_title', 'Laporan Penyaluran')

@section('content')
    @if (session('success'))
        <div
            class="bg-primary-container/10 border border-primary-container/30 text-on-primary-container rounded-xl px-stack-lg py-stack-md font-body-sm flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <form
        class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30 flex flex-col md:flex-row gap-gutter"
        method="GET" action="{{ route('admin.penyaluran.index') }}">
        <div class="flex-1 flex flex-col gap-2">
            <label class="font-label-md text-label-md text-on-surface-variant" for="q">Cari Warung /
                Penerima</label>
            <input
                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50"
                id="q" name="q" type="text" value="{{ request('q') }}"
                placeholder="Nama warung atau nama penerima" />
        </div>
        <div class="flex items-end gap-2">
            <button
                class="px-6 py-3 bg-primary text-on-primary font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:opacity-90 transition-opacity inline-flex items-center gap-2"
                type="submit">
                <span class="material-symbols-outlined text-xl">search</span>
                Cari
            </button>
            @if (request()->filled('q'))
                <a class="px-4 py-3 text-on-surface-variant hover:text-primary font-label-md text-label-md rounded-lg inline-flex items-center gap-1"
                    href="{{ route('admin.penyaluran.index') }}">
                    <span class="material-symbols-outlined text-xl">close</span>
                    Reset
                </a>
            @endif
        </div>
    </form>

    <section
        class="bg-surface-container-lowest rounded-xl shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-surface-container-low">
                    <tr>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            No</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Nama Warung</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Penerima</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Kode Kupon</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Foto</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Catatan</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Tanggal Penyerahan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/30">
                    @forelse($penyaluran as $index => $b)
                        <tr class="hover:bg-surface-container-low/50 transition-colors">
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $index + 1 }}
                            </td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $b->warung->nama_warung ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $b->kupon?->transaksi?->penerima?->user?->nama_lengkap ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                @if ($b->kupon)
                                    <span
                                        class="inline-flex items-center gap-1 px-3 py-1 bg-secondary-container/40 text-on-secondary-container font-label-sm text-label-sm rounded-full">{{ $b->kupon->kode_kupon }}</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-stack-lg py-stack-md">
                                @if ($b->foto_bukti_url)
                                    <a href="{{ Storage::url($b->foto_bukti_url) }}" target="_blank" class="block">
                                        <img class="w-16 h-16 object-cover rounded-lg border border-outline-variant"
                                            src="{{ Storage::url($b->foto_bukti_url) }}" alt="Foto Bukti" />
                                    </a>
                                @else
                                    <span class="font-body-sm text-on-surface-variant">-</span>
                                @endif
                            </td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $b->catatan_penyerahan ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $b->tanggal_penyerahan ? date('d M Y H:i', strtotime($b->tanggal_penyerahan)) : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7"
                                class="px-stack-lg py-stack-xl text-center font-body-sm text-on-surface-variant">
                                Belum ada data penyaluran.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
