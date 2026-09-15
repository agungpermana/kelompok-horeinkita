<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bukti_penyerahan extends Model
{
    protected $table      = 'bukti_penyerahan';
    protected $primaryKey = 'id_bukti';

    protected $fillable = [
        'id_kupon',
        'id_warung',
        'foto_bukti_url',
        'catatan_penyerahan',
        'tanggal_penyerahan',
    ];

    protected $casts = [
        'tanggal_penyerahan' => 'datetime',
    ];

    public function kupon()
    {
        return $this->belongsTo(kupon_digital::class, 'id_kupon', 'id_kupon');
    }

    public function warung()
    {
        return $this->belongsTo(DataWarung::class, 'id_warung', 'id_warung');
    }

    public function riwayat()
    {
        return $this->hasMany(riwayat_penyaluran::class, 'id_bukti', 'id_bukti');
    }

    public function riwayatTerakhir()
    {
        return $this->hasOne(riwayat_penyaluran::class, 'id_bukti', 'id_bukti')
                    ->latestOfMany('waktu_pencatatan');
    }
}
