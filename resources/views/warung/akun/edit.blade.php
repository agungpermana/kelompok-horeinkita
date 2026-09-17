@extends('layouts.warung')

@section('title', 'Profil & Akun - Wapen')
@section('active_menu', 'akun')
@section('page_title', 'Profil & Akun')

@section('header_back_button')
<a href="{{ route('warung.dashboard') }}"
   class="flex items-center justify-center w-8 h-8 rounded-lg hover:bg-surface-container transition-all text-on-surface-variant">
    <span class="material-symbols-outlined text-xl">arrow_back</span>
</a>
@endsection

@section('content')
<div class="max-w-2xl space-y-5">

    @if(session('success'))
        <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm">
            <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    {{-- Info Akun --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center flex-shrink-0">
                <span class="text-2xl font-bold text-on-secondary-container">
                    {{ strtoupper(substr($warung?->nama_warung ?? $user->nama_lengkap ?? $user->name, 0, 1)) }}
                </span>
            </div>
            <div>
                <p class="text-lg font-bold text-on-surface">{{ $warung?->nama_warung ?? $user->nama_lengkap ?? $user->name }}</p>
                <p class="text-sm text-on-surface-variant">{{ $user->email ?? '-' }}</p>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-secondary-container text-on-secondary-container mt-1">
                    Pemilik Warung
                </span>
            </div>
        </div>

        {{-- Form Edit Profil --}}
        <h2 class="text-sm font-bold text-on-surface mb-4">Edit Informasi Profil</h2>

        @if($errors->hasAny(['nama_lengkap', 'email', 'nomor_hp']))
            <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 mb-4 text-sm">
                <span class="material-symbols-outlined text-red-500 text-xl mt-0.5">error</span>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->only(['nama_lengkap','email','nomor_hp']) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('warung.akun.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama_lengkap"
                    value="{{ old('nama_lengkap', $user->nama_lengkap ?? $user->name) }}"
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required/>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Email</label>
                    <input type="email" name="email"
                        value="{{ old('email', $user->email) }}"
                        placeholder="email@contoh.com"
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">Nomor HP</label>
                    <input type="text" name="nomor_hp"
                        value="{{ old('nomor_hp', $user->nomor_hp) }}"
                        placeholder="08xxxxxxxxxx"
                        maxlength="12"
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"/>
                </div>
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-primary text-white text-sm font-semibold hover:opacity-90 transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- Ganti Password --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-6">
        <h2 class="text-sm font-bold text-on-surface mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-xl" data-weight="fill">lock</span>
            Ganti Password
        </h2>

        @if($errors->hasAny(['password_lama', 'password_baru', 'password_baru_confirmation']))
            <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 mb-4 text-sm">
                <span class="material-symbols-outlined text-red-500 text-xl mt-0.5">error</span>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->only(['password_lama','password_baru','password_baru_confirmation']) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('warung.akun.password') }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-sm font-semibold text-on-surface mb-1.5">
                    Password Lama <span class="text-red-500">*</span>
                </label>
                <input type="password" name="password_lama"
                    class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    required/>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">
                        Password Baru <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password_baru"
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required/>
                    <p class="text-xs text-on-surface-variant mt-1">Minimal 8 karakter.</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-1.5">
                        Konfirmasi Password Baru <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password_baru_confirmation"
                        class="w-full px-3.5 py-2.5 border border-outline-variant rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required/>
                </div>
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-red-600 text-white text-sm font-semibold hover:opacity-90 transition-all">
                    Ganti Password
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
