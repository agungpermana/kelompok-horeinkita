@extends('layouts.admin')

@section('title', 'Donatur - Admin Wapen')
@section('active_menu', 'donatur')
@section('page_title', 'Donatur')

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
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            No</th>
                        @include('partials.sortable-th', [
                            'sort' => 'username',
                            'label' => 'Username',
                        ])
                        @include('partials.sortable-th', [
                            'sort' => 'nama_lengkap',
                            'label' => 'Nama',
                        ])
                        @include('partials.sortable-th', ['sort' => 'email', 'label' => 'Email'])
                        @include('partials.sortable-th', [
                            'sort' => 'nomor_hp',
                            'label' => 'No. HP',
                        ])
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/30">
                    @forelse($donatur as $index => $akun)
                        <tr class="hover:bg-surface-container-low/50 transition-colors">
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $index + 1 }}
                            </td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $akun->username }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $akun->nama_lengkap }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $akun->email ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $akun->nomor_hp ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md">
                                <form action="{{ route('admin.donatur.destroy', $akun->id_user) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-error/10 text-error font-label-md text-label-md rounded-lg hover:bg-error/20 transition-colors inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"
                                class="px-stack-lg py-stack-xl text-center font-body-sm text-on-surface-variant">
                                Belum ada akun Donatur.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
    @include('partials.column-manager', ['key' => 'donatur'])

@endsection
