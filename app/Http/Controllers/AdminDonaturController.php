<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\HandlesTableSorting;
use App\Models\User;

class AdminDonaturController extends Controller
{
    use HandlesTableSorting;

    public function index()
    {
        [$sort, $direction] = $this->sortQuery(
            ['username', 'nama_lengkap', 'email', 'nomor_hp'],
            'created_at'
        );

        $donatur = User::where('role', 'donatur')
            ->orderBy($sort, $direction)
            ->get();

        return view('admin.donatur.index', compact('donatur'));
    }

    public function destroy($id)
    {
        $akun = User::where('role', 'donatur')->findOrFail($id);

        $akun->delete();

        return redirect()
            ->route('admin.donatur.index')
            ->with('success', 'Akun Donatur berhasil dihapus.');
    }
}