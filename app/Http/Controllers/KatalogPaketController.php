<?php

namespace App\Http\Controllers;

use App\Models\katalog_paket as KatalogPaket;
use Illuminate\Http\Request;

class KatalogPaketController extends Controller
{
    public function index()
    {
        $paket = KatalogPaket::with('warung')->get();

        return view('katalog_paket.index', compact('paket'));
    }

    public function create()
    {
        return view('katalog_paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_warung' => 'required|exists:data_warung,id_warung',
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        KatalogPaket::create([
            'id_warung' => $request->id_warung,
            'nama_paket' => $request->nama_paket,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()
            ->route('katalog-paket.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $paket = KatalogPaket::findOrFail($id);

        return view('katalog_paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = KatalogPaket::findOrFail($id);

        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()
            ->route('katalog-paket.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $paket = KatalogPaket::findOrFail($id);
        $paket->delete();

        return redirect()
            ->route('katalog-paket.index')
            ->with('success', 'Paket berhasil dihapus.');
    }
}