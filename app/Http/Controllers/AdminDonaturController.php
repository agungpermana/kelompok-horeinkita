<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminDonaturController extends Controller
{
    public function index()
    {
        $donatur = User::where('role', 'donatur')
            ->orderBy('created_at', 'desc')
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