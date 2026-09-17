<?php

namespace App\Http\Controllers;

use App\Models\transaksi_donasi;
use App\Models\kupon_digital;
use App\Models\DataWarung;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WarungDetailPesananController extends Controller
{
    public function index(Request $request)
    {
        $myWarung = DataWarung::where('id_user', auth()->user()->id_user)->first();

        $query = transaksi_donasi::with(['donatur', 'penerima.user', 'paket'])
            ->when($myWarung, function ($q) use ($myWarung) {
                $q->whereHas('paket', function ($q2) use ($myWarung) {
                    $q2->where('id_warung', $myWarung->id_warung);
                });
            });

        if ($request->filled('status')) {
            $query->where('status_pembayaran', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('donatur', function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%")
                  ->orWhere('username', 'like', "%$search%");
            });
        }

        $pesanans = $query->orderBy('tanggal_transaksi', 'desc')->get();

        return view('warung.detail_pesanan.index', compact('pesanans', 'myWarung'));
    }

    public function show($id)
    {
        $pesanan = transaksi_donasi::with(['donatur', 'penerima.user', 'paket.warung', 'kupon'])
            ->findOrFail($id);

        return view('warung.detail_pesanan.show', compact('pesanan'));
    }

    public function terima($id)
    {
        $pesanan = transaksi_donasi::with('paket')->findOrFail($id);

        if (strtolower($pesanan->status_pembayaran ?? '') === 'pending') {
            $pesanan->update(['status_pembayaran' => 'lunas']);

            if (!kupon_digital::where('id_transaksi', $pesanan->id_transaksi)->exists()) {
                kupon_digital::create([
                    'id_transaksi' => $pesanan->id_transaksi,
                    'kode_kupon' => 'WPN-' . strtoupper(Str::random(8)),
                    'status_kupon' => 'aktif',
                    'tanggal_diterbitkan' => now(),
                    'tanggal_kadaluarsa' => now()->addDays(30)->toDateString(),
                ]);
            }
        }

        return back()->with('success', 'Pesanan #' . $pesanan->id_transaksi . ' diterima. Pembayaran berhasil dan kupon telah diterbitkan.');
    }

    public function tolak($id)
    {
        $pesanan = transaksi_donasi::findOrFail($id);

        if (strtolower($pesanan->status_pembayaran ?? '') === 'pending') {
            $pesanan->update(['status_pembayaran' => 'gagal']);
        }

        return back()->with('success', 'Pesanan #' . $pesanan->id_transaksi . ' ditolak.');
    }
}
