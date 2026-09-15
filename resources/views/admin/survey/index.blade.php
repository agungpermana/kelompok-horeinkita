<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Data Survey - Admin Wapen</title>
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
<h1 class="font-headline-md text-headline-md text-on-surface">Data Survey</h1>
</div>
<div class="flex items-center gap-2">
<a href="{{ route('admin.survey.export', ['format' => 'csv']) }}" class="px-4 py-2 bg-surface-container text-on-surface font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:bg-surface-container-high transition-colors inline-flex items-center gap-2">
<span class="material-symbols-outlined text-xl">download</span>
CSV
</a>
<a href="{{ route('admin.survey.export', ['format' => 'excel']) }}" class="px-4 py-2 bg-surface-container text-on-surface font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:bg-surface-container-high transition-colors inline-flex items-center gap-2">
<span class="material-symbols-outlined text-xl">table_view</span>
Excel
</a>
<a href="{{ route('admin.survey.create') }}" class="px-6 py-2 bg-primary text-on-primary font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:opacity-90 transition-opacity inline-flex items-center gap-2">
<span class="material-symbols-outlined text-xl">add</span>
Input Hasil Survey
</a>
</div>
</header>

<div class="p-margin-mobile md:p-margin-desktop max-w-container-max mx-auto space-y-stack-xl">
@if(session('success'))
<div class="bg-primary-container/10 border border-primary-container/30 text-on-primary-container rounded-xl px-stack-lg py-stack-md font-body-sm flex items-center gap-3">
<span class="material-symbols-outlined">check_circle</span>
{{ session('success') }}
</div>
@endif

<section class="bg-surface-container-lowest rounded-xl shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30 overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full">
<thead class="bg-surface-container-low">
<tr>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">No</th>
@include('partials.sortable-th', ['sort' => 'nama_subjek', 'label' => 'Nama'])
@include('partials.sortable-th', ['sort' => 'jenis_survey', 'label' => 'Kategori'])
@include('partials.sortable-th', ['sort' => 'tanggal_survey', 'label' => 'Tanggal'])
@include('partials.sortable-th', ['sort' => 'lokasi_rw', 'label' => 'RW'])
@include('partials.sortable-th', ['sort' => 'kelurahan', 'label' => 'Kelurahan'])
@include('partials.sortable-th', ['sort' => 'nomor_telepon', 'label' => 'No. HP'])
@include('partials.sortable-th', ['sort' => 'status_kelayakan', 'label' => 'Status'])
@include('partials.sortable-th', ['sort' => 'skor_kelayakan', 'label' => 'Skor'])
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Foto</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
@forelse($surveys as $index => $survey)
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $index + 1 }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $survey->nama_subjek }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $survey->jenis_survey }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $survey->tanggal_survey ? \Carbon\Carbon::parse($survey->tanggal_survey)->format('d-m-Y') : '-' }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $survey->lokasi_rw }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $survey->kelurahan ?? '-' }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $survey->nomor_telepon }}</td>
<td class="px-stack-lg py-stack-md">
@if($survey->status_kelayakan === 'lolos')
<span class="inline-flex items-center gap-1 px-3 py-1 bg-primary-container/10 text-primary-container font-label-sm text-label-sm rounded-full">
<span class="material-symbols-outlined text-sm">check_circle</span>
Lolos
</span>
@elseif($survey->status_kelayakan === 'tidak_lolos')
<span class="inline-flex items-center gap-1 px-3 py-1 bg-error/10 text-error font-label-sm text-label-sm rounded-full">
<span class="material-symbols-outlined text-sm">cancel</span>
Tidak Lolos
</span>
@else
<span class="font-body-sm text-on-surface-variant">-</span>
@endif
</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $survey->skor_kelayakan ?? '-' }}</td>
<td class="px-stack-lg py-stack-md">
@if($survey->foto_lokasi_url || $survey->foto_identitas_url || $survey->foto_dokumen_url)
<a href="{{ route('admin.survey.edit', $survey->id_survey) }}" class="text-primary hover:text-primary-container transition-colors inline-flex items-center gap-1 font-label-sm text-label-sm">
<span class="material-symbols-outlined text-lg">visibility</span>
Lihat
</a>
@else
<span class="font-body-sm text-on-surface-variant">-</span>
@endif
</td>
<td class="px-stack-lg py-stack-md">
<div class="flex items-center gap-2">
<a href="{{ route('admin.survey.edit', $survey->id_survey) }}" class="px-4 py-2 bg-primary/10 text-primary font-label-md text-label-md rounded-lg hover:bg-primary/20 transition-colors inline-flex items-center gap-1">
<span class="material-symbols-outlined text-lg">edit</span>
Edit
</a>
<form action="{{ route('admin.survey.destroy', $survey->id_survey) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data survey ini?');">
@csrf
@method('DELETE')
<button type="submit" class="px-4 py-2 bg-error/10 text-error font-label-md text-label-md rounded-lg hover:bg-error/20 transition-colors inline-flex items-center gap-1">
<span class="material-symbols-outlined text-lg">delete</span>
Hapus
</button>
</form>
</div>
</td>
</tr>
@empty
<tr>
<td colspan="11" class="px-stack-lg py-stack-xl text-center font-body-sm text-on-surface-variant">
Belum ada data survey.
</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</section>
@include('partials.column-manager', ['key' => 'survey'])
</div>
</main>

</body></html>
