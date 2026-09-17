<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\HandlesTableSorting;
use App\Models\DataWarung;
use App\Models\katalog_paket as KatalogPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KatalogPaketController extends Controller
{
    use HandlesTableSorting;

    private function myWarung()
    {
        return DataWarung::where('id_user', auth()->user()->id_user)->first();
    }

    public function index()
    {
        $myWarung = $this->myWarung();

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
            ->when($myWarung, function ($query) use ($myWarung) {
                $query->where('katalog_paket.id_warung', $myWarung->id_warung);
            }, function ($query) {
                $query->whereRaw('1 = 0');
            })
            ->orderBy($sortColumns[$sort] ?? 'katalog_paket.created_at', $direction)
            ->get();

        return view('katalog_paket.index', compact('paket', 'myWarung'));
    }

    public function create()
    {
        $myWarung = $this->myWarung();

        if (! $myWarung) {
            return redirect()
                ->route('katalog-paket.index')
                ->with('error', 'Akun Anda belum terhubung dengan warung mana pun.');
        }

        return view('katalog_paket.create', compact('myWarung'));
    }

    public function store(Request $request)
    {
        $myWarung = $this->myWarung();

        if (! $myWarung) {
            return redirect()
                ->route('katalog-paket.index')
                ->with('error', 'Akun Anda belum terhubung dengan warung mana pun.');
        }

        $request->validate([
            'nama_paket'   => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'harga'        => 'required|numeric|min:0',
            'stok'         => 'required|integer|min:0',
            'gambar_paket' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar_paket') && $request->file('gambar_paket')->isValid()) {
            $gambarPath = $request->file('gambar_paket')->store('katalog_paket', 'public');
        }

        KatalogPaket::create([
            'id_warung'    => $myWarung->id_warung,
            'nama_paket'   => $request->nama_paket,
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,
            'stok'         => $request->stok,
            'gambar_paket' => $gambarPath,
        ]);

        return redirect()
            ->route('katalog-paket.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $paket = KatalogPaket::findOrFail($id);
        $myWarung = $this->myWarung();

        if (! $myWarung || $paket->id_warung !== $myWarung->id_warung) {
            abort(403, 'Anda tidak berhak mengelola paket ini.');
        }

        return view('katalog_paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = KatalogPaket::findOrFail($id);
        $myWarung = $this->myWarung();

        if (! $myWarung || $paket->id_warung !== $myWarung->id_warung) {
            abort(403, 'Anda tidak berhak mengelola paket ini.');
        }

        $request->validate([
            'nama_paket'   => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'harga'        => 'required|numeric|min:0',
            'stok'         => 'required|integer|min:0',
            'gambar_paket' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $gambarPath = $paket->gambar_paket;
        if ($request->hasFile('gambar_paket') && $request->file('gambar_paket')->isValid()) {
            // Hapus gambar lama jika ada
            if ($gambarPath) {
                Storage::disk('public')->delete($gambarPath);
            }
            $gambarPath = $request->file('gambar_paket')->store('katalog_paket', 'public');
        }

        $paket->update([
            'nama_paket'   => $request->nama_paket,
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,
            'stok'         => $request->stok,
            'gambar_paket' => $gambarPath,
        ]);

        return redirect()
            ->route('katalog-paket.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $paket = KatalogPaket::findOrFail($id);
        $myWarung = $this->myWarung();

        if (! $myWarung || $paket->id_warung !== $myWarung->id_warung) {
            abort(403, 'Anda tidak berhak mengelola paket ini.');
        }

        // Hapus gambar jika ada
        if ($paket->gambar_paket) {
            Storage::disk('public')->delete($paket->gambar_paket);
        }

        $paket->delete();

        return redirect()
            ->route('katalog-paket.index')
            ->with('success', 'Paket berhasil dihapus.');
    }
}
