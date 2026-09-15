@extends('layouts.admin')

@section('title', 'Edit Data Penerima - Admin Wapen')
@section('active_menu', 'penerimas')
@section('page_title', 'Edit Akun Penerima Bantuan')

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

    <form class="space-y-stack-xl" action="{{ route('admin.penerimas.update', $penerima->id_penerima) }}" method="POST">
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
                        id="username" name="username" type="text"
                        value="{{ old('username', $penerima->user->username ?? '') }}" required />
                    @error('username')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="name">Nama
                        Penerima Bantuan</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="name" name="name" type="text"
                        value="{{ old('name', $penerima->user->nama_lengkap ?? '') }}" required />
                    @error('name')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="email">Email</label>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                            id="email" name="email" type="email"
                            value="{{ old('email', $penerima->user->email ?? '') }}" />
                        @error('email')
                            <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="nomor_hp">Nomor
                            HP</label>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                            id="nomor_hp" name="nomor_hp" type="text"
                            value="{{ old('nomor_hp', $penerima->user->nomor_hp ?? '') }}" required />
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
                <label class="font-label-md text-label-md text-on-surface-variant" for="password">Password <span
                        class="text-on-surface-variant/60 normal-case"></span></label>
                <input
                    class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                    id="password" name="password" type="password" />
                @error('password')
                    <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </section>

        <div class="pt-4 pb-8 flex justify-center">
            <button
                class="w-full md:w-auto px-12 py-4 bg-primary text-on-primary font-headline-sm text-headline-sm rounded-xl shadow-[0px_10px_20px_rgba(13,13,91,0.08)] hover:bg-primary-container hover:text-on-primary-container transition-all transform active:scale-[0.98]"
                type="submit">
                Update Akun
            </button>
        </div>
    </form>
@endsection
