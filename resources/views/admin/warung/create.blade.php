<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pemilik Warung - Admin Wapen</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
                <a href="{{ route('admin.warung.index') }}" class="active">
                    Pemilik Warung
                </a>
            </li>

            <li>
                <a href="#">
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
            <h1>Tambah Akun Pemilik Warung</h1>
            <p>Buat akun untuk pemilik warung yang telah lolos survei.</p>
        </div>

        <div class="form-container">

            <form action="{{ route('admin.warung.store') }}" method="POST">

                @csrf

                <!-- Username -->
                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        id="username"
                        class="form-control"
                        value="{{ old('username') }}"
                        required
                    >

                    @error('username')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Nama -->
                <div class="form-group">

                    <label for="name">
                        Nama Pemilik Warung
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                    >

                    @error('name')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Email -->
                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="{{ old('email') }}"
                    >

                    @error('email')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Nomor HP -->
                <div class="form-group">

                    <label for="nomor_hp">
                        Nomor HP
                    </label>

                    <input
                        type="text"
                        name="nomor_hp"
                        id="nomor_hp"
                        class="form-control"
                        value="{{ old('nomor_hp') }}"
                        required
                    >

                    @error('nomor_hp')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Password -->
                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        required
                    >

                    @error('password')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div style="margin-top: 25px;">

                    <button type="submit" class="btn btn-primary">
                        Simpan Akun
                    </button>

                    <a href="{{ route('admin.warung.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>