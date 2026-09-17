<aside
    class="hidden md:flex bg-surface-container-lowest border-r border-outline-variant w-64 fixed left-0 top-0 h-screen flex-col p-4 gap-stack-md z-40">
    <div class="flex items-center gap-3 mb-8 px-2">
        <div class="w-12 h-12 flex items-center justify-center">
            <img alt="Wapen Logo" class="w-full h-full object-contain"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6sYXVPmNzgf5Du1I8-03CSe678E-MU1byR_JSGezDcsfVHFfR_mEhBTegt7PvzNTbRZ-UNEbIqILSJVsh0JVPAr2wpEXas4jT1xVH2JG1DA6jsxYAWMdKqRhXaanDK9YOvfCVwZbSSaudQk9KYwpAHYz-gRoHDQGKo9cf2kAw5Bht-m5udkupqUcb_PKDcDaK6xJ0aEp_OPNCB-dnmeyK_0G1DdN0CWqheVL4XtoONZyxwlO0nju_tzvf63OzDBc5sMA" />
        </div>
        <div>
            <h1 class="font-headline-sm text-headline-sm font-bold text-on-surface">Wapen</h1>
            <p class="font-label-sm text-label-sm text-on-surface-variant">Penerima Bantuan</p>
        </div>
    </div>

    <nav class="flex-1 flex flex-col gap-2">
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ ($active ?? '') === 'dashboard' ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all"
            href="{{ route('penerima.dashboard') }}">
            <span class="material-symbols-outlined"
                @if (($active ?? '') === 'dashboard') data-weight="fill" @endif>dashboard</span>
            <span class="font-label-md text-label-md">Ringkasan</span>
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