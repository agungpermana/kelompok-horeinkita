<?php

namespace App\Http\Controllers;

use App\Models\DataWarung;
use App\Models\katalog_paket;
use Illuminate\Http\Request;

class WarungKatalogController extends Controller
{
    private function warung(): DataWarung
    {
        abort_unless(auth()->user()->role === 'warung', 403);

        return DataWarung::firstOrCreate(
            ['id_user' => auth()->id()],
            ['nama_warung' => auth()->user()->nama_lengkap],
        );
    }

    public function index()
    {
        $warung = $this->warung();

        $katalog = katalog_paket::where('id_warung', $warung->id_warung)
            ->latest()
            ->get();

        return view('warung.katalog.index', compact('katalog'));
    }

    public function create()
    {
        $this->warung();

        return view('warung.katalog.create');
    }

    public function store(Request $request)
    {
        $warung = $this->warung();

        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'harga'      => 'required|numeric|min:0',
            'stok'       => 'required|integer|min:0',
        ]);

        katalog_paket::create([
            'id_warung'  => $warung->id_warung,
            'nama_paket' => $request->nama_paket,
            'deskripsi'  => $request->deskripsi,
            'harga'      => $request->harga,
            'stok'       => $request->stok,
        ]);

        return redirect()
            ->route('warung.katalog.index')
            ->with('success', 'Katalog Sembako berhasil ditambahkan.');
    }

    public function edit($katalog)
    {
        $warung = $this->warung();

        $paket = katalog_paket::where('id_warung', $warung->id_warung)
            ->findOrFail($katalog);

        return view('warung.katalog.edit', compact('paket'));
    }

    public function update(Request $request, $katalog)
    {
        $warung = $this->warung();

        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'harga'      => 'required|numeric|min:0',
            'stok'       => 'required|integer|min:0',
        ]);

        $paket = katalog_paket::where('id_warung', $warung->id_warung)
            ->findOrFail($katalog);

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'deskripsi'  => $request->deskripsi,
            'harga'      => $request->harga,
            'stok'       => $request->stok,
        ]);

        return redirect()
            ->route('warung.katalog.index')
            ->with('success', 'Katalog Sembako berhasil diperbarui.');
    }

    public function destroy($katalog)
    {
        $warung = $this->warung();

        $paket = katalog_paket::where('id_warung', $warung->id_warung)
            ->findOrFail($katalog);

        $paket->delete();

        return redirect()
            ->route('warung.katalog.index')
            ->with('success', 'Katalog Sembako berhasil dihapus.');
    }
}