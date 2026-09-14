<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penerima - Admin Wapen</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-container": "#a9acfd",
                        "secondary": "#5457a1",
                        "primary": "#0800b5",
                        "inverse-on-surface": "#eaf1ff",
                        "on-secondary-container": "#3a3d86",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed-dim": "#c0c1ff",
                        "error-container": "#ffdad6",
                        "secondary-fixed": "#e1e0ff",
                        "background": "#f8f9ff",
                        "primary-container": "#2121e2",
                        "inverse-primary": "#bfc1ff",
                        "on-primary-fixed-variant": "#1b19df",
                        "on-surface": "#0b1c30",
                        "surface-variant": "#d3e4fe",
                        "on-primary-fixed": "#03006d",
                        "on-primary-container": "#b1b4ff",
                        "surface": "#f8f9ff",
                        "on-tertiary-container": "#b6bbc5",
                        "tertiary-container": "#464b54",
                        "inverse-surface": "#213145",
                        "on-error-container": "#93000a",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#c2c6d1",
                        "surface-container": "#e5eeff",
                        "outline": "#767588",
                        "on-surface-variant": "#454556",
                        "surface-container-highest": "#d3e4fe",
                        "error": "#ba1a1a",
                        "outline-variant": "#c6c4d9",
                        "surface-dim": "#cbdbf5",
                        "on-secondary-fixed": "#0d0d5b",
                        "on-secondary-fixed-variant": "#3c3f87",
                        "on-tertiary-fixed": "#171c23",
                        "surface-container-low": "#eff4ff",
                        "surface-tint": "#3c41f5",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed-dim": "#bfc1ff",
                        "primary-fixed": "#e1e0ff",
                        "tertiary-fixed": "#dee2ed",
                        "on-secondary": "#ffffff",
                        "on-background": "#0b1c30",
                        "on-primary": "#ffffff",
                        "tertiary": "#2f343d",
                        "on-tertiary-fixed-variant": "#424750",
                        "surface-bright": "#f8f9ff",
                        "surface-container-high": "#dce9ff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-mobile": "16px",
                        "stack-md": "16px",
                        "margin-desktop": "40px",
                        "stack-sm": "8px",
                        "container-max": "1280px",
                        "stack-xl": "48px",
                        "stack-lg": "24px",
                        "gutter": "24px"
                    },
                    "fontFamily": {
                        "headline-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "label-md": ["Inter"],
                        "body-sm": ["Inter"],
                        "headline-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                        "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.01em", "fontWeight": "600"}],
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "headline-sm": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined[data-weight="fill"] {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-surface font-body-md text-on-surface flex min-h-screen">

    <!-- Sidebar -->
    <aside class="hidden md:flex bg-surface-container-lowest border-r border-outline-variant w-64 fixed left-0 top-0 h-screen flex-col p-4 gap-stack-md z-40">
        <div class="flex items-center gap-3 mb-8 px-2">
            <div class="w-12 h-12 flex items-center justify-center"><img alt="Wapen Logo" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6sYXVPmNzgf5Du1I8-03CSe678E-MU1byR_JSGezDcsfVHFfR_mEhBTegt7PvzNTbRZ-UNEbIqILSJVsh0JVPAr2wpEXas4jT1xVH2JG1DA6jsxYAWMdKqRhXaanDK9YOvfCVwZbSSaudQk9KYwpAHYz-gRoHDQGKo9cf2kAw5Bht-m5udkupqUcb_PKDcDaK6xJ0aEp_OPNCB-dnmeyK_0G1DdN0CWqheVL4XtoONZyxwlO0nju_tzvf63OzDBc5sMA"/></div>
            <div>
                <h1 class="font-headline-sm text-headline-sm font-bold text-on-surface">Wapen</h1>
                <p class="font-label-sm text-label-sm text-on-surface-variant">Warung Penyalur</p>
            </div>
        </div>
        <nav class="flex-1 flex flex-col gap-2">
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="{{ route('admin.warung.index') }}">
                <span class="material-symbols-outlined">storefront</span>
                <span class="font-label-md text-label-md">Pemilik Warung</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg bg-secondary-container text-on-secondary-container font-bold transition-all shadow-[0px_2px_4px_rgba(0,0,0,0.05)]" href="{{ route('admin.penerimas.index') }}">
                <span class="material-symbols-outlined" data-weight="fill">volunteer_activism</span>
                <span class="font-label-md text-label-md">Penerima Bantuan</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="#">
                <span class="material-symbols-outlined">handshake</span>
                <span class="font-label-md text-label-md">Donatur</span>
            </a>
        </nav>
        <div class="mt-auto flex flex-col gap-2 border-t border-outline-variant pt-4">
            <a class="flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="#">
                <span class="material-symbols-outlined">settings</span>
                <span class="font-label-md text-label-md">Pengaturan</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-all" href="#">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-label-md text-label-md">Keluar</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-0 md:ml-64 bg-background min-h-screen">
        <!-- Header -->
        <header class="sticky top-0 z-30 bg-surface/90 backdrop-blur-sm border-b border-outline-variant px-margin-mobile md:px-margin-desktop py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button class="md:hidden text-on-surface p-2 rounded-full hover:bg-surface-container">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <a class="text-on-surface-variant hover:text-primary transition-colors flex items-center justify-center p-2 rounded-full hover:bg-surface-container" href="{{ route('admin.penerimas.index') }}">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h1 class="font-headline-md text-headline-md text-on-surface">Tambah Data Penerima</h1>
            </div>
            <div>
                <span class="font-label-sm text-on-surface-variant">Tambahkan data penerima bantuan ke dalam sistem WAPEN.</span>
            </div>
        </header>

        <!-- Form Content -->
        <div class="p-margin-mobile md:p-margin-desktop max-w-container-max mx-auto space-y-stack-xl">

            @if ($errors->any())
                <div class="bg-error-container border border-error/30 rounded-xl p-stack-lg">
                    <ul class="space-y-2">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center gap-2 text-on-error-container font-body-sm">
                                <span class="material-symbols-outlined text-lg">error</span>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.penerimas.store') }}" method="POST" class="space-y-stack-xl">
                @csrf

                <!-- Informasi User Card -->
                <section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
                    <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Informasi User</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                        <div class="flex flex-col gap-2">
                            <label class="font-label-md text-label-md text-on-surface-variant" for="id_user">Nama Penerima</label>
                            <select name="id_user" id="id_user" class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface" required>
                                <option value="">-- Pilih User --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id_user }}" {{ old('id_user') == $user->id_user ? 'selected' : '' }}>
                                        {{ $user->nama_lengkap }} ({{ $user->username }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="font-label-md text-label-md text-on-surface-variant" for="id_survey">Data Survey (Opsional)</label>
                            <select name="id_survey" id="id_survey" class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface">
                                <option value="">-- Tanpa Survey --</option>
                                @foreach ($surveys as $survey)
                                    <option value="{{ $survey->id_survey }}" {{ old('id_survey') == $survey->id_survey ? 'selected' : '' }}>
                                        {{ $survey->nama_subjek }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </section>

                <!-- Lokasi & Alamat Card -->
                <section class="bg-surface-container-lowest rounded-xl p-stack-lg shadow-[0px_2px_4px_rgba(0,0,0,0.05)] border border-outline-variant/30">
                    <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Lokasi & Alamat</h2>
                    <div class="space-y-stack-md">
                        <div class="flex flex-col gap-2">
                            <label class="font-label-md text-label-md text-on-surface-variant" for="lokasi_rw">Lokasi RW</label>
                            <input
                                type="text"
                                name="lokasi_rw"
                                id="lokasi_rw"
                                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface placeholder:text-on-surface-variant/50"
                                maxlength="10"
                                value="{{ old('lokasi_rw') }}"
                                placeholder="Contoh: RW 05"
                            >
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="font-label-md text-label-md text-on-surface-variant" for="alamat_penerima">Alamat Lengkap Penerima</label>
                            <textarea
                                name="alamat_penerima"
                                id="alamat_penerima"
                                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-sm text-on-surface resize-y placeholder:text-on-surface-variant/50"
                                rows="4"
                                placeholder="Masukkan alamat lengkap penerima"
                            >{{ old('alamat_penerima') }}</textarea>
                        </div>
                    </div>
                </section>

                <!-- Submit Button Area -->
                <div class="pt-4 pb-8 flex justify-center gap-4">
                    <a href="{{ route('admin.penerimas.index') }}" class="px-8 py-4 bg-inverse-surface text-on-inverse-surface font-headline-sm text-headline-sm rounded-xl shadow-[0px_2px_4px_rgba(0,0,0,0.05)] hover:opacity-90 transition-opacity inline-flex items-center gap-2">
                        <span class="material-symbols-outlined">arrow_back</span>
                        Batal
                    </a>
                    <button type="submit" class="px-12 py-4 bg-primary text-on-primary font-headline-sm text-headline-sm rounded-xl shadow-[0px_10px_20px_rgba(13,13,91,0.08)] hover:bg-primary-container hover:text-on-primary-container transition-all transform active:scale-[0.98]">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
