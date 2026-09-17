@php
    $active = $active ?? '';
@endphp

<aside
    class="hidden md:flex bg-surface-container-lowest border-r border-outline-variant w-64 fixed left-0 top-0 h-screen flex-col p-4 gap-stack-md z-40">
    <div class="flex items-center gap-3 mb-8 px-2">
        <div class="w-12 h-12 flex items-center justify-center">
            <img alt="Wapen Logo" class="w-full h-full object-contain"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6sYXVPmNzgf5Du1I8-03CSe678E-MU1byR_JSGezDcsfVHFfR_mEhBTegt7PvzNTbRZ-UNEbIqILSJVsh0JVPAr2wpEXas4jT1xVH2JG1DA6jsxYAWMdKqRhXaanDK9YOvfCVwZbSSaudQk9KYwpAHYz-gRoHDQGKo9cf2kAw5Bht-m5udkupqUcb_PKDcDaK6xJ0aEp_OPNCB-dnmeyK_0G1DdN0CWqheVL4XtoONZyxwlO0nju_tzvf63OzDBc5sMA" />
        </div>
        <div>
            <h1 class="font-headline-sm text-headline-sm font-bold text-on-surface">Wapen</h1>
            <p class="font-label-sm text-label-sm text-on-surface-variant">Warung Penyalur</p>
        </div>
    </div>

    <nav class="flex-1 flex flex-col gap-2">
        <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-widest px-4 mb-1">Menu</p>

        {{-- Dashboard --}}
        @php $isDashboard = $active === 'dashboard'; @endphp
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ $isDashboard ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('warung.dashboard') }}">
            <span class="material-symbols-outlined" {{ $isDashboard ? 'data-weight=fill' : '' }}>dashboard</span>
            <span class="font-label-md text-label-md">Dashboard</span>
        </a>

        {{-- Katalog Sembako --}}
        @php $isKatalog = in_array($active, ['katalog']); @endphp
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ $isKatalog ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('katalog-paket.index') }}">
            <span class="material-symbols-outlined" {{ $isKatalog ? 'data-weight=fill' : '' }}>inventory_2</span>
            <span class="font-label-md text-label-md">Katalog Sembako</span>
        </a>

        {{-- Bukti Penyerahan --}}
        @php $isPenyerahan = in_array($active, ['penyerahan', 'bukti_penyerahan']); @endphp
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ $isPenyerahan ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('bukti-penyerahan.index') }}">
            <span class="material-symbols-outlined" {{ $isPenyerahan ? 'data-weight=fill' : '' }}>assignment_turned_in</span>
            <span class="font-label-md text-label-md">Bukti Penyerahan</span>
        </a>

        {{-- Data Penerima --}}
        @php $isPenerima = in_array($active, ['penerima']); @endphp
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ $isPenerima ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('warung.penerima.index') }}">
            <span class="material-symbols-outlined" {{ $isPenerima ? 'data-weight=fill' : '' }}>group</span>
            <span class="font-label-md text-label-md">Data Penerima</span>
        </a>

        {{-- Detail Pesanan --}}
        @php $isTransaksi = in_array($active, ['transaksi', 'detail_pesanan']); @endphp
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ $isTransaksi ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('warung.detail-pesanan.index') }}">
            <span class="material-symbols-outlined" {{ $isTransaksi ? 'data-weight=fill' : '' }}>receipt_long</span>
            <span class="font-label-md text-label-md">Detail Pesanan</span>
        </a>
    </nav>

    <div class="mt-auto flex flex-col gap-2 border-t border-outline-variant pt-4">
        <a href="{{ route('warung.akun.edit') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-surface-container-low transition-all {{ ($active ?? '') === 'akun' ? 'bg-secondary-container text-on-secondary-container font-semibold' : 'text-on-surface-variant' }}">
            <span class="material-symbols-outlined" {{ ($active ?? '') === 'akun' ? 'data-weight=fill' : '' }}>account_circle</span>
            <div>
                <p class="text-sm font-semibold text-on-surface truncate">{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</p>
                <p class="text-xs text-on-surface-variant">Pemilik Warung</p>
            </div>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-label-md text-label-md">Keluar</span>
            </button>
        </form>
    </div>
</aside>
