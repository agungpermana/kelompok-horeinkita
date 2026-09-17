<?php

namespace App\Http\Controllers;

use App\Models\transaksi_donasi;
use App\Models\DataWarung;
use Illuminate\Http\Request;

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
        $pesanan = transaksi_donasi::with(['donatur', 'penerima.user', 'paket.warung'])
            ->findOrFail($id);

        return view('warung.detail_pesanan.show', compact('pesanan'));
    }
}
