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
            'name'         => $request->name,
            'username'     => $request->username,
            'nama_lengkap' => $request->name,
            'email'        => $request->email,
            'password'     => $request->password,
            'role'         => 'penerima',
            'nomor_hp'     => $request->nomor_hp,
        ]);

        data_penerima::create([
<<<<<<< HEAD
            'id_user' => $user->id_user,
=======
            'id_user'         => $user->id,
            'id_survey'       => $request->id_survey,
            'lokasi_rw'       => $request->lokasi_rw,
            'alamat_penerima' => $request->alamat_penerima,
>>>>>>> 58cec3b3ed6b7d63450e3048c98226f593e42f8d
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
<<<<<<< HEAD
            'username' => 'required|string|max:50|unique:data_user,username,' . $penerima->id_user . ',id_user',
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email|max:255',
            'nomor_hp' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
=======
            'username'        => 'required|string|max:50|unique:data_user,username,' . $penerima->id_user . ',id',
            'name'            => 'required|string|max:255',
            'email'           => 'nullable|email|max:255',
            'nomor_hp'        => 'required|string|max:20',
            'password'        => 'nullable|string|min:6',
            'id_survey'       => 'nullable|exists:data_survey,id_survey',
            'lokasi_rw'       => 'nullable|string|max:10',
            'alamat_penerima' => 'nullable|string',
>>>>>>> 58cec3b3ed6b7d63450e3048c98226f593e42f8d
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