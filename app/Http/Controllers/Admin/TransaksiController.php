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
}