<?php

namespace App\Http\Controllers;

use App\Models\data_penerima;
use App\Models\User;
use Illuminate\Http\Request;

class DataPenerimaanController extends Controller
{
    public function index()
    {
        $penerimas = data_penerima::with(['user', 'survey'])->latest()->get();
        return view('admin.penerimas.index', compact('penerimas'));
    }

    public function create()
    {
        return view('admin.penerimas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:data_user,username',
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email|max:255',
            'nomor_hp' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'username'     => $request->username,
            'nama_lengkap' => $request->name,
            'email'        => $request->email,
            'password'     => $request->password,
            'role'         => 'penerima',
            'nomor_hp'     => $request->nomor_hp,
        ]);

        data_penerima::create([
            'id_user' => $user->id_user,
        ]);

        return redirect()
            ->route('admin.penerimas.index')
            ->with('success', 'Akun Penerima Bantuan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penerima = data_penerima::with('user')->findOrFail($id);

        return view('admin.penerimas.edit', compact('penerima'));
    }

    public function update(Request $request, $id)
    {
        $penerima = data_penerima::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:50|unique:data_user,username,' . $penerima->id_user . ',id_user',
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email|max:255',
            'nomor_hp' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
        ]);

        $userData = [
            'username'     => $request->username,
            'nama_lengkap' => $request->name,
            'email'        => $request->email,
            'nomor_hp'     => $request->nomor_hp,
        ];

        if ($request->filled('password')) {
            $userData['password'] = $request->password;
        }

        $penerima->user->update($userData);

        return redirect()->route('admin.penerimas.index')->with('success', 'Akun Penerima Bantuan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penerima = data_penerima::findOrFail($id);

        $penerima->user?->delete();

        $penerima->delete();

        return redirect()->route('admin.penerimas.index')->with('success', 'Akun Penerima Bantuan berhasil dihapus.');
    }
}