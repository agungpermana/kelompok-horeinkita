<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Dashboard Admin - Wapen</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

@include('admin.partials.sidebar', ['active' => 'dashboard'])

<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">
<header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-margin-mobile md:px-margin-desktop py-4 flex items-center justify-between">
<div class="flex items-center gap-4">
<button class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<h1 class="font-headline-md text-headline-md text-on-surface">Dashboard Admin</h1>
</div>
</header>

<div class="p-margin-mobile md:p-margin-desktop max-w-container-max mx-auto space-y-stack-xl">
<p class="font-body-md text-on-surface-variant">Selamat datang di sistem Warung Penyalur (Wapen).</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
<div class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<div class="flex items-center gap-3 mb-stack-md">
<span class="material-symbols-outlined text-primary text-3xl">storefront</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Pemilik Warung</h3>
</div>
<div class="font-headline-lg text-headline-lg text-primary">{{ $jumlahWarung }}</div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<div class="flex items-center gap-3 mb-stack-md">
<span class="material-symbols-outlined text-secondary text-3xl">assignment_ind</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Penerima Bantuan</h3>
</div>
<div class="font-headline-lg text-headline-lg text-secondary">{{ $jumlahPenerima }}</div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<div class="flex items-center gap-3 mb-stack-md">
<span class="material-symbols-outlined text-tertiary text-3xl">volunteer_activism</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Donatur</h3>
</div>
<div class="font-headline-lg text-headline-lg text-tertiary">{{ $jumlahDonatur }}</div>
</div>
</div>

<section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Panel Administrasi</h2>
<p class="font-body-md text-on-surface-variant">Admin dapat mengelola akun pengguna yang terlibat dalam sistem Wapen, termasuk Pemilik Warung, Penerima Bantuan, dan Donatur.</p>
</section>

@php
$chartTotal = $statusBerhasil + $statusPending + $statusGagal + $statusDibatalkan;
@endphp
<section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<div class="flex items-center gap-3 mb-stack-md">
<span class="material-symbols-outlined text-primary text-3xl">pie_chart</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface">Transaksi per Status Pembayaran</h2>
</div>
<div class="flex flex-col md:flex-row items-center gap-gutter">
<div class="w-full md:w-1/2 max-w-sm">
<canvas id="statusChart"></canvas>
</div>
<div class="flex-1 w-full grid grid-cols-1 sm:grid-cols-2 gap-stack-md">
<div class="flex items-center gap-3 p-4 rounded-xl bg-surface-container-low">
<span class="w-4 h-4 rounded-full bg-primary inline-block shrink-0"></span>
<div>
<p class="font-label-md text-label-md text-on-surface">Berhasil</p>
<p class="font-headline-md text-headline-md text-primary">{{ $statusBerhasil }}</p>
</div>
</div>
<div class="flex items-center gap-3 p-4 rounded-xl bg-surface-container-low">
<span class="w-4 h-4 rounded-full bg-amber-500 inline-block shrink-0"></span>
<div>
<p class="font-label-md text-label-md text-on-surface">Pending</p>
<p class="font-headline-md text-headline-md text-amber-700">{{ $statusPending }}</p>
</div>
</div>
<div class="flex items-center gap-3 p-4 rounded-xl bg-surface-container-low">
<span class="w-4 h-4 rounded-full bg-error inline-block shrink-0"></span>
<div>
<p class="font-label-md text-label-md text-on-surface">Gagal</p>
<p class="font-headline-md text-headline-md text-error">{{ $statusGagal }}</p>
</div>
</div>
<div class="flex items-center gap-3 p-4 rounded-xl bg-surface-container-low">
<span class="w-4 h-4 rounded-full bg-outline inline-block shrink-0"></span>
<div>
<p class="font-label-md text-label-md text-on-surface">Dibatalkan</p>
<p class="font-headline-md text-headline-md text-on-surface-variant">{{ $statusDibatalkan }}</p>
</div>
</div>
</div>
</div>
@if($chartTotal === 0)
<p class="mt-stack-md font-body-sm text-on-surface-variant">Belum ada data transaksi.</p>
@endif
</section>
</div>
</main>

@if($chartTotal > 0)
<script>
      const startChart = () => {
        const ctx = document.getElementById('statusChart');
        new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ['Berhasil', 'Pending', 'Gagal', 'Dibatalkan'],
            datasets: [{
              data: [{{ $statusBerhasil }}, {{ $statusPending }}, {{ $statusGagal }}, {{ $statusDibatalkan }}],
              backgroundColor: ['#0800b5', '#f59e0b', '#ba1a1a', '#767588'],
              borderColor: '#ffffff',
              borderWidth: 2,
              hoverOffset: 8
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
              legend: { display: false },
              tooltip: {
                callbacks: {
                  label: (item) => ` ${item.label}: ${item.raw} transaksi`
                }
              }
            }
          }
        });
      };
      document.addEventListener('DOMContentLoaded', startChart);
    </script>
@endif

</body></html>
