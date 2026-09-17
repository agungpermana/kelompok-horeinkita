@extends('layouts.penerima')

@section('title', 'Dashboard - Wapen Penerima')
@section('active_menu', 'dashboard')
@section('page_title', 'Dashboard')

@section('content')
    {{-- Status Akun --}}
    <section>
        <div class="bg-on-background rounded-2xl p-6 text-white relative overflow-hidden shadow-high">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-white opacity-5 rounded-full blur-2xl pointer-events-none"></div>

            <div class="relative z-10 flex justify-between items-center mb-6">
                <p class="font-label-sm text-label-sm uppercase tracking-wider text-outline-variant">Status Akun</p>
                <span id="status-badge"
                    class="bg-[#052e16] text-[#4ade80] px-3 py-1 rounded-full font-label-sm flex items-center gap-1.5 border border-[#14532d]">
                    <span id="status-dot" class="w-2 h-2 rounded-full bg-[#4ade80]"></span>
                    <span id="status-text">Online</span>
                </span>
            </div>

            <div class="relative z-10">
                <h1 class="font-headline-lg text-headline-lg mb-2">Aktif</h1>
                <p class="font-body-sm text-body-sm text-outline-variant max-w-md">
                    Anda berhak menerima bantuan sembako dari donatur melalui warung terafiliasi.
                </p>
            </div>
        </div>
    </section>

    {{-- Kupon Aktif --}}
    <section>
        <div class="flex justify-between items-end mb-4">
            <h2 class="font-headline-sm text-headline-sm text-on-surface">Kupon Aktif</h2>
            <span class="font-body-sm text-body-sm text-on-surface-variant">
                {{ $kuponAktif ? '1 Tersedia' : 'Tidak Ada' }}
            </span>
        </div>

        @if ($kuponAktif)
            <div class="bg-surface-container-lowest rounded-2xl shadow-low border border-dashed border-outline-variant p-1">
                <div class="bg-white rounded-[14px] p-6">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">Kode Kupon</p>
                            <p class="font-headline-md text-headline-md text-on-surface tracking-[0.2em] font-mono">{{ $kuponAktif->kode_kupon }}</p>
                        </div>
                        <div class="w-12 h-12 bg-surface-container rounded-lg flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined" style="font-size: 28px;">qr_code_2</span>
                        </div>
                    </div>

                    <div class="border-t border-dashed border-outline-variant my-4 relative">
                        <div class="absolute -left-8 top-1/2 -translate-y-1/2 w-4 h-8 bg-surface rounded-r-full border-r border-y border-dashed border-outline-variant"></div>
                        <div class="absolute -right-8 top-1/2 -translate-y-1/2 w-4 h-8 bg-surface rounded-l-full border-l border-y border-dashed border-outline-variant"></div>
                    </div>

                    <div class="flex flex-col gap-3 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Paket Bantuan</span>
                            <span class="font-label-md text-label-md text-on-surface">
                                {{ $kuponAktif->transaksi?->paket?->nama_paket ?? 'Paket Sembako' }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Lokasi Penukaran</span>
                            <span class="font-label-md text-label-md text-primary flex items-center gap-1">
                                {{ $kuponAktif->transaksi?->paket?->warung?->nama_warung ?? 'Warung Mitra' }}
                                <span class="material-symbols-outlined" style="font-size: 16px;">storefront</span>
                            </span>
                        </div>
                    </div>

                    <button type="button"
                        class="w-full bg-on-background hover:bg-[#1a2b42] text-white py-4 rounded-xl font-label-md transition-colors shadow-md flex justify-center items-center gap-2">
                        <span class="material-symbols-outlined">qr_code_scanner</span>
                        Tampilkan QR Code
                    </button>
                </div>
            </div>
        @else
            <div class="bg-surface-container-lowest rounded-2xl border border-dashed border-outline-variant flex flex-col items-center justify-center py-14 gap-3 text-center">
                <span class="material-symbols-outlined text-5xl text-on-surface-variant opacity-30">qrcode</span>
                <div>
                    <p class="font-label-md text-label-md text-on-surface">Belum ada kupon aktif</p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                        Kupon akan muncul setelah donatur menyalurkan bantuan untuk Anda.
                    </p>
                </div>
            </div>
        @endif
    </section>

    {{-- Riwayat Bantuan --}}
    <section>
        <h2 class="font-headline-sm text-headline-sm text-on-surface mb-4">Riwayat Bantuan</h2>

        @if ($riwayat->count() > 0)
            <div class="flex flex-col gap-4">
                @foreach ($riwayat as $item)
                    <div class="bg-surface-container-lowest rounded-2xl p-4 shadow-low border border-outline-variant hover:border-primary-fixed-dim transition-colors flex items-center">
                        <div class="w-12 h-12 rounded-full bg-surface-container-low flex items-center justify-center text-primary mr-4">
                            <span class="material-symbols-outlined" data-weight="fill">task_alt</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-label-md text-label-md text-on-surface mb-1">Penukaran Berhasil</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">
                                {{ $item->warung?->nama_warung ?? 'Warung Mitra' }}
                                <span class="w-1 h-1 rounded-full bg-outline-variant inline-block mx-1"></span>
                                {{ $item->tanggal_penyerahan?->translatedFormat('d M Y') ?? '-' }}
                            </p>
                        </div>
                        <span class="material-symbols-outlined text-outline-variant">chevron_right</span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant flex flex-col items-center justify-center py-14 gap-3 text-center">
                <span class="material-symbols-outlined text-5xl text-on-surface-variant opacity-30">history</span>
                <div>
                    <p class="font-label-md text-label-md text-on-surface">Belum ada riwayat bantuan</p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                        Riwayat penukaran kupon Anda akan tampil di sini.
                    </p>
                </div>
            </div>
        @endif
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const badge = document.getElementById('status-badge');
        const dot = document.getElementById('status-dot');
        const text = document.getElementById('status-text');

        function setStatus(online) {
            if (online) {
                badge.className = 'bg-[#052e16] text-[#4ade80] px-3 py-1 rounded-full font-label-sm flex items-center gap-1.5 border border-[#14532d]';
                dot.className = 'w-2 h-2 rounded-full bg-[#4ade80]';
                text.textContent = 'Online';
            } else {
                badge.className = 'bg-[#1f2937] text-gray-400 px-3 py-1 rounded-full font-label-sm flex items-center gap-1.5 border border-gray-600';
                dot.className = 'w-2 h-2 rounded-full bg-gray-400';
                text.textContent = 'Offline';
            }
        }

        setStatus(navigator.onLine);
        window.addEventListener('online', function () { setStatus(true); });
        window.addEventListener('offline', function () { setStatus(false); });
    });
</script>
@endpush