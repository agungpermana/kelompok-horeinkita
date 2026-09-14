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
        'lokasi_rw',
        'alamat_lengkap',
        'nomor_telepon',
        'status_kelayakan',
        'catatan_survey',
    ];
}
