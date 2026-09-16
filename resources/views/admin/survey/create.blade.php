@extends('layouts.admin')

@section('title', 'Input Hasil Survey - Admin Wapen')
@section('active_menu', 'survey')
@section('page_title', '{{ isset($survey) ? 'Edit Hasil Survey Lapangan' : 'Input Hasil Survey Lapangan' }}')

@section('content')
    @if ($errors->any())
        <div
            class="bg-error-container/30 border border-error/30 text-on-error-container rounded-xl px-stack-lg py-stack-md font-body-sm flex items-center gap-3">
            <span class="material-symbols-outlined">error</span>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="survey-form" class="space-y-stack-xl" enctype="multipart/form-data"
        action="{{ isset($survey) ? route('admin.survey.update', $survey->id_survey) : route('admin.survey.store') }}"
        method="POST">
        @csrf
        @if (isset($survey))
            @method('PUT')
        @endif

        <!-- Informasi Dasar Card -->
        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Informasi Dasar</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant"
                        for="jenis_survey">Kategori Survey</label>
                    <select
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="jenis_survey" name="jenis_survey" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Sembako"
                            {{ old('jenis_survey', $survey->jenis_survey ?? null) === 'Sembako' ? 'selected' : '' }}>
                            Sembako</option>
                        <option value="Peralatan"
                            {{ old('jenis_survey', $survey->jenis_survey ?? null) === 'Peralatan' ? 'selected' : '' }}>
                            Peralatan</option>
                    </select>
                    @error('jenis_survey')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant"
                        for="tanggal_survey">Tanggal Survey</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="tanggal_survey" name="tanggal_survey" type="date"
                        value="{{ old('tanggal_survey', $survey->tanggal_survey ?? null) }}" />
                    @error('tanggal_survey')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </section>

        <!-- Identitas & Alamat Card -->
        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Identitas &amp; Alamat
            </h2>
            <div class="space-y-stack-md">
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="nama_subjek">Nama
                        Lengkap / Nama Warung</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50"
                        id="nama_subjek" name="nama_subjek" type="text"
                        placeholder="Contoh: Budi Santoso / Warung Berkah"
                        value="{{ old('nama_subjek', $survey->nama_subjek ?? null) }}" />
                    @error('nama_subjek')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="lokasi_rw">RT /
                            RW</label>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50"
                            id="lokasi_rw" name="lokasi_rw" type="text" placeholder="01 / 04"
                            value="{{ old('lokasi_rw', $survey->lokasi_rw ?? null) }}" />
                        @error('lokasi_rw')
                            <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant"
                            for="kelurahan">Kelurahan</label>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50"
                            id="kelurahan" name="kelurahan" type="text" placeholder="Sukmajaya"
                            value="{{ old('kelurahan', $survey->kelurahan ?? null) }}" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant"
                            for="nomor_telepon">No. Handphone</label>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50"
                            id="nomor_telepon" name="nomor_telepon" type="tel" placeholder="0812..."
                            value="{{ old('nomor_telepon', $survey->nomor_telepon ?? null) }}" />
                        @error('nomor_telepon')
                            <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <!-- Temuan Lapangan & Bukti Card -->
        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Temuan Lapangan &amp;
                Bukti</h2>
            <div class="flex flex-col gap-2 mb-stack-lg">
                <label class="font-label-md text-label-md text-on-surface-variant" for="catatan_survey">Catatan
                    Kondisi (Deskripsi)</label>
                <textarea
                    class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface resize-y"
                    id="catatan_survey" name="catatan_survey" rows="4">{{ old('catatan_survey', $survey->catatan_survey ?? null) }}</textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <!-- Foto Lokasi Upload -->
                <div class="flex flex-col gap-2">
                    <span
                        class="font-label-md text-label-md text-on-surface-variant uppercase text-[10px] tracking-wider">FOTO
                        LOKASI / RUMAH</span>
                    @if (isset($survey) && $survey->foto_lokasi_url)
                        <img alt="Foto lokasi"
                            class="w-full h-48 object-cover rounded-xl border border-outline-variant/30 mb-2"
                            src="{{ asset($survey->foto_lokasi_url) }}" />
                    @endif
                    <div
                        class="relative w-full h-48 border-2 border-dashed border-outline-variant rounded-xl bg-surface flex flex-col items-center justify-center cursor-pointer hover:bg-surface-container-low hover:border-primary transition-colors group">
                        <input accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                            id="foto_lokasi" name="foto_lokasi" type="file" />
                        <div
                            class="flex flex-col items-center justify-center text-on-surface-variant group-hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-4xl mb-2">photo_camera</span>
                            <span class="font-label-sm text-label-sm">Klik untuk upload</span>
                        </div>
                    </div>
                    @error('foto_lokasi')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Foto Identitas Upload -->
                <div class="flex flex-col gap-2">
                    <span
                        class="font-label-md text-label-md text-on-surface-variant uppercase text-[10px] tracking-wider">FOTO
                        IDENTITAS (KTP)</span>
                    @if (isset($survey) && $survey->foto_identitas_url)
                        <img alt="Foto identitas"
                            class="w-full h-48 object-cover rounded-xl border border-outline-variant/30 mb-2"
                            src="{{ asset($survey->foto_identitas_url) }}" />
                    @endif
                    <div
                        class="relative w-full h-48 border-2 border-dashed border-outline-variant rounded-xl bg-surface flex flex-col items-center justify-center cursor-pointer hover:bg-surface-container-low hover:border-primary transition-colors group">
                        <input accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                            id="foto_identitas" name="foto_identitas" type="file" />
                        <div
                            class="flex flex-col items-center justify-center text-on-surface-variant group-hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-4xl mb-2">badge</span>
                            <span class="font-label-sm text-label-sm">Klik untuk upload</span>
                        </div>
                    </div>
                    @error('foto_identitas')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Dokumen Pendukung Upload -->
                <div class="flex flex-col gap-2">
                    <span
                        class="font-label-md text-label-md text-on-surface-variant uppercase text-[10px] tracking-wider">DOKUMEN
                        PENDUKUNG</span>
                    @if (isset($survey) && $survey->foto_dokumen_url)
                        <img alt="Dokumen pendukung"
                            class="w-full h-48 object-cover rounded-xl border border-outline-variant/30 mb-2"
                            src="{{ asset($survey->foto_dokumen_url) }}" />
                    @endif
                    <div
                        class="relative w-full h-48 border-2 border-dashed border-outline-variant rounded-xl bg-surface flex flex-col items-center justify-center cursor-pointer hover:bg-surface-container-low hover:border-primary transition-colors group">
                        <input accept="image/*,.pdf"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                            id="foto_dokumen" name="foto_dokumen" type="file" />
                        <div
                            class="flex flex-col items-center justify-center text-on-surface-variant group-hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-4xl mb-2">upload_file</span>
                            <span class="font-label-sm text-label-sm">Klik untuk upload</span>
                        </div>
                    </div>
                    @error('foto_dokumen')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </section>

        <!-- Penilaian Kelayakan Card -->
        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Penilaian Kelayakan</h2>
            <div class="flex flex-col md:flex-row items-end gap-gutter">
                <div class="flex flex-col gap-2 w-full md:w-1/3">
                    <label class="font-label-md text-label-md text-on-surface-variant"
                        for="skor_kelayakan">Skor (0 - 100)</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50"
                        id="skor_kelayakan" name="skor_kelayakan" type="number" min="0"
                        max="100" placeholder="Contoh: 85"
                        value="{{ old('skor_kelayakan', $survey->skor_kelayakan ?? null) }}" />
                    @error('skor_kelayakan')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex gap-4 w-full md:w-2/3">
                    <label class="flex-1 cursor-pointer">
                        <input class="peer sr-only" name="status_kelayakan" type="radio" value="lolos"
                            {{ old('status_kelayakan', $survey->status_kelayakan ?? null) === 'lolos' ? 'checked' : '' }} />
                        <div
                            class="w-full text-center px-4 py-3 rounded-lg border border-outline-variant text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low peer-checked:bg-primary-container peer-checked:text-on-primary-container peer-checked:border-primary-container transition-all shadow-[0px_2px_4px_rgba(0,0,0,0.05)]">
                            Lolos Survey
                        </div>
                    </label>
                    <label class="flex-1 cursor-pointer">
                        <input class="peer sr-only" name="status_kelayakan" type="radio"
                            value="tidak_lolos"
                            {{ old('status_kelayakan', $survey->status_kelayakan ?? null) === 'tidak_lolos' ? 'checked' : '' }} />
                        <div
                            class="w-full text-center px-4 py-3 rounded-lg border border-error/50 text-error font-label-md text-label-md hover:bg-error-container/30 peer-checked:bg-error-container peer-checked:text-on-error-container peer-checked:border-error-container transition-all shadow-[0px_2px_4px_rgba(0,0,0,0.05)]">
                            Tidak Lolos
                        </div>
                    </label>
                </div>
            </div>
        </section>

        <!-- Submit Button Area -->
        <div class="pt-4 pb-8 flex justify-center">
            <button
                class="w-full md:w-auto px-12 py-4 bg-primary text-on-primary font-headline-sm text-headline-sm rounded-xl shadow-[0px_10px_20px_rgba(13,13,91,0.08)] hover:bg-primary-container hover:text-on-primary-container transition-all transform active:scale-[0.98]"
                type="submit">
                {{ isset($survey) ? 'Perbarui Hasil Survey Lapangan' : 'Submit Hasil Survey Lapangan' }}
            </button>
        </div>
    </form>
@endsection
