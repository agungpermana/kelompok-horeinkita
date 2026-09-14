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


            <!-- Right Side: Login Card -->
            <div class="login-wrapper">

                <div class="login-card">

                    <div class="login-header">

                        <h3>
                            Portal Akses
                        </h3>

                        <p>
                            Silahkan masuk ke akun anda
                        </p>

                    </div>


                    <!-- Role Tabs -->
                    <div class="role-tabs">

                        <button class="role-tab active">
                            Donatur
                        </button>

                        <button class="role-tab">
                            Penerima
                        </button>

                        <button class="role-tab">
                            Pemilik Warung
                        </button>

                    </div>


                    <!-- Login Form -->
                    <form class="login-form">

                        <div class="form-group">

                            <label for="email">
                                Username / Email
                            </label>

                            <input
                                id="email"
                                placeholder="Detail akun anda"
                                type="email"
                            />

                        </div>


                        <div class="form-group">

                            <label for="password">
                                Kata Sandi
                            </label>

                            <input
                                id="password"
                                placeholder="••••••••••••"
                                type="password"
                            />

                        </div>


                        <div class="login-options">

                            <label class="remember-me">

                                <input
                                    type="checkbox"
                                />

                                <span>
                                    Ingat Saya
                                </span>

                            </label>


                            <a href="#" class="forgot-password">
                                Lupa sandi?
                            </a>

                        </div>


                        <button
                            class="login-button"
                            type="submit"
                        >
                            Masuk Sistem
                        </button>

                    </form>


                    <div class="register-section">

                        <span>
                            Donatur baru?
                        </span>

                        <a href="#">
                            Registrasi Akun
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