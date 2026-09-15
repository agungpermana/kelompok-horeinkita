<!DOCTYPE html>
<html lang="id"><head>
@include('warung.partials.head', ['pageTitle' => 'Tambah Katalog Sembako'])
</head>
<body class="bg-surface font-body-md text-on-surface flex min-h-screen">

@include('warung.partials.sidebar', ['active' => 'katalog'])

<main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">
<header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-margin-mobile md:px-margin-desktop py-4 flex items-center justify-between">
<div class="flex items-center gap-4">
<button class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container">
<span class="material-symbols-outlined">menu</span>
</button>
<a class="text-on-surface-variant hover:text-primary transition-colors flex items-center justify-center p-2 rounded-full hover:bg-surface-container" href="{{ route('warung.katalog.index') }}">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<h1 class="font-headline-md text-headline-md text-on-surface">Tambah Katalog Sembako</h1>
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

<form class="space-y-stack-xl" action="{{ route('warung.katalog.store') }}" method="POST">
@csrf

<section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Informasi Paket</h2>
<div class="space-y-stack-md">
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="nama_paket">Nama Paket Sembako</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50" id="nama_paket" name="nama_paket" type="text" value="{{ old('nama_paket') }}" placeholder="Contoh: Paket Beras 5kg" required/>
@error('nama_paket')
<span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
@enderror
</div>
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="deskripsi">Deskripsi</label>
<textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface resize-y" id="deskripsi" name="deskripsi" rows="4" placeholder="Deskripsi isi paket (opsional)">{{ old('deskripsi') }}</textarea>
</div>
</div>
</section>

<section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Harga & Stok</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="harga">Harga</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50" id="harga" name="harga" type="number" step="0.01" min="0" value="{{ old('harga') }}" placeholder="Contoh: 50000" required/>
@error('harga')
<span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
@enderror
</div>
<div class="flex flex-col gap-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="stok">Stok</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50" id="stok" name="stok" type="number" min="0" value="{{ old('stok') }}" placeholder="Contoh: 10" required/>
@error('stok')
<span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
@enderror
</div>
</div>
</section>

<div class="pt-4 pb-8 flex justify-center">
<button class="w-full md:w-auto px-12 py-4 bg-primary text-on-primary font-headline-sm text-headline-sm rounded-xl shadow-[0px_10px_20px_rgba(13,13,91,0.08)] hover:bg-primary-container hover:text-on-primary-container transition-all transform active:scale-[0.98]" type="submit">
Simpan Paket
</button>
</div>
</form>
</div>
</main>

</body></html>