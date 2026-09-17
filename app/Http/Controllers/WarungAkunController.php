<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class WarungAkunController extends Controller
{
    public function edit()
    {
        $user   = auth()->user();
        $warung = \App\Models\DataWarung::where('id_user', $user->id_user)->first();
        return view('warung.akun.edit', compact('user', 'warung'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'nullable|email|max:255|unique:data_user,email,' . $user->id_user . ',id_user',
            'nomor_hp'     => 'nullable|string|max:12',
        ]);

        $user->update([
            'name'         => $request->nama_lengkap,
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'nomor_hp'     => $request->nomor_hp,
        ]);

        return redirect()->route('warung.akun.edit')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama'    => 'required|string',
            'password_baru'    => ['required', 'string', 'min:8', 'confirmed', Password::defaults()],
        ]);

        $user = auth()->user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors(['password_lama' => 'Password lama tidak sesuai.'])->withInput();
        }

        $user->update([
            'password' => Hash::make($request->password_baru),
        ]);

        return redirect()->route('warung.akun.edit')
            ->with('success', 'Password berhasil diubah.');
    }
}
