<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\bukti_penyerahan;
use App\Models\DataSurvey;
use App\Models\data_penerima;
use App\Models\katalog_paket;
use App\Models\transaksi_donasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $paket = katalog_paket::with('warung')->get();

        return view('donatur.index', compact('paket'));
    }

    public function konfigurasi($id)
    {
        $paket = katalog_paket::with('warung')->findOrFail($id);
        $penerima = data_penerima::with('user')->get();

        return view('donatur.konfigurasi', compact('paket', 'penerima'));
    }

    public function prosesKonfigurasi(Request $request)
    {
        $request->validate([
            'id_paket' => 'required|exists:katalog_paket,id_paket',
            'id_penerima' => 'required|exists:data_penerima,id_penerima',
            'mode_nama' => 'nullable|in:tampilkan,anonim',
            'harga_paket' => 'required|numeric|min:0',
        ]);

        $paket = katalog_paket::with('warung')->find($request->id_paket);
        $penerima = data_penerima::with('user')->find($request->id_penerima);

        $harga = (float) $request->harga_paket;
        $biayaOperasional = 2000.0;

        session([
            'pembayaran' => [
                'id_paket' => $paket->id_paket,
                'nama_paket' => $paket->nama_paket,
                'harga' => $harga,
                'biaya_operasional' => $biayaOperasional,
                'total' => $harga + $biayaOperasional,
                'nama_warung' => $paket->warung?->nama_warung,
                'id_penerima' => $penerima->id_penerima,
                'nama_penerima' => $penerima->user?->nama_lengkap,
                'mode_nama' => $request->mode_nama,
                'nama_donatur' => $request->mode_nama === 'anonim' ? 'Hamba Allah' : $request->nama_donatur,
                'pesan' => $request->pesan,
            ],
        ]);

        return redirect()->route('donatur.pembayaran');
    }

    public function pembayaran()
    {
        $order = session('pembayaran');

        if (!$order) {
            return redirect()->route('donatur.dashboard');
        }

        return view('donatur.pembayaran', compact('order'));
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string',
        ]);

        $order = session('pembayaran');

        if (!$order) {
            return redirect()->route('donatur.dashboard');
        }

        $transaksi = transaksi_donasi::create([
            'id_donatur' => auth()->user()->id_user,
            'id_penerima' => $order['id_penerima'],
            'id_paket' => $order['id_paket'],
            'jumlah_paket' => 1,
            'total_bayar' => $order['total'],
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pembayaran' => 'pending',
            'tanggal_transaksi' => now(),
        ]);

        session()->forget('pembayaran');

        return redirect()
            ->route('donatur.riwayat')
            ->with('success', 'Pesanan #' . $transaksi->id_transaksi . ' diterima. Menunggu konfirmasi pembayaran.');
    }

    public function riwayat()
    {
        $transaksis = transaksi_donasi::with(['penerima.user', 'paket.warung', 'kupon'])
            ->where('id_donatur', auth()->user()->id_user)
            ->orderByDesc('tanggal_transaksi')
            ->get();

        return view('donatur.riwayat', compact('transaksis'));
    }

    public function batalkan(Request $request, $id)
    {
        $transaksi = transaksi_donasi::where('id_transaksi', $id)
            ->where('id_donatur', auth()->user()->id_user)
            ->firstOrFail();

        if (strtolower($transaksi->status_pembayaran) === 'pending') {
            $transaksi->update(['status_pembayaran' => 'gagal']);
        }

        return back()->with('success', 'Pesanan #' . $transaksi->id_transaksi . ' berhasil dibatalkan.');
    }

    /**
     * Daftar bukti penyerahan milik donatur yang login.
     */
    public function buktiPenyerahan()
    {
        $buktis = bukti_penyerahan::with([
                        'kupon.transaksi.penerima.user',
                        'warung',
                        'riwayat' => function ($q) {
                            $q->orderBy('waktu_pencatatan', 'desc');
                        },
                    ])
                    ->whereHas('kupon.transaksi', function ($q) {
                        $q->where('id_donatur', auth()->user()->id_user);
                    })
                    ->orderBy('tanggal_penyerahan', 'desc')
                    ->get();

        return view('donatur.bukti_penyerahan.index', compact('buktis'));
    }

    /**
     * Detail bukti penyerahan milik donatur yang login.
     */
    public function buktiPenyerahanDetail($id)
    {
        $bukti = bukti_penyerahan::with([
                        'kupon.transaksi.penerima.user',
                        'warung',
                        'riwayat' => function ($q) {
                            $q->orderBy('waktu_pencatatan', 'desc');
                        },
                    ])
                    ->whereHas('kupon.transaksi', function ($q) {
                        $q->where('id_donatur', auth()->user()->id_user);
                    })
                    ->findOrFail($id);

        return view('donatur.bukti_penyerahan.show', compact('bukti'));
    }

    /**
     * Daftar seluruh penerima bantuan dari survey berjenis Penerima.
     */
    public function dataPenerima()
    {
        $surveys = DataSurvey::where('jenis_survey', 'Penerima')
                    ->orderBy('id_survey', 'desc')
                    ->get();

        return view('donatur.data_penerima.index', compact('surveys'));
    }

    /**
     * Detail penerima bantuan + lampiran survey (foto kebawah).
     */
    public function dataPenerimaDetail($id)
    {
        $survey = DataSurvey::findOrFail($id);

        return view('donatur.data_penerima.show', compact('survey'));
    }
}