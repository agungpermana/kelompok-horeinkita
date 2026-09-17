<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\HandlesTableSorting;
use App\Models\DataSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    use HandlesTableSorting;

    public function index()
    {
        [$sort, $direction] = $this->sortQuery(
            ['nama_subjek', 'jenis_survey', 'tanggal_survey', 'lokasi_rw', 'kelurahan', 'nomor_telepon', 'status_kelayakan', 'skor_kelayakan'],
            'created_at'
        );

        $surveys = DataSurvey::orderBy($sort, $direction)->get();

        return view('admin.survey.index', compact('surveys'));
    }

    public function export()
    {
        $format = request()->query('format', 'csv');

        $surveys = DataSurvey::orderByDesc('created_at')->get();

        $filename = 'data-survey-' . now()->format('Y-m-d-Hi');

        if ($format === 'excel') {
            return response()
                ->view('admin.survey.export', compact('surveys'), 200, [
                    'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
                    'Content-Disposition' => 'attachment; filename="' . $filename . '.xls"',
                ]);
        }

        return response()->streamDownload(function () use ($surveys) {
            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'ID', 'Nama Subjek', 'Jenis Survey', 'Tanggal Survey', 'RW', 'Kelurahan',
                'Alamat Lengkap', 'Nomor HP', 'Status Kelayakan', 'Skor Kelayakan', 'Catatan',
            ]);

            foreach ($surveys as $survey) {
                fputcsv($handle, [
                    $survey->id_survey,
                    $survey->nama_subjek,
                    $survey->jenis_survey,
                    $survey->tanggal_survey,
                    $survey->lokasi_rw,
                    $survey->kelurahan,
                    $survey->alamat_lengkap,
                    $survey->nomor_telepon,
                    $survey->status_kelayakan,
                    $survey->skor_kelayakan,
                    $survey->catatan_survey,
                ]);
            }

            fclose($handle);
        }, $filename . '.csv', ['Content-Type' => 'text/csv']);
    }

    public function create()
    {
        return view('admin.survey.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateSurvey($request);

        $validated['alamat_lengkap'] = $validated['kelurahan'] ?? null;

        $validated['foto_lokasi_url'] = $this->uploadFoto($request, 'foto_lokasi', 'lokasi');
        $validated['foto_identitas_url'] = $this->uploadFoto($request, 'foto_identitas', 'identitas');
        $validated['foto_dokumen_url'] = $this->uploadFoto($request, 'foto_dokumen', 'dokumen');

        DataSurvey::create($validated);

        return redirect()
            ->route('admin.survey.index')
            ->with('success', 'Hasil survey berhasil disimpan.');
    }

    public function edit($id)
    {
        $survey = DataSurvey::findOrFail($id);

        return view('admin.survey.create', compact('survey'));
    }

    public function update(Request $request, $id)
    {
        $survey = DataSurvey::findOrFail($id);

        $validated = $this->validateSurvey($request);

        $validated['alamat_lengkap'] = $validated['kelurahan'] ?? null;

        if ($request->hasFile('foto_lokasi')) {
            $validated['foto_lokasi_url'] = $this->uploadFoto($request, 'foto_lokasi', 'lokasi');
        }
        if ($request->hasFile('foto_identitas')) {
            $validated['foto_identitas_url'] = $this->uploadFoto($request, 'foto_identitas', 'identitas');
        }
        if ($request->hasFile('foto_dokumen')) {
            $validated['foto_dokumen_url'] = $this->uploadFoto($request, 'foto_dokumen', 'dokumen');
        }

        $survey->update($validated);

        return redirect()
            ->route('admin.survey.index')
            ->with('success', 'Hasil survey berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $survey = DataSurvey::findOrFail($id);
        $survey->delete();

        return redirect()
            ->route('admin.survey.index')
            ->with('success', 'Data survey berhasil dihapus.');
    }

    private function validateSurvey(Request $request): array
    {
        return $request->validate([
            'nama_subjek'      => 'required|string|max:255',
            'jenis_survey'     => 'required|in:Penerima,Warung',
            'tanggal_survey'   => 'nullable|date',
            'lokasi_rw'        => 'required|string|max:20',
            'kelurahan'        => 'nullable|string|max:255',
            'nomor_telepon'    => 'required|string|max:20',
            'status_kelayakan' => 'nullable|in:lolos,tidak_lolos',
            'skor_kelayakan'   => 'nullable|integer|min:0|max:100',
            'catatan_survey'   => 'nullable|string',
            'foto_lokasi'      => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'foto_identitas'   => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'foto_dokumen'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);
    }

    private function uploadFoto(Request $request, string $field, string $prefix): ?string
    {
        if (!$request->hasFile($field)) {
            return null;
        }

        $file = $request->file($field);
        $filename = $prefix . '_' . Str::random(16) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/survey'), $filename);

        return 'uploads/survey/' . $filename;
    }
}