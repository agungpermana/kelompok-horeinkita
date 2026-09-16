<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Data Transaksi</title>
    <style>
        table {
            border-collapse: collapse
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px 10px;
            font-size: 12px
        }

        th {
            background: #e5eeff;
            font-weight: 600
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Donatur</th>
                <th>Username Donatur</th>
                <th>Penerima</th>
                <th>Paket</th>
                <th>Jumlah</th>
                <th>Total Bayar</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $t)
                <tr>
                    <td>{{ $t->id_transaksi }}</td>
                    <td>{{ $t->donatur->nama_lengkap ?? '-' }}</td>
                    <td>{{ $t->donatur->username ?? '-' }}</td>
                    <td>{{ $t->penerima->user->nama_lengkap ?? '-' }}</td>
                    <td>{{ $t->paket->nama_paket ?? '-' }}</td>
                    <td>{{ $t->jumlah_paket }}</td>
                    <td>{{ $t->total_bayar }}</td>
                    <td>{{ $t->metode_pembayaran }}</td>
                    <td>{{ $t->status_pembayaran }}</td>
                    <td>{{ $t->tanggal_transaksi }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">Belum ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>