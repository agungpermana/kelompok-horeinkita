@extends('layouts.admin')

@section('title', 'Data Penerima - Admin Wapen')
@section('active_menu', 'penerimas')
@section('page_title', 'Data Penerima Bantuan')

@section('header_actions')
    <div>
        <a href="{{ route('admin.penerimas.create') }}"
            class="px-6 py-2 bg-primary text-on-primary font-label-md text-label-md rounded-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:opacity-90 transition-opacity inline-flex items-center gap-2">
            <span class="material-symbols-outlined text-xl">add</span>
            Tambah Akun
        </a>
    </div>
@endsection

@section('content')
    @if (session('success'))
        <div
            class="bg-primary-container/10 border border-primary-container/30 text-on-primary-container rounded-xl px-stack-lg py-stack-md font-body-sm flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <section
        class="bg-surface-container-lowest rounded-xl shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-surface-container-low">
                    <tr>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">No
                        </th>
                        @include('partials.sortable-th', ['sort' => 'username', 'label' => 'Username'])
                        @include('partials.sortable-th', ['sort' => 'nama', 'label' => 'Nama'])
                        @include('partials.sortable-th', ['sort' => 'email', 'label' => 'Email'])
                        @include('partials.sortable-th', ['sort' => 'nomor_hp', 'label' => 'No. HP'])
                        @include('partials.sortable-th', ['sort' => 'survey', 'label' => 'Survey'])
                        @include('partials.sortable-th', ['sort' => 'lokasi_rw', 'label' => 'RW'])
                        @include('partials.sortable-th', ['sort' => 'alamat', 'label' => 'Alamat'])
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/30">
                    @forelse($penerimas as $index => $penerima)
                        <tr class="hover:bg-surface-container-low/50 transition-colors">
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $index + 1 }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $penerima->user->username ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $penerima->user->nama_lengkap ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $penerima->user->email ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $penerima->user->nomor_hp ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $penerima->survey->nama_subjek ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $penerima->lokasi_rw ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $penerima->alamat_penerima ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.penerimas.edit', $penerima->id_penerima) }}"
                                        class="px-4 py-2 bg-primary/10 text-primary font-label-md text-label-md rounded-lg hover:bg-primary/20 transition-colors inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.penerimas.destroy', $penerima->id_penerima) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data penerima ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-error/10 text-error font-label-md text-label-md rounded-lg hover:bg-error/20 transition-colors inline-flex items-center gap-1">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9"
                                class="px-stack-lg py-stack-xl text-center font-body-sm text-on-surface-variant">
                                Belum ada data Penerima Bantuan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
    @include('partials.column-manager', ['key' => 'penerimas'])
@endsection
