<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pemilik Warung - Admin Wapen</title>

   @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <h1>Pemilik Warung</h1>
            <p>Kelola akun pemilik warung yang telah lolos survei.</p>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div style="margin-bottom: 20px;">
            <a href="{{ route('admin.warung.create') }}" class="btn btn-primary">
                + Tambah Akun
            </a>
        </div>

        <div class="table-container">

            <table class="admin-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($warung as $index => $akun)

                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $akun->username }}</td>
                            <td>{{ $akun->name }}</td>
                            <td>{{ $akun->email ?? '-' }}</td>
                            <td>{{ $akun->nomor_hp }}</td>

                            <td>
                                <form action="{{ route('admin.warung.destroy', $akun->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus akun ini?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" style="text-align: center;">
                                Belum ada akun Pemilik Warung.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

</body>
</html>