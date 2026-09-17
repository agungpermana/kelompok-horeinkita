@extends('layouts.donatur')

@section('title', 'Pilih Pembayaran - Wapen Donatur')
@section('active_menu', 'dashboard')
@section('page_title', 'Pilih Pembayaran')

@section('content')
    @php
        $order = $order ?? [];
        $harga = (float) ($order['harga'] ?? 0);
        $biayaOperasional = (float) ($order['biaya_operasional'] ?? 0);
        $total = (float) ($order['total'] ?? ($harga + $biayaOperasional));
        $formatRp = function ($nilai) {
            return 'Rp ' . number_format((float) $nilai, 0, ',', '.');
        };

        $kelompokMetode = [
            'Pembayaran Instan' => [
                ['kode' => 'qris', 'nama' => 'QRIS', 'deskripsi' => 'Scan QR dan bayar dengan aplikasi apa pun', 'ikon' => 'qr_code_2', 'biaya' => 'GRATIS'],
                ['kode' => 'gopay', 'nama' => 'GoPay', 'deskripsi' => 'Bayar instan dari aplikasi Gojek', 'ikon' => 'account_balance_wallet', 'biaya' => 'GRATIS'],
                ['kode' => 'ovo', 'nama' => 'OVO', 'deskripsi' => 'Bayar instan dari aplikasi OVO', 'ikon' => 'account_balance_wallet', 'biaya' => 'GRATIS'],
                ['kode' => 'dana', 'nama' => 'DANA', 'deskripsi' => 'Bayar instan dari aplikasi DANA', 'ikon' => 'account_balance_wallet', 'biaya' => 'GRATIS'],
            ],
            'Transfer Bank' => [
                ['kode' => 'bca', 'nama' => 'BCA Transfer', 'deskripsi' => 'Transfer dari rekening BCA', 'ikon' => 'account_balance', 'biaya' => 'FREE'],
                ['kode' => 'bri', 'nama' => 'BRI Transfer', 'deskripsi' => 'Transfer dari rekening BRI', 'ikon' => 'account_balance', 'biaya' => 'FREE'],
                ['kode' => 'mandiri', 'nama' => 'Mandiri Transfer', 'deskripsi' => 'Transfer dari rekening Mandiri', 'ikon' => 'account_balance', 'biaya' => 'FREE'],
            ],
            'Virtual Account' => [
                ['kode' => 'va_bca', 'nama' => 'BCA Virtual Account', 'deskripsi' => 'Dapatkan nomor VA khusus pembayaran', 'ikon' => 'pin', 'biaya' => 'GRATIS'],
                ['kode' => 'va_bni', 'nama' => 'BNI Virtual Account', 'deskripsi' => 'Dapatkan nomor VA khusus pembayaran', 'ikon' => 'pin', 'biaya' => 'GRATIS'],
            ],
            'Bayar di Minimarket' => [
                ['kode' => 'indomaret', 'nama' => 'Indomaret', 'deskripsi' => 'Bayar tunai di gerai Indomaret terdekat', 'ikon' => 'store', 'biaya' => 'GRATIS'],
                ['kode' => 'alfamart', 'nama' => 'Alfamart', 'deskripsi' => 'Bayar tunai di gerai Alfamart terdekat', 'ikon' => 'store', 'biaya' => 'GRATIS'],
            ],
        ];
    @endphp

    <div class="flex flex-col lg:flex-row gap-gutter items-start">
        {{-- Daftar Metode Pembayaran --}}
        <div class="flex-1 flex flex-col gap-stack-xl w-full">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-on-surface text-surface flex items-center justify-center font-headline-sm text-headline-sm">2</div>
                <h3 class="font-headline-md text-headline-md text-on-surface">Pilih Metode Pembayaran</h3>
            </div>

            <form method="POST" action="{{ route('donatur.bayar') }}" id="form-bayar" class="flex-1 flex flex-col gap-stack-lg">
                @csrf

                @foreach ($kelompokMetode as $judul => $metodes)
                    <section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-soft-low">
                        <h4 class="font-label-md text-label-md text-on-surface uppercase tracking-wider mb-stack-md">{{ $judul }}</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
                            @foreach ($metodes as $metode)
                                <label class="pilih-metode flex items-center gap-4 border border-outline-variant rounded-xl p-4 cursor-pointer hover:border-primary-container transition-colors">
                                    <input type="radio" name="metode_pembayaran" value="{{ $metode['kode'] }}"
                                        class="hidden" data-metode-radio />
                                    <div class="w-12 h-12 rounded-xl bg-surface-container flex items-center justify-center text-on-surface-variant shrink-0">
                                        <span class="material-symbols-outlined text-2xl">{{ $metode['ikon'] }}</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h5 class="font-label-md text-label-md text-on-surface">{{ $metode['nama'] }}</h5>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ $metode['deskripsi'] }}</p>
                                    </div>
                                    <div class="flex flex-col items-end gap-1 shrink-0">
                                        <span class="font-label-sm text-label-sm font-bold text-primary uppercase">{{ $metode['biaya'] }}</span>
                                        <span class="material-symbols-outlined text-on-surface-variant" data-radio-icon>radio_button_unchecked</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </form>
        </div>

        {{-- Sidebar: Ringkasan Pesanan --}}
        <aside class="w-full lg:w-[400px] lg:sticky lg:top-stack-lg">
            <div class="bg-surface-container-low rounded-xl p-stack-lg shadow-soft-high">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-stack-lg">Ringkasan Pesanan</h3>

                <div class="flex items-start justify-between mb-stack-md bg-surface-container-lowest p-4 rounded-lg">
                    <div class="flex gap-3">
                        <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant">
                            <span class="material-symbols-outlined">shopping_basket</span>
                        </div>
                        <div>
                            <h4 class="font-label-md text-label-md text-on-surface">{{ $order['nama_paket'] ?? 'Paket Sembako' }}</h4>
                            <p class="font-label-sm text-label-sm text-on-surface-variant">{{ $order['nama_warung'] ?? 'Warung Mitra' }}</p>
                            <p class="font-label-sm text-label-sm text-on-surface mt-1">{{ $formatRp($harga) }}</p>
                        </div>
                    </div>
                    <span class="font-label-sm text-label-sm text-on-surface-variant">1x</span>
                </div>

                @if (!empty($order['nama_penerima']))
                    <div class="flex items-center gap-3 mb-stack-md bg-surface-container-lowest p-4 rounded-lg">
                        <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant">
                            <span class="material-symbols-outlined">person</span>
                        </div>
                        <div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Penerima</p>
                            <p class="font-label-md text-label-md text-on-surface">{{ $order['nama_penerima'] }}</p>
                        </div>
                    </div>
                @endif

                @if (!empty($order['pesan']))
                    <div class="mb-stack-md bg-surface-container-lowest p-4 rounded-lg">
                        <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Pesan Anda</p>
                        <p class="font-body-sm text-body-sm text-on-surface italic">"{{ $order['pesan'] }}"</p>
                    </div>
                @endif

                <div class="border-t border-outline-variant pt-stack-md mt-stack-md space-y-2">
                    <div class="flex justify-between">
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Subtotal</span>
                        <span class="font-body-sm text-body-sm text-on-surface">{{ $formatRp($harga) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Biaya Operasional</span>
                        <span class="font-body-sm text-body-sm text-on-surface">{{ $formatRp($biayaOperasional) }}</span>
                    </div>
                </div>

                <div class="border-t border-on-surface pt-stack-md mt-stack-md flex justify-between items-end mb-stack-lg">
                    <span class="font-label-md text-label-md text-on-surface uppercase tracking-wider">Total Bayar</span>
                    <span class="font-headline-md text-headline-md text-on-surface">{{ $formatRp($total) }}</span>
                </div>

                @if (session('success'))
                    <div class="mb-stack-md p-4 rounded-xl bg-secondary-container text-on-secondary-container flex items-center gap-3">
                        <span class="material-symbols-outlined">check_circle</span>
                        <p class="font-label-md text-label-md">{{ session('success') }}</p>
                    </div>
                @endif

                <button type="submit" form="form-bayar"
                    class="w-full bg-on-surface text-surface py-4 rounded-xl font-label-md text-label-md uppercase hover:bg-opacity-90 transition-opacity flex justify-center items-center gap-2">
                    <span class="material-symbols-outlined">lock</span>
                    Bayar Sekarang
                </button>

                <div class="mt-4 flex justify-center items-center gap-2 text-on-surface-variant">
                    <span class="material-symbols-outlined text-sm">verified_user</span>
                    <span class="font-label-sm text-label-sm uppercase">Donasi Terjamin Aman</span>
                </div>
            </div>

            <div class="mt-stack-md p-4 border border-dashed border-outline-variant rounded-xl">
                <p class="font-body-sm text-body-sm text-on-surface-variant text-center italic">
                    "Jangan berikan PIN atau OTP kepada siapa pun. Wapen tidak pernah meminta data tersebut."
                </p>
            </div>
        </aside>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.pilih-metode').forEach(function (card) {
                card.addEventListener('click', function () {
                    const radio = card.querySelector('[data-metode-radio]');
                    if (!radio) return;
                    radio.checked = true;

                    document.querySelectorAll('.pilih-metode').forEach(function (el) {
                        el.classList.remove('border-2', 'border-on-surface', 'shadow-soft-low');
                        el.classList.add('border-outline-variant');
                        const ikon = el.querySelector('[data-radio-icon]');
                        if (ikon) {
                            ikon.textContent = 'radio_button_unchecked';
                            ikon.classList.remove('text-on-surface');
                            ikon.classList.add('text-on-surface-variant');
                        }
                    });

                    card.classList.add('border-2', 'border-on-surface', 'shadow-soft-low');
                    card.classList.remove('border-outline-variant');
                    const ikon = card.querySelector('[data-radio-icon]');
                    if (ikon) {
                        ikon.textContent = 'radio_button_checked';
                        ikon.classList.add('text-on-surface');
                        ikon.classList.remove('text-on-surface-variant');
                    }
                });
            });
        });
    </script>
@endpush