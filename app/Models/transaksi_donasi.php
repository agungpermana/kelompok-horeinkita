<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi_donasi extends Model
{
    protected $table = 'transaksi_donasi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_donatur',
        'id_penerima',
        'id_paket',
        'jumlah_paket',
        'total_bayar',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_transaksi',
    ];

    public function donatur()
    {
        return $this->belongsTo(User::class, 'id_donatur', 'id_user');
    }

    public function penerima()
    {
        return $this->belongsTo(data_penerima::class, 'id_penerima', 'id_penerima');
    }

    public function paket()
    {
        return $this->belongsTo(katalog_paket::class, 'id_paket', 'id_paket');
    }
}
