<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Penerima - Admin Wapen</title>

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
            <h1>Data Penerima Bantuan</h1>
            <p>Kelola data penerima bantuan dalam sistem WAPEN.</p>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div style="margin-bottom: 20px;">
            <a href="{{ route('admin.penerimas.create') }}" class="btn btn-primary">
                + Tambah Penerima
            </a>
        </div>

        <div class="table-container">

            <table class="admin-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Survey</th>
                        <th>RW</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($penerimas as $index => $penerima)

                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $penerima->user->nama_lengkap ?? '-' }}</td>
                            <td>{{ $penerima->survey->nama_subjek ?? '-' }}</td>
                            <td>{{ $penerima->lokasi_rw ?? '-' }}</td>
                            <td>{{ $penerima->alamat_penerima ?? '-' }}</td>

                            <td style="display: flex; gap: 8px;">
                                <a href="{{ route('admin.penerimas.edit', $penerima->id_penerima) }}"
                                   class="btn btn-primary">
                                    Edit
                                </a>

                                <form action="{{ route('admin.penerimas.destroy', $penerima->id_penerima) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data penerima ini?');">

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
                                Belum ada data Penerima Bantuan.
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