<?php

namespace App\Http\Controllers;

use App\Models\data_penerima;
use App\Models\DataWarung;
use Illuminate\Http\Request;

class WarungPenerimaController extends Controller
{
    public function index(Request $request)
    {
        $myWarung = DataWarung::where('id_user', auth()->user()->id_user)->first();

        $query = data_penerima::with(['user', 'survey']);

        // Filter berdasarkan lokasi_rw warung jika ada
        if ($myWarung && $myWarung->lokasi_rw && $myWarung->lokasi_rw !== '-') {
            $query->where('lokasi_rw', $myWarung->lokasi_rw);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%")
                  ->orWhere('username', 'like', "%$search%");
            })->orWhere('alamat_penerima', 'like', "%$search%");
        }

        $penerimas = $query->latest()->get();

        return view('warung.penerima.index', compact('penerimas', 'myWarung'));
    }

    public function show($id)
    {
        $penerima = data_penerima::with(['user', 'survey'])->findOrFail($id);
        return view('warung.penerima.show', compact('penerima'));
    }
}
