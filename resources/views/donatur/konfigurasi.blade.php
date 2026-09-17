@extends('layouts.donatur')

@section('title', 'Konfigurasi Donasi - Wapen Donatur')
@section('active_menu', 'dashboard')
@section('page_title', 'Konfigurasi Donasi')

@section('content')
    @php
        $paket = $paket ?? null;
        $penerima = $penerima ?? \App\Models\data_penerima::with('user')->get();
        $namaDonatur = auth()->user()->nama_lengkap ?? auth()->user()->name;
    @endphp

    <form method="POST" action="{{ route('donatur.pembayaran.proses') }}" class="flex flex-col lg:flex-row gap-gutter items-start">
        @csrf
        <input type="hidden" name="id_paket" value="{{ $paket->id_paket ?? '' }}" />
        <input type="hidden" name="harga_paket" value="{{ $paket->harga ?? 0 }}" data-harga-paket />

        {{-- Form Steps --}}
        <div class="flex-1 flex flex-col gap-stack-xl w-full">

            {{-- Section 1: Penerima Manfaat --}}
            <section>
                <div class="flex justify-between items-center mb-stack-md">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-on-surface text-surface flex items-center justify-center font-headline-sm text-headline-sm">1</div>
                        <h3 class="font-headline-md text-headline-md text-on-surface">Pilih Penerima Manfaat</h3>
                    </div>
                    <a class="font-label-md text-label-md text-on-surface-variant uppercase hover:text-primary transition-colors" href="#">Lihat Semua</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
                    @forelse ($penerima as $index => $item)
                        @php
                            $nama = $item->user?->nama_lengkap ?? 'Penerima Manfaat';
                            $lokasi = $item->lokasi_rw ? 'RW ' . $item->lokasi_rw : ($item->alamat_penerima ?: 'Lokasi Penerima');
                        @endphp
                        <div class="pilih-penerima bg-surface-container-lowest rounded-xl border p-4 flex flex-col justify-between cursor-pointer relative transition-colors {{ $loop->first ? 'border-2 border-on-surface shadow-soft-low' : 'border-outline-variant hover:border-primary-container' }}">
                            <div class="absolute top-4 right-4">
                                <span class="material-symbols-outlined {{ $loop->first ? 'fill text-on-surface' : 'text-outline-variant' }}">check_circle</span>
                            </div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 rounded-full bg-surface-variant flex items-center justify-center text-on-surface-variant">
                                    <span class="material-symbols-outlined">person</span>
                                </div>
                                <div>
                                    <h4 class="font-label-md text-label-md text-on-surface">{{ $nama }}</h4>
                                    <p class="font-label-sm text-label-sm text-on-surface-variant">{{ $lokasi }}</p>
                                </div>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant italic">
                                {{ $item->user?->email ? $item->user->email : 'Penerima manfaat terverifikasi Wapen.' }}
                            </p>
                        </div>
                        <input type="radio" name="id_penerima" value="{{ $item->id_penerima }}"
                            class="hidden" @if ($loop->first) checked @endif data-penerima-radio />
                    @empty
                        <div class="col-span-full bg-surface-container-lowest rounded-xl border border-dashed border-outline-variant flex flex-col items-center justify-center py-12 gap-3 text-center">
                            <span class="material-symbols-outlined text-5xl text-on-surface-variant opacity-30">person_search</span>
                            <div>
                                <p class="font-label-md text-label-md text-on-surface">Belum ada penerima manfaat</p>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Data penerima akan tampil di sini.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <button type="button"
                    class="mt-stack-md w-full py-4 rounded-xl border border-dashed border-outline-variant text-on-surface-variant font-label-md text-label-md uppercase flex items-center justify-center gap-2 hover:bg-surface-container-low transition-colors">
                    <span class="material-symbols-outlined">add</span>
                    Cari Penerima Lainnya
                </button>
            </section>

            {{-- Section 2: Nama Donatur --}}
            <section>
                <div class="flex items-center gap-3 mb-stack-md">
                    <div class="w-8 h-8 rounded-full bg-on-surface text-surface flex items-center justify-center font-headline-sm text-headline-sm">2</div>
                    <h3 class="font-headline-md text-headline-md text-on-surface">Pengaturan Nama Donatur</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
                    <label class="pilih-nama bg-surface-container-lowest rounded-xl border-2 border-on-surface p-4 relative shadow-soft-low cursor-pointer">
                        <span class="material-symbols-outlined fill text-on-surface absolute top-4 right-4">radio_button_checked</span>
                        <h4 class="font-label-md text-label-md text-on-surface mb-2">Tampilkan Nama</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-4">Nama anda akan terlihat oleh warung dan penerima bantuan.</p>
                        <input type="radio" name="mode_nama" value="tampilkan" checked class="hidden" data-nama-radio />
                        <input type="text" name="nama_donatur" value="{{ $namaDonatur }}"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-3 py-2 font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-shadow" />
                    </label>

                    <label class="pilih-nama bg-surface-container-lowest rounded-xl border border-outline-variant p-4 relative cursor-pointer hover:border-primary-container transition-colors">
                        <span class="material-symbols-outlined text-outline-variant absolute top-4 right-4">radio_button_unchecked</span>
                        <h4 class="font-label-md text-label-md text-on-surface mb-2">Donasi Anonim</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-4">Nama anda akan disembunyikan. Tertulis sebagai "Hamba Allah".</p>
                        <input type="radio" name="mode_nama" value="anonim" class="hidden" data-nama-radio />
                        <div class="flex items-center gap-2 text-on-surface-variant">
                            <span class="material-symbols-outlined text-sm">visibility_off</span>
                            <span class="font-label-sm text-label-sm uppercase">Anonymous Mode On</span>
                        </div>
                    </label>
                </div>
            </section>

            {{-- Section 3: Pesan --}}
            <section>
                <label class="block font-label-md text-label-md text-on-surface-variant uppercase mb-stack-sm">Pesan Untuk Penerima (Opsional)</label>
                <textarea name="pesan" rows="4"
                    class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl p-4 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-shadow resize-none"
                    placeholder="Tuliskan pesan semangat atau doa untuk penerima..."></textarea>
            </section>
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
                            <h4 class="font-label-md text-label-md text-on-surface">{{ $paket->nama_paket ?? 'Paket Sembako' }}</h4>
                            <p class="font-label-sm text-label-sm text-on-surface-variant">{{ $paket->warung?->nama_warung ?? 'Warung Mitra' }}</p>
                            <p class="font-label-sm text-label-sm text-on-surface mt-1">
                                Rp {{ $paket ? number_format((float) $paket->harga, 0, ',', '.') : '0' }}
                            </p>
                        </div>
                    </div>
                    <span class="font-label-sm text-label-sm text-on-surface-variant">1x</span>
                </div>

                <div class="border-t border-outline-variant pt-stack-md mt-stack-md space-y-2">
                    <div class="flex justify-between">
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Subtotal</span>
                        <span class="font-body-sm text-body-sm text-on-surface" data-summary-subtotal>Rp 0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Biaya Operasional</span>
                        <span class="font-body-sm text-body-sm text-on-surface">Rp 2.000</span>
                    </div>
                </div>

                <div class="border-t border-on-surface pt-stack-md mt-stack-md flex justify-between items-end mb-stack-lg">
                    <span class="font-label-md text-label-md text-on-surface uppercase tracking-wider">Total Bayar</span>
                    <span class="font-headline-md text-headline-md text-on-surface" data-summary-total>Rp 0</span>
                </div>

                <button type="submit"
                        class="w-full bg-on-surface text-surface py-4 rounded-xl font-label-md text-label-md uppercase hover:bg-opacity-90 transition-opacity flex justify-center items-center gap-2">
                        Pilih Pembayaran
                    </button>

                <div class="mt-4 flex justify-center items-center gap-2 text-on-surface-variant">
                    <span class="material-symbols-outlined text-sm">verified_user</span>
                    <span class="font-label-sm text-label-sm uppercase">Donasi Terjamin Aman</span>
                </div>
            </div>

            <div class="mt-stack-md p-4 border border-dashed border-outline-variant rounded-xl">
                <p class="font-body-sm text-body-sm text-on-surface-variant text-center italic">
                    "Bantuan akan diproses oleh {{ $paket->warung?->nama_warung ?? 'warung mitra' }} dan bukti penyaluran akan dikirimkan ke riwayat donasi anda."
                </p>
            </div>
        </aside>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hargaPaket = parseInt(document.querySelector('[data-harga-paket]')?.value || '0', 10) || 0;
            const biayaOperasional = 2000;
            const formatRp = function (nilai) {
                return 'Rp ' + nilai.toLocaleString('id-ID');
            };

            const subtotalEl = document.querySelector('[data-summary-subtotal]');
            const totalEl = document.querySelector('[data-summary-total]');

            function updateTotal() {
                if (subtotalEl) subtotalEl.textContent = formatRp(hargaPaket);
                if (totalEl) totalEl.textContent = formatRp(hargaPaket + biayaOperasional);
            }

            document.querySelectorAll('.pilih-penerima').forEach(function (card) {
                card.addEventListener('click', function () {
                    const radio = card.nextElementSibling;
                    if (!radio || radio.type !== 'radio') return;

                    radio.checked = true;
                    document.querySelectorAll('.pilih-penerima').forEach(function (el) {
                        el.classList.remove('border-2', 'border-on-surface', 'shadow-soft-low');
                        el.classList.add('border-outline-variant');
                        const icon = el.querySelector('.material-symbols-outlined');
                        if (icon) {
                            icon.classList.remove('fill', 'text-on-surface');
                            icon.classList.add('text-outline-variant');
                        }
                    });

                    card.classList.add('border-2', 'border-on-surface', 'shadow-soft-low');
                    card.classList.remove('border-outline-variant');
                    const icon = card.querySelector('.material-symbols-outlined');
                    if (icon) {
                        icon.classList.add('fill', 'text-on-surface');
                        icon.classList.remove('text-outline-variant');
                    }
                });
            });

            document.querySelectorAll('.pilih-nama').forEach(function (card) {
                card.addEventListener('click', function () {
                    const radio = card.querySelector('[data-nama-radio]');
                    if (!radio) return;
                    radio.checked = true;

                    document.querySelectorAll('.pilih-nama').forEach(function (el) {
                        el.classList.remove('border-2', 'border-on-surface', 'shadow-soft-low');
                        el.classList.add('border-outline-variant');
                        const icon = el.querySelector('.material-symbols-outlined');
                        if (icon) {
                            icon.textContent = 'radio_button_unchecked';
                            icon.classList.remove('fill', 'text-on-surface');
                            icon.classList.add('text-outline-variant');
                        }
                    });

                    card.classList.add('border-2', 'border-on-surface', 'shadow-soft-low');
                    card.classList.remove('border-outline-variant');
                    const icon = card.querySelector('.material-symbols-outlined');
                    if (icon) {
                        icon.textContent = 'radio_button_checked';
                        icon.classList.add('fill', 'text-on-surface');
                        icon.classList.remove('text-outline-variant');
                    }
                });
            });

            updateTotal();
        });
    </script>
@endpush