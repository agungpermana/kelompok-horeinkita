<aside class="hidden md:flex bg-surface-container-lowest border-r border-outline-variant w-64 fixed left-0 top-0 h-screen flex-col p-4 gap-stack-md z-40">
<div class="flex items-center gap-3 mb-8 px-2">
<div class="w-12 h-12 flex items-center justify-center"><img alt="Wapen Logo" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6sYXVPmNzgf5Du1I8-03CSe678E-MU1byR_JSGezDcsfVHFfR_mEhBTegt7PvzNTbRZ-UNEbIqILSJVsh0JVPAr2wpEXas4jT1xVH2JG1DA6jsxYAWMdKqRhXaanDK9YOvfCVwZbSSaudQk9KYwpAHYz-gRoHDQGKo9cf2kAw5Bht-m5udkupqUcb_PKDcDaK6xJ0aEp_OPNCB-dnmeyK_0G1DdN0CWqheVL4XtoONZyxwlO0nju_tzvf63OzDBc5sMA"/></div>
<div>
<h1 class="font-headline-sm text-headline-sm font-bold text-on-surface">Wapen</h1>
<p class="font-label-sm text-label-sm text-on-surface-variant">Warung Penyalur</p>
</div>
</div>
<nav class="flex-1 flex flex-col gap-2">
@php $isUsers = in_array($active ?? '', ['warung', 'penerimas', 'donatur'], true); @endphp
<a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ ($active ?? '') === 'dashboard' ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all" href="{{ route('admin.dashboard') }}">
<span class="material-symbols-outlined" @if(($active ?? '') === 'dashboard') data-weight="fill" @endif>dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg {{ ($active ?? '') === 'survey' ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all" href="{{ route('admin.survey.index') }}">
<span class="material-symbols-outlined" @if(($active ?? '') === 'survey') data-weight="fill" @endif>description</span>
<span class="font-label-md text-label-md">Data Survey</span>
</a>
<details class="group" @if($isUsers) open @endif>
<summary class="flex items-center gap-3 px-4 py-3 rounded-lg cursor-pointer list-none [&::-webkit-details-marker]:hidden {{ $isUsers ? 'bg-secondary-container text-on-secondary-container font-bold shadow-[0px_2px_4px_rgba(0,0,0,0.05)]' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all">
<span class="material-symbols-outlined" @if($isUsers) data-weight="fill" @endif>group</span>
<span class="font-label-md text-label-md flex-1">Users Management</span>
<span class="material-symbols-outlined text-lg transition-transform duration-300 group-open:rotate-180">expand_more</span>
</summary>
<div class="ml-4 pl-4 border-l border-outline-variant mt-1 mb-1 space-y-1">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ ($active ?? '') === 'warung' ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all" href="{{ route('admin.warung.index') }}">
<span class="material-symbols-outlined" @if(($active ?? '') === 'warung') data-weight="fill" @endif>storefront</span>
<span class="font-label-md text-label-md">Pemilik Warung</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ ($active ?? '') === 'penerimas' ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all" href="{{ route('admin.penerimas.index') }}">
<span class="material-symbols-outlined" @if(($active ?? '') === 'penerimas') data-weight="fill" @endif>assignment_ind</span>
<span class="font-label-md text-label-md">Penerima Bantuan</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ ($active ?? '') === 'donatur' ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-all" href="{{ route('admin.donatur.index') }}">
<span class="material-symbols-outlined" @if(($active ?? '') === 'donatur') data-weight="fill" @endif>volunteer_activism</span>
<span class="font-label-md text-label-md">Donatur</span>
</a>
</div>
</details>
</nav>
<div class="mt-auto flex flex-col gap-2 border-t border-outline-variant pt-4">
<a class="flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-md text-label-md">Pengaturan</span>
</a>
<form method="POST" action="{{ route('logout') }}">
@csrf
<button type="submit" class="w-full flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all">
<span class="material-symbols-outlined">logout</span>
<span class="font-label-md text-label-md">Keluar</span>
</button>
</form>
</div>
</aside>