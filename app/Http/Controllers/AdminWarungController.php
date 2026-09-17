<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\HandlesTableSorting;
use App\Models\DataSurvey;
use App\Models\DataWarung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminWarungController extends Controller
{
    use HandlesTableSorting;

    public function index()
    {
        [$sort, $direction] = $this->sortQuery(
            ['username', 'nama_lengkap', 'email', 'nomor_hp'],
            'created_at'
        );

        $warung = User::where('role', 'warung')
            ->orderBy($sort, $direction)
            ->get();

        return view('admin.warung.index', compact('warung'));
    }

    public function create()
    {
        $surveys = DataSurvey::where('jenis_survey', 'Warung')
            ->where('status_kelayakan', 'lolos')
            ->whereDoesntHave('data_warung')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.warung.create', compact('surveys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'      => 'required|string|max:50|unique:data_user,username',
            'name'          => 'required|string|max:255',
            'email'         => 'nullable|email|max:255',
            'nomor_hp'      => 'required|string|max:20',
            'password'      => 'required|string|min:6',
            'id_survey'     => [
                'nullable',
                'exists:data_survey,id_survey',
                Rule::unique('data_warung', 'id_survey'),
            ],
            'nama_warung'   => 'nullable|string|max:255',
            'lokasi_rw'     => 'nullable|string|max:20',
            'alamat_warung' => 'nullable|string',
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
            'id_user'       => $user->id_user,
            'id_survey'     => $request->id_survey,
            'nama_warung'   => $request->nama_warung ?: ($request->name . "'s Warung"),
            'lokasi_rw'     => $request->lokasi_rw ?: '-',
            'alamat_warung' => $request->alamat_warung ?: '-',
        ]);

        return redirect()
            ->route('admin.warung.index')
            ->with('success', 'Akun Pemilik Warung berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $warung = User::where('role', 'warung')->findOrFail($id);
        $profil = DataWarung::where('id_user', $id)->first();

        return view('admin.warung.edit', compact('warung', 'profil'));
    }

    public function update(Request $request, $id)
    {
        $warung = User::where('role', 'warung')->findOrFail($id);

        $request->validate([
            'username'      => ['required', 'string', 'max:50', Rule::unique('data_user', 'username')->ignore($id, 'id_user')],
            'name'          => 'required|string|max:255',
            'email'         => 'nullable|email|max:255',
            'nomor_hp'      => 'required|string|max:20',
            'password'      => 'nullable|string|min:6',
            'nama_warung'   => 'nullable|string|max:255',
            'lokasi_rw'     => 'nullable|string|max:20',
            'alamat_warung' => 'nullable|string',
        ]);

        $warung->update([
            'nama_lengkap' => $request->name,
            'username'     => $request->username,
            'email'        => $request->email,
            'nomor_hp'     => $request->nomor_hp,
        ]);

        if ($request->filled('password')) {
            $warung->update(['password' => $request->password]);
        }

        $profil = DataWarung::where('id_user', $id)->first();
        $profilData = [
            'nama_warung'   => $request->nama_warung ?: ($request->name . "'s Warung"),
            'lokasi_rw'     => $request->lokasi_rw ?: '-',
            'alamat_warung' => $request->alamat_warung ?: '-',
        ];

        if ($profil) {
            $profil->update($profilData);
        } else {
            DataWarung::create(array_merge(['id_user' => $id], $profilData));
        }

        return redirect()
            ->route('admin.warung.index')
            ->with('success', 'Akun Pemilik Warung berhasil diperbarui.');
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