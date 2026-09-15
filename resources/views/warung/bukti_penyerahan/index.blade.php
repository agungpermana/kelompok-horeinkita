@extends('layouts.warung')

@section('title', 'Bukti Penyerahan - Wapen')
@section('active_menu', 'bukti_penyerahan')
@section('page_title', 'Bukti Penyerahan & Riwayat')

@section('header_actions')
<button onclick="bukaModal()"
           class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all shadow-sm">
            <span class="material-symbols-outlined text-base">add</span>
            Tambah Bukti
        </button>
@endsection

@section('content')
@if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm">
                <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        @if($buktis->count() > 0)
            <div class="space-y-4">
                @foreach($buktis as $bukti)
                <details class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden group" {{ $loop->first ? 'open' : '' }}>
                    <summary class="flex items-center justify-between px-5 py-4 cursor-pointer hover:bg-surface-container-low transition-all select-none">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">receipt_long</span>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-on-surface">Kupon #{{ $bukti->id_kupon }}</p>
                                <p class="text-xs text-on-surface-variant mt-0.5">
                                    {{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}
                                    @if($bukti->riwayat->count() > 0)
                                        &bull;
                                        @php $statusTerakhir = $bukti->riwayat->first()->status_penyaluran; @endphp
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                                            {{ $statusTerakhir === 'selesai' ? 'bg-green-100 text-green-700' :
                                               ($statusTerakhir === 'proses' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700') }}">
                                            {{ ucfirst($statusTerakhir) }}
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <span class="material-symbols-outlined text-on-surface-variant text-xl transition-transform group-open:rotate-180">expand_more</span>
                    </summary>

                    <div class="border-t border-outline-variant/40 px-5 py-4 space-y-4">
                        {{-- Info --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-surface-container rounded-xl p-4">
                            <div>
                                <p class="text-xs text-on-surface-variant mb-1">ID Kupon</p>
                                <p class="text-sm font-semibold">#{{ $bukti->id_kupon }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-on-surface-variant mb-1">Tanggal</p>
                                <p class="text-sm font-semibold">{{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-on-surface-variant mb-1">Catatan</p>
                                <p class="text-sm">{{ $bukti->catatan_penyerahan ?? '-' }}</p>
                            </div>
                        </div>

                        {{-- Riwayat --}}
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-semibold text-on-surface">Riwayat Penyaluran</p>
                                <a href="{{ route('bukti-penyerahan.show', $bukti->id_bukti) }}"
                                   class="flex items-center gap-1 text-xs text-primary font-semibold hover:underline">
                                    <span class="material-symbols-outlined text-sm">add_circle</span>
                                    Tambah Riwayat
                                </a>
                            </div>
                            @if($bukti->riwayat->count() > 0)
                                <div class="relative">
                                    <div class="absolute left-3.5 top-0 bottom-0 w-0.5 bg-outline-variant/50"></div>
                                    <div class="space-y-3 pl-10">
                                        @foreach($bukti->riwayat as $riwayat)
                                        <div class="relative">
                                            <div class="absolute -left-6 top-1.5 w-3 h-3 rounded-full border-2 border-primary bg-white"></div>
                                            <div class="bg-surface-container rounded-lg p-3">
                                                <div class="flex items-center justify-between mb-1">
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                                                        {{ $riwayat->status_penyaluran === 'selesai' ? 'bg-green-100 text-green-700' :
                                                           ($riwayat->status_penyaluran === 'proses' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700') }}">
                                                        {{ ucfirst($riwayat->status_penyaluran) }}
                                                    </span>
                                                    <span class="text-xs text-on-surface-variant">
                                                        {{ $riwayat->waktu_pencatatan ? $riwayat->waktu_pencatatan->format('d M Y H:i') : '-' }}
                                                    </span>
                                                </div>
                                                @if($riwayat->keterangan)
                                                    <p class="text-xs text-on-surface-variant mt-1">{{ $riwayat->keterangan }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-6 bg-surface-container rounded-xl">
                                    <p class="text-sm text-on-surface-variant">Belum ada riwayat penyaluran.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </details>
                @endforeach
            </div>
        @else
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm flex flex-col items-center justify-center py-20 gap-4">
                <span class="material-symbols-outlined text-6xl text-on-surface-variant opacity-30">assignment_turned_in</span>
                <div class="text-center">
                    <p class="text-lg font-semibold text-on-surface">Belum ada bukti penyerahan</p>
                    <p class="text-sm text-on-surface-variant mt-1">Klik "Tambah Bukti" untuk memulai.</p>
                </div>
                <button onclick="bukaModal()"
                   class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all mt-2">
                    <span class="material-symbols-outlined text-base">add</span>
                    Tambah Bukti
                </button>
            </div>
        @endif
@endsection
