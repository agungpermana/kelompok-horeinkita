<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaksi_donasi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = transaksi_donasi::with(['donatur', 'penerima.user', 'paket']);

        if ($request->filled('status')) {
            $query->where('status_pembayaran', $request->status);
        }

        if ($request->filled('q')) {
            $q = $request->q;
            $query->whereHas('donatur', function ($donatur) use ($q) {
                $donatur->where('nama_lengkap', 'like', "%{$q}%")
                    ->orWhere('username', 'like', "%{$q}%");
            });
        }

        $transaksi = $query->orderByDesc('tanggal_transaksi')->get();

        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function export(Request $request)
    {
        $format = $request->query('format', 'csv');

        $query = transaksi_donasi::with(['donatur', 'penerima.user', 'paket']);

        if ($request->filled('status')) {
            $query->where('status_pembayaran', $request->status);
        }

        $transaksi = $query->orderByDesc('tanggal_transaksi')->get();

        $filename = 'data-transaksi-' . now()->format('Y-m-d-Hi');

        if ($format === 'excel') {
            return response()
                ->view('admin.transaksi.export', compact('transaksi'), 200, [
                    'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
                    'Content-Disposition' => 'attachment; filename="' . $filename . '.xls"',
                ]);
        }

        return response()->streamDownload(function () use ($transaksi) {
            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'ID', 'Donatur', 'Username Donatur', 'Penerima', 'Paket',
                'Jumlah', 'Total Bayar', 'Metode', 'Status', 'Tanggal',
            ]);

            foreach ($transaksi as $t) {
                fputcsv($handle, [
                    $t->id_transaksi,
                    $t->donatur->nama_lengkap ?? '-',
                    $t->donatur->username ?? '-',
                    $t->penerima->user->nama_lengkap ?? '-',
                    $t->paket->nama_paket ?? '-',
                    $t->jumlah_paket,
                    $t->total_bayar,
                    $t->metode_pembayaran,
                    $t->status_pembayaran,
                    $t->tanggal_transaksi,
                ]);
            }

            fclose($handle);
        }, $filename . '.csv', ['Content-Type' => 'text/csv']);
    }
}