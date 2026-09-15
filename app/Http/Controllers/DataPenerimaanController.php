<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\HandlesTableSorting;
use App\Models\data_penerima;
use App\Models\DataSurvey;
use App\Models\User;
use Illuminate\Http\Request;

class DataPenerimaanController extends Controller
{
    use HandlesTableSorting;

    public function index()
    {
        [$sort, $direction] = $this->sortQuery(
            ['username', 'nama', 'email', 'nomor_hp', 'survey', 'lokasi_rw', 'alamat'],
            'created_at'
        );

        $sortColumns = [
            'username'   => 'data_user.username',
            'nama'       => 'data_user.nama_lengkap',
            'email'      => 'data_user.email',
            'nomor_hp'   => 'data_user.nomor_hp',
            'survey'     => 'data_survey.nama_subjek',
            'lokasi_rw'  => 'data_penerima.lokasi_rw',
            'alamat'     => 'data_penerima.alamat_penerima',
            'created_at' => 'data_penerima.created_at',
        ];

        $penerimas = data_penerima::with(['user', 'survey'])
            ->leftJoin('data_user', 'data_penerima.id_user', '=', 'data_user.id')
            ->leftJoin('data_survey', 'data_penerima.id_survey', '=', 'data_survey.id_survey')
            ->select('data_penerima.*')
            ->orderBy($sortColumns[$sort] ?? 'data_penerima.created_at', $direction)
            ->get();

        return view('admin.penerimas.index', compact('penerimas'));
    }

    public function create()
    {
        $surveys = DataSurvey::all();
        return view('admin.penerimas.create', compact('surveys'));
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
            'id_user'         => $user->id_user,
            'id_survey'       => $request->id_survey,
            'lokasi_rw'       => $request->lokasi_rw,
            'alamat_penerima' => $request->alamat_penerima,
        ]);

        return redirect()
            ->route('admin.penerimas.index')
            ->with('success', 'Akun Penerima Bantuan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penerima = data_penerima::with('user')->findOrFail($id);
        $surveys  = DataSurvey::all();

        return view('admin.penerimas.edit', compact('penerima', 'surveys'));
    }

    public function update(Request $request, $id)
    {
        $penerima = data_penerima::findOrFail($id);

        $request->validate([
            'username'        => 'required|string|max:50|unique:data_user,username,' . $penerima->id_user . ',id',
            'name'            => 'required|string|max:255',
            'email'           => 'nullable|email|max:255',
            'nomor_hp'        => 'required|string|max:20',
            'password'        => 'nullable|string|min:6',
            'id_survey'       => 'nullable|exists:data_survey,id_survey',
            'lokasi_rw'       => 'nullable|string|max:10',
            'alamat_penerima' => 'nullable|string',
        ]);

        $userData = [
            'name'         => $request->name,
            'username'     => $request->username,
            'nama_lengkap' => $request->name,
            'email'        => $request->email,
            'nomor_hp'     => $request->nomor_hp,
        ];

        if ($request->filled('password')) {
            $userData['password'] = $request->password;
        }

        $penerima->user->update($userData);

        $penerima->update([
            'id_survey'       => $request->id_survey,
            'lokasi_rw'       => $request->lokasi_rw,
            'alamat_penerima' => $request->alamat_penerima,
        ]);

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
