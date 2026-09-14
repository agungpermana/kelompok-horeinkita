<!DOCTYPE html>
<html>
<head>
    <title>Katalog Paket</title>
</head>
<body>

    <h1>Katalog Paket Sembako</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('katalog-paket.create') }}">
        Tambah Paket
    </a>

    <br><br>

    @if($paket->count() > 0)

        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Warung</th>
                    <th>Nama Paket</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($paket as $item)
                    <tr>
                        <td>{{ $item->id_paket }}</td>
                        <td>{{ $item->warung->nama_warung ?? '-' }}</td>
                        <td>{{ $item->nama_paket }}</td>
                        <td>{{ $item->deskripsi ?? '-' }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <a href="{{ route('katalog-paket.edit', $item->id_paket) }}">
                                Edit
                            </a>

                            <form action="{{ route('katalog-paket.destroy', $item->id_paket) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus paket ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p>Belum ada paket sembako.</p>
    @endif

</body>
</html>