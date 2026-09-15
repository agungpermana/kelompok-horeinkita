<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminWarungController extends Controller
{
    public function index()
    {
        $warung = User::where('role', 'warung')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.warung.index', compact('warung'));
    }

    public function create()
    {
        return view('admin.warung.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:data_user,username',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'nomor_hp' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name'         => $request->name,
            'username'     => $request->username,
            'nama_lengkap' => $request->name,
            'email'        => $request->email,
            'password'     => $request->password,
            'role'         => 'warung',
            'nomor_hp'     => $request->nomor_hp,
        ]);

        // Otomatis buat entry di data_warung
        \App\Models\DataWarung::create([
            'id_user'      => $user->id,
            'nama_warung'  => $request->name . "'s Warung",
            'lokasi_rw'    => '-',
            'alamat_warung'=> '-',
        ]);

        return redirect()
            ->route('admin.warung.index')
            ->with('success', 'Akun Pemilik Warung berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $warung = User::where('role', 'warung')->findOrFail($id);

        $warung->delete();

        return redirect()
            ->route('admin.warung.index')
            ->with('success', 'Akun Pemilik Warung berhasil dihapus.');
    }
}