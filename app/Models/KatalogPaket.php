<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KatalogPaket extends Model
{
    protected $table = 'katalog_paket';

    protected $primaryKey = 'id_paket';

    protected $fillable = [
        'id_warung',
        'nama_paket',
        'deskripsi',
        'harga',
        'stok',
    ];

    public function warung()
    {
        return $this->belongsTo(DataWarung::class, 'id_warung', 'id_warung');
    }
}