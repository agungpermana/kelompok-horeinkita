{{-- Penggunaan: @include('partials.sortable-th', ['sort' => 'nama_kolom', 'label' => 'Nama Kolom']) --}}
@php
    $currentSort = request()->query('sort');
    $currentDir  = request()->query('direction');
    $active      = $currentSort === $sort;
    $newDir      = $active && $currentDir === 'asc' ? 'desc' : 'asc';
    $url         = request()->fullUrlWithQuery(['sort' => $sort, 'direction' => $newDir]);
    $arrow       = $active ? ($currentDir === 'desc' ? '↑' : '↓') : '↕';
@endphp
<th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
    <a href="{{ $url }}" class="inline-flex items-center gap-1.5 hover:text-primary transition-colors {{ $active ? 'text-primary' : '' }}">
        <span>{{ $label }}</span>
        <span class="text-xs {{ $active ? 'text-primary' : 'opacity-50' }}">{{ $arrow }}</span>
    </a>
</th>