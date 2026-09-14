<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Data Penerima - Admin Wapen</title>
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

<aside class="hidden md:flex bg-surface-container-lowest border-r border-outline-variant w-64 fixed left-0 top-0 h-screen flex-col p-4 gap-stack-md z-40">
<div class="flex items-center gap-3 mb-8 px-2">
<div class="w-12 h-12 flex items-center justify-center"><img alt="Wapen Logo" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6sYXVPmNzgf5Du1I8-03CSe678E-MU1byR_JSGezDcsfVHFfR_mEhBTegt7PvzNTbRZ-UNEbIqILSJVsh0JVPAr2wpEXas4jT1xVH2JG1DA6jsxYAWMdKqRhXaanDK9YOvfCVwZbSSaudQk9KYwpAHYz-gRoHDQGKo9cf2kAw5Bht-m5udkupqUcb_PKDcDaK6xJ0aEp_OPNCB-dnmeyK_0G1DdN0CWqheVL4XtoONZyxwlO0nju_tzvf63OzDBc5sMA"/></div>
<div>
<h1 class="font-headline-sm text-headline-sm font-bold text-on-surface">Wapen</h1>
<p class="font-label-sm text-label-sm text-on-surface-variant">Warung Penyalur</p>
</div>
</div>
<nav class="flex-1 flex flex-col gap-2">
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="{{ route('admin.dashboard') }}">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="{{ route('admin.survey.index') }}">
<span class="material-symbols-outlined">description</span>
<span class="font-label-md text-label-md">Data Survey</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="{{ route('admin.warung.index') }}">
<span class="material-symbols-outlined">storefront</span>
<span class="font-label-md text-label-md">Pemilik Warung</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg bg-secondary-container text-on-secondary-container font-bold transition-all shadow-[0px_2px_4px_rgba(0,0,0,0.05)]" href="{{ route('admin.penerimas.index') }}">
<span class="material-symbols-outlined" data-weight="fill">assignment_ind</span>
<span class="font-label-md text-label-md">Penerima Bantuan</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="#">
<span class="material-symbols-outlined">volunteer_activism</span>
<span class="font-label-md text-label-md">Donatur</span>
</a>
</nav>
<div class="mt-auto flex flex-col gap-2 border-t border-outline-variant pt-4">
<a class="flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-md text-label-md">Pengaturan</span>
</a>
<form method="POST" action="{{ route('logout') }}">
@csrf
<button type="submit" class="w-full flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
<span class="material-symbols-outlined">logout</span>
<span class="font-label-md text-label-md">Keluar</span>
</button>
</form>
</div>
</aside>

<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">
<header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-margin-mobile md:px-margin-desktop py-4 flex items-center justify-between">
<div class="flex items-center gap-4">
<button class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<h1 class="font-headline-md text-headline-md text-on-surface">Data Penerima Bantuan</h1>
</div>
<div>
<a href="{{ route('admin.penerimas.create') }}" class="px-6 py-2 bg-primary text-on-primary font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:opacity-90 transition-opacity inline-flex items-center gap-2">
<span class="material-symbols-outlined text-xl">add</span>
Tambah Penerima
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
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Nama User</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Survey</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">RW</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Alamat</th>
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
@forelse($penerimas as $index => $penerima)
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $index + 1 }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $penerima->user->nama_lengkap ?? '-' }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $penerima->survey->nama_subjek ?? '-' }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $penerima->lokasi_rw ?? '-' }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $penerima->alamat_penerima ?? '-' }}</td>
<td class="px-stack-lg py-stack-md">
<div class="flex items-center gap-2">
<a href="{{ route('admin.penerimas.edit', $penerima->id_penerima) }}" class="px-4 py-2 bg-primary/10 text-primary font-label-md text-label-md rounded-lg hover:bg-primary/20 transition-colors inline-flex items-center gap-1">
<span class="material-symbols-outlined text-lg">edit</span>
Edit
</a>
<form action="{{ route('admin.penerimas.destroy', $penerima->id_penerima) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data penerima ini?');">
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
<td colspan="6" class="px-stack-lg py-stack-xl text-center font-body-sm text-on-surface-variant">
Belum ada data Penerima Bantuan.
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
