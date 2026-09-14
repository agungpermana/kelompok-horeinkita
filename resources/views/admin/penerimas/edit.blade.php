<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Penerima - Admin Wapen</title>

    @vite(['resources/css/admin.css'])
</head>
<body>

<div class="admin-layout">

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="sidebar-logo">
            WAPEN
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.warung.index') }}">
                    Pemilik Warung
                </a>
            </li>

            <li>
                <a href="{{ route('admin.penerimas.index') }}" class="active">
                    Penerima Bantuan
                </a>
            </li>

            <li>
                <a href="#">
                    Donatur
                </a>
            </li>
        </ul>

    </aside>

    <!-- Content -->
    <main class="admin-content">

        <div class="page-header">
            <h1>Edit Data Penerima</h1>
            <p>Perbarui informasi data penerima bantuan.</p>
        </div>

        <a href="{{ route('admin.penerimas.index') }}" class="btn btn-secondary" style="margin-bottom: 20px;">
            &larr; Kembali
        </a>

        @if ($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-container">

            <form
                action="{{ route('admin.penerimas.update', $penerima->id_penerima) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <!-- User -->
                <div class="form-group">

                    <label for="id_user">Nama</label>

                    <select name="id_user" id="id_user" class="form-control" required>
                        <option value="">-- Pilih User --</option>

                        @foreach ($users as $user)
                            <option
                                value="{{ $user->id_user }}"
                                {{ $penerima->id_user == $user->id_user ? 'selected' : '' }}
                            >
                                {{ $user->nama_lengkap }} ({{ $user->username }})
                            </option>
                        @endforeach
                    </select>

                </div>

                <!-- Survey -->
                <div class="form-group">

                    <label for="id_survey">Data Survey (Opsional)</label>

                    <select name="id_survey" id="id_survey" class="form-control">
                        <option value="">-- Tanpa Survey --</option>

                        @foreach ($surveys as $survey)
                            <option
                                value="{{ $survey->id_survey }}"
                                {{ $penerima->id_survey == $survey->id_survey ? 'selected' : '' }}
                            >
                                {{ $survey->nama_subjek }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <!-- Lokasi RW -->
                <div class="form-group">

                    <label for="lokasi_rw">Lokasi RW</label>

                    <input
                        type="text"
                        name="lokasi_rw"
                        id="lokasi_rw"
                        class="form-control"
                        maxlength="10"
                        value="{{ old('lokasi_rw', $penerima->lokasi_rw) }}"
                        placeholder="Contoh: RW 05"
                    >

                </div>

                <!-- Alamat -->
                <div class="form-group">

                    <label for="alamat_penerima">Alamat Lengkap Penerima</label>

                    <textarea
                        name="alamat_penerima"
                        id="alamat_penerima"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan alamat lengkap penerima"
                    >{{ old('alamat_penerima', $penerima->alamat_penerima) }}</textarea>

                </div>

                <div style="margin-top: 25px;">
                    <button type="submit" class="btn btn-primary">
                        Update Data
                    </button>

                    <a href="{{ route('admin.penerimas.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>