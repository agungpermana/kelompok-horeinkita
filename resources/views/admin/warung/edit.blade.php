@extends('layouts.admin')

@section('title', 'Edit Pemilik Warung - Admin Wapen')
@section('active_menu', 'warung')
@section('page_title', 'Edit Akun Pemilik Warung')

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

    <form class="space-y-stack-xl" action="{{ route('admin.warung.update', $warung->id_user) }}" method="POST">
        @csrf
        @method('PUT')

        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Informasi Akun</h2>
            <div class="space-y-stack-md">
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="username">Username</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="username" name="username" type="text" value="{{ old('username', $warung->username) }}" required />
                    @error('username')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="name">Nama
                        Pemilik Warung</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="name" name="name" type="text" value="{{ old('name', $warung->name) }}" required />
                    @error('name')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="email">Email</label>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                            id="email" name="email" type="email" value="{{ old('email', $warung->email) }}" />
                        @error('email')
                            <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="nomor_hp">Nomor
                            HP</label>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                            id="nomor_hp" name="nomor_hp" type="text" value="{{ old('nomor_hp', $warung->nomor_hp) }}" required />
                        @error('nomor_hp')
                            <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Keamanan</h2>
            <div class="flex flex-col gap-2">
                <label class="font-label-md text-label-md text-on-surface-variant" for="password">Password Baru</label>
                <input
                    class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                    id="password" name="password" type="password" placeholder="Kosongkan jika tidak ingin mengubah" />
                @error('password')
                    <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </section>

        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Informasi Warung &amp; Alamat</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="nama_warung">Nama Warung</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="nama_warung" name="nama_warung" type="text" value="{{ old('nama_warung', $profil->nama_warung ?? null) }}" />
                    @error('nama_warung')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="lokasi_rw">Lokasi RW</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="lokasi_rw" name="lokasi_rw" type="text" value="{{ old('lokasi_rw', $profil->lokasi_rw ?? null) }}" />
                    @error('lokasi_rw')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 md:col-span-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="alamat_warung">Alamat Warung</label>
                    <textarea
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface resize-none"
                        id="alamat_warung" name="alamat_warung" rows="3">{{ old('alamat_warung', $profil->alamat_warung ?? null) }}</textarea>
                    @error('alamat_warung')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </section>

        <div class="pt-4 pb-8 flex justify-center gap-4">
            <a href="{{ route('admin.warung.index') }}"
                class="w-full md:w-auto px-12 py-4 bg-surface-container-low text-on-surface-variant font-headline-sm text-headline-sm rounded-xl shadow-[0px_10px_20px_rgba(13,13,91,0.08)] hover:bg-surface-container transition-all text-center">
                Batal
            </a>
            <button
                class="w-full md:w-auto px-12 py-4 bg-primary text-on-primary font-headline-sm text-headline-sm rounded-xl shadow-[0px_10px_20px_rgba(13,13,91,0.08)] hover:bg-primary-container hover:text-on-primary-container transition-all transform active:scale-[0.98]"
                type="submit">
                Simpan Perubahan
            </button>
        </div>
    </form>
@endsection