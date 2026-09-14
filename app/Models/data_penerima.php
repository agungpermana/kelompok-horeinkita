<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_penerima extends Model
{
    use HasFactory;

    // Menyesuaikan dengan nama tabel di migration kamu
    protected $table = 'data_penerima';
    protected $primaryKey = 'id_penerima';

    protected $fillable = [
        'id_user',
        'id_survey',
        'lokasi_rw',
        'alamat_penerima',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function survey()
    {
        return $this->belongsTo(DataSurvey::class, 'id_survey', 'id_survey');
    }
}