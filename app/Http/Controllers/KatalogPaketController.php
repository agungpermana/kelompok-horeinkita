<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\HandlesTableSorting;
use App\Models\katalog_paket as KatalogPaket;
use Illuminate\Http\Request;

class KatalogPaketController extends Controller
{
    use HandlesTableSorting;

    public function index()
    {
        [$sort, $direction] = $this->sortQuery(
            ['warung', 'nama_paket', 'deskripsi', 'harga', 'stok'],
            'created_at'
        );

        $sortColumns = [
            'warung'     => 'data_warung.nama_warung',
            'nama_paket' => 'katalog_paket.nama_paket',
            'deskripsi'  => 'katalog_paket.deskripsi',
            'harga'      => 'katalog_paket.harga',
            'stok'       => 'katalog_paket.stok',
            'created_at' => 'katalog_paket.created_at',
        ];

        $paket = KatalogPaket::with('warung')
            ->leftJoin('data_warung', 'katalog_paket.id_warung', '=', 'data_warung.id_warung')
            ->select('katalog_paket.*')
            ->orderBy($sortColumns[$sort] ?? 'katalog_paket.created_at', $direction)
            ->get();

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