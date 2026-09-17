@extends('layouts.admin')

@section('title', 'Tambah Data Penerima - Admin Wapen')
@section('active_menu', 'penerimas')
@section('page_title', 'Tambah Akun Penerima Bantuan')

@section('content')
    @if ($errors->any())
        <div
            class="bg-error-container/30 border border-error/30 text-on-error-container rounded-xl px-stack-lg py-stack-md font-body-sm flex items-center gap-3">
            <span class="material-symbols-outlined">error</span>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="space-y-stack-xl" action="{{ route('admin.penerimas.store') }}" method="POST">
        @csrf

        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Pilih dari Hasil Survey</h2>
            <p class="font-body-sm text-body-sm text-on-surface-variant mb-stack-md">
                Pilih hasil survey yang lolos kelayakan. Data nama, nomor HP, dan alamat akan terisi otomatis dari survey.
            </p>
            @if ($surveys->count() > 0)
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="survey-select">Hasil Survey</label>
                    <select
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="survey-select" name="id_survey">
                        <option value="">-- Pilih Survey --</option>
                        @foreach ($surveys as $survey)
                            <option value="{{ $survey->id_survey }}"
                                data-nama="{{ $survey->nama_subjek }}"
                                data-nomor-hp="{{ $survey->nomor_telepon }}"
                                data-lokasi-rw="{{ $survey->lokasi_rw }}"
                                data-alamat="{{ $survey->alamat_lengkap }}"
                                @if ((string) old('id_survey') === (string) $survey->id_survey) selected @endif>
                                {{ $survey->nama_subjek }} (RW {{ $survey->lokasi_rw }})
                            </option>
                        @endforeach
                    </select>
                    @error('id_survey')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            @else
                <div class="flex items-start gap-3 p-4 rounded-xl border border-dashed border-outline-variant bg-surface-container-low/50">
                    <span class="material-symbols-outlined text-on-surface-variant shrink-0">info</span>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                        Belum ada hasil survey <b>Penerima</b> yang lolos kelayakan atau belum digunakan untuk akun.
                        Tambahkan survey dengan kategori <b>Penerima</b> terlebih dahulu agar data akun terisi otomatis.
                    </p>
                </div>
            @endif
        </section>

        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Informasi Akun</h2>
            <div class="space-y-stack-md">
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="username">Username</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="username" name="username" type="text" value="{{ old('username') }}" required />
                    @error('username')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="name">Nama
                        Penerima Bantuan</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="name" name="name" type="text" value="{{ old('name') }}" required />
                    @error('name')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="email">Email</label>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                            id="email" name="email" type="email" value="{{ old('email') }}" />
                        @error('email')
                            <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="nomor_hp">Nomor
                            HP</label>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                            id="nomor_hp" name="nomor_hp" type="text" value="{{ old('nomor_hp') }}" required />
                        @error('nomor_hp')
                            <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Keamanan</h2>
            <div class="flex flex-col gap-2">
                <label class="font-label-md text-label-md text-on-surface-variant" for="password">Password</label>
                <input
                    class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                    id="password" name="password" type="password" required />
                @error('password')
                    <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </section>

        <section
            class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Lokasi &amp; Alamat</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                <div class="flex flex-col gap-2">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="lokasi_rw">Lokasi RW</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface"
                        id="lokasi_rw" name="lokasi_rw" type="text" value="{{ old('lokasi_rw') }}" />
                    @error('lokasi_rw')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 md:col-span-1">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="alamat_penerima">Alamat Penerima</label>
                    <textarea
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface resize-none"
                        id="alamat_penerima" name="alamat_penerima" rows="3">{{ old('alamat_penerima') }}</textarea>
                    @error('alamat_penerima')
                        <span class="text-error font-label-sm text-label-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </section>

        <div class="pt-4 pb-8 flex justify-center">
            <button
                class="w-full md:w-auto px-12 py-4 bg-primary text-on-primary font-headline-sm text-headline-sm rounded-xl shadow-[0px_10px_20px_rgba(13,13,91,0.08)] hover:bg-primary-container hover:text-on-primary-container transition-all transform active:scale-[0.98]"
                type="submit">
                Simpan Akun
            </button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const select = document.getElementById('survey-select');
            if (!select) return;

            const fields = {
                name: 'data-nama',
                nomor_hp: 'data-nomor-hp',
                lokasi_rw: 'data-lokasi-rw',
                alamat_penerima: 'data-alamat',
            };

            function applySurvey() {
                const opt = select.options[select.selectedIndex];
                const hasSurvey = select.value !== '';

                Object.keys(fields).forEach(function (id) {
                    const el = document.getElementById(id);
                    if (!el) return;
                    el.value = hasSurvey ? (opt.getAttribute(fields[id]) || '') : '';
                });
            }

            select.addEventListener('change', applySurvey);
            applySurvey();
        });
    </script>
@endpush
