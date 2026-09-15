@extends('layouts.admin')

@section('title', 'Data Survey - Admin Wapen')
@section('active_menu', 'survey')
@section('page_title', 'Data Survey')

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
                            'sort' => 'nama_subjek',
                            'label' => 'Nama',
                        ])
                        @include('partials.sortable-th', [
                            'sort' => 'jenis_survey',
                            'label' => 'Kategori',
                        ])
                        @include('partials.sortable-th', [
                            'sort' => 'tanggal_survey',
                            'label' => 'Tanggal',
                        ])
                        @include('partials.sortable-th', ['sort' => 'lokasi_rw', 'label' => 'RW'])
                        @include('partials.sortable-th', [
                            'sort' => 'kelurahan',
                            'label' => 'Kelurahan',
                        ])
                        @include('partials.sortable-th', [
                            'sort' => 'nomor_telepon',
                            'label' => 'No. HP',
                        ])
                        @include('partials.sortable-th', [
                            'sort' => 'status_kelayakan',
                            'label' => 'Status',
                        ])
                        @include('partials.sortable-th', [
                            'sort' => 'skor_kelayakan',
                            'label' => 'Skor',
                        ])
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Foto</th>
                        <th class="px-stack-lg py-stack-md text-left font-label-md text-label-md text-on-surface-variant">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/30">
                    @forelse($surveys as $index => $survey)
                        <tr class="hover:bg-surface-container-low/50 transition-colors">
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">{{ $index + 1 }}
                            </td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $survey->nama_subjek }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $survey->jenis_survey }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $survey->tanggal_survey ? \Carbon\Carbon::parse($survey->tanggal_survey)->format('d-m-Y') : '-' }}
                            </td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $survey->lokasi_rw }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $survey->kelurahan ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $survey->nomor_telepon }}</td>
                            <td class="px-stack-lg py-stack-md">
                                @if ($survey->status_kelayakan === 'lolos')
                                    <span
                                        class="inline-flex items-center gap-1 px-3 py-1 bg-primary-container/10 text-primary-container font-label-sm text-label-sm rounded-full">
                                        <span class="material-symbols-outlined text-sm">check_circle</span>
                                        Lolos
                                    </span>
                                @elseif($survey->status_kelayakan === 'tidak_lolos')
                                    <span
                                        class="inline-flex items-center gap-1 px-3 py-1 bg-error/10 text-error font-label-sm text-label-sm rounded-full">
                                        <span class="material-symbols-outlined text-sm">cancel</span>
                                        Tidak Lolos
                                    </span>
                                @else
                                    <span class="font-body-sm text-on-surface-variant">-</span>
                                @endif
                            </td>
                            <td class="px-stack-lg py-stack-md font-body-sm text-on-surface">
                                {{ $survey->skor_kelayakan ?? '-' }}</td>
                            <td class="px-stack-lg py-stack-md">
                                @if ($survey->foto_lokasi_url || $survey->foto_identitas_url || $survey->foto_dokumen_url)
                                    <a href="{{ route('admin.survey.edit', $survey->id_survey) }}"
                                        class="text-primary hover:text-primary-container transition-colors inline-flex items-center gap-1 font-label-sm text-label-sm">
                                        <span class="material-symbols-outlined text-lg">visibility</span>
                                        Lihat
                                    </a>
                                @else
                                    <span class="font-body-sm text-on-surface-variant">-</span>
                                @endif
                            </td>
                            <td class="px-stack-lg py-stack-md">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.survey.edit', $survey->id_survey) }}"
                                        class="px-4 py-2 bg-primary/10 text-primary font-label-md text-label-md rounded-lg hover:bg-primary/20 transition-colors inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.survey.destroy', $survey->id_survey) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus data survey ini?');">
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
                            <td colspan="11"
                                class="px-stack-lg py-stack-xl text-center font-body-sm text-on-surface-variant">
                                Belum ada data survey.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
    @include('partials.column-manager', ['key' => 'survey'])
@endsection
