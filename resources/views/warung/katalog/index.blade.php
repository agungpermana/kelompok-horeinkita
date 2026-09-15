<!DOCTYPE html>
<html lang="id"><head>
@include('warung.partials.head', ['pageTitle' => 'Katalog Sembako'])
</head>
<body class="bg-surface font-body-md text-on-surface flex min-h-screen">

@include('warung.partials.sidebar', ['active' => 'katalog'])

<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">
<header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-margin-mobile md:px-margin-desktop py-4 flex items-center justify-between">
<div class="flex items-center gap-4">
<button class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<h1 class="font-headline-md text-headline-md text-on-surface">Katalog Sembako</h1>
</div>
<div>
<a href="{{ route('warung.katalog.create') }}" class="px-6 py-2 bg-primary text-on-primary font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:opacity-90 transition-opacity inline-flex items-center gap-2">
<span class="material-symbols-outlined text-xl">add</span>
Tambah Paket
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
@include('partials.sortable-th', ['sort' => 'nama_paket', 'label' => 'Nama Paket'])
@include('partials.sortable-th', ['sort' => 'deskripsi', 'label' => 'Deskripsi'])
@include('partials.sortable-th', ['sort' => 'harga', 'label' => 'Harga'])
@include('partials.sortable-th', ['sort' => 'stok', 'label' => 'Stok'])
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
@forelse($katalog as $index => $paket)
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $index + 1 }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $paket->nama_paket }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $paket->deskripsi ?? '-' }}</td>
<td class="px-stack-lg py-stack-md font-body-sm text-on-surface">Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
<td class="px-stack-lg py-stack-md">
@if($paket->stok > 0)
<span class="inline-flex items-center gap-1 px-3 py-1 bg-primary-container/10 text-primary-container font-label-sm text-label-sm rounded-full">{{ $paket->stok }}</span>
@else
<span class="inline-flex items-center gap-1 px-3 py-1 bg-error/10 text-error font-label-sm text-label-sm rounded-full">Habis</span>
@endif
</td>
<td class="px-stack-lg py-stack-md">
<div class="flex items-center gap-2">
<a href="{{ route('warung.katalog.edit', $paket->id_paket) }}" class="px-4 py-2 bg-primary/10 text-primary font-label-md text-label-md rounded-lg hover:bg-primary/20 transition-colors inline-flex items-center gap-1">
<span class="material-symbols-outlined text-lg">edit</span>
Edit
</a>
<form action="{{ route('warung.katalog.destroy', $paket->id_paket) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus paket ini?');">
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
Belum ada paket di Katalog Sembako.
</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</section>
@include('partials.column-manager', ['key' => 'warung-katalog'])
</div>
</main>

</body></html>