<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - Wapen</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f6fa;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #ddd;
            padding: 25px 15px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 35px;
            padding-left: 10px;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 8px;
        }

        .menu a {
            display: block;
            padding: 12px 15px;
            text-decoration: none;
            color: #333;
            border-radius: 8px;
        }

        .menu a:hover {
            background: #f0f0f0;
        }

        .menu .active {
            background: #222;
            color: white;
        }

        .content {
            margin-left: 240px;
            padding: 30px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #666;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #ddd;
        }

        .card h3 {
            font-size: 15px;
            color: #666;
            margin-bottom: 15px;
        }

        .card .number {
            font-size: 32px;
            font-weight: bold;
        }

        .welcome {
            background: white;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #ddd;
        }

        .welcome h2 {
            margin-bottom: 10px;
        }

        .welcome p {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            Wapen
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('admin.dashboard') }}" class="active">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="#">
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

            <li>
                <a href="#">
                    Logout
                </a>
            </li>

        </ul>

    </aside>


    <main class="content">

        <div class="header">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang di sistem Warung Penyalur (Wapen).</p>
        </div>


        <div class="cards">

            <div class="card">
                <h3>Pemilik Warung</h3>
                <div class="number">
                    {{ $jumlahWarung }}
                </div>
            </div>

            <div class="card">
                <h3>Penerima Bantuan</h3>
                <div class="number">
                    {{ $jumlahPenerima }}
                </div>
            </div>

            <div class="card">
                <h3>Donatur</h3>
                <div class="number">
                    {{ $jumlahDonatur }}
                </div>
            </div>

        </div>


        <div class="welcome">

            <h2>Panel Administrasi</h2>

            <p>
                Admin dapat mengelola akun pengguna yang terlibat
                dalam sistem Wapen, termasuk Pemilik Warung,
                Penerima Bantuan, dan Donatur.
            </p>

        </div>

    </main>

</body>
</html>