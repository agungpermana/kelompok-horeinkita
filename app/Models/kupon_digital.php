<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kupon_digital extends Model
{
    protected $table = 'kupon_digital';
    protected $primaryKey = 'id_kupon';

    protected $fillable = [
        'id_transaksi',
        'kode_kupon',
        'status_kupon',
        'tanggal_diterbitkan',
        'tanggal_kadaluarsa',
    ];

    public function transaksi()
    {
        return $this->belongsTo(transaksi_donasi::class, 'id_transaksi', 'id_transaksi');
    }

    public function buktiPenyerahan()
    {
        return $this->hasMany(bukti_penyerahan::class, 'id_kupon', 'id_kupon');
    }
}
