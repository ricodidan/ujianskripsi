<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RekomendasiDetailZscore;

class RekomendasiDetail extends Model
{
    protected $fillable = [
        'id_rekomendasi',
        'id_balita',
        'total_bobot',
        'ranking',
        'nama_balita',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_rekomendasi_detail';
    protected $table = 'rekomendasi_detail';
    public $timestamps = false;

    public function rekomendasiDetailZscore()
    {
        return $this->hasMany(RekomendasiDetailZscore::class, 'id_rekomendasi_detail')->orderBy('nama_zscore', 'ASC');
    }
    
}
