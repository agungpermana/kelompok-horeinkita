<aside id="mobile-drawer"
    class="md:hidden fixed left-0 top-0 z-50 h-screen w-64 -translate-x-full bg-surface-container-lowest border-r border-outline-variant flex flex-col p-4 gap-stack-md shadow-high transition-transform duration-300">
    <div class="flex items-center justify-between mb-8 px-2">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 flex items-center justify-center">
                <img alt="Wapen Logo" class="w-full h-full object-contain"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6sYXVPmNzgf5Du1I8-03CSe678E-MU1byR_JSGezDcsfVHFfR_mEhBTegt7PvzNTbRZ-UNEbIqILSJVsh0JVPAr2wpEXas4jT1xVH2JG1DA6jsxYAWMdKqRhXaanDK9YOvfCVwZbSSaudQk9KYwpAHYz-gRoHDQGKo9cf2kAw5Bht-m5udkupqUcb_PKDcDaK6xJ0aEp_OPNCB-dnmeyK_0G1DdN0CWqheVL4XtoONZyxwlO0nju_tzvf63OzDBc5sMA" />
            </div>
            <div>
                <h1 class="font-headline-sm text-headline-sm font-bold text-on-surface">Wapen</h1>
                <p class="font-label-sm text-label-sm text-on-surface-variant">Donatur</p>
            </div>
        </div>
        <button id="drawer-close" type="button"
            class="text-on-surface-variant p-2 rounded-full hover:bg-surface-container-low transition-colors">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>

    <nav class="flex-1 flex flex-col gap-2">
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ ($active ?? '') === 'dashboard' ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('donatur.dashboard') }}">
            <span class="material-symbols-outlined"
                @if (($active ?? '') === 'dashboard') data-weight="fill" @endif>dashboard</span>
            <span class="font-label-md text-label-md">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ ($active ?? '') === 'riwayat' ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('donatur.riwayat') }}">
            <span class="material-symbols-outlined"
                @if (($active ?? '') === 'riwayat') data-weight="fill" @endif>receipt_long</span>
            <span class="font-label-md text-label-md">Riwayat Transaksi</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ ($active ?? '') === 'bukti' ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('donatur.bukti') }}">
            <span class="material-symbols-outlined"
                @if (($active ?? '') === 'bukti') data-weight="fill" @endif>assignment_turned_in</span>
            <span class="font-label-md text-label-md">Bukti Penyerahan</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ ($active ?? '') === 'penerima' ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('donatur.penerima') }}">
            <span class="material-symbols-outlined"
                @if (($active ?? '') === 'penerima') data-weight="fill" @endif>group</span>
            <span class="font-label-md text-label-md">Data Penerima</span>
        </a>
    </nav>

    <div class="mt-auto flex flex-col gap-2 border-t border-outline-variant pt-4">
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