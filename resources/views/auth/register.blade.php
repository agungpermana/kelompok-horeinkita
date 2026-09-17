<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

    <title>Wapen - Portal Akses</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    />

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    />

    @vite(['resources/css/login.css'])
</head>

<body>

    <!-- TopNavBar -->
    <header class="top-header">
        <div class="header-container">

            <div class="brand">
                <img
                    alt="Wapen Logo"
                    class="logo"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDvnk2i00NmD8L08HpmANvvWsEDQNr-5rLZqiPZ53tzhIxK2CJoOsFQ4HrvC8UkT8dMs-ieB8JaOQBZoUtNpRykoqLsoH7O4YdnlgTki73II8DgKRy3t_1lHy1ucBQfysehvnUPLiEm0x0JxwLr27rq_ZmtI5UJXYi2kh0Jfabt3RmVT8wmovcV5Gbd-VtDOjKk5C3TcAkNQGr7ntkQVhLNVuQZqULjr6TPVKf77oxUrWQg4exAZYjFDhZ6RZncDa2tnZc"
                />

                <div>
                    <h1 class="brand-title">WAPEN</h1>
                    <span class="brand-subtitle">
                        Warung Penyalur
                    </span>
                </div>
            </div>

        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">

        <div class="main-grid">

            <!-- Left Side: Value Proposition -->
            <div class="value-section">

                <h2>
                    Platform Penyalur Bantuan Warung Lokal.
                </h2>

                <p>
                    Menghubungkan kedermawanan dengan transparansi penuh.
                    Setiap donasi disalurkan langsung melalui mitra warung kami.
                </p>

                <div class="statistics">

                    <div>
                        <div class="stat-number">
                            120+
                        </div>

                        <div class="stat-label">
                            Mitra Warung
                        </div>
                    </div>

                    <div>
                        <div class="stat-number">
                            5.4k
                        </div>

                        <div class="stat-label">
                            Penerima Manfaat
                        </div>
                    </div>

                </div>

            </div>


            <!-- Right Side: Registration Card -->
            <div class="login-wrapper">

                <div class="login-card">

                    <div class="login-header">

                        <h3>
                            Registrasi Donatur
                        </h3>

                        <p>
                            Silakan lengkapi data untuk mendaftar sebagai Donatur
                        </p>

                    </div>


                    <!-- Registration Form -->
                    <form method="POST" action="{{ route('register') }}" class="login-form">
                        @csrf

                        <div class="form-group">

                            <label for="nama_lengkap">
                                Nama Lengkap
                            </label>

                            <input
                                id="nama_lengkap"
                                name="nama_lengkap"
                                value="{{ old('nama_lengkap') }}"
                                placeholder="Nama lengkap anda"
                                type="text"
                                required
                                autofocus
                            />

                            @error('name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="username">
                                Username
                            </label>
                            <input
                                id="username"
                                name="username"
                                value="{{ old('username') }}"
                                placeholder="Username"
                                type="username"
                                required
                            />
                            @error('username')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email
                            </label>
                            <input
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="email"
                                type="email"
                                required
                            />
                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group">

                            <label for="password">
                                Kata Sandi
                            </label>

                            <input
                                id="password"
                                name="password"
                                placeholder="••••••••••••"
                                type="password"
                                required
                            />

                            @error('password')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="password_confirmation">
                                Konfirmasi Kata Sandi
                            </label>

                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="••••••••••••"
                                type="password"
                                required
                            />

                            @error('password_confirmation')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="login-options">

                            <!-- No forgot password link on registration page -->

                        </div>


                        <button
                            class="login-button"
                            type="submit"
                        >
                            DAFTAR SEKARANG
                        </button>

                    </form>


                    <div class="register-section">

                        <span>
                            Sudah punya akun?
                        </span>

                        <a href="{{ route('login') }}">
                            Masuk Sistem
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </main>


    <!-- Footer -->
    <footer class="footer">

        <div class="footer-container">

            <p>
                © 2026 WAPEN - WARUNG PENYALUR
            </p>

            <div class="footer-links">

                <a href="#">
                    Kebijakan
                </a>

                <a href="#">
                    Ketentuan
                </a>

            </div>

        </div>

    </footer>

</body>
</html>
