@extends('layouts.admin')

@section('title', 'Riwayat Transaksi - Admin Wapen')
@section('active_menu', 'transaksi')
@section('page_title', 'Riwayat Transaksi')

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
        method="GET" action="{{ route('admin.transaksi.index') }}">
        <div class="flex-1 flex flex-col gap-2">
            <label class="font-label-md text-label-md text-on-surface-variant" for="q">Cari
                Donatur</label>
            <input
                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50"
                id="q" name="q" type="text" value="{{ request('q') }}"
                placeholder="Nama atau username donatur" />
        </div>
        <div class="md:w-56 flex flex-col gap-2">
            <label class="font-label-md text-label-md text-on-surface-variant" for="status">Status</label>
            <select
                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                id="status" name="status">
                <option value="">Semua Status</option>
                <option value="berhasil" @if (request('status') === 'berhasil') selected @endif>Berhasil</option>
                <option value="pending" @if (request('status') === 'pending') selected @endif>Pending</option>
                <option value="gagal" @if (request('status') === 'gagal') selected @endif>Gagal</option>
                <option value="dibatalkan" @if (request('status') === 'dibatalkan') selected @endif>Dibatalkan</option>
            </select>
        </div>
        <div class="flex items-end gap-2">
            <button
                class="px-6 py-3 bg-primary text-on-primary font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:opacity-90 transition-opacity inline-flex items-center gap-2"
                type="submit">
                <span class="material-symbols-outlined text-xl">search</span>
                Cari
            </button>
            @if (request()->filled('q') || request()->filled('status'))
                <a class="px-4 py-3 text-on-surface-variant hover:text-primary font-label-md text-label-md rounded-lg inline-flex items-center gap-1"
                    href="{{ route('admin.transaksi.index') }}">
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
                            Donatur</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Penerima</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Paket</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Jumlah</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Total Bayar</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Metode</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Status</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/30">
                    @forelse($transaksi as $index => $t)
                        @php
                            $status = strtolower($t->status_pembayaran ?? '');
                            $statusClass = match (true) {
                                in_array($status, ['berhasil', 'sukses', 'selesai', 'lunas', 'dibayar'], true)
                                    => 'bg-primary/10 text-primary',
                                in_array($status, ['pending', 'menunggu', 'proses', 'verifikasi'], true)
                                    => 'bg-amber-500/10 text-amber-700',
                                in_array($status, ['gagal', 'dibatalkan', 'batal', 'expired'], true)
                                    => 'bg-error/10 text-error',
                                default => 'bg-surface-container text-on-surface-variant',
                            };
                        @endphp
                        <tr class="hover:bg-surface-container-low/50 transition-colors">
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $index + 1 }}
                            </td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $t->donatur->nama_lengkap ?? '-' }}<br /><span
                                    class="text-on-surface-variant text-label-sm">{{ $t->donatur->username ?? '' }}</span>
                            </td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $t->penerima->user->nama_lengkap ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $t->paket->nama_paket ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $t->jumlah_paket }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface font-semibold">Rp
                                {{ number_format($t->total_bayar, 0, ',', '.') }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $t->metode_pembayaran ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md">
                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 font-label-sm text-label-sm rounded-full {{ $statusClass }}">
                                    <span class="material-symbols-outlined text-sm">circle</span>
                                    {{ $t->status_pembayaran ?? '-' }}
                                </span>
                            </td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $t->tanggal_transaksi ? date('d M Y H:i', strtotime($t->tanggal_transaksi)) : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9"
                                class="px-stack-lg py-stack-xl text-center font-body-sm text-on-surface-variant">
                                Belum ada data transaksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
