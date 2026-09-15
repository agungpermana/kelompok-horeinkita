@extends('layouts.warung')

@section('title', 'Detail Bukti Penyerahan - Wapen Warung')
@section('active_menu', 'bukti_penyerahan')
@section('page_title', 'Detail Bukti Penyerahan')

@section('header_back_button')
<a href="{{ route('bukti-penyerahan.index') }}" class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-surface-container transition-all text-on-surface-variant">
    <span class="material-symbols-outlined text-xl">arrow_back</span>
</a>
@endsection

@section('content')
    <div class="p-6 md:p-10 max-w-3xl mx-auto space-y-6">

        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm">
                <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        {{-- Info Bukti --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
            <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">receipt_long</span>
                Informasi Bukti
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">ID Bukti</p>
                    <p class="text-sm font-semibold">#{{ $bukti->id_bukti }}</p>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">ID Kupon</p>
                    <p class="text-sm font-semibold">#{{ $bukti->id_kupon }}</p>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">Warung</p>
                    <p class="text-sm font-semibold">{{ $bukti->warung->nama_warung ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs text-on-surface-variant mb-1">Tanggal Penyerahan</p>
                    <p class="text-sm font-semibold">{{ $bukti->tanggal_penyerahan ? $bukti->tanggal_penyerahan->format('d M Y') : '-' }}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs text-on-surface-variant mb-1">Catatan</p>
                    <p class="text-sm">{{ $bukti->catatan_penyerahan ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Riwayat Penyaluran --}}
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
            <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">history</span>
                Riwayat Penyaluran
            </h2>

            @if($bukti->riwayat->count() > 0)
                <div class="relative mb-6">
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
                <p class="text-sm text-on-surface-variant mb-4">Belum ada riwayat penyaluran.</p>
            @endif

            {{-- Form Tambah Riwayat --}}
            <div class="border-t border-outline-variant/40 pt-4">
                <p class="text-sm font-semibold text-on-surface mb-3">Tambah Riwayat Baru</p>
                <form action="{{ route('bukti-penyerahan.riwayat.store', $bukti->id_bukti) }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-on-surface mb-1.5">Status <span class="text-red-500">*</span></label>
                        <select name="status_penyaluran" required
                            class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            <option value="">-- Pilih Status --</option>
                            <option value="pending" {{ old('status_penyaluran') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="proses" {{ old('status_penyaluran') == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ old('status_penyaluran') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status_penyaluran') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-on-surface mb-1.5">Keterangan</label>
                        <textarea name="keterangan" rows="2" placeholder="Keterangan tambahan..."
                            class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ old('keterangan') }}</textarea>
                    </div>
                    <button type="submit"
                        class="flex items-center gap-2 px-4 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
                        <span class="material-symbols-outlined text-base">add</span>
                        Simpan Riwayat
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
