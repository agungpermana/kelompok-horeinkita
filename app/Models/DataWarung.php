<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_warung
 * @property string $nama_warung
 * @property int $id_user
 */
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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function survey()
    {
        return $this->belongsTo(DataSurvey::class, 'id_survey');
    }
}
