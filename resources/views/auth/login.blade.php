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


                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="status-alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Role Tabs -->
                    <div class="role-tabs">

                        <button type="button" class="role-tab active" data-role="donatur">
                            donatur
                        </button>

                        <button type="button" class="role-tab" data-role="penerima">
                            penerima
                        </button>

                        <button type="button" class="role-tab" data-role="pemilik warung">
                            pemilik warung
                        </button>

                        <span class="tab-indicator"></span>

                    </div>


                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf

                        <div class="form-group">

                            <label for="email">
                                Username / Email
                            </label>

                            <input
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Detail akun anda"
                                type="email"
                                required
                                autofocus
                                autocomplete="username"
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
                                autocomplete="current-password"
                            />

                            @error('password')
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
                            Masuk Sistem
                        </button>

                    </form>


                    <div class="register-section">

                        <span>
                            Donatur baru?
                        </span>

                        <a href="{{ route('register') }}">
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

    <div id="toast-container" class="fixed bottom-4 left-1/2 transform -translate-x-1/2 z-50 hidden items-center gap-3 rounded-md bg-green-100 text-green-800 px-4 py-3 shadow-lg opacity-0 transition-opacity duration-500 ease-in-out">
        @if (session('status'))
            <span>{{ session('status') }}</span>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toast = document.getElementById('toast-container');
            @if (session('status'))
                toast.classList.remove('hidden');
                setTimeout(() => {
                    toast.classList.add('opacity-0');
                    setTimeout(() => {
                        toast.classList.add('hidden');
                    }, 500);
                }, 3000);
            @endif
        });
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabsContainer = document.querySelector('.role-tabs');
    const tabs = document.querySelectorAll('.role-tab');
    const indicator = document.createElement('span');
    indicator.className = 'tab-indicator';
    tabsContainer.appendChild(indicator);
    const forgotLink = document.querySelector('.forgot-password');
    const registerSection = document.querySelector('.register-section');

    // Set container to relative for absolute positioning of indicator
    tabsContainer.style.position = 'relative';

    // Style the indicator
    indicator.style.position = 'absolute';
    indicator.style.bottom = '0';
    indicator.style.height = '2px';
    indicator.style.backgroundColor = 'white';
    indicator.style.transition = 'left 0.3s ease, width 0.3s ease';

    function updateTab(index) {
        // Update active tab
        tabs.forEach((tab, i) => {
            tab.classList.toggle('active', i === index);
        });

        const activeTab = tabs[index];
        // Update indicator position and width
        indicator.style.left = `${activeTab.offsetLeft}px`;
        indicator.style.width = `${activeTab.offsetWidth}px`;

        // Update register section visibility based on role
        const role = activeTab.dataset.role || activeTab.textContent.trim().toLowerCase();
        if (role === 'donatur') {
            registerSection.style.display = '';
        } else {
            registerSection.style.display = 'none';
        }
    }

    // Initialize: set first tab (donatur) as active
    updateTab(0);

    // Add click listeners to tabs
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            updateTab(index);
        });
    });
});
</script>
</body>
</html>