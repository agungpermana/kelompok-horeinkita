<?php

namespace App\Http\Controllers\Penerima;

use App\Http\Controllers\Controller;
use App\Models\bukti_penyerahan;
use App\Models\data_penerima;
use App\Models\kupon_digital;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $penerima = data_penerima::where('id_user', auth()->id())->first();

        $kuponAktif = kupon_digital::query()
            ->whereIn('status_kupon', ['aktif', 'tersedia'])
            ->whereDoesntHave('buktiPenyerahan')
            ->whereHas('transaksi', fn ($query) => $query->where('id_penerima', $penerima?->id_penerima))
            ->with(['transaksi.paket.warung'])
            ->latest()
            ->first();

        $riwayat = bukti_penyerahan::query()
            ->whereHas('kupon.transaksi', fn ($query) => $query->where('id_penerima', $penerima?->id_penerima))
            ->with(['warung', 'kupon.transaksi.paket'])
            ->orderByDesc('tanggal_penyerahan')
            ->get();

        $kupons = kupon_digital::query()
            ->whereHas('transaksi', fn ($query) => $query->where('id_penerima', $penerima?->id_penerima))
            ->with(['transaksi.paket', 'buktiPenyerahan'])
            ->latest()
            ->get();

        return view('penerima.index', compact('penerima', 'kuponAktif', 'riwayat', 'kupons'));
    }
}