<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekomendasiDetailZscore extends Model
{
    protected $fillable = [
        'id_rekomendasi_detail',
        'nama_zscore',
        'bobot',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_rekomendasi_detail_zscore';
    protected $table = 'rekomendasi_detail_zscore';
    public $timestamps = false;
}
