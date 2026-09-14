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
            'username' => 'required|string|max:50|unique:users,username',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'nomor_hp' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'warung',
            'nomor_hp' => $request->nomor_hp,
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