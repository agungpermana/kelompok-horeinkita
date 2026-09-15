<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Laporan Penyaluran - Admin Wapen</title>
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

@include('admin.partials.sidebar', ['active' => 'penyaluran'])

<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">
<header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-margin-mobile md:px-margin-desktop py-4 flex items-center justify-between">
<div class="flex items-center gap-4">
<button class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<h1 class="font-headline-md text-headline-md text-on-surface">Laporan Penyaluran</h1>
</div>
</header>

<div class="p-margin-mobile md:p-margin-desktop max-w-container-max mx-auto space-y-stack-xl">
@if(session('success'))
<div class="bg-primary-container/10 border border-primary-container/30 text-on-primary-container rounded-xl px-stack-lg py-stack-md font-body-sm flex items-center gap-3">
<span class="material-symbols-outlined">check_circle</span>
{{ session('success') }}
</div>
@endif

<form class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30 flex flex-col md:flex-row gap-gutter" method="GET" action="{{ route('admin.penyaluran.index') }}">
<div class="flex-1 flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="q">Cari Warung / Penerima</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50" id="q" name="q" type="text" value="{{ request('q') }}" placeholder="Nama warung atau nama penerima"/>
</div>
<div class="flex items-end gap-2">
<button class="px-6 py-3 bg-primary text-on-primary font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:opacity-90 transition-opacity inline-flex items-center gap-2" type="submit">
<span class="material-symbols-outlined text-xl">search</span>
Cari
</button>
@if(request()->filled('q'))
<a class="px-4 py-3 text-on-surface-variant hover:text-primary font-label-md text-label-md rounded-lg inline-flex items-center gap-1" href="{{ route('admin.penyaluran.index') }}">
<span class="material-symbols-outlined text-xl">close</span>
Reset
</a>
@endif
</div>
</form>

<section class="bg-surface-container-lowest rounded-xl shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30 overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full">
<thead class="bg-surface-container-low">
<tr>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">No</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Nama Warung</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Penerima</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Kode Kupon</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Foto</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Catatan</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Tanggal Penyerahan</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
@forelse($penyaluran as $index => $b)
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $index + 1 }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $b->warung->nama_warung ?? '-' }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $b->kupon?->transaksi?->penerima?->user?->nama_lengkap ?? '-' }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
@if($b->kupon)
<span class="inline-flex items-center gap-1 px-3 py-1 bg-secondary-container/40 text-on-secondary-container font-label-sm text-label-sm rounded-full">{{ $b->kupon->kode_kupon }}</span>
@else
-
@endif
</td>
<td class="px-stack-lg py-stack-md">
@if($b->foto_bukti_url)
<a href="{{ $b->foto_bukti_url }}" target="_blank" class="block">
<img class="w-16 h-16 object-cover rounded-lg border border-outline-variant" src="{{ $b->foto_bukti_url }}" alt="Foto Bukti"/>
</a>
@else
<span class="font-body-sm text-on-surface-variant">-</span>
@endif
</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $b->catatan_penyerahan ?? '-' }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $b->tanggal_penyerahan ? date('d M Y H:i', strtotime($b->tanggal_penyerahan)) : '-' }}</td>
</tr>
@empty
<tr>
<td colspan="7" class="px-stack-lg py-stack-xl text-center font-body-sm text-on-surface-variant">
Belum ada data penyaluran.
</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</section>
</div>
</main>

</body></html>