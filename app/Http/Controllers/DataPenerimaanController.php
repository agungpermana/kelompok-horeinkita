<?php

namespace App\Http\Controllers;

use App\Models\data_penerima;
use App\Models\DataSurvey;
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
        $users = User::where('role', '!=', 'admin')->get();
        $surveys = DataSurvey::all();
        return view('admin.penerimas.create', compact('users', 'surveys'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user'         => 'required|exists:data_user,id_user',
            'id_survey'       => 'nullable|exists:data_survey,id_survey',
            'lokasi_rw'       => 'nullable|string|max:10',
            'alamat_penerima' => 'nullable|string',
        ]);

        data_penerima::create($validated);

        return redirect()->route('admin.penerimas.index')->with('success', 'Data penerima berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penerima = data_penerima::findOrFail($id);
        $users = User::where('role', '!=', 'admin')->get();
        $surveys = DataSurvey::all();

        return view('admin.penerimas.edit', compact('penerima', 'users', 'surveys'));
    }

    public function update(Request $request, $id)
    {
        $penerima = data_penerima::findOrFail($id);

        $validated = $request->validate([
            'id_user'         => 'required|exists:data_user,id_user',
            'id_survey'       => 'nullable|exists:data_survey,id_survey',
            'lokasi_rw'       => 'nullable|string|max:10',
            'alamat_penerima' => 'nullable|string',
        ]);

        $penerima->update($validated);

        return redirect()->route('admin.penerimas.index')->with('success', 'Data penerima berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penerima = data_penerima::findOrFail($id);
        $penerima->delete();

        return redirect()->route('admin.penerimas.index')->with('success', 'Data penerima berhasil dihapus.');
    }
}