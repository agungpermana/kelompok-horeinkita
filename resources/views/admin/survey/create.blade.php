<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Input Hasil Survey - Admin Wapen</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "secondary-container": "#a9acfd",
                    "secondary": "#5457a1",
                    "primary": "#0800b5",
                    "inverse-on-surface": "#eaf1ff",
                    "on-secondary-container": "#3a3d86",
                    "on-tertiary": "#ffffff",
                    "secondary-fixed-dim": "#c0c1ff",
                    "error-container": "#ffdad6",
                    "secondary-fixed": "#e1e0ff",
                    "background": "#f8f9ff",
                    "primary-container": "#2121e2",
                    "inverse-primary": "#bfc1ff",
                    "on-primary-fixed-variant": "#1b19df",
                    "on-surface": "#0b1c30",
                    "surface-variant": "#d3e4fe",
                    "on-primary-fixed": "#03006d",
                    "on-primary-container": "#b1b4ff",
                    "surface": "#f8f9ff",
                    "on-tertiary-container": "#b6bbc5",
                    "tertiary-container": "#464b54",
                    "inverse-surface": "#213145",
                    "on-error-container": "#93000a",
                    "on-error": "#ffffff",
                    "tertiary-fixed-dim": "#c2c6d1",
                    "surface-container": "#e5eeff",
                    "outline": "#767588",
                    "on-surface-variant": "#454556",
                    "surface-container-highest": "#d3e4fe",
                    "error": "#ba1a1a",
                    "outline-variant": "#c6c4d9",
                    "surface-dim": "#cbdbf5",
                    "on-secondary-fixed": "#0d0d5b",
                    "on-secondary-fixed-variant": "#3c3f87",
                    "on-tertiary-fixed": "#171c23",
                    "surface-container-low": "#eff4ff",
                    "surface-tint": "#3c41f5",
                    "surface-container-lowest": "#ffffff",
                    "primary-fixed-dim": "#bfc1ff",
                    "primary-fixed": "#e1e0ff",
                    "tertiary-fixed": "#dee2ed",
                    "on-secondary": "#ffffff",
                    "on-background": "#0b1c30",
                    "on-primary": "#ffffff",
                    "tertiary": "#2f343d",
                    "on-tertiary-fixed-variant": "#424750",
                    "surface-bright": "#f8f9ff",
                    "surface-container-high": "#dce9ff"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "margin-mobile": "16px",
                    "stack-md": "16px",
                    "margin-desktop": "40px",
                    "stack-sm": "8px",
                    "container-max": "1280px",
                    "stack-xl": "48px",
                    "stack-lg": "24px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "headline-lg": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "headline-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "label-md": ["Inter"],
                    "body-sm": ["Inter"],
                    "headline-sm": ["Inter"],
                    "body-md": ["Inter"],
                    "body-lg": ["Inter"]
            },
            "fontSize": {
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                    "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.01em", "fontWeight": "600"}],
                    "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "headline-sm": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined[data-weight="fill"] {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-surface font-body-md text-on-surface flex min-h-screen">

@include('admin.partials.sidebar', ['active' => 'survey'])

<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">
<header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-margin-mobile md:px-margin-desktop py-4 flex items-center justify-between">
<div class="flex items-center gap-4">
<button class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<a class="text-on-surface-variant hover:text-primary transition-colors flex items-center justify-center p-2 rounded-full hover:bg-surface-container" href="{{ route('admin.survey.index') }}">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<h1 class="font-headline-md text-headline-md text-on-surface">{{ isset($survey) ? 'Edit Hasil Survey Lapangan' : 'Input Hasil Survey Lapangan' }}</h1>
</div>
<div>
<button class="px-6 py-2 bg-inverse-surface text-on-inverse-surface font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:opacity-90 transition-opacity">
Simpan Draft
</button>
</div>
</header>

<div class="p-margin-mobile md:p-margin-desktop max-w-container-max mx-auto space-y-stack-xl">
@if($errors->any())
<div class="bg-error-container/30 border border-error/30 text-on-error-container rounded-xl px-stack-lg py-stack-md font-body-sm flex items-center gap-3">
<span class="material-symbols-outlined">error</span>
<ul class="list-disc list-inside">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form id="survey-form" class="space-y-stack-xl" enctype="multipart/form-data" action="{{ isset($survey) ? route('admin.survey.update', $survey->id_survey) : route('admin.survey.store') }}" method="POST">
@csrf
@if(isset($survey))
@method('PUT')
@endif

<!-- Informasi Dasar Card -->
<section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Informasi Dasar</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="jenis_survey">Kategori Survey</label>
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface" id="jenis_survey" name="jenis_survey" required>
<option value="">Pilih Kategori</option>
<option value="Sembako" {{ old('jenis_survey', $survey->jenis_survey ?? null) === 'Sembako' ? 'selected' : '' }}>Sembako</option>
<option value="Peralatan" {{ old('jenis_survey', $survey->jenis_survey ?? null) === 'Peralatan' ? 'selected' : '' }}>Peralatan</option>
</select>
@error('jenis_survey')
<span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
@enderror
</div>
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="tanggal_survey">Tanggal Survey</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface" id="tanggal_survey" name="tanggal_survey" type="date" value="{{ old('tanggal_survey', $survey->tanggal_survey ?? null) }}"/>
@error('tanggal_survey')
<span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
@enderror
</div>
</div>
</section>

<!-- Identitas & Alamat Card -->
<section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Identitas &amp; Alamat</h2>
<div class="space-y-stack-md">
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="nama_subjek">Nama Lengkap / Nama Warung</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50" id="nama_subjek" name="nama_subjek" type="text" placeholder="Contoh: Budi Santoso / Warung Berkah" value="{{ old('nama_subjek', $survey->nama_subjek ?? null) }}"/>
@error('nama_subjek')
<span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
@enderror
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="lokasi_rw">RT / RW</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50" id="lokasi_rw" name="lokasi_rw" type="text" placeholder="01 / 04" value="{{ old('lokasi_rw', $survey->lokasi_rw ?? null) }}"/>
@error('lokasi_rw')
<span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
@enderror
</div>
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="kelurahan">Kelurahan</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50" id="kelurahan" name="kelurahan" type="text" placeholder="Sukmajaya" value="{{ old('kelurahan', $survey->kelurahan ?? null) }}"/>
</div>
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="nomor_telepon">No. Handphone</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50" id="nomor_telepon" name="nomor_telepon" type="tel" placeholder="0812..." value="{{ old('nomor_telepon', $survey->nomor_telepon ?? null) }}"/>
@error('nomor_telepon')
<span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
@enderror
</div>
</div>
</div>
</section>

<!-- Temuan Lapangan & Bukti Card -->
<section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Temuan Lapangan &amp; Bukti</h2>
<div class="flex flex-col gap-2 mb-stack-lg">
<label class="font-label-md text-label-md text-on-surface-variant" for="catatan_survey">Catatan Kondisi (Deskripsi)</label>
<textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface resize-y" id="catatan_survey" name="catatan_survey" rows="4">{{ old('catatan_survey', $survey->catatan_survey ?? null) }}</textarea>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
<!-- Foto Lokasi Upload -->
<div class="flex flex-col gap-2">
<span class="font-label-md text-label-md text-on-surface-variant uppercase text-[10px] tracking-wider">FOTO LOKASI / RUMAH</span>
@if(isset($survey) && $survey->foto_lokasi_url)
<img alt="Foto lokasi" class="w-full h-48 object-cover rounded-xl border border-outline-variant/30 mb-2" src="{{ asset($survey->foto_lokasi_url) }}"/>
@endif
<div class="relative w-full h-48 border-2 border-dashed border-outline-variant rounded-xl bg-surface flex flex-col items-center justify-center cursor-pointer hover:bg-surface-container-low hover:border-primary transition-colors group">
<input accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" id="foto_lokasi" name="foto_lokasi" type="file"/>
<div class="flex flex-col items-center justify-center text-on-surface-variant group-hover:text-primary transition-colors">
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
<span class="font-label-md text-label-md text-on-surface-variant uppercase text-[10px] tracking-wider">FOTO IDENTITAS (KTP)</span>
@if(isset($survey) && $survey->foto_identitas_url)
<img alt="Foto identitas" class="w-full h-48 object-cover rounded-xl border border-outline-variant/30 mb-2" src="{{ asset($survey->foto_identitas_url) }}"/>
@endif
<div class="relative w-full h-48 border-2 border-dashed border-outline-variant rounded-xl bg-surface flex flex-col items-center justify-center cursor-pointer hover:bg-surface-container-low hover:border-primary transition-colors group">
<input accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" id="foto_identitas" name="foto_identitas" type="file"/>
<div class="flex flex-col items-center justify-center text-on-surface-variant group-hover:text-primary transition-colors">
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
<span class="font-label-md text-label-md text-on-surface-variant uppercase text-[10px] tracking-wider">DOKUMEN PENDUKUNG</span>
@if(isset($survey) && $survey->foto_dokumen_url)
<img alt="Dokumen pendukung" class="w-full h-48 object-cover rounded-xl border border-outline-variant/30 mb-2" src="{{ asset($survey->foto_dokumen_url) }}"/>
@endif
<div class="relative w-full h-48 border-2 border-dashed border-outline-variant rounded-xl bg-surface flex flex-col items-center justify-center cursor-pointer hover:bg-surface-container-low hover:border-primary transition-colors group">
<input accept="image/*,.pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" id="foto_dokumen" name="foto_dokumen" type="file"/>
<div class="flex flex-col items-center justify-center text-on-surface-variant group-hover:text-primary transition-colors">
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
<section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Penilaian Kelayakan</h2>
<div class="flex flex-col md:flex-row items-end gap-gutter">
<div class="flex flex-col gap-2 w-full md:w-1/3">
<label class="font-label-md text-label-md text-on-surface-variant" for="skor_kelayakan">Skor (0 - 100)</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50" id="skor_kelayakan" name="skor_kelayakan" type="number" min="0" max="100" placeholder="Contoh: 85" value="{{ old('skor_kelayakan', $survey->skor_kelayakan ?? null) }}"/>
@error('skor_kelayakan')
<span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
@enderror
</div>
<div class="flex gap-4 w-full md:w-2/3">
<label class="flex-1 cursor-pointer">
<input class="peer sr-only" name="status_kelayakan" type="radio" value="lolos" {{ old('status_kelayakan', $survey->status_kelayakan ?? null) === 'lolos' ? 'checked' : '' }}/>
<div class="w-full text-center px-4 py-3 rounded-lg border border-outline-variant text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low peer-checked:bg-primary-container peer-checked:text-on-primary-container peer-checked:border-primary-container transition-all shadow-[0px_2px_4px_rgba(0,0,0,0.05)]">
Lolos Survey
</div>
</label>
<label class="flex-1 cursor-pointer">
<input class="peer sr-only" name="status_kelayakan" type="radio" value="tidak_lolos" {{ old('status_kelayakan', $survey->status_kelayakan ?? null) === 'tidak_lolos' ? 'checked' : '' }}/>
<div class="w-full text-center px-4 py-3 rounded-lg border border-error/50 text-error font-label-md text-label-md hover:bg-error-container/30 peer-checked:bg-error-container peer-checked:text-on-error-container peer-checked:border-error-container transition-all shadow-[0px_2px_4px_rgba(0,0,0,0.05)]">
Tidak Lolos
</div>
</label>
</div>
</div>
</section>

<!-- Submit Button Area -->
<div class="pt-4 pb-8 flex justify-center">
<button class="w-full md:w-auto px-12 py-4 bg-primary text-on-primary font-headline-sm text-headline-sm rounded-xl shadow-[0px_10px_20px_rgba(13,13,91,0.08)] hover:bg-primary-container hover:text-on-primary-container transition-all transform active:scale-[0.98]" type="submit">
{{ isset($survey) ? 'Perbarui Hasil Survey Lapangan' : 'Submit Hasil Survey Lapangan' }}
</button>
</div>
</form>
</div>
</main>

</body></html>
