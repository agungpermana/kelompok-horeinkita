<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataWarung extends Model
{
    protected $table = 'data_warung';

    protected $primaryKey = 'id_warung';

    protected $fillable = [
        'id_user',
        'id_survey',
        'nama_warung',
        'lokasi_rw',
        'alamat_warung',
    ];

    public function katalogPaket()
    {
        return $this->hasMany(KatalogPaket::class, 'id_warung', 'id_warung');
    }
}