@extends('layouts.warung')

@section('title', 'Tambah Bukti Penyerahan - Wapen Warung')
@section('active_menu', 'bukti_penyerahan')
@section('page_title', 'Tambah Bukti Penyerahan')

@section('header_back_button')
<a href="{{ route('bukti-penyerahan.index') }}" class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-surface-container transition-all text-on-surface-variant">
    <span class="material-symbols-outlined text-xl">arrow_back</span>
</a>
@endsection

@section('content')

    <div class="p-6 md:p-10 max-w-2xl mx-auto">

        @if($errors->any())
            <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 mb-6 text-sm">
                <span class="material-symbols-outlined text-red-500 text-xl mt-0.5">error</span>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
            <form action="{{ route('bukti-penyerahan.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Info warung --}}
                @if($warung)
                    <div class="flex items-center gap-2 px-3 py-2 bg-surface-container rounded-lg text-sm text-on-surface-variant">
                        <span class="material-symbols-outlined text-base">storefront</span>
                        <span>{{ $warung->nama_warung }}</span>
                    </div>
                @endif

                {{-- Data Penyerahan --}}
                <div class="border-t border-outline-variant/40 pt-4">
                    <p class="text-sm font-bold text-on-surface mb-4">Data Penyerahan</p>
                    <div class="space-y-4">

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Kupon <span class="text-red-500">*</span></label>
                            @if($kupons->count() > 0)
                                <select name="id_kupon" required
                                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                    <option value="">-- Pilih Kupon --</option>
                                    @foreach($kupons as $kupon)
                                        <option value="{{ $kupon->id_kupon }}" {{ old('id_kupon') == $kupon->id_kupon ? 'selected' : '' }}>
                                            Kupon #{{ $kupon->id_kupon }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <div class="px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm text-on-surface-variant bg-surface-container">
                                    Tidak ada kupon tersedia
                                </div>
                            @endif
                            @error('id_kupon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Tanggal Penyerahan <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal_penyerahan"
                                value="{{ old('tanggal_penyerahan', date('Y-m-d')) }}"
                                class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                required/>
                            @error('tanggal_penyerahan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Foto Bukti (URL)</label>
                            <input type="text" name="foto_bukti_url" value="{{ old('foto_bukti_url') }}"
                                placeholder="https://..."
                                class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"/>
                            @error('foto_bukti_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-1.5">Catatan Penyerahan</label>
                            <textarea name="catatan_penyerahan" rows="3"
                                placeholder="Catatan tambahan tentang penyerahan..."
                                class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ old('catatan_penyerahan') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="flex gap-3 pt-2">
                    <a href="{{ route('bukti-penyerahan.index') }}"
                        class="flex-1 text-center px-4 py-2.5 rounded-lg border border-outline-variant text-on-surface-variant text-sm font-semibold hover:bg-surface-container-low transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 px-4 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
                        Simpan Bukti
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
