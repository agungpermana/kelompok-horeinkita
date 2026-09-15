<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class riwayat_penyaluran extends Model
{
    protected $table = 'riwayat_penyaluran';

    protected $fillable = [
        'id_bukti',
        'status_penyaluran',
        'keterangan',
        'waktu_pencatatan',
    ];

    protected $casts = [
        'waktu_pencatatan' => 'datetime',
    ];

    public function bukti()
    {
        return $this->belongsTo(bukti_penyerahan::class, 'id_bukti', 'id_bukti');
    }
}
