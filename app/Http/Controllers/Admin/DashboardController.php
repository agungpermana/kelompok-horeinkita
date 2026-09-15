<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\transaksi_donasi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahWarung = User::where('role', 'warung')->count();
        $jumlahPenerima = User::where('role', 'penerima')->count();
        $jumlahDonatur = User::where('role', 'donatur')->count();

        $statusCounts = transaksi_donasi::query()
            ->whereNotNull('status_pembayaran')
            ->selectRaw('LOWER(status_pembayaran) as status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->map(fn ($total) => (int) $total);

        $statusBerhasil = collect(['berhasil', 'sukses', 'selesai', 'lunas', 'dibayar'])->sum(fn ($k) => $statusCounts[$k] ?? 0);
        $statusPending = collect(['pending', 'menunggu', 'proses', 'verifikasi'])->sum(fn ($k) => $statusCounts[$k] ?? 0);
        $statusGagal = collect(['gagal'])->sum(fn ($k) => $statusCounts[$k] ?? 0);
        $statusDibatalkan = collect(['dibatalkan', 'batal', 'expired'])->sum(fn ($k) => $statusCounts[$k] ?? 0);

        return view('admin.dashboard', compact(
            'jumlahWarung',
            'jumlahPenerima',
            'jumlahDonatur',
            'statusBerhasil',
            'statusPending',
            'statusGagal',
            'statusDibatalkan',
        ));
    }
}
