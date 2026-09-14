<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSurvey extends Model
{
    protected $table = 'data_survey';
    protected $primaryKey = 'id_survey';

    protected $fillable = [
        'nama_subjek',
        'jenis_survey',
        'tanggal_survey',
        'lokasi_rw',
        'kelurahan',
        'alamat_lengkap',
        'nomor_telepon',
        'status_kelayakan',
        'skor_kelayakan',
        'catatan_survey',
        'foto_lokasi_url',
        'foto_identitas_url',
        'foto_dokumen_url',
    ];

    public function data_warung()
    {
        return $this->hasOne(DataWarung::class, 'id_survey');
    }

    public function data_penerima()
    {
        return $this->hasOne(data_penerima::class, 'id_survey');
    }
}