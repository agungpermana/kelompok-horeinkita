@extends('layouts.admin')

@section('title', 'Dashboard Admin - Wapen')
@section('active_menu', 'dashboard')
@section('page_title', 'Dashboard Admin')

@section('content')
    <p class="font-body-md text-on-surface-variant">Selamat datang di sistem Warung Penyalur (Wapen).</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
        <div
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <div class="flex items-center gap-3 mb-stack-md">
                <span class="material-symbols-outlined text-primary text-3xl">storefront</span>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Pemilik Warung</h3>
            </div>
            <div class="font-headline-lg text-headline-lg text-primary">{{ $jumlahWarung }}</div>
        </div>
        <div
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <div class="flex items-center gap-3 mb-stack-md">
                <span class="material-symbols-outlined text-secondary text-3xl">assignment_ind</span>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Penerima Bantuan</h3>
            </div>
            <div class="font-headline-lg text-headline-lg text-secondary">{{ $jumlahPenerima }}</div>
        </div>
        <div
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <div class="flex items-center gap-3 mb-stack-md">
                <span class="material-symbols-outlined text-tertiary text-3xl">volunteer_activism</span>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Donatur</h3>
            </div>
            <div class="font-headline-lg text-headline-lg text-tertiary">{{ $jumlahDonatur }}</div>
        </div>
    </div>

    <section
        class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
        <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Panel Administrasi</h2>
        <p class="font-body-md text-on-surface-variant">Admin dapat mengelola akun pengguna yang terlibat dalam
            sistem Wapen, termasuk Pemilik Warung, Penerima Bantuan, dan Donatur.</p>
    </section>
@endsection
