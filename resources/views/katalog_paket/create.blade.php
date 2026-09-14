<!DOCTYPE html>
<html>
<head>
    <title>Tambah Paket</title>
</head>
<body>

    <h1>Tambah Paket Sembako</h1>

    <form action="{{ route('katalog-paket.store') }}" method="POST">
        @csrf

        <div>
            <label>Warung</label>
            <select name="id_warung" required>
                <option value="">-- Pilih Warung --</option>

                @foreach(\App\Models\DataWarung::all() as $warung)
                    <option value="{{ $warung->id_warung }}">
                        {{ $warung->nama_warung }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label>Nama Paket</label>
            <input type="text" name="nama_paket" required>
        </div>

        <br>

        <div>
            <label>Deskripsi</label>
            <textarea name="deskripsi"></textarea>
        </div>

        <br>

        <div>
            <label>Harga</label>
            <input type="number" name="harga" min="0" required>
        </div>

        <br>

        <div>
            <label>Stok</label>
            <input type="number" name="stok" min="0" required>
        </div>

        <br>

        <button type="submit">Simpan Paket</button>

        <a href="{{ route('katalog-paket.index') }}">
            Kembali
        </a>
    </form>

</body>
</html>