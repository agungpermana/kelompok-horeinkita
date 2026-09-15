<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bukti_penyerahan;
use Illuminate\Http\Request;

class PenyaluranController extends Controller
{
    public function index(Request $request)
    {
        $query = bukti_penyerahan::with(['warung', 'kupon.transaksi.penerima.user']);

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($qAll) use ($q) {
                $qAll->whereHas('warung', function ($warung) use ($q) {
                    $warung->where('nama_warung', 'like', "%{$q}%");
                })->orWhereHas('kupon.transaksi.penerima.user', function ($user) use ($q) {
                    $user->where('nama_lengkap', 'like', "%{$q}%");
                });
            });
        }

        $penyaluran = $query->orderByDesc('tanggal_penyerahan')->get();

        return view('admin.penyaluran.index', compact('penyaluran'));
    }
}