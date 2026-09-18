<?php

namespace App\Http\Controllers;

use App\Models\bukti_penyerahan;
use App\Models\riwayat_penyaluran;
use App\Models\kupon_digital;
use App\Models\DataWarung;
use Illuminate\Http\Request;

class BuktiPenyerahanController extends Controller
{
    /**
     * Tampilkan daftar bukti penyerahan milik warung yang login,
     * sekaligus riwayat penyaluran per bukti.
     */
    public function index()
    {
        $warung = DataWarung::where('id_user', auth()->user()->id_user)->first();

        $buktis = bukti_penyerahan::with([
                        'kupon.transaksi.donatur',
                        'kupon.transaksi.penerima.user',
                        'riwayat' => function ($q) {
                            $q->orderBy('waktu_pencatatan', 'desc');
                        },
                    ])
                    ->when($warung, fn($q) => $q->where('id_warung', $warung->id_warung))
                    ->orderBy('tanggal_penyerahan', 'desc')
                    ->get();

        $kupons = kupon_digital::with('transaksi')
                    ->when($warung, function ($q) use ($warung) {
                        $q->whereDoesntHave('buktiPenyerahan', function ($q2) use ($warung) {
                            $q2->where('id_warung', $warung->id_warung);
                        });
                    })
                    ->where(function ($q) {
                        $q->where('status_kupon', '!=', 'terpakai')
                          ->orWhereNull('status_kupon');
                    })
                    ->orderBy('id_kupon', 'desc')
                    ->get();

        return view('warung.bukti_penyerahan.index', compact('buktis', 'warung', 'kupons'));
    }

    /**
     * Form tambah bukti penyerahan.
     */
    public function create()
    {
        $warung = DataWarung::where('id_user', auth()->user()->id_user)->first();

        // Kupon yang belum punya bukti penyerahan untuk warung ini
        $kupons = kupon_digital::when($warung, function ($q) use ($warung) {
                        $q->whereDoesntHave('buktiPenyerahan', function ($q2) use ($warung) {
                            $q2->where('id_warung', $warung->id_warung);
                        });
                    })
                    ->where(function ($q) {
                        $q->where('status_kupon', '!=', 'terpakai')
                          ->orWhereNull('status_kupon');
                    })
                    ->get();

        return view('warung.bukti_penyerahan.create', compact('warung', 'kupons'));
    }

    /**
     * Simpan bukti penyerahan baru + otomatis buat riwayat pertama.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kupon'           => 'nullable|exists:kupon_digital,id_kupon',
            'foto_bukti'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'catatan_penyerahan' => 'nullable|string',
            'tanggal_penyerahan' => 'required|date',
        ]);

        $warung = DataWarung::where('id_user', auth()->user()->id_user)->firstOrFail();

        $fotoPath = null;
        if ($request->hasFile('foto_bukti') && $request->file('foto_bukti')->isValid()) {
            $fotoPath = $request->file('foto_bukti')->store('bukti_penyerahan', 'public');
        }

        $bukti = bukti_penyerahan::create([
            'id_kupon'           => $request->id_kupon ?: null,
            'id_warung'          => $warung->id_warung,
            'foto_bukti_url'     => $fotoPath,
            'catatan_penyerahan' => $request->catatan_penyerahan,
            'tanggal_penyerahan' => $request->tanggal_penyerahan,
        ]);

        riwayat_penyaluran::create([
            'id_bukti'          => $bukti->id_bukti,
            'status_penyaluran' => 'pending',
            'keterangan'        => 'Bukti penyerahan baru dibuat',
            'waktu_pencatatan'  => now(),
        ]);

        if ($request->id_kupon) {
            kupon_digital::where('id_kupon', $request->id_kupon)
                ->update(['status_kupon' => 'terpakai']);
        }

        if ($request->ajax()) {
            $bukti->load(['kupon.transaksi.donatur', 'kupon.transaksi.penerima.user']);

            $transaksi = $bukti->kupon?->transaksi;

            return response()->json([
                'success' => true,
                'message' => 'Bukti penyerahan berhasil ditambahkan.',
                'data' => [
                    'id_bukti'          => $bukti->id_bukti,
                    'id_kupon'          => $bukti->id_kupon,
                    'tanggal_penyerahan' => $bukti->tanggal_penyerahan->format('d M Y'),
                    'catatan_penyerahan' => $bukti->catatan_penyerahan ?? '-',
                    'status'            => $bukti->riwayat->first()->status_penyaluran ?? 'pending',
                    'donatur'           => $transaksi?->donatur?->nama_lengkap ?? '-',
                    'penerima'          => $transaksi?->penerima?->user?->nama_lengkap ?? '-',
                    'foto_url'          => $bukti->foto_bukti_url ? \Storage::url($bukti->foto_bukti_url) : null,
                ],
            ]);
        }

        return redirect()
            ->route('bukti-penyerahan.index')
            ->with('success', 'Bukti penyerahan berhasil ditambahkan.');
    }

    /**
     * Detail bukti + semua riwayat penyalurannya.
     */
    public function show($id)
    {
        $bukti = bukti_penyerahan::with(['kupon', 'warung', 'riwayat' => function ($q) {
                        $q->orderBy('waktu_pencatatan', 'desc');
                    }])
                    ->findOrFail($id);

        return view('warung.bukti_penyerahan.show', compact('bukti'));
    }

    /**
     * Tambah riwayat penyaluran baru ke bukti yang sudah ada.
     */
    public function tambahRiwayat(Request $request, $id)
    {
        $request->validate([
            'status_penyaluran' => 'required|string|max:50',
            'keterangan'        => 'nullable|string',
        ]);

        riwayat_penyaluran::create([
            'id_bukti'          => $id,
            'status_penyaluran' => $request->status_penyaluran,
            'keterangan'        => $request->keterangan,
            'waktu_pencatatan'  => now(),
        ]);

        return redirect()
            ->route('bukti-penyerahan.show', $id)
            ->with('success', 'Riwayat penyaluran berhasil ditambahkan.');
    }
}
